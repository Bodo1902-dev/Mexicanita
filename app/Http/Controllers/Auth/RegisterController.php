<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //mostrar el formulario de registro
    public function show(){
        return view('auth.register');

    }
//validando el registro
    public function handle(){
        request()->validate(
            [
                'name'=>['required','string','max:100'],
                'email'=>['required','string','max:150'],
                'password'=>['required','string','min:4','confirmed']
            ]);
        $user = User::create([
            'name'=>request('name'),
            'email'=>request('email'),
            'password'=>Hash::make(request())
        ]);

        //evento de confirmacion 
        event(new Registered($user));

        Auth::login($user);

        //Redireccionar
        return redirect()->to(RouteServiceProvider::HOME)->with('success','Usuario Registrado');
    }




}
