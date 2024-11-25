<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Myclassschedule extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function myclass(){
        return $this->belongsTo(Myclass::class, 'myclass_id', 'id');
        // 'myclass_id' is the foreign key in the Myclassschedule table
        // 'id' is the primary key in the Myclass table
    }

    public function section(){
        return $this->belongsTo(Section::class, 'section_id', 'id');
        // 'section_id' is the foreign key in the Myclassschedule table
        // 'id' is the primary key in the Section table
    }

    public function day(){
        return $this->belongsTo(Day::class, 'day_id', 'id');
        // 'day_id' is the foreign key in the Myclassschedule table
        // 'id' is the primary key in the Day table
    }

    public function period(){
        return $this->belongsTo(Period::class, 'period_id', 'id');
        // 'period_id' is the foreign key in the Myclassschedule table
        // 'id' is the primary key in the Period table
    }

    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
        // 'subject_id' is the foreign key in the Myclassschedule table
        // 'id' is the primary key in the Myclasssubject table
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
        // 'teacher_id' is the foreign key in the Myclassschedule table
        // 'id' is the primary key in the Teacher table
    }

    public function sesstion(){
        return $this->belongsTo(Session::class, 'sesstion_id', 'id');
        // 'sesstion_id' is the foreign key in the Myclassschedule table
        // 'id' is the primary key in the Sesstion table
    }

    public function school(){
        return $this->belongsTo(School::class, 'school_id', 'id');
        // 'school_id' is the foreign key in the Myclassschedule table
        // 'id' is the primary key in the School table
    }




}
