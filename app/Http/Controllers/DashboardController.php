<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{
    public function index(){
        if(empty(session('id'))){
            return redirect('login');
        }
        $faculty = Faculty::all();
        $schedule = Schedule::all();
        $now = Carbon::now();
       $dataArray = new Collection();
       $datein = '';
       $dateout = '';
       $dateinb = false;
       $dateoutb = false;
       $daterangeb = false;
        //$isToday = $date->isToday();

        // $isYesterday = $date->isYesterday();

        // $isTodayOrYesterday =  $date->isToday() || $date->isYesterday();
        foreach($schedule as $item){
            if(!empty($item->timein)){
                $datein = Carbon::parse($item->timein);
            }
            if(!empty($item->timeout)){
                $dateout = Carbon::parse($item->timeout);
            }
            if(!empty($datein)){
                if($datein->isToday()){
                   $dateinb = true;
                }
            }
            if(!empty($dateout)){
                if($dateout->isToday()){
                    $dateoutb = true;
                 }
            }
            $startDate = '';
            $endDate = '';
            if(!empty($item->fromdate)){
                $startDate = Carbon::createFromFormat('Y-m-d',$item->fromdate);
            }
            if(!empty($item->todate)){
                $endDate = Carbon::createFromFormat('Y-m-d',$item->todate);
            }
            if(!empty($startDate) and !empty($endDate)){
                $daterangeb = Carbon::now()->between($startDate,$endDate);
            }else if(!empty($startDate) and empty($endDate)){
                $daterangeb = $startDate->isToday();
            }else if(!empty($endDate) and empty($startDate)){
                $daterangeb = $endDate->isToday();
            }
                if($dateinb or $dateoutb or $daterangeb){
                    $dataArray->push([
                        'name' => empty($item->faculty)?'':($item->faculty['firstname'].' '.$item->faculty['middlename'].' '.$item->faculty['lastname']),
                        'timein' =>  $item->timein,
                        'timeout' =>  $item->timeout,
                        'status' => $item->status,
                        'remarks' => $item->remarks,
                    ]);
                }

        }   
        return view('admin.index', compact('faculty','schedule'));
    }
}
