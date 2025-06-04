<?php

namespace App\Http\Controllers;

use App\Models\Attractions;
use App\Models\Municipality;
use App\Models\Festival;
use App\Models\AttractionImg;
use Illuminate\Http\Request;

class System extends Controller
{
    public function system(Request $request) {
        $id = $request->input('id');
        $data['edit'] = Municipality::find($id);

        $data['municipality'] = Municipality::all();



        return view('pages.system.system', $data);

    }

    public function edit_municipality(Request $request) {
        $validated = $request->validate([
            'municipality'  => 'required',
            'icon'          => 'required|file',
            'img'           => 'required|file',
            'bg'            => 'required|file',
            'map'           => 'required|file',
            'desc'          => 'required',
        ]);
        $id = $request->input('id');
        $d = Municipality::find($id);

        if (!$d) {
            return back()->with('status', ['alert' => 'alert-danger', 'msg' => 'Municipality not found']);
        }

        $files = ['icon', 'img', 'bg', 'map'];
        $assoc = [];
        foreach ($files as $f) {
            $file = $request->file($f);
            $ext  = $file->getClientOriginalExtension();
            $photoPath = $validated['municipality'] . '.' . $ext;
            $file->storeAs('uploads/municipality/' . $validated['municipality'] . '/' . $f, $photoPath, 'public');
            $assoc[$f] = $photoPath;
        }


        $d->update([
            'name'          => $validated['municipality'],
            'icon'          => $assoc['icon'],
            'img'           => $assoc['img'],
            'bg_img'        => $assoc['bg'],
            'map_img'       => $assoc['map'],
            'description'   => $validated['desc'],
        ]);

        return redirect()->route('system_municipality')->with('status', ['alert' => 'alert-success', 'msg' => 'Updated Municipality']);
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



    public function attractions(Request $request) {
        $id = $request->input('id');
        
        if($id != null && $id != ''){
            $data['edit'] = Attractions::with('municipality:id,name')
            ->where('id', $id)
            ->first();
        }

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


    public function edit_attraction(Request $request) {


        $validated = $request->validate([
            'municipality'      => 'required',
            'attraction_name'   => 'required',
            'location'          => 'required',
            'about'             => 'required',
            'img'               => 'required|file',
            'bg_img'            => 'required|file',
            'map_img'           => 'required|file',
            'id'                => 'required'
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

        Attractions::find($validated['id'])->update([
            'municipality_id'   => $validated['municipality'],
            'attraction_name'   => $validated['attraction_name'],
            'location'          => $validated['location'],
            'about'             => $validated['about'],
            'img'               => $assoc['img'],
            'bg_img'            => $assoc['bg_img'],
            'map_img'           => $assoc['map_img'],
        ]);

        

        return redirect()->route('system_attractions')->with('status', ['alert' => 'alert-success', 'msg' => 'Edited Attraction']);
    }

    public function delete_attraction(Request $request) {
        $id = $request->input('id');

        Attractions::destroy($id);
        return back()->with('status', ['alert' => 'alert-danger', 'msg' => 'Deleted Attraction']);
    }


    public function festival() {
        $data['municipality']   = Municipality::select('id', 'name')->get();
        $data['festival']       = Festival::with('municipality')->get();
        // dd($data['festival']);
        return view('pages.system.festival', $data);
    }

    public function add_festival(Request $request) {
        $validated = $request->validate([
            'municipality'  => 'required',
            'fest_name'     => 'required',
            'description'   => 'required',
        ]);

        Festival::create([
            'municipality_id'   => $validated['municipality'],
            'fest_name'         => $validated['fest_name'],
            'description'       => $validated['description'],
        ]);

        return back()->with('status', ['alert' => 'alert-success', 'msg' => 'Created Festival']);
    }

    public function delete_festival(Request $request) {
        $id = $request->input('id');

        Festival::destroy($id);
        return back()->with('status', ['alert' => 'alert-danger', 'msg' => 'Deleted Festival']);
    }


    public function attraction_img() {
        $data['attractions'] = Attractions::select('id', 'attraction_name')->get();
        $data['attraction_img'] = AttractionImg::with('attraction')->get();
        // dd($data['attraction_img']);
        return view('pages.system.attraction_img', $data);
    }

    public function add_attraction_img(Request $request) {
        $validated = $request->validate([
            'attraction'    => 'required',
            'img'           => 'required|file',
        ]);

        // dd($validated);

        $file       = $request->file('img');
        $filename   = $file->getClientOriginalName();
        $ext        = $file->getClientOriginalExtension();
        $photoPath  = md5($filename) . '.' . $ext;
        $file->storeAs('uploads/attractions/' . $validated['attraction'] . '/extra', $photoPath, 'public');

        AttractionImg::create([
            'attractions_id'   => $validated['attraction'],
            'img'              => $photoPath,
        ]);

        return back()->with('status', ['alert' => 'alert-success', 'msg' => 'Created Attraction Image']);
    }

    public function delete_attraction_img(Request $request) {
        $id = $request->input('id');

        AttractionImg::destroy($id);
        return back()->with('status', ['alert' => 'alert-danger', 'msg' => 'Deleted Attraction Image']);
    }


    public function view_reservation() {
        $data['reservations'] = \App\Models\Reservation::with(['attraction', 'user'])->get();
        // dd($data['reservations']);
        return view('pages.system.reservation', $data);
    }
}
