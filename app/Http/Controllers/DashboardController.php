<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $faculty = Faculty::all();
        return view('admin.index', compact('faculty'));
    }
}
