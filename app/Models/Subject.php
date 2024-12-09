<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function examdetails(){
        return $this->hasMany(Examdetails::class);
    }

    public function myclasssubjects(){
        return $this->hasMany(Myclasssubject::class, 'subject_id', 'id');
        // 'subject_id' is the foreign key in the Myclasssubject table
        // 'id' is the primary key in the Subject table
    }

    public function examtype(){
        return $this->belongsTo(Examtype::class, 'examtype_id', 'id');
        // 'examdtype_id' is the foreign key in the Examtype table
        // 'id' is the primary key in the Subject table
    }


    public function Answerscriptdistribution(){
        return $this->hasMany(Answerscriptdistribution::class, 'subject_id', 'id');
    }


    public function teachers(){
        return $this->hasMany(Teacher::class, 'subject_id', 'id');
        // 'subject_id' is the foreign key in the Teacher table
        // 'id' is the primary key in the Subject table
    }

    public function myclassschedule(){
        return $this->hasMany(Myclasssubject::class, 'subject_id', 'id');
        // 'subject_id' is the foreign key in the Myclasssubject table
        // 'id' is the primary key in the Subject table
    }

    public function myclasssectionteachers(){
        return $this->hasMany(Myclasssectionteacher::class, 'subject_id', 'id');
        // 'section_id' is the foreign key in the Myclassschedule table
        // 'id' is the primary key in the Section table
    }

    

    
}
