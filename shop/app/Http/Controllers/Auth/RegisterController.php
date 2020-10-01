<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    public function getRegister(){
        return view('auth.register');
    }

    public  function postRegister(Request $request)

    {

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $request->validate([
            'name'=>'required',
            'email'=> 'required',
            'password'=>'required|min:6|max:30'
        ],[
            'name.required'=>'Bạn phải nhập name',
            'email.required'=>'Bạn phải nhập email',
            'password.required'=>'Bạn phải nhập mật khẩu',
            'password.min'=>'Mật khẩu phải ít nhất 6 ký tự',
            'password.max'=>'Mật khẩu tối đa 30 ký tự'
        ]);

        $data = [
            'name' =>  $name,
            'password' => bcrypt($password),
            'email'=> $email,
            'role'=>2,
            'avatar'=>''
        ];
        DB::table('users')->insert($data);

        return redirect('admin')->with('status', 'Đăng ký thành công');

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
