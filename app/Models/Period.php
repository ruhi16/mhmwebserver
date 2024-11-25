<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    // public function day(){
    //     return $this->belongsTo(Day::class, 'day_id', 'id');


    // }

    public function myclassdayperiods(){
        return $this->hasMany(Myclassdayperiod::class, 'period_id', 'id');

        
    }


    public function myclassschedules(){
        return $this->hasMany(Myclassschedule::class, 'period_id', 'id');
        // 'period_id' is the foreign key in the Myclassschedule table
        // 'id' is the primary key in the Period table
    }   

}
