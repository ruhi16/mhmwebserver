<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function myclasssections(){
        return $this->hasMany(Myclasssection::class, 'section_id', 'id');
    }

    public function studentdbs(){
        return $this->hasMany(Studentdb::class, 'stsection_id', 'id');
    }

    public function studentcrs(){
        return $this->hasMany(Studentcr::class, 'section_id', 'id');
    }

    public function teachers(){
        return $this->hasMany(Myclassteacher::class, 'section_id', 'id');
        // 'section_id' is the foreign key in myclassteacher table
        // 'id' is the primary key in the teacher table
    }

    public function Answerscriptdistribution(){
        return $this->hasMany(Answerscriptdistribution::class, 'subject_id', 'id');
    }

    public function Studentvls(){
        return $this->hasMany(Studentvl::class, 'section_id', 'id');
    }


    public function myclassschedules(){
        return $this->hasMany(Myclassschedule::class, 'section_id', 'id');
        // 'section_id' is the foreign key in the Myclassschedule table
        // 'id' is the primary key in the Section table
    }

    public function myclasssectionteachers(){
        return $this->hasMany(Myclasssectionteacher::class, 'section_id', 'id');
        // 'section_id' is the foreign key in the Myclassschedule table
        // 'id' is the primary key in the Section table
    }




}
