<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HsSession extends Model
{
    use HasFactory;

    protected $table = 'hs_sessions';
    protected $guarded = ['id', 'created_at', 'updated_at'];

   // local scope
    public function scopeCurrentlyActive($query){
        return $query->where('status', 'ACTIVE')->first();
    }



    public function hsSubjects(){
        return $this->hasMany(HsSubject::class, 'hs_session_id', 'id');
        // 'hs_session_id' is the foreign key in the HsSubject table
        // 'id' is the primary key in the HsSubject table
    }

    public function hsSubjectTypes(){
        return $this->hasMany(HsSubjectType::class, 'hs_session_id', 'id');
        // 'hs_session_id' is the foreign key in the HsSubjectType table
        // 'id' is the primary key in the HsSubjectType table
    }

    

    





}
