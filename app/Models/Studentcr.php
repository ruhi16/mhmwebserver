<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentcr extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function studentdb()
    {
        return $this->belongsTo(Studentdb::class, 'studentdb_id', 'id');
    }

    public function myclass()
    {
        return $this->belongsTo(Myclass::class, 'myclass_id', 'id');
    }



    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }

    public function session(){
        return $this->belongsTo(Session::class, 'session_id', 'id');
    }

    public function school(){
        return $this->belongsTo(School::class, 'school_id', 'id');
    }
}
