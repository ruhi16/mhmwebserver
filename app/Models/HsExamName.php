<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HsExamName extends Model
{
    use HasFactory;

    protected $table = 'hs_exam_names';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function hsClass(){
        return $this->belongsTo(HsClass::class, 'hs_class_id', 'id');
        // 'hs_exam_name_id' is the foreign key in the HsClass table
        // 'id' is the primary key in the HsClass table
    }

    public function hsSemester(){
        return $this->belongsTo(HsSemester::class, 'hs_semester_id', 'id');
        // 'hs_semester_id' is the foreign key in the HsSemester table
        // 'id' is the primary key in the HsSemester table
    }

    public function hsExamDetails(){
        return $this->hasMany(HsExamDetails::class, 'hs_exam_name_id', 'id');
        // 'hs_exam_name_id' is the foreign key in the HsExamDetails table
        // 'id' is the primary key in the HsExamDetails table
    }

}
