<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;

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
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'age' => ['required', 'numeric', 'max:255', 'min:1', 'max:100'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

         // role id ne moze da go stavime ovde bidjeki poleto ne e $fillable vo User modelot 
        //   //  'role_id' => Role::where('name', 'guest')->first()->id, // zemi go kaj so imeto e guest od role tabelata, modelot 

        // opcija 1
       // $user = new User;
      //  $user->role()->associate(Role::where('name', 'guest')->first()->id); // moze vaka 



 // role id ne moze da go stavime ovde bidjeki poleto ne e $fillable vo User modelot 
        //   //  'role_id' => Role::where('name', 'guest')->first()->id, // zemi go kaj so imeto e guest od role tabelata, modelot 

      // option 2 

      // preku role modelot kreirame
      // ni treba vrsakta megu role i users 
      $role = Role::where('name', 'guest')->first();
      return $role->users()->create([

        'firstname' => $data['firstname'],
        'lastname' => $data['lastname'],
        'email' => $data['email'],
        'age' => $data['age'],
        'password' => Hash::make($data['password']),
      ]);


        // return User::create([
        //     'first_name' => $data['first_name'],
        //     'last_name' => $data['last_name'],
        //     'email' => $data['email'],
        //     'age' => $data['age'],
        //     // role id ne moze da go stavime ovde bidjeki poleto ne e $fillable vo User modelot 
        //   //  'role_id' => Role::where('name', 'guest')->first()->id, // zemi go kaj so imeto e guest od role tabelata, modelot 
        //     'password' => Hash::make($data['password']),
        // ]);
    }
}
