<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examdetails extends Model
{
    use HasFactory;

    protected $guarded = ['id'];



    
    public function exam(){
        return $this->belongsTo(Exam::class);
    }

    public function examtype(){
        return $this->belongsTo(Examtype::class);
    }

    public function exammode(){
        return $this->belongsTo(Exammode::class);
    }

    public function myclass(){
        return $this->belongsTo(Myclass::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }
    
    public function marksentries(){
        return $this->hasMany(Marksentry::class, 'myclasssection_id', 'id');
        // 'myclasssection_id' is the foreign key in the Marksentry table
        // 'id' is the primary key in the Myclasssection table
    }






}