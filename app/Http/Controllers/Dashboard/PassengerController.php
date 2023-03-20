<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Passenger;
use App\Models\PassengerInformation;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PassengerController extends Controller
{
    public function index(): View
    {
       $passengersInfo= PassengerInformation::all();
        return view('pages.dashboard.passengers')->with('passengers',$passengersInfo);
    }
    public function show($id): View
    {
        $passenger= Passenger::find($id);
        $passengerInfo =$passenger->passengerInfo;
        $reservation = $passenger->reservations()->get();
        return view('pages.dashboard.userDetail')->with("data",['passenger'=>$passengerInfo,'reservations'=>$reservation]);
    }
}
