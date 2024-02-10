<?php

namespace App\Http\Controllers\Backend;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('backend.reservation.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.reservation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'user_id' => 'nullable',
            'email' => 'nullable',
            'phone' => 'required|integer',
            'guest' => 'required',
            'date' => 'required',
            'time' => 'required',
            'message' => 'nullable|max:500',
            'status' => 'processing'
        ]);

        Reservation::create([
            'name' => $request->name,
            'user_id' => Auth::user()->id,
            'email' => $request->email,
            'phone' => $request->phone,
            'guest' => $request->guest,
            'date' => $request->date,
            'time' => $request->time,
            'message' => $request->message,
            'status' => 'processing'
        ]);
        return back()->with('success', 'Reservation Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        return view('backend.reservation.edit', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'name' => 'required',
            'user_id' => 'nullable',
            'email' => 'nullable',
            'phone' => 'required|integer',
            'guest' => 'required',
            'date' => 'required',
            'time' => 'required',
            'message' => 'nullable|max:500',
            'status' => 'processing'
        ]);


        $reservation->name = $request->name;
        $reservation->user_id = Auth::user()->id;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->guest = $request->guest;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->message = $request->message;
        $reservation->save();


        return redirect(route('backend.reservation.index'))->with('success', 'Reservation Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        
        
    }
    public function status(Reservation $reservation)
    {
        if ($reservation->status == 'processing') {
            $reservation->status = 'approved';
            $reservation->save();
        } else {
            $reservation->status = 'processing';
            $reservation->save();
        }
        return back()->with('success', $reservation->status == 'approved' ? 'Reservation Approved' : 'Reservation Processing');
    }

    public function myreservation()
    {
        if (Auth::id()) {
            $userid = Auth::user()->id;
            $myreservations = Reservation::where('user_id', $userid)->get();
            return view('backend.reservation.myreservation', compact('myreservations'));
        }
    }
    public function delete($id)
    {
        $myreservation = Reservation::find($id);
        $myreservation->forceDelete($id);
        return back()->with('success','Reservation Deleted');
    }
}
