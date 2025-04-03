<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HsSection extends Model
{
    use HasFactory;
    protected $table = 'hs_sections';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function hsClass(){
        return $this->belongsTo(HsClass::class, 'hs_class_id', 'id');
        // 'hs_class_id' is the foreign key in the HsClass table
        // 'id' is the primary key in the HsClass table
    }

    public function hsClassSections(){
        return $this->hasMany(HsClassSection::class, 'hs_section_id', 'id');
        // 'hs_section_id' is the foreign key in the HsClassSection table
        // 'id' is the primary key in the HsClassSection table
    }

    public function hsStudentdbs(){
        return $this->hasMany(HsStudentDb::class, 'st_hs_section_id', 'id');
        // 'hs_section_id' is the foreign key in the HsStudentDb table
        // 'id' is the primary key in the HsStudentDb table
    }

    public function hsStudentcrs(){
        return $this->hasMany(HsStudentcr::class, 'hs_section_id', 'id');
        // 'hs_section_id' is the foreign key in the HsStudentcr table
        // 'id' is the primary key in the HsStudentcr table
    }



}
