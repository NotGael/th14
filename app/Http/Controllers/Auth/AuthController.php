<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Address;
use App\Section;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'address_id' => 'integer | max:255',
            'section_id' => 'integer | max:255',
            'photography_id' => 'integer | max:255',
            'grade' => 'numeric | min:0 | max:4',
            'firstname' => 'alpha_num | max:50 | required',
            'lastname' => 'alpha_num | max:50 | required',
            'totem' => 'alpha_num | max:50',
            'email' => 'required',
            'password' => 'min:6 | max:255 |confirmed | required',
            'tel' => 'numeric | max:9999999999',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'address_id' => null,
            'section_id' => $data['section_id'],
            'photography_id' => null,
            'grade' => 0,
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'totem' => $data['totem'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'tel' => $data['tel'],
        ]);
    }
}
