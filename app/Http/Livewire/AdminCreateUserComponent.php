<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AdminCreateUserComponent extends Component
{
    public $showModal;

    public $name;
    public $email;
    public $password;
    public $confirm_password;

    protected $rules = [
        'name' => 'required|min:3|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'confirm_password' => 'required_with:password|same:password|min:6',
    ];

    protected $messages = [
        'name.required' => 'Name is required.',
        
        'email.required' => 'Email is required.',
        'email.email' => 'Email is invalid.',
        'email.unique' => 'Email already exists.',

        'password.required' => 'Password is required.',
        'password.min' => 'Password must be at least :min characters.',
        
        'confirm_password.required_with' => 'Confirm Password is required.',
        'confirm_password.same' => 'Password and confirmation password must match.',
        'confirm_password.min' => 'Confirmation password must be at least 6 characters.',
    ];

    public function mount(){
        $this->showModal = false;

        $this->resetValues();        
    }

    public function showModal(){
        $this->showModal = true;
    }

    public function closeModal(){
        $this->showModal = false;
        $this->resetValues();
    }

    public function updated($fields){
        $this->validateOnly($fields);
        // automatically it will validate according to the rules
        // and display corresponding error messages
    }

    public function saveChanges(){
        $this->validate();
        // dd($this->name, $this->email, $this->password, $this->confirm_password);
        try{
            $user = User::create([
                'name'  => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),  
            ]);
            $user->save();

            session()->flash('message', 'User successfully created.');
        } catch (\Exception $e) {
            session()->flash('error', 'Error saving user: ' . $e->getMessage());
        }


        $this->closeModal();        
    }

    
    public function render()
    {
        return view('livewire.admin-create-user-component');
    }

    public function resetValues(){
        $this->name = null;
        $this->email = null;
        $this->password = null;
        $this->confirm_password = null;
    }
}
