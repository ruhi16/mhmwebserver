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


}
