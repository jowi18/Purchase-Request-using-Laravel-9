<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblheader extends Model
{
    use HasFactory;
    protected $fillable = ['pr_no', 'user_id', 'status_id', 'department', 'approver_status', 'approve_date', 'date_created'];

    public function detail(){
        return $this->hasMany(Tbldetail::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function status(){
        return $this->hasOne(Tblstatus::class, 'tblheader_id');
    }

   
}
