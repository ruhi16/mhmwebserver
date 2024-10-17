<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;



class UserChangePasswordComponent extends Component
{
    // public $layout = 'layouts.user-dashboard';
    public $showModal;
    public $showWarningModal;

    public $email;
    public $password;
    public $confirm_password;

    public $value, $key;

    protected $rules = [
        'password' => 'required|min:6',
        'confirm_password' => 'required_with:password|same:password|min:6',
    ];

    protected $messages = [
        'password.required' => 'Password is required.',
        'password.min' => 'Password must be at least :min characters.',
        
        'confirm_password.required_with' => 'Confirm Password is required.',
        'confirm_password.same' => 'Password and confirmation password must match.',
        'confirm_password.min' => 'Confirmation password must be at least 6 characters.',
    ];

    public function mount(){
        $this->showModal = false;
        $this->showWarningModal = false;

        $this->email = auth()->user()->email;

        $this->resetValues();
    }
    

    public function updated($fields){
        $this->validateOnly($fields);

        // $this->key = $fields;
        // $this->value = $fields;
    }

    
    public function showModal(){
        $this->showModal = true;   
        // $this->validate($this->rules, $this->messages);
        $this->resetValues();
    }

    public function closeModal(){
        $this->showModal = false;   
        
        $this->resetValues();
    }

    public function showWarningModal(){
        $this->showWarningModal = true;
    }

    public function closeWarningModal(){
        $this->showWarningModal = false; 
        return redirect('login')->with(Auth::logout());
    }



    public function saveChanges(){
        $this->validate();
        // dd($this->password, $this->confirm_password);
        $user = User::where('email', $this->email)->first();

        if($user){
            $user->password = bcrypt($this->password);
            $user->save();
        }

        session()->flash('message', 'Password successfully updated.');
        $this->closeModal();


        $this->showWarningModal();
        
    }


    public function render()
    {
        return view('livewire.user-change-password-component')
            // ->layout('components.layouts.app')
            ;
    }

    public function resetValues(){
        $this->password = null;
        $this->confirm_password = null;
    }
}
