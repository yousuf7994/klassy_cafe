<?php

namespace App\Http\Controllers\Backend;

use App\Models\Dinner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class DinnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activeDinner = Dinner::where('status', 'publish')->get();
        $draftDinner = Dinner::where('status', 'draft')->get();
        $trashDinner = Dinner::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('backend.dinner.index', compact('activeDinner', 'draftDinner', 'trashDinner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.dinner.create');
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
            Image::make($photo)->save(public_path('storage/dinner/' . $photoName));
        }
        Dinner::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'photo' => $photoName,

        ]);
        return back()->with('success', 'Dinner Item Added Successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dinner  $dinner
     * @return \Illuminate\Http\Response
     */
    public function show(Dinner $dinner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dinner  $dinner
     * @return \Illuminate\Http\Response
     */
    public function edit(Dinner $dinner)
    {
        return view('backend.dinner.edit', compact('dinner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dinner  $dinner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dinner $dinner)
    {
        $photo = $request->file('photo');
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photo' => 'required|mimes:png,jpg,jpeg|max:2000',
        ]);
        if ($photo) {
            $path = public_path('storage/dinner/' . $dinner->photo);
            if (file_exists($path)) {
                unlink($path);
            }
            $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->save(public_path('storage/dinner/' . $photoName));
        }

        $dinner->name = $request->name;
        $dinner->description = $request->description;
        $dinner->price = $request->price;
        $dinner->photo = $photoName;
        $dinner->save();


        return redirect(route('backend.dinner.index'))->with('success', 'Dinner info Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dinner  $dinner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dinner $dinner)
    {
        $dinner->status == 'draft';
        $dinner->save();
        $dinner->delete();
        return back()->with('success', 'Dinner Item Trashed');
    }
    public function status(Dinner $dinner)
    {
        if ($dinner->status == 'publish') {
            $dinner->status = 'draft';
            $dinner->save();
        } else {
            $dinner->status = 'publish';
            $dinner->save();
        }
        return back()->with('success', $dinner->status == 'publish' ? 'Dinner info Published' : 'Dinner info Drafted');
    }
    public function reStore($id)
    {
        $dinner = Dinner::onlyTrashed()->find($id);
        $dinner->restore();
        return back()->with('success', 'Dinner Item Restored');
    }
    public function permDelete($id)
    {
        $dinner = Dinner::onlyTrashed()->find($id);
        $dinner->forceDelete();
        return back()->with('success', 'Dinner Item Deleted');
    }
}
