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
        $myclassSections = Myclasssection::where('session_id', \App\Models\Session::currentlyActive()->id)->get();
        $myclassSubjects = Myclasssubject::where('session_id', \App\Models\Session::currentlyActive()->id)->get();
        $myclassTeachers = Myclassteacher::all();
        
        return view('components.subadmin-dashboard', [
            'exams' => $exams,
            'myclassSections' => $myclassSections,
            'myclassSubjects' => $myclassSubjects,
            'myclassTeachers' => $myclassTeachers
        ]);
    }
}
