<?php

namespace App\Models;
use Carbon\Carbon;
use Jenssegers\Agent\Agent;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbllog extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'logs_date', 'department', 'device_name', 'device_ipAddress', 'action'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function logs(Request $request){
        
            $user_id = Auth::id();
            $user_department = auth()->user()->department;
            $date = Carbon::now('GMT+8');
            $user_ipAddress = request()->ip();
        $logs = Tbllog::create([
            'user_id' => $user_id,
            'department' => $user_department,
            'device_ipAddress' => $user_ipAddress,
            'action' => 'update the request',
            'logs_date' => $date
        ]);
    }
}
