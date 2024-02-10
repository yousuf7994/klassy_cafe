<?php

namespace App\Http\Controllers\Backend;

use App\Models\Chef;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activeChefs = Chef::where('status', 1)->get();
        $draftChefs = Chef::where('status', 0)->get();
        $trashChefs = Chef::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('backend.chef.index', compact('activeChefs', 'draftChefs', 'trashChefs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.chef.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photo = $request->file('photo');
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'chef_id' => 'required',
            'designation' => 'required',
            'photo' => 'required|mimes:png,jpg,jpeg|max:2000',
        ]);
        if ($photo) {
            $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->save(public_path('storage/chef/' . $photoName));
        }
        Chef::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'chef_id' => $request->chef_id,
            'designation' => $request->designation,
            'photo' => $photoName,

        ]);
        return back()->with('success', 'Chef Added Successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function show(Chef $chef)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function edit(Chef $chef)
    {
        return view('backend.chef.edit', compact('chef'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chef $chef)
    {
        $photo = $request->file('photo');
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'chef_id' => 'required',
            'designation' => 'required',
            'photo' => 'required|mimes:png,jpg,jpeg|max:2000',
        ]);
        if ($photo) {
            $path = public_path('storage/chef/' . $chef->photo);
            if (file_exists($path)) {
                unlink($path);
            }
            $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->save(public_path('storage/chef/' . $photoName));
        }

        $chef->name = $request->name;
        $chef->email = $request->email;
        $chef->phone = $request->phone;
        $chef->chef_id = $request->chef_id;
        $chef->designation = $request->designation;
        $chef->photo = $photoName;
        $chef->save();
        return redirect(route('backend.chef.index'))->with('success', 'Chef info Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chef $chef)
    {
        $chef->status == '0';
        $chef->save();
        $chef->delete();
        return back()->with('success', 'Chef Info Trashed');
    }
    public function status(Chef $chef)
    {
        if ($chef->status == '1') {
            $chef->status='0';
            $chef->save();
        }else{
            $chef->status = '1';
            $chef->save();
        }
        return back()->with('success', $chef->status == '1' ? 'Doctor info Published' : 'Doctor info Drafted');
    }
    public function reStore($id){
        $chef=Chef::onlyTrashed()->find($id);
        $chef->restore();
        return back()->with('success','Chef Restored');
    }
    public function permDelete($id){
        $chef = Chef::onlyTrashed()->find($id);
        $chef->forceDelete();
        return back()->with('success', 'Chef Info Deleted');
    }
}
