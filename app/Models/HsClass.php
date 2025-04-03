<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HsClass extends Model
{
    use HasFactory;

    protected $table = 'hs_classes';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function hsSections(){
        return $this->hasMany(HsSection::class, 'hs_class_id', 'id');
        // 'hs_class_id' is the foreign key in the HsSection table
        // 'id' is the primary key in the HsSection table
    }

    public function hsSemesters(){
        return $this->hasMany(HsSemester::class, 'hs_class_id', 'id');
        // 'hs_class_id' is the foreign key in the HsSemester table
        // 'id' is the primary key in the HsSemester table
    }

    public function hsClassSections(){
        return $this->hasMany(HsClassSection::class, 'hs_class_id', 'id');
        // 'hs_class_id' is the foreign key in the HsClassSection table
        // 'id' is the primary key in the HsClassSection table
    }

    public function hsClassSemesters(){
        return $this->hasMany(HsClassSemester::class, 'hs_class_id', 'id');
        // 'hs_class_id' is the foreign key in the HsClassSemester table
        // 'id' is the primary key in the HsClassSemester table
    }

    public function hsStudentdbs(){
        return $this->hasMany(HsStudentDb::class, 'st_hs_class_id', 'id');
        // 'hs_class_id' is the foreign key in the HsStudentDb table
        // 'id' is the primary key in the HsStudentDb table
    }


    public function hsStudentcrs(){
        return $this->hasMany(HsStudentcr::class, 'hs_class_id', 'id');
        // 'hs_class_id' is the foreign key in the HsStudentcr table
        // 'id' is the primary key in the HsStudentcr table
    }


    public function hsExamNames(){
        return $this->hasMany(HsExamName::class, 'hs_class_id', 'id');
        // 'hs_class_id' is the foreign key in the HsExamName table
        // 'id' is the primary key in the HsExamName table
    }


}
