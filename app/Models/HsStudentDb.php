<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HsStudentDb extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $table = 'hs_student_dbs';
}
