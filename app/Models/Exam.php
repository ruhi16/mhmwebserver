<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $guarded = ['id'];



    public function examdetails(){
        return $this->hasMany(Examdetails::class, 'exam_id', 'id');

    }

    public function Answerscriptdistribution(){
        return $this->hasMany(Answerscriptdistribution::class, 'subject_id', 'id');
        
    }

    public function examtypes(){
        return $this->hasMany(Examtype::class, 'examtype_id', 'id');
    }
    
}
