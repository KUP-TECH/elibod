<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attractions as AttractionsModel;
use App\Models\Reservation as ReservationModel;
use Illuminate\Support\Facades\Auth;

class Reservations extends Controller
{
    public function reservations(Request $request)
    {
        $data['attr_id'] = $request->input('id');
        $data['attraction'] = AttractionsModel::where('id', $data['attr_id'])->first();
        $data['user'] = Auth::user();

        return view('pages.reservations', $data);
    }


    public function add_reservation(Request $request)
    {
        $data = $request->validate([
            'address'       => 'required',
            'no'            => 'required',
            'arrival'       => 'required',
            'time'          => 'required',
            't_checkout'    => 'required',
            'kids'          => 'required',
            'adults'        => 'required',
        ]);

        $data['user_id'] = Auth::id();
        $data['attraction_id'] = $request->input('attraction_id');
        $data['img'] = "NO IMG";

        ReservationModel::create($data);

        return redirect()->route('reservation_success')->with('id', $data['attraction_id']);
    }
    

    public function reservation_success(Request $request)
    {
        $id = $request->session()->get('id');
        $data['attraction'] = AttractionsModel::where('id', $id)->first();
    
        return view('pages.returnhome', $data);
    }
}
