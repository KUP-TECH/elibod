<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipality;
class Municipalities extends Controller
{
    public function municipalities(Request $request)
    {
        $search = $request->input('search');

        if ($search != null && $search != '') {
            // Fetch municipalities based on the search term
            $data['municipalities'] = Municipality::where('name', 'LIKE', '%' . $search . '%')->get();
        } else {
            // Fetch all municipalities from the database
            $data['municipalities'] = Municipality::all();
        }

     
     
        return view('pages.homepage', $data);
    }
}
