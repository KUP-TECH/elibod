<?php

namespace App\Http\Controllers;

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
}
