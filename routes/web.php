<?php

use App\Http\Controllers\ExamController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\StudentdbController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\TeacherController;
use App\Http\Livewire\Contact;
use App\Http\Livewire\Home;
use App\Http\Livewire\About;
use App\Http\Livewire\AdminAdmissionComponent;
use App\Http\Livewire\AdminAnsscrDistributionComponent;
use App\Http\Livewire\AdminAnsscrDistributioncwComponent;
use App\Http\Livewire\AdminCreateUserComponent;
use App\Http\Livewire\AdminMarkRegisterComponent;
use App\Http\Livewire\AdminMyclassAnserScriptDistributionBaseComponent;
use App\Http\Livewire\AdminMyclassSectionComponent;
use App\Http\Livewire\AdminMyclassSectionIndividualMarksheetComponent;
use App\Http\Livewire\AdminTeacherWiseMarksEntryLinksComponent;
use App\Http\Livewire\AdminUserPreviledgeControlComponent;
use App\Http\Livewire\SubadminMarksEntryComponent;
use App\Http\Livewire\SubadminMarksEntryEntityComponent;
use App\Http\Livewire\SubadminFormativeMarksEntryEntityComponent;
use App\Http\Livewire\UserChangePasswordComponent;
use App\Models\Notice;
use App\Models\Studentvl;
use GuzzleHttp\Psr7\Request;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;


Route::controller(App\Http\Controllers\NoticeController::class)->group(
    function () {
        Route::get('notices', 'index'); // all notices, in a tabluler form, add new notice, open create
        Route::get('notices/{id}', 'display'); //

    }
);

// Route::get('/dashboard', [App\Http\Controllers\SuperAdminController::class, 'dashboard']);

Route::group(
    ['prefix' => 'sup-admin', 'middleware' => ['web', 'auth', 'isSuperAdmin']],
    function () {
        Route::get('/dashboard', [
            App\Http\Controllers\SuperAdminController::class,
            'dashboard',
        ])->name('supAdminDash');

      
    }
);
Route::get('pdf', function() {
    // $data = [
    //     'foo' => 'bar'
    // ];

    // $pdf = PDF::loadView('livewire.dompdf-testpage', [
    //     'data' => $data
    // ]);
    $page = request()->query('page');
    $voters_all = Studentvl::whereColumn('brother_id','!=', 'id')             
            ->with('myclass')
            ->with('section')           
            // ->orderBy('id', 'asc')  
            ->orderBy('village', 'asc')
            ->orderBy('myclass_id', 'asc')
            ->orderBy('section_id', 'asc')
            ->orderBy('roll_no', 'asc')
            ->get();

    // return $pdf->stream('document.pdf');
    $mpdf = new \Mpdf\Mpdf([
        'default_font_size' => 8,
        'default_font' => 'nikosh',
    ]);
    $voters = Studentvl::whereColumn('brother_id','=', 'id')
            ->with('myclass')
            ->with('section')                       
            // ->orderBy('id', 'asc')  
            ->orderBy('village', 'asc')
            ->orderBy('myclass_id', 'asc')
            ->orderBy('section_id', 'asc')
            ->orderBy('roll_no', 'asc')
            ->paginate(600);

    $html = view('livewire.dompdf-testpage',[
        'voters'    => $voters,
        'voters_all' => $voters_all,
        'page' => $page
    ])->render();
    $mpdf->WriteHTML($html);

    // $mpdf->WriteHTML('<h1>আমি আছি Hello World</h1>');
    $mpdf->Output();
});



Route::group(
    ['prefix' => 'admin', 'middleware' => ['web', 'isAdmin']],
    function () {
        Route::get('/dashboard', [ App\Http\Controllers\AdminController::class, 'dashboard'])
            ->name('adminDash');

        // Route::get('/admission/{myclassSection_id}', [App\Http\Controllers\AdminController::class, 'admission'])->name('admission');
        // Route::get('/dashboard', AdminDashboard::class)
        //     ->name('adminDash');

        Route::controller(App\Http\Controllers\NoticeController::class)->group(
            function () {
                Route::get('notices', 'index'); // all notices, in a tabluler form, add new notice, open create
                Route::get('notices/{id}', 'display'); //
                Route::get('notices/create', 'create'); // create a new notice, display form for data entry
                Route::post('notices/create', 'store'); // submit clicked from create, to save the notice, goto indexes
                Route::get('notices/{id}/edit', 'edit'); // edit any existing notice, display existing notice, goto update
                Route::put('notices/{id}/edit', 'update'); // save the edited notice, goto indexes
                Route::get('notices/{id}/delete', 'destroy'); // delete any existing notice, goto inexes
            }
        );

        // --------------------- Admin Dashboard Management ---------------------------------------------
        Route::get('/userpreviledgemanagement', AdminUserPreviledgeControlComponent::class)
            ->name('admin.profilemanagement');

        Route::get('/myclasssectionmanagement', AdminMyclassSectionComponent::class)
            ->name('admin.myclasssectionmanagement');
        
        Route::get('/myclasssectionwiseanswerscriptmanagement', AdminMyclassAnserScriptDistributionBaseComponent::class)
            ->name('admin.myclasssectionwiseanswerscriptmanagement');

        Route::get('teacherwisemarksentrylink', AdminTeacherWiseMarksEntryLinksComponent::class)
            ->name('admin.teacherwisemarksentrylink');

        // --------------------- Admin Dashboard Management -------------------------------------------
        

        Route::get('/admission/{myclassSection_id}', AdminAdmissionComponent::class)
            ->name('admin.admission');
        
        Route::get('/ansscrdistribution/{myclassSection_id}', AdminAnsscrDistributionComponent::class)
            ->name('admin.ansscrdistribution');
        
        Route::get('/ansscrdistributionclasswise/{myclass_id}/{exam_id}', AdminAnsscrDistributioncwComponent::class)
            ->name('admin.ansscrdistributioncw');

        
        Route::get('/marksentryclasswise/{myclassSection_id}', SubadminMarksEntryComponent::class)
            ->name('admin.marksentry');

        Route::get('/marksentryentityclasswise/{myclassSection_id}/{myclassSubject_id}/{examdetail_id}', SubadminMarksEntryEntityComponent::class)
            ->name('admin.marksentryentity');

        Route::get('/formativemarksentryentityclasswise/{myclassSection_id}/{examterm_id}/{examtype_id}', SubadminFormativeMarksEntryEntityComponent::class)
            ->name('admin.formativemarksentryentity');

        Route::get('/markregisterclasswise/{myclassSection_id}', AdminMarkRegisterComponent::class)
            ->name('admin.markregister');
        
        Route::get('/markregisterclasswisepdf/{myclassSection_id}', AdminMarkRegisterComponent::class.'@exportMarkregisterPdf')
            ->name('admin.markregisterpdf');


        
            
        Route::get('/home', Home::class)->name('home');
        Route::get('/contact', Contact::class)->name('contact');
        Route::get('/about', About::class)->name('about');

        Route::get('/changePassword', UserChangePasswordComponent::class)
            ->name('subadmin.changePassword');

        Route::get('/createUser', AdminCreateUserComponent::class)
            ->name('admin.createUser');

        Route::get('/individualMarksheet/{myclassSection_id}/{studentcr_id}', AdminMyclassSectionIndividualMarksheetComponent::class)
            ->name('admin.createIndividualMarksheet');

        // Route::get('/individualMarksheetpdf/{myclassSection_id}/{studentcr_id}', AdminMyclassSectionIndividualMarksheetPdfComponent::class)
        //     ->name('admin.createIndividualMarksheetPDF');

        Route::get('/generate-upr-marksheetpdf/{myclassSection_id}/{studentcr_id}', AdminMyclassSectionIndividualMarksheetComponent::class . '@exportUprMarksheetPdf')
            ->name('livewire.generate-upr-marksheetpdf');
        
        Route::get('/generate-sec-marksheetpdf/{myclassSection_id}/{studentcr_id}', AdminMyclassSectionIndividualMarksheetComponent::class . '@exportSecMarksheetPdf')
            ->name('livewire.generate-sec-marksheetpdf');
    }
);

Route::group(
    ['prefix' => 'sub-admin', 'middleware' => ['web', 'isSubAdmin']],
    function () {
        Route::get('/dashboard', [App\Http\Controllers\SubAdminController::class, 'dashboard'])
            ->name('subAdminDash');
        
        Route::get('/admission/{myclassSection_id}', SubadminMarksEntryComponent::class)
            ->name('subadmin.marksEntry');

        Route::get('/marksentryentityclasswise/{myclassSection_id}/{myclassSubject_id}/{examdetail_id}', SubadminMarksEntryEntityComponent::class)
            ->name('subadmin.marksentryentity');
    
        Route::get('/changePassword', UserChangePasswordComponent::class)
            ->name('subadmin.changePassword');
        
        Route::get('/formativemarksentryentityclasswise/{myclassSection_id}/{examterm_id}/{examtype_id}', SubadminFormativeMarksEntryEntityComponent::class)
            ->name('subadmin.formativemarksentryentity');
    
    }
);

Route::group(
    ['prefix' => 'user', 'middleware' => ['web', 'isUser']],
    function () {
        Route::get('/dashboard', [
            App\Http\Controllers\UserController::class,
            'dashboard',
        ])->name('userDash');

        
    }
);

Route::get('/generate-upr-marksheetpdf/{myclassSection_id}/{studentcr_id}', AdminMyclassSectionIndividualMarksheetComponent::class . '@exportUprMarksheetPdf')
        ->name('user.livewire.generate-upr-marksheetpdf');

Route::get('/generate-upr-marksheetpdf/{myclassSection_id}/{studentcr_id}', AdminMyclassSectionIndividualMarksheetComponent::class . '@exportUprMarksheetPdf')
        ->name('user.livewire.generate-sec-marksheetpdf');

// Route::resource('/teachers', [TeacherController::class, 'index']);
Route::resource('/teachers', TeacherController::class);
Route::resource('/exam', ExamController::class);
Route::resource('/students', StudentdbController::class);


Route::get('/dashboard', function () {
    // echo 'Hello from dashboard';
    // echo auth()->user()->name;
    // echo 'Auth:' . Auth::user();

    if (Auth::user() && Auth::user()->role_id == 4) {
        // Super Admin or owner
        return redirect(route('supAdminDash'));
    }

    if (Auth::user() && Auth::user()->role_id == 3) {
        // Admin or Headmaster
        return redirect(route('adminDash'));
    }

    if (Auth::user() && Auth::user()->role_id == 2) {
        // Sub Admin or Teacher
        return redirect(route('subAdminDash'));
    }

    if (Auth::user() && Auth::user()->role_id == 1) {
        // User or Students
        return redirect(route('userDash'));
    }

    if (Auth::user()) {
        // Any other authenticated users
        return redirect(route('userDash'));
    }

    // return view('dashboard');
})->middleware(['auth'])
//   ->middleware(['auth', 'verified'])
    ->name('dashboard');

    

Route::get('/', function () {
    $notices = Notice::orderBy('dop', 'desc')->get();
    return view('welcome',[
        'notices' => $notices
    ]);
});



Route::get('auth/google', [GoogleAuthController::class, 'redirect'])
    ->name('auth.google.login');

Route::get('auth/google/callback', [GoogleAuthController::class, 'callbackGoogle'])
    ->name('auth.google.callback');



require __DIR__ . '/auth.php';


// Route::any('{any}', [UserController::class,'index'])->where('any', '^(?!api).*$');