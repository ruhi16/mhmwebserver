<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Myclasssubject extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function myclass(){
        return $this->belongsTo(Myclass::class, 'myclass_id', 'id');
        // 'myclass_id' is the foreign key in the Myclasssubject table
        // 'id' is the primary key in the Myclass table
    }

    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
        // 'subject_id' is the foreign key in the Myclasssubject table
        // 'id' is the primary key in the Subject table
    }

    public function examtype(){
        return $this->belongsTo(Examtype::class, 'examtype_id', 'id');
        // 'examtype_id' is the foreign key in the Myclasssubject table
        // 'id' is the primary key in the Examtype table
    }

    public function marksentries(){
        return $this->hasMany(Marksentry::class, 'myclasssection_id', 'id');
        // 'myclasssection_id' is the foreign key in the Marksentry table
        // 'id' is the primary key in the Myclasssection table
    }
}
