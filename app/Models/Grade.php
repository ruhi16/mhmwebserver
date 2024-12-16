<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function gradeparticular(){
        return $this->belongsTo(Gradeparticular::class, 'gradeparticular_id', 'id');

    }


    public function examtype(){
        return $this->belongsTo(Examtype::class, 'examtype_id', 'id');
        // 'examtype_id' is the foreign key in grade table 
        // 'id'
    }
}
