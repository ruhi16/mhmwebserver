<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marksentry extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    

    public function studentcr(){
        return $this->belongsTo(Studentcr::class, 'studentcr_id', 'id');
        // 'studentcr_id' is the foreign key in marksentry table
        // 'id' is the primary key in studentcr table
    }

    public function examdetail(){
        return $this->belongsTo(Examdetails::class, 'examdetail_id', 'id');
        // 'examdetail_id' is the foreign key in marksentry table
        // 'id' is the primary key in examdetails table
    }

    public function myclasssubject(){
        return $this->belongsTo(Myclasssubject::class, 'myclasssubject_id', 'id');
        // 'myclasssubject_id' is the foreign key in marksentry table
        // 'id' is the primary key in myclasssubject table
    }

    public function myclasssection(){
        return $this->belongsTo(Myclasssection::class, 'myclasssection_id', 'id');
        // 'myclasssection_id' is the foreign key in marksentry table
        // 'id' is the primary key in myclasssection table
    }

    public function school(){
        return $this->belongsTo(School::class, 'school_id', 'id');
        // 'school_id' is the foreign key in marksentry table
        // 'id' is the primary key in school table
    }

    public function session(){
        return $this->belongsTo(Session::class, 'session_id', 'id');
        // 'session_id' is the foreign key in marksentry table
        // 'id' is the primary key in session table
    }


}
