<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HsStudentDbSubject extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'hs_student_db_subjects';


    public function hsStudentDB(){
        return $this->belongsTo(HsStudentDb::class, 'hs_studentdb_id', 'id');
        // 'hs_student_db_id' is the foreign key in the HsStudentDb table
        // 'id' is the primary key in the HsStudentDb table
    }

    public function hsSubject(){
        return $this->belongsTo(HsSubject::class, 'hs_subject_id', 'id');
        // 'hs_subject_id' is the foreign key in the HsSubject table
        // 'id' is the primary key in the HsSubject table
    }


}
