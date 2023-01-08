<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

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
                    }else if($isLogin->usertype == 2){
                        $url = "dean";
                    }else{ $url = "faculty"; }
                    return response()->json(['status' => 200, 'url' => $url ]);
                  }
             return response()->json(['status' => 400, 'message' =>  'Invalid User!']);
            // return Redirect::back()->withErrors(['msg' => 'The Message error']);
    
    
    }

    public function show(){
        $dataResult = new Collection();
        $employee = Account::all();
      
        foreach ($employee as $key => $value) {
            $url= empty($value['photo'])?asset('img/emptyprofile.png'):asset('storage/images/'.$value['photo']);
            $usertype  = '';
            if($value['usertype'] == 1){
                $usertype = 'Admin';
            }else if($value['usertype'] == 2){
                $usertype = 'Dean';
            }else if($value['usertype'] == 3){
                $usertype = 'Faculty';
            }
                $dataResult->push([
                    'id' => $key + 1,
                    'photo'  => '<img src="'.$url.'"  width="70" style="border-radius: 50%;">', 
                    'firstname'  => $value['firstname'],
                    'lastname'  => $value['lastname'],
                    'username'  => $value['username'],
                    'usertype'  => $usertype,
                    // 'action'  => ' <div class="btn-group" role="group">
                    //         <button type="button" class="btn btn-outline-light btn-sm btn-edit-employee" data-id="'.$value['id'].'">edit</button>
                    //         <button type="button" class="btn btn-outline-light btn-sm btn-delete-employee" data-id="'.$value['id'].'">delete</button>
                    //     </div>',
                ]);
       }
       return DataTables::of($dataResult)
    //    ->editColumn('action', function ($row) {return $row['action'];})
       ->editColumn('photo', function ($row) {return $row['photo'];})
       ->rawColumns(['photo'])
       ->make(true);
   }

   public function update(Request $request){
        $validator = \Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->messages(),
            ]);
        }
        $find = Account::find($request->id);
        $find->firstname = $request->firstname;
        $find->lastname = $request->lastname;
        $find->username = $request->username;
        if(!empty($request->password)){
            $find->password = Hash::make($request->password);
        }
        $find->update();
if($find){
    return response()->json(['status' => 200, 'message' =>  'Update Success!']);

}
return response()->json(['status' => 401, 'message' =>  'Invalid User!']);

   }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}
