<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentvl extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function myclass(){
        return $this->belongsTo(Myclass::class, 'myclass_id', 'id');
    }

    public function section(){
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }

    


}
