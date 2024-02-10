<?php

namespace App\Http\Controllers\Backend;

use App\Models\Breakfast;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BreakfastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activeBreakfast = Breakfast::where('status', 'publish')->get();
        $draftBreakfast = Breakfast::where('status', 'draft')->get();
        $trashBreakfast = Breakfast::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('backend.breakfast.index', compact('activeBreakfast', 'draftBreakfast', 'trashBreakfast'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.breakfast.create');
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
            Image::make($photo)->save(public_path('storage/breakfast/' . $photoName));
        }
        Breakfast::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'photo' => $photoName,

        ]);
        return back()->with('success', 'Breakfast Item Added Successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Breakfast  $breakfast
     * @return \Illuminate\Http\Response
     */
    public function show(Breakfast $breakfast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Breakfast  $breakfast
     * @return \Illuminate\Http\Response
     */
    public function edit(Breakfast $breakfast)
    {
        return view('backend.breakfast.edit',compact('breakfast'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Breakfast  $breakfast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Breakfast $breakfast)
    {
        $photo = $request->file('photo');
        $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'price'       => 'required',
            'photo'       => 'required|mimes:png,jpg,jpeg|max:2000',
        ]);
        if ($photo) {
            $path = public_path('storage/breakfast/' . $breakfast->photo);
            if (file_exists($path)) {
                unlink($path);
            }

            $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->save(public_path('storage/breakfast/' . $photoName));
        }
        $breakfast->name        = $request->name;
        $breakfast->description = $request->description;
        $breakfast->price       = $request->price;
        $breakfast->photo       = $photoName;
        $breakfast->save();

        return redirect(route('backend.breakfast.index'))->with('success', 'Breakfast Item Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Breakfast  $breakfast
     * @return \Illuminate\Http\Response
     */
    public function destroy(Breakfast $breakfast)
    {
        $breakfast->status == 'draft';
        $breakfast->save();
        $breakfast->delete();
        return back()->with('success','Breakfast Item Trashed');
    }
    public function status(Breakfast $breakfast){
        if($breakfast->status == 'publish'){
            $breakfast->status = 'draft';
            $breakfast->save();
        }else{
            $breakfast->status = 'publish';
            $breakfast->save();
        }
        return back()->with('success', $breakfast->status == 'publish' ? 'Breakfast info Published' : 'Breakfast info Drafted');
    }
    public function reStore($id){
        $breakfast=Breakfast::onlyTrashed()->find($id);
        $breakfast->restore();
        return back()->with('success', 'Breakfast Item Restored');
    }
    public function permDelete($id){
        $breakfast = Breakfast::onlyTrashed()->find($id);
        $breakfast->forceDelete();
        return back()->with('success', 'Breakfast Item Deleted');
    }
}
