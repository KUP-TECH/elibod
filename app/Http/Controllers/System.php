<?php

namespace App\Http\Controllers;

use App\Models\Attractions;
use App\Models\Municipality;
use Illuminate\Http\Request;

class System extends Controller
{
    public function system() {


        $data['municipality'] = Municipality::all();



        return view('pages.system.system', $data);

    }



    public function delete_municipality(Request $request) {
        $id = $request->input('id');


        Municipality::destroy($id);
        return back()->with('status', ['alert' => 'alert-danger', 'msg' => 'Deleted Municipality']);
    }


    public function add_municipality(Request $request) {

        $validated = $request->validate([
            'municipality'  => 'required',
            'icon'          => 'required|file',
            'img'           => 'required|file',
            'bg'            => 'required|file',
            'map'           => 'required|file',
            'desc'          => 'required',
        ]);

   
        

        $files = ['icon', 'img', 'bg', 'map'];
        $assoc = [];
        foreach ($files as $f) {
            $file = $request->file($f);
            $ext  = $file->getClientOriginalExtension();
            $photoPath = $validated['municipality'] . '.' . $ext;
            $file->storeAs('uploads/municipality/' . $validated['municipality'] . '/' . $f, $photoPath, 'public');
            $assoc[$f] = $photoPath;
        }



        Municipality::create([
            'name'          => $validated['municipality'],
            'icon'          => $assoc['icon'],
            'img'           => $assoc['img'],
            'bg_img'        => $assoc['bg'],
            'map_img'       => $assoc['map'],
            'description'   => $validated['desc'],
        ]);

       



        return back()->with('status', ['alert' => 'alert-success', 'msg' => 'Created Municipality']);
    }



    public function attractions() {
        $data['municipality']   = Municipality::select('id', 'name')->get();
        $data['attractions']    = Attractions::with('municipality:id,name')->get();
        
        // dd($data['municipality']);

        return view('pages.system.attractions', $data);
    }

    public function add_attraction(Request $request) {
        $validated = $request->validate([
            'municipality'      => 'required',
            'attraction_name'   => 'required',
            'location'          => 'required',
            'about'             => 'required',
            'img'               => 'required|file',
            'bg_img'            => 'required|file',
            'map_img'           => 'required|file',
        ]);

        $files = ['img', 'bg_img', 'map_img'];
        $assoc = [];
        foreach ($files as $f) {
            $file       = $request->file($f);
            $ext        = $file->getClientOriginalExtension();
            $photoPath  = $validated['attraction_name'] . '.' . $ext;
            $file->storeAs('uploads/attractions/' . $validated['attraction_name'] . '/' . $f, $photoPath, 'public');
            $assoc[$f] = $photoPath;
        }

        Attractions::create([
            'municipality_id'   => $validated['municipality'],
            'attraction_name'   => $validated['attraction_name'],
            'location'          => $validated['location'],
            'about'             => $validated['about'],
            'img'               => $assoc['img'],
            'bg_img'            => $assoc['bg_img'],
            'map_img'           => $assoc['map_img'],
        ]);

        return back()->with('status', ['alert' => 'alert-success', 'msg' => 'Created Attraction']);
    }

    public function delete_attraction(Request $request) {
        $id = $request->input('id');

        Attractions::destroy($id);
        return back()->with('status', ['alert' => 'alert-danger', 'msg' => 'Deleted Attraction']);
    }
}
