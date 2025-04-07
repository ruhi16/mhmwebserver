<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HsStudentCr extends Model
{
    use HasFactory;

    protected $table = 'hs_student_crs';

    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function hsStudentDb(){
        return $this->belongsTo(HsStudentDb::class, 'hs_studentdb_id', 'id');
        // 'hs_student_db_id' is the foreign key in the HsStudentDb table
        // 'id' is the primary key in the HsStudentDb table
    }

    public function hsClass(){
        return $this->belongsTo(HsClass::class, 'hs_class_id', 'id');
        // 'hs_class_id' is the foreign key in the HsClass table
        // 'id' is the primary key in the HsClass table
    }

    public function hsSection(){
        return $this->belongsTo(HsSection::class, 'hs_section_id', 'id');
        // 'hs_section_id' is the foreign key in the HsSection table
        // 'id' is the primary key in the HsSection table
    }
    
    public function hsSemester(){
        return $this->belongsTo(HsSemester::class, 'hs_semester_id', 'id');
        // 'hs_semester_id' is the foreign key in the HsSemester table
        // 'id' is the primary key in the HsSemester table
    }

    public function hsMarksentries(){
        return $this->hasMany(HsMarksentry::class, 'hs_student_cr_id', 'id');
        // 'hs_student_cr_id' is the foreign key in the HsMarksentry table
        // 'id' is the primary key in the HsMarksentry table
    }

}
