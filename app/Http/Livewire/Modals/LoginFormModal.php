<?php

namespace App\Http\Livewire\Modals;
/* use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request; */

use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Providers\RouteServiceProvider;

class LoginFormModal extends ModalComponent
{
    public $email;
    public $password;


    public function login()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        // Validate the input data
        $validator = Validator::make($credentials, [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            $this->setErrorBag($validator->getMessageBag());
            return;
        }

        // Authenticate the user
        if (Auth::attempt($credentials)) {
            // Authentication passed
            $request = request();
            $request->session()->regenerate();

            $role = Auth::user()->role->name;
            //dd($role->name);
            if ($role == 'admin') {
                redirect('dashboard')->with('flashMessage', ['message' => 'admin logged in successfully', 'type' => 'success']);
            } elseif ($role == 'SuperAdmin') {
                redirect('dashboard');
            } elseif ($role == 'user') {
                redirect('/user')->with('flashMessage', ['message' => 'user logged in successfully', 'type' => 'success']);
            } else {
                return RouteServiceProvider::HOME;
            }
            
        } else {
            $this->addError('email', 'Incorrect email or password.');
        }
    }

    public function render()
    {
        return view('livewire.modals.login-form-modal');
    }
}
