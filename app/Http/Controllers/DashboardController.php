<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Schedule;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        if(empty(session('id'))){
            return redirect('login');
        }
        $faculty = Faculty::all();
        $schedule = Schedule::all();
        return view('admin.index', compact('faculty','schedule'));
    }
}
