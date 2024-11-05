<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;



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
    protected $redirectTo = '/login';

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
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'address' => 'required|string',
            'province' => 'required|string',
            'amphoe' => 'required|string',
            'tambon' => 'required|string',
            'zipcode' => 'required|string|max:5',
            'tel' => 'required|string|max:12',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ],
        [
            'firstname.required' => 'กรุณากรอกชื่อ',
            'lastname.required' => 'กรุณากรอกนามสกุล',
            'address.required' => 'กรุณากรอกที่อยู่',
            'province.required' => 'กรุณาเลือกจังหวัด',
            'amphoe.required' => 'กรุณาเลือกอำเภอ',
            'tambon.required' => 'กรุณาเลือกตำบล',
            'zipcode.required' => 'กรุณากรอกรหัสไปรษณีย์',
            'tel.required' => 'กรุณากรอกเบอร์ดทรศัพท์',
            'email.email' => 'กรุณากรอกที่อยู่หรืออีเมล์ไม่ถูกต้อง',
            'password.required' => 'กรุณารหัสผ่าน',
        ]

    );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

     //Send data from registration to database.
    protected function create(array $data)
    {
        return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'address' => $data['address'],
            'province' => $data['province'],
            'amphoe' => $data['amphoe'],
            'tambon' => $data['tambon'],
            'zipcode' => $data['zipcode'],
            'tel' => $data['tel'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


    //Check registration
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        Session::flash('message', 'ลงทะเบียนสำเร็จ !');

        return redirect($this->redirectPath(), );
    }


}
