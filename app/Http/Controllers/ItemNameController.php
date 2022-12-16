<?php

namespace App\Http\Controllers;

use App\Models\ItemName;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;

class ItemNameController extends Controller
{
    public function index(){
        return view('admin.itemname');
    }

    public function show(){
        $dataResult = new Collection();
        $employee = ItemName::all();
      
        foreach ($employee as $key => $value) {
                $dataResult->push([
                    'id' => $key + 1,
                    'description'  =>$value['name'],
                    'action'  => ' <div class="btn-group" role="group">
                    <button type="button" class="btn btn-primary btn-xs btn-edit" data-id="'.$value['id'].'">edit</button>
                    <button type="button" class="btn btn-danger btn-xs btn-delete" data-id="'.$value['id'].'">delete</button>
                        </div>',
                ]);

       }
       return DataTables::of($dataResult)
       ->editColumn('action', function ($row) {return $row['action'];})
       ->rawColumns(['action'])
       ->make(true);
   }

   public function destroy(Request $request)
   {
       $result = ItemName::find($request->id);
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

   public function store(Request $request){

        if(empty($request->id)){
            $save = new ItemName();
            $save->name = $request->name;
            $save->save();
        }else{
            $save = ItemName::find($request->id);
            $save->name = $request->name;
            $save->update();
        }
       
        if($save){
            return response()->json([
                'status' => 200,
                'message' => 'Saved Successfully'
            ]);
        }
        return response()->json([
            'status' => 400,
            'message' => 'Error! Try Again!',
        ]);

   }
   public function edit(Request $request)
   {
       $result = ItemName::find($request->id);
       if($result){
           return response()->json([
               'status' => 200,
               'data' => $result
           ]);
       }
       return response()->json([
           'status' => 400,
           'message' => 'No record found',
       ]);
   }
}
