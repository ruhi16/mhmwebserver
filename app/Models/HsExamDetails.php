<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HsExamDetails extends Model{
    
    use HasFactory;

    protected $table = 'hs_exam_details';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function hsExamName(){
        return $this->belongsTo(HsExamName::class, 'hs_exam_name_id', 'id');
        // 'hs_exam_name_id' is the foreign key in the HsExamDetails table
        // 'id' is the primary key in the HsExamName table
    }
    public function hsExamMode(){
        return $this->belongsTo(HsExamMode::class, 'hs_exam_mode_id', 'id');
        // 'hs_exam_mode_id' is the foreign key in the HsExamDetails table
        // 'id' is the primary key in the HsExamMode table
    }
    public function hsSubjectType(){
        return $this->belongsTo(HsSubjectType::class, 'hs_subject_type_id', 'id');
        // 'hs_subject_type_id' is the foreign key in the HsExamDetails table
        // 'id' is the primary key in the HsSubjectType table
    }
    public function hsSubject(){
        return $this->belongsTo(HsSubject::class, 'hs_subject_id', 'id');
        // 'hs_subject_id' is the foreign key in the HsExamDetails table
        // 'id' is the primary key in the HsSubject table
    }

    

}