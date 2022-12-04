<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index(){
        return view('admin.account');
    }
    public function login(Request $request){
       
            $username = trim(strtolower($request->username));
            $password =  $request->password;
    
            $isLogin = Account::where('username',$username)->first();
    
                if ($isLogin && Hash::check($password, $isLogin->password)) {
                    session([
                        'usertype' => $isLogin->usertype,
                        'username' => $isLogin->username,
                        'facultyId' => $isLogin->facultyId,
                        'firstname' => $isLogin->firstname,
                        'lastname' => $isLogin->lastname,
                        'photo' => $isLogin->photo,
                        'id' => $isLogin->id,
                    ]);
                    if($isLogin->usertype == 1){
                        $url = 'dashboard';
                    }else if($isLogin->usertype == 3){
                        $url = "dean";
                    }else{ $url = "faculty"; }
                    return response()->json(['status' => 200, 'url' => $url ]);
                  }
             return response()->json(['status' => 400, 'message' =>  'Invalid User!']);
            // return Redirect::back()->withErrors(['msg' => 'The Message error']);
    
    
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}
