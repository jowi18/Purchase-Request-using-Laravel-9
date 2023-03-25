<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbldetail extends Model
{
    use HasFactory;
    protected $fillable = ['tblheader_id', 'req_particulars', 'req_description', 'qty', 'uom', 'date_needed', 'req_remarks'];

    public function header(){
        return $this->belongsTo(Tblheader::class);
    }
}
