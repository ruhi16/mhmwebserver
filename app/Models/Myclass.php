<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Myclass extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function studentdbs(){
        return $this->hasMany(Studentdb::class, 'stclass_id', 'id');
        // 'stclass_id' is the foreign key in the Studentdb table
        // 'id' is the primary key in the Myclass table
    }

    public function studentcrs(){
        return $this->hasMany(Studentcr::class, 'myclass_id', 'id');
        // 'myclass_id' is the foreign key in the Studentcr table
        // 'id' is the primary key in the Myclass table
    }

    public function examdetails(){
        return $this->hasMany(Examdetails::class, 'myclass_id', 'id');
        // 'myclass_id' is the foreign key in the Examdetails table
        // 'id' is the primary key in the Myclass table
    }

    public function myclasssections(){
        return $this->hasMany(Myclasssection::class, 'myclass_id', 'id');
        // 'myclass_id' is the foreign key in the Myclasssection table
        // 'id' is the primary key in the Myclass table
    }

    public function myclasssubjects(){
        return $this->hasMany(Myclasssubject::class, 'myclass_id', 'id');
        // 'myclass_id' is the foreign key in the Myclasssubject table      
        // 'id' is the primary key in the Myclass table
    }


    public function myclassteachers(){
        return $this->hasMany(Myclassteacher::class, 'myclass_id', 'id');
        // 'myclass_id' is the foreign key in the Myclassteacher table
        // 'id' is the primary key in the Myclass table
    }

    public function Answerscriptdistribution(){
        return $this->hasMany(Answerscriptdistribution::class, 'myclass_id', 'id');
        // 'subject_id' is the foreign key in the Answerscriptdistribution table
        // 'id' is the primary key in the Myclass table
    }


    public function Studentvls(){
        return $this->hasMany(Studentvl::class, 'myclass_id', 'id');
        // 'myclass_id' is the foreign key in the Studentvl table
        // 'id' is the primary key in the Myclass table
    }

    public function myclassdayperiods(){
        return $this->hasMany(Myclassdayperiod::class, 'myclass_id', 'id');

        
    }

    public function myclassschedules(){
        return $this->hasMany(Myclassschedule::class, 'myclass_id', 'id');
        // 'section_id' is the foreign key in the Myclassschedule table
        // 'id' is the primary key in the Section table
    }

    public function myclasssectionteachers(){
        return $this->hasMany(Myclasssectionteacher::class, 'myclass_id', 'id');
        // 'section_id' is the foreign key in the Myclassschedule table
        // 'id' is the primary key in the Section table
    }
        
    
}
