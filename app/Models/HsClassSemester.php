<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HsClassSemester extends Model
{
    use HasFactory;

    protected $table = 'hs_class_semesters';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function hsClass(){
        return $this->belongsTo(HsClass::class, 'hs_class_id', 'id');
        // 'hs_class_id' is the foreign key in the HsClass table
        // 'id' is the primary key in the HsClass table
    }

    public function hsSemester(){
        return $this->belongsTo(HsSemester::class, 'hs_semester_id', 'id');
        // 'hs_semester_id' is the foreign key in the HsSemester table
        // 'id' is the primary key in the HsSemester table
    }

}
