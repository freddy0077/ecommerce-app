<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\StoreController;
use App\ProductCategory;
use App\Store;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Webpatser\Uuid\Uuid;

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
    protected $redirectTo = '/home';

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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
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
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone_number' => $data['phone_number'],
            'gender' => $data['gender']
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

      event( new Registered(
           $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone_number' => $request->phone_number,
            'gender'    => $request->gender,
            'has_store' => $request->store == "on"? true: false
        ])));

        if($request->store == "on"){

            $user_id = User::where('email',$request->email)->first()->id;

            Store::create([
                'id' => Uuid::generate(),
                'user_id' => $user_id,
                'name' => $request->store_name
            ]);
        }

//        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

            return $this->registered($request, $user) ?: redirect($this->redirectPath());

    }

    protected function registered(Request $request, $user)
    {
        //
//         return $user->have_store ?:"";
//        return $request->store;

        if ($request->exists('store') && $request->get('store') == 'on') {
            return ['message'=>'/store/store-settings','status'=>301];
        }else{
            return ['message'=>'/','status'=>200];
        }
    }

}
