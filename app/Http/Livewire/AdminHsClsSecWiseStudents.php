<?php

namespace App\Http\Livewire;

use App\Models\HsSession;
use App\Models\HsStudentCr;
use App\Models\HsStudentDb;
use App\Models\Session;
use Exception;
use Livewire\Component;


use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use SimpleSoftwareIO\QrCode\Generator;



class AdminHsClsSecWiseStudents extends Component
{
    public $hsStudentcrs;
    public $hsStudentdbs;

    public $assignRollNo = [];
    public $message = null;

    public $qrcode;

    public $hsClassId = 1, $hsSectionId, $hsSemesterId;


    public $inputRollNo = [];
    protected $rules = [
        'inputRollNo.*' => 'required|integer|min:1', //|unique:records,roll_no',
    ];


    public function mount($hsClassId = null, $hsSectionId = null, $hsSemesterId = null){
        // dd($hsClassId, $hsSectionId, $hsSemesterId);
        $this->hsClassId = $hsClassId;
        $this->hsSectionId = $hsSectionId;
        $this->hsSemesterId = $hsSemesterId;


        $this->refreshData();
    }


    public function refreshData(){
        $this->hsStudentcrs = HsStudentCr::with('hsStudentDb', 'hsClass', 'hsSection', 'hsSemester')
            ->where('hs_session_id', HsSession::currentlyActive()->id)
            ->where('hs_class_id', $this->hsClassId)
            // ->where('id', '<=', 10)
            ->get();

        $this->hsStudentdbs = HsStudentDb::where('hs_session_id', HsSession::currentlyActive()->id)
            // ->where('id', '<=', 250)
            ->get();       
    }


    public function updatedInputRollNo($value, $key)
    {
        // $key is the index of the student, $value is the new roll number
        $this->validateOnly($key);

        try{
            HsStudentCr::findOrFail($key)->update(['roll_no'=> $value]);

            session()->flash('success', "Roll No. " . $key . " updated successfully.");
        }catch(Exception $e){
            session()->flash('error', $e->getMessage());
        }
    }

    public function promotedToNextClass( $scr_id ){
        // dd($value, $key);
        // dd($scr_id);
        
        try{
            $hsStudentcr = HsStudentCr::findOrFail($scr_id);
            $hsStudentcr->update([
                'next_class_id' => \App\Models\HsClass::findOrFail($hsStudentcr->hs_class_id)->next_hs_class_id,
                'next_section_id' => \App\Models\HsSection::findOrFail($hsStudentcr->hs_section_id)->id,
                'next_semester_id' => \App\Models\HsSemester::findOrFail($hsStudentcr->hs_semester_id)->next_hs_semester_id,
                'next_hs_session_id' => HsSession::currentlyActive()->next_hs_session_id,
                'next_studentcr_id' => null,
                'school_id' => 1,
                'crstatus' => 'ACTIVE'
            ]);


            session()->flash('success', HsStudentCr::findOrFail($scr_id)->hsStudentDb->name . ' Promoted to next class successfully.');
        }catch(Exception $e){
            
            session()->flash('error', $e->getMessage());
        }

        
        $this->refreshData();

    }


    public function assignRollNo($hsStudentdb_id){
        // $this->message =  "Roll No. " . $hsStudentdb_id . " assigned successfully.";
        $hsStudentdb = HsStudentDb::find($hsStudentdb_id);
        $hsStudentcrMaxRollNo = HsStudentCr::where('hs_session_id', HsSession::currentlyActive()->id)
            ->max('roll_no');
        // dd($hsStudentcr);
            
        try{
            $hsStudentdb->hsStudentcrs()->updateOrCreate([
                'hs_session_id' => HsSession::currentlyActive()->id,
                'hs_studentdb_id' => $hsStudentdb_id,
            ], [
                'hs_studentdb_id' => $hsStudentdb_id,
                'hs_session_id' => HsSession::currentlyActive()->id,
                'hs_class_id' => $hsStudentdb->st_hs_class_id,
                'hs_section_id' => $hsStudentdb->st_hs_section_id,
                'hs_semester_id' => $hsStudentdb->st_hs_semester_id,
                'crstatus'  => 'ACTIVE',
                'roll_no' => $hsStudentcrMaxRollNo != null ? $hsStudentcrMaxRollNo + 1 : 1,
                'school_id' => $hsStudentdb->school_id
            ]);

            session()->flash('success', "Roll No. " . $hsStudentdb_id . " assigned successfully, to Student Name: " . $hsStudentdb->name);
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        $this->refreshData();
    }

    public function generateQRCode($hsStudentcr_id){
        $hsStudentcr = HsStudentCr::find($hsStudentcr_id);

        $url = 'https://manikchakhighmadrasah.org/';

        $qrcode_url = $url.'hs-sections'.'/'. $hsStudentcr->hsStudentDb->uuid_auto.'/'.$hsStudentcr->id;

        $qrcode_img_ref = '/'. HsSession::currentlyActive()->name .'-'. 
                $hsStudentcr->hsClass->name .'-'. 
                $hsStudentcr->hsSection->name .'-'.
                $hsStudentcr->hsSemester->name .'-'. 
                $hsStudentcr->roll_no .'-'.
                $hsStudentcr->hsStudentDb->name .'.svg' ;

        try{

            $this->qrcode = QrCode::format('svg')
                // ->merge($url.'/img/logo.jpg')
                // ->merge('../public/img/logo2.svg')
                ->generate($qrcode_url, '../public/img' . $qrcode_img_ref);

            $this->refreshData();
        
            $hsStudentcr->qr_img_ref = $qrcode_img_ref;
            $hsStudentcr->save();

            session()->flash('success', "QR Code generated successfully, to Student Name: " . $hsStudentcr->hsStudentDb->name);
            
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function generateIdCard($hsStudentcr_id){
        $hsStudentcr = HsStudentCr::find($hsStudentcr_id);
        $this->refreshData();
    }





    public function updatedAssignRollNo($value, $key){

       $this->message =  "Roll No. " . $key . " assigned successfully.";


    }

    public function render()
    {        
        return view('livewire.admin-hs-cls-sec-wise-students');
    }
}
 