<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    // public function periods(){
    //     return $this->hasMany(Period::class, 'day_id', 'id');

    // }


    public function myclassdayperiods(){
        return $this->hasMany(Myclassdayperiod::class, 'day_id', 'id');
    }


    public function myclassschedules(){
        return $this->hasMany(Myclassschedule::class, 'day_id', 'id');
        // 'day_id' is the foreign key in the Myclassschedule table
        // 'id' is the primary key in the Day table
    }   

    public function myclasssectionteachers(){
        return $this->hasMany(Myclasssectionteacher::class, 'day_id', 'id');
        // 'section_id' is the foreign key in the Myclassschedule table
        // 'id' is the primary key in the Section table
    }


}
