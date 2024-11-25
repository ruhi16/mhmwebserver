<?php

namespace App\Models;

use App\Models\Myclass;
use App\Models\Section;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Myclasssection extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function myclass(){
        return $this->belongsTo(Myclass::class, 'myclass_id', 'id');
        // 'myclass_id' is the foreign key in the Myclasssection table
        // 'id' is the primary key in the Myclass table
    }

    public function section(){
        return $this->belongsTo(Section::class, 'section_id', 'id');
        // 'section_id' is the foreign key in the Myclasssection table
        // 'id' is the primary key in the Section table
    }

    public function marksentries(){
        return $this->hasMany(Marksentry::class, 'myclasssection_id', 'id');
        // 'myclasssection_id' is the foreign key in the Marksentry table
        // 'id' is the primary key in the Myclasssection table
    }

    public function myclassschedules(){
        return $this->hasMany(Myclassschedule::class, 'myclasssection_id', 'id');
        // 'myclasssection_id' is the foreign key in the Myclassschedule table
        // 'id' is the primary key in the Myclasssection table
    }



    
}
