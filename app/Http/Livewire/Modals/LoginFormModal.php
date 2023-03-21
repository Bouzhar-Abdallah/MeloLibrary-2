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

            $redirectTo = $this->redirectTo();
            $this->emit('redirectTo', $redirectTo);
        } else {
            $this->addError('email', 'Incorrect email or password.');
        }
    }


    protected function redirectTo(): string
    {
        $role = Auth::user()->role->name;
        //dd($role->name);
        if ($role == 'Admin') {
            return route('dashboard');
        } elseif ($role == 'SuperAdmin') {
            return route('dashboard');
        } elseif ($role == 'User') {
            return route('dashboard');
        } else {
            return RouteServiceProvider::HOME;
        }
    }
    public function render()
    {
        return view('livewire.modals.login-form-modal');
    }
}
