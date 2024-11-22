<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Myclassdayperiod extends Model
{
    use HasFactory;

    protected $guarded = ['id'];



    public function day(){
        return $this->belongsTo(Day::class, 'day_id', 'id');

    }

    public function period(){
        return $this->belongsTo(Period::class, 'period_id', 'id');

    }

    public function myclass(){
        return $this->belongsTo(Myclass::class, 'myclass_id', 'id');

    }


    
}
