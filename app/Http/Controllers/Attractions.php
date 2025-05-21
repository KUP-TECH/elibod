<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attractions as AttractionsModel;

class Attractions extends Controller
{
    
    public function attractions(Request $request)
    {
        $id     = $request->input('id');
        $search = $request->input('search');

        if ($search != null && $search != '') {
            // Fetch municipalities based on the search term
            $data['attractions'] = AttractionsModel::with('municipality')
            ->where('municipality_id', $id)
            ->where('attraction_name', 'LIKE', '%' . $search . '%')
            ->get();
        } else {
            // Fetch all municipalities from the database
            $data['attractions'] = AttractionsModel::with('municipality')
            ->where('municipality_id', $id)
            ->get();
    
            
        }


        return view('pages.attractions', $data);
    }


}
