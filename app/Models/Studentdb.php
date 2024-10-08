<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentdb extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function myclass(){
        return $this->belongsTo(Myclass::class, 'stclass_id', 'id');
    }

    public function section(){
        return $this->belongsTo(Section::class, 'stsection_id', 'id');
    }

    public function session(){
        return $this->belongsTo(Session::class, 'session_id', 'id');
    }

    public function school(){
        return $this->belongsTo(School::class, 'school_id', 'id');
    }

    // -----------------------------------------------------------------------

    public function studentcrs(){
        return $this->hasMany(Studentcr::class, 'studentdb_id', 'id');
    }



    // -----------------------------------------------------------------------
    public function enclass(){
        return $this->belongsTo(Myclass::class, 'enclass_id', 'id');
    }

    public function ensection(){
        return $this->belongsTo(Section::class, 'enstsection_id', 'id');
    }


    public function ensession(){
        return $this->belongsTo(Session::class, 'ensession_id', 'id');
    }


    // -----------------------------------------------------------------------
    public function user(){
        return $this->hasOne(User::class, 'studentdb_id', 'id');
    }



}
