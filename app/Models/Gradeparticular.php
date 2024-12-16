<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gradeparticular extends Model
{
    use HasFactory;
    protected $table = 'gradeparticulars';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function grades(){   
        return $this->hasMany(Grade::class, 'gradeparticular_id', 'id');
        // 'gradeparticular_id' is the foreign key in the grade table
        // 'id' is the primary key in the gradeparticular table
    }



}
