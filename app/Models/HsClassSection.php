<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HsClassSection extends Model
{
    use HasFactory;

    protected $table = 'hs_class_sections';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function hsClass(){
        return $this->belongsTo(HsClass::class, 'hs_class_id', 'id');
        // 'hs_class_id' is the foreign key in the HsClass table
        // 'id' is the primary key in the HsClass table
    }

    public function hsSection(){
        return $this->belongsTo(HsSection::class, 'hs_section_id', 'id');
        // 'hs_section_id' is the foreign key in the HsSection table
        // 'id' is the primary key in the HsSection table
    }



}
