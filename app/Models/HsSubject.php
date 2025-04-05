<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HsSubject extends Model
{
    use HasFactory;

    protected $table = 'hs_subjects';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function hsSession(){
        return $this->belongsTo(HsSession::class, 'hs_session_id', 'id');
        // 'hs_session_id' is the foreign key in the HsSession table
        // 'id' is the primary key in the HsSession table
    }

    public function hsSubjectType(){
        return $this->belongsTo(HsSubjectType::class, 'hs_subject_type_id', 'id');
        // 'hs_subject_type_id' is the foreign key in the HsSubjectType table
        // 'id' is the primary key in the HsSubjectType table
    }

    public function hsStudebtDBSubjects(){
        return $this->hasMany(HsStudentDbSubject::class, 'hs_subject_id', 'id');
        // 'hs_subject_id' is the foreign key in the HsStudebtdbSubject table
        // 'id' is the primary key in the HsStudebtdbSubject table
    }

    public function hsMarksentries(){
        return $this->hasMany(HsMarksentry::class, 'hs_subject_id', 'id');
        // 'hs_subject_id' is the foreign key in the HsMarksentry table
        // 'id' is the primary key in the HsMarksentry table
    }

}
