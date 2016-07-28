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
            'address_id' => 'max:255|default:null',
            'section_id' => 'max:10|default:null',
            'grade' => 'default:0',
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'totem' => 'max:255|default:null',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'tel' => 'max:255|default:null',
            'image_name' => 'max:255|default:null',
            'image_path' => 'max:255|default:null',
            'image_extension' => 'max:10|default:null',
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
        // php artisan tinker

        // create an address

        // $address = App\Address::firstOrCreate(['id' => 1,'street' => 'Rue de la Gare','number' => '8','postalcode' => 5630,'city' => 'Cerfontaine']);

        // create a user

        // $user = App\User::Create(['id' => 1,'address_id' => 1,'section_id' => 1,'grade' => 1,'firstname' => 'Gaël', 'lastname' => 'Fontenelle', 'totem' => 'Cirneco', 'email' => 'test@test.be', 'password' => bcrypt('bonjour')]);

        // create an article

        // $post = App\Post::Create(['id' => 1,'user_id' => 1,'section_id' => 1,'title' => 'Bienvenue sur le nouveau site des Scouts','slug' => 'bienvenue', 'content' => 'Bientôt disponible dans toutes les bonnes crêmerie. Voila voila fin du premier article blablabla.', 'online' => true]);

        // create a reminder

        // $reminder = App\Reminder::Create(['id' => 1,'user_id' => 1,'section_id' => 1,'content' => 'Nouveau site des Scouts SOON :P']);

        // create a section

        // $section = App\Section::Create(['id' => 1,'user_id' => 1,'name' => 'Éclaireur','content' => 'Des 12 à 16 ans vis des aventures chocopops !']);

        // create a non admin user

        // $user1 = App\User::Create(['id' => 2,'address_id' => 1,'section_id' => 1,'grade' => 0,'firstname' => 'Régis', 'lastname' => 'Fontenelle', 'email' => 'test@test.com', 'password' => bcrypt('bonjour')]);

        return User::create([
            'address_id' => $data['address_id'],
            'section_id' => $data['section_id'],
            'grade' => $data['grade'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'totem' => $data['totem'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'tel' => $data['tel'],
            'image_name' => $data['image_name'],
            'image_path' => $data['image_path'],
            'image_extension' => $data['image_extension'],
        ]);
    }
}
