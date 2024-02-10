<?php

namespace App\Http\Controllers\Backend;

use App\Models\Cake_Pastry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class Cake_PastryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activeCake_pastry = Cake_Pastry::where('status', 'publish')->get();
        $draftCake_pastry = Cake_Pastry::where('status', 'draft')->get();
        $trashCake_pastry = Cake_Pastry::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('backend.cake_pastry.index', compact('activeCake_pastry', 'draftCake_pastry', 'trashCake_pastry'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.cake_pastry.create');
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
            Image::make($photo)->save(public_path('storage/cake_pastry/' . $photoName));
        }
        Cake_Pastry::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'photo' => $photoName,

        ]);
        return back()->with('success', 'Cake_pastry Item Added Successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cake_Pastry  $cake_Pastry
     * @return \Illuminate\Http\Response
     */
    public function show(Cake_Pastry $cake_Pastry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cake_Pastry  $cake_Pastry
     * @return \Illuminate\Http\Response
     */
    public function edit(Cake_Pastry $cake_Pastry)
    {
        return view('backend.cake_pastry.edit', compact('cake_Pastry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cake_Pastry  $cake_Pastry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cake_Pastry $cake_Pastry)
    {
        $photo = $request->file('photo');
        $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'price'       => 'required',
            'photo'       => 'required|mimes:png,jpg,jpeg|max:2000',
        ]);
        if ($photo) {
            $path = public_path('storage/cake_pastry/' . $cake_Pastry->photo);
            if (file_exists($path)) {
                unlink($path);
            }

            $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->save(public_path('storage/cake_pastry/' . $photoName));
        }
        $cake_Pastry->name        = $request->name;
        $cake_Pastry->description = $request->description;
        $cake_Pastry->price       = $request->price;
        $cake_Pastry->photo       = $photoName;
        $cake_Pastry->save();

        return redirect(route('backend.cake_pastry.index'))->with('success', 'Cake_Pastry Item Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cake_Pastry  $cake_Pastry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cake_Pastry $cake_Pastry)
    {
        $cake_Pastry->status == 'draft';
        $cake_Pastry->save();
        $cake_Pastry->delete();
        return back()->with('success', 'Cake_Pastry Item Trashed');
    }
    public function status(Cake_Pastry $cake_Pastry)
    {
        if ($cake_Pastry->status == 'publish') {
            $cake_Pastry->status = 'draft';
            $cake_Pastry->save();
        } else {
            $cake_Pastry->status = 'publish';
            $cake_Pastry->save();
        }
        return back()->with('success', $cake_Pastry->status == 'publish' ? 'Cake_Pastry info Published' : 'Cake_Pastry info Drafted');
    }
    public function reStore($id)
    {
        $cake_Pastry = Cake_Pastry::onlyTrashed()->find($id);
        $cake_Pastry->restore();
        return back()->with('success', 'Cake_Pastry Item Restored');
    }
    public function permDelete($id)
    {
        $cake_Pastry = Cake_Pastry::onlyTrashed()->find($id);
        $cake_Pastry->forceDelete();
        return back()->with('success', 'Cake_Pastry Item Deleted');
    }
}
