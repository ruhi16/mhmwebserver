<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HsExamMode extends Model
{
    use HasFactory;

    protected $table = 'hs_exam_modes';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function hsExamDetails(){
        return $this->hasMany(HsExamDetails::class, 'hs_exam_mode_id', 'id');
        // 'hs_exam_mode_id' is the foreign key in the HsExamDetails table
        // 'id' is the primary key in the HsExamMode table
    }
}
