<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examtype extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function examdetails(){
        return $this->hasMany(Examdetails::class, 'examtype_id', 'id');
        // 'examtype_id' is the foreign key in the Examdetails table
        // 'id' is the primary key in the Examtype table
    }

    public function myclasses(){
        return $this->belongsToMany(Myclass::class, 'myclass_id', 'id');
        // 'myclass_id' is the foreign key in the Myclasssubject table
        // 'id' is the primary key in the Myclass table
    }
    
    public function subjects(){
        return $this->hasMany(Subject::class, 'subject_id', 'id');
        // 'subject_id' is the foreign key in the Myclasssubject table
        // 'id' is the primary key in the Subject table
    }

    public function exam(){
        return $this->belongsTo(Exam::class, 'exam_id', 'id');
        // 'exam_id' is the foreign key in the Examdetails table
        // 'id' is the primary key in the Exam table
    }

    public function Answerscriptdistribution(){
        return $this->hasMany(Answerscriptdistribution::class, 'examtype_id', 'id');
        // 'examtype_id' is the foreign key in the Answerscriptdistribution table
        // 'id' is the primary key in the Examtype table
    }
}
