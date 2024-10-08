<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exammode extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function examdetails(){
        return $this->hasMany(Examdetails::class, 'exammode_id', 'id');
        // 'exammode_id' is the foreign key in the Examdetails table
        // 'id' is the primary key in the Exammode table
    }

    public function Answerscriptdistribution(){
        return $this->hasMany(Answerscriptdistribution::class, 'subject_id', 'id');
        // 'subject_id' is the foreign key in the Answerscriptdistribution table
        // 'id' is the primary key in the Exammode table
    }
    

}
