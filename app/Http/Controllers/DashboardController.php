<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        if(empty(session('id'))){
            return redirect('login');
        }
        $faculty = Faculty::all();
        return view('admin.index', compact('faculty'));
    }
}
