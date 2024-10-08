<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answerscriptdistribution extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function exam(){
        return $this->belongsTo(Exam::class, 'exam_id', 'id');
    }   

    public function examtype(){
        return $this->belongsTo(Examtype::class, 'examtype_id', 'id');
    }

    public function exammode(){
        return $this->belongsTo(Exammode::class, 'exammode_id', 'id');
    }

    public function myclass(){
        return $this->belongsTo(Myclass::class, 'myclass_id', 'id');
    }

    public function section(){
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }


    public function school(){
        return $this->belongsTo(School::class, 'school_id', 'id');
    }
    

    public function session(){
        return $this->belongsTo(Session::class, 'session_id', 'id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }



}
