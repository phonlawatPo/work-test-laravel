<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\LocationController;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Checking email and password login.blade.php
    function check_login(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ],
        [
            'username.required'=>'**กรุณากรอกชื่อผู้ใช้**',
            'password.required'=>'**กรุณากรอกรหัสผ่าน**'
        ]
        );
    return view('login', compact('request'));
}

    //Search user from search bar at member.blade.php
    public function users_search(Request $request) {
        $search = trim($request->input('search')); // Trim whitespace from input

        $results = User::when($search, function ($query, $search) {
            $query->where('firstname', 'like', "%$search%")
                  ->orWhere('lastname', 'like', "%$search%")
                  ->orWhere('tel', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
        })->paginate(10); // Adjust the pagination limit as needed

        return view('member', compact('results', 'search'));
    }

    function add_user(Request $data){

        $data -> validate ([
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
            'emailunique:users' => 'ชื่อนี้ถูกใช้แล้ว',
            'password.required' => 'กรุณารหัสผ่าน',
        ]);

        User::create([
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

        Session::flash('message', 'เพิ่มสมาชิกสำเร็จ !');

        return redirect('member');
    }

    // Edit data user
    function edit($id){

        $userId = User::find($id);

        return view('edit', ['userId' => $userId]);
    }

    function delete($id){
        $userId = User::find($id)->delete();
        return redirect()->back();
    }

    function update(Request $request,$id){
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'address' => 'required|string',
            'province' => 'required|string',
            'amphoe' => 'required|string',
            'tambon' => 'required|string',
            'zipcode' => 'required|string|max:5',
            'tel' => 'required|string|max:15',
            'email' => 'required|string|email|max:255',

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
            'password.required' => 'กรุณากรอกรหัสผ่าน'

        ],
        );

        $data = [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'province' => $request->province,
            'amphoe' => $request->amphoe,
            'tambon' => $request->tambon,
            'zipcode' => $request->zipcode,
            'tel' => $request->tel,
            'email' => $request->email,
            'password' => $request->password,
        ];

        User::find($id)->update($data);

        return redirect('member');
    }

}
