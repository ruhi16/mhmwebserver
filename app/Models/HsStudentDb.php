<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HsStudentDb extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $table = 'hs_student_dbs';

    public function hsSubjects(){
        return $this->hasMany(HsStudentDbSubject::class, 'hs_studentdb_id', 'id');
    }

    public function hsSubjectSduties(){
        return HsStudentDb::whereHas('hsSubjects', function($query) {
            $query->where('id', 12);
        })->get(); 
    }

    public function hsStudentcrs(){
        return $this->hasMany(HsStudentcr::class, 'hs_studentdb_id', 'id');
        // 'hs_student_db_id' is the foreign key in the HsStudentcr table
        // 'id' is the primary key in the HsStudentcr table
    }

    public function hsClass(){
        return $this->belongsTo(HsClass::class, 'st_hs_class_id', 'id');
        // 'hs_class_id' is the foreign key in the HsClass table
        // 'id' is the primary key in the HsClass table
    }

    public function hsSection(){
        return $this->belongsTo(HsSection::class, 'st_hs_section_id', 'id');
        // 'hs_section_id' is the foreign key in the HsSection table
        // 'id' is the primary key in the HsSection table
    }

    public function hsSemester(){
        return $this->belongsTo(HsSemester::class, 'st_hs_semester_id', 'id');
        // 'hs_semester_id' is the foreign key in the HsSemester table
        // 'id' is the primary key in the HsSemester table
    }

    
}
