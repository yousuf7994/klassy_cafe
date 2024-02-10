<?php

namespace App\Http\Controllers\Backend;

use App\Models\Lunch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class LunchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activeLunch = Lunch::where('status', 'publish')->get();
        $draftLunch = Lunch::where('status', 'draft')->get();
        $trashLunch = Lunch::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('backend.lunch.index',compact('activeLunch', 'draftLunch', 'trashLunch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.lunch.create');
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
            'description' => 'required',
            'price' => 'required',
            'photo' => 'required|mimes:png,jpg,jpeg|max:2000',
        ]);
        if ($photo) {
            $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->save(public_path('storage/lunch/' . $photoName));
        }
        Lunch::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'photo' => $photoName,

        ]);
        return back()->with('success', 'Lunch Item Added Successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lunch  $lunch
     * @return \Illuminate\Http\Response
     */
    public function show(Lunch $lunch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lunch  $lunch
     * @return \Illuminate\Http\Response
     */
    public function edit(Lunch $lunch)
    {
        return view('backend.lunch.edit',compact('lunch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lunch  $lunch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lunch $lunch)
    {
        $photo = $request->file('photo');
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photo' => 'required|mimes:png,jpg,jpeg|max:2000',
        ]);
        if ($photo) {
            $path=public_path('storage/lunch/'. $lunch->photo);
            if(file_exists($path)){
                unlink($path);
            }
            $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->save(public_path('storage/lunch/' . $photoName));
        }
        
             $lunch->name=$request->name;
             $lunch->description=$request->description;
             $lunch->price=$request->price;
             $lunch->photo= $photoName;
             $lunch->save();


        return redirect(route('backend.lunch.index'))->with('success', 'lunch info Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lunch  $lunch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lunch $lunch)
    {
        $lunch->status == 'draft';
        $lunch->save();
        $lunch->delete();
        return back()->with('success','Lunch Item Trashed');
    }
    public function status(Lunch $lunch)
    {
        if ($lunch->status == 'publish') {
            $lunch->status = 'draft';
            $lunch->save();
        } else {
            $lunch->status = 'publish';
            $lunch->save();
        }
        return back()->with('success', $lunch->status == 'publish' ? 'Lunch info Published' : 'Lunch info Drafted');
    }
    public function reStore($id)
    {
        $lunch = Lunch::onlyTrashed()->find($id);
        $lunch->restore();
        return back()->with('success', 'Lunch Item Restored');
    }
    public function permDelete($id)
    {
        $lunch = Lunch::onlyTrashed()->find($id);
        $lunch->forceDelete();
        return back()->with('success', 'Lunch Item Deleted');
    }
}
