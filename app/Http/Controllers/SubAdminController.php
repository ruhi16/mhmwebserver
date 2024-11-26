<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Myclasssection;
use App\Models\Myclasssubject;
use App\Models\Myclassteacher;
use Illuminate\Http\Request;

class SubAdminController extends Controller
{


    public function dashboard(){
        $exams = Exam::all();
        $myclassSections = Myclasssection::all();
        $myclassSubjects = Myclasssubject::all();
        $myclassTeachers = Myclassteacher::all();
        
        return view('components.subadmin-dashboard', [
            'exams' => $exams,
            'myclassSections' => $myclassSections,
            'myclassSubjects' => $myclassSubjects,
            'myclassTeachers' => $myclassTeachers
        ]);
    }
}
