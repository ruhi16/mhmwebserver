<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HsSemester extends Model
{
    use HasFactory;
    protected $table = 'hs_semesters';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function hsClass(){
        return $this->belongsTo(HsClass::class, 'hs_class_id', 'id');
        // 'hs_class_id' is the foreign key in the HsClass table
        // 'id' is the primary key in the HsClass table
    }

    public function hsClassSemesters(){
        return $this->hasMany(HsClassSemester::class, 'hs_semester_id', 'id');
        // 'hs_semester_id' is the foreign key in the HsClassSemester table
        // 'id' is the primary key in the HsClassSemester table
    }

    public function hsStudentdbs(){
        return $this->hasMany(HsStudentDb::class, 'st_hs_semester_id', 'id');
        // 'hs_semester_id' is the foreign key in the HsStudentDb table
        // 'id' is the primary key in the HsStudentDb table
    }


    public function hsExamnames(){
        return $this->hasMany(HsExamName::class, 'hs_semester_id', 'id');
        // 'hs_semester_id' is the foreign key in the HsExamName table
        // 'id' is the primary key in the HsExamName table
    }


}
