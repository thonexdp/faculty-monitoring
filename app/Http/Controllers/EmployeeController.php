<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Expertise;
use App\Models\Faculty;
use App\Models\Account;
use App\Models\ItemName;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use DataTables;

class EmployeeController extends Controller
{
    public function index(){
        return view('admin.employee');
    }
    public function indexF(){

        $id = session('facultyId');
        $faculty = Faculty::find($id);
        $expertise = Expertise::where('empId',$id)->get();
        return view('faculty.index', compact('faculty','expertise'));
    }
     public function indexD(){
        $faculty = Faculty::all();
        return view('dean.index', compact('faculty'));
    }
    public function add(Request $request){
        $id = empty($request->id)?'':base64_decode($request->id);
        $designation  = Designation::all();
        $itemname  = ItemName::all();
        $faculty = Faculty::find($id);
        $expertise = Expertise::where('empId', $id)->get();
        return view('admin.add-employee' , compact('designation','faculty','expertise','itemname'));
    }
    
    public function store(Request $request)
    {
       //   dd($request->all());
        try {
      
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'itemname' => 'required',
            'employeeId' => 'unique:faculty,employeeId,' . $request->id,
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->messages(),
            ]);
        }
        $path = '';

      //  $input = $request->all();
      $imgCheck = false;
      if(!empty($request->image)){
        $imgCheck = true;
        $path = $request->lastname."_".time().'.'.$request->image->extension();  
        $request->image->move(public_path('storage/images'), $path);
      }

     
        if(empty($request->id)){
            
            $save = new Faculty();
            $save->firstname = $request->firstname;
            $save->middlename = $request->middlename;
            $save->lastname = $request->lastname;
            $save->sex = $request->sex;
            $save->designation = $request->designation;
            $save->itemname = $request->itemname;
            $save->employeeId = $request->employeeId;
            if( $imgCheck){
                $save->photo = $path;
            }
            $save->save();

            $savea = new Account();
            $savea->firstname = $save->firstname;
            $savea->lastname = $save->lastname;
            $savea->username = $save->employeeId;
            $savea->password = \Hash::make('12345');
            $savea->facultyId = $save->id;
            $savea->usertype = $request->designation==4?2:3;
            if( $imgCheck){
                $savea->photo = $path;
            }
            $savea->save();

        }else{
            $save = Faculty::find($request->id);
            $save->firstname = $request->firstname;
            $save->middlename = $request->middlename;
            $save->lastname = $request->lastname;
            $save->sex = $request->sex;
            $save->designation = $request->designation;
            $save->itemname = $request->itemname;
            $save->employeeId = $request->employeeId;
            if( $imgCheck){
                $save->photo =  $path;
            }
            $save->update();
        }

        if(!empty($request->expertiselist)){
           $expertiselist = $request->expertiselist;
           Expertise::where('empId',$request->id)->delete();
           
           foreach($expertiselist as $item){
                $savee = new Expertise();
                $savee->description = $item;
                $savee->empId = $save->id;
                $savee->type = 1;
                $savee->save(); 
           }
        }
       
        return response()->json([
            'status' => 200,
            'message' => 'Save Successfully',
        ]);
             //code...
            } catch (\Throwable $th) {
               dd($th);
            }
    }

    public function show(){
        $dataResult = new Collection();
        $employee = Faculty::all();
      
        foreach ($employee as $key => $value) {
            $url= empty($value['photo'])?asset('img/emptyprofile.png'):asset('storage/images/'.$value['photo']);
                $dataResult->push([
                    'id' => $key + 1,
                    'photo'  => '<img src="'.$url.'"  width="70" style="border-radius: 50%;">', 
                    'firstname'  => $value['firstname'],
                    'middlename'  => $value['middlename'],
                    'lastname'  => $value['lastname'],
                    'empno'  =>  $value['employeeId'],
                    'sex'  =>  strtoupper($value['sex']),
                    'itemname'  => empty($value['ItemName'])?'':$value['ItemName']['name'],
                    'designation'  => empty($value['Designation'])?'':$value['Designation']['name'],
                    'action'  => ' <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-light btn-sm btn-delete-employee" data-id="'.$value['id'].'">delete</button>
                            <a href="/employee/add?id='.base64_encode($value['id']).'" class="btn btn-success btn-sm pull-right">Edit</a>
                        </div>',
                ]);

       }
       return Datatables::of($dataResult)
       ->editColumn('action', function ($row) {return $row['action'];})
       ->editColumn('photo', function ($row) {return $row['photo'];})
       ->rawColumns(['action','photo'])
       ->make(true);
   }

   public function destroy(Request $request)
   {
       $result = Faculty::find($request->id);
       if($result){
           $result->delete();
           return response()->json([
               'status' => 200,
               'message' => 'Deleted Successfully'
           ]);
       }
       return response()->json([
           'status' => 400,
           'message' => 'No record found',
       ]);
   }

   public function one(Request $request)
   {
       $result = Faculty::find($request->id);
       $expert = Expertise::where('empId',$request->id)->get();
       if($result){
           return response()->json([
               'status' => 200,
               'data' =>  $result ,
               'expert' => $expert
           ]);
       }
       return response()->json([
           'status' => 400,
           'message' => 'No record found',
       ]);
   }

   public function savelogs(Request $request){
    $type = $request->type;
    $fId = session('facultyId');
    $typeOn = array("meeting", "leave", "travel");
    $found = Schedule::where('fId',$fId)->first();
    if($found){
        if($type == 'in'){
            $found->timein = Carbon::now();
            $found->status = null;
            $found->remarks = null;
        }else if($type == 'out'){
            $found->timeout = Carbon::now();
            $found->status = null;
            $found->remarks = null;
        }else if(in_array($type, $typeOn)){
            $found->timein = null;
            $found->timeout = null;
            $found->status = 'ON '.strtoupper($type);
            $found->remarks = $request->from." - ".$request->to;//(empty($request->from)?'':date('F m, Y', strtotime($request->from))) ." - ".(empty($request->to)?'':date('F m, Y', strtotime($request->to)));
            $found->fromdate = $request->from;
            $found->todate = $request->to;
        }
       // $found->fId = $fId;
        $found->update();
    }else{
        $save = new Schedule();
        if($type == 'in'){
            $save->timein = Carbon::now();
        }else if($type == 'out'){
            $save->timeout = Carbon::now(); 
        }else if(in_array($type, $typeOn)){
            $found->status = 'ON '.strtoupper($type);
            $found->remarks = $request->from." - ".$request->to;//(empty($request->from)?'':date('D m Y', strtotime($request->from))) ." - ".(empty($request->to)?'':date('D m Y', strtotime($request->to)));
            $found->fromdate = $request->from;
            $found->todate = $request->to;
        }
        $save->fId = $fId;
        $save->save();
    }
    return response()->json([
        'status' => 200,
        'message' => 'Saved Successfully'
    ]);
   }

   public function showlogs(){
    $fId = session('facultyId');
    
    $found = Schedule::where('fId',$fId)->first();
    if($found){
        return response()->json([
            'status' => 200,
            'data' => $found
        ]);
    }
    return response()->json([
        'status' => 400,
        'message' => 'No record found',
    ]);
   }

//    public function showlogsall(){
//     $found = Schedule::all();
//     if($found){
//         return response()->json([
//             'status' => 200,
//             'data' => $found
//         ]);
//     }
//     return response()->json([
//         'status' => 400,
//         'message' => 'No record found',
//     ]);
//    }



}
