<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $pesan = [
            'name.required'             => 'Tidak boleh kosong !',
            'username.required'         => 'Tidak boleh kosong !',
            'email.required'            => 'Tidak boleh kosong !',
            'password.required'         => 'Tidak boleh kosong !',

            'username.unique'           => 'Username telah terdaftar !',
            'email.unique'              => 'Email telah terdaftar !',
            'email.email'               => 'Format email salah !',
        ];
        
        return Validator::make($data, [
            'name'                      => ['required', 'string', 'max:255'],
            'username'                  => ['required', 'string', 'max:255', 'unique:users'],
            'email'                     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'                  => ['required', 'string', 'min:4', 'confirmed'],
        ], $pesan);
    }

    /**
     * Create a new user instance after a valid registration.
     *members
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'      => $data['name'],
            'username'  => $data['username'],
            'email'     => $data['email'],
            'role'      => 'User',
            'password'  => Hash::make($data['password']),
        ]);
    }
}
