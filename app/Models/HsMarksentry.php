<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\HsExamDetails;


class HsMarksentry extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function hsExamDetail(){
        return $this->belongsTo(HsExamDetails::class, 'hs_exam_detail_id', 'id');
    }

    public function hsSubject(){
        return $this->belongsTo(HsSubject::class, 'hs_subject_id', 'id');
        // 'hs_subject_id' is the foreign key in the HsMarksentry table
        // 'id' is the primary key in the HsSubject table
    }


    public function hsStudentCr(){
        return $this->belongsTo(HsStudentCr::class, 'hs_student_cr_id', 'id');
        // 'hs_student_cr_id' is the foreign key in the HsMarksentry table
        // 'id' is the primary key in the HsStudentCr table
    }


}
