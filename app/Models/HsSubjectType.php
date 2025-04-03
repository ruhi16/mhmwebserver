<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HsSubjectType extends Model
{
    use HasFactory;

    protected $table = 'hs_subject_types';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function hsSubjects(){
        return $this->hasMany(HsSubject::class, 'hs_subject_type_id', 'id');
        // 'hs_subject_type_id' is the foreign key in the HsSubject table
        // 'id' is the primary key in the HsSubject table
    }


}
