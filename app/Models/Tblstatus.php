<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblstatus extends Model
{
    use HasFactory;
    protected $fillable = ['tblheader_id','approver', 'status_code', 'dateOfAction', 'user_id', 'approveby', 'verifyby'];

    public function header(){
        return $this->belongsTo(Tblheader::class, 'tblheader_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
