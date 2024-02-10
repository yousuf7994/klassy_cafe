<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chef;
use App\Models\Lunch;
use App\Models\Dinner;
use App\Models\Contact;
use App\Models\Breakfast;
use App\Models\Cake_Pastry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $activeChefs = Chef::where('status', 1)->get();
        $activeBreakfast = Breakfast::where('status', 'publish')->get();
        $activeLunch = Lunch::where('status', 'publish')->get();
        $activeDinner = Dinner::where('status', 'publish')->get();
        $activeCake_pastry = Cake_Pastry::where('status', 'publish')->get();

        
        return view('frontend.index', compact('activeChefs', 'activeBreakfast', 'activeDinner', 'activeLunch', 'activeCake_pastry'));
    }
    public function home()
    {
        return view('backend.index');
    }

    public function chef()
    {
        $activeChefs = Chef::where('status', 1)->get();
        return view('frontend.page.chefs', compact('activeChefs'));
    }
    public function menu()
    {
        $activeBreakfast = Breakfast::where('status', 'publish')->get();
        $activeCake_pastry = Cake_Pastry::where('status', 'publish')->get();
        return view('frontend.page.menu', compact('activeBreakfast', 'activeCake_pastry'));
    }
    public function about()
    {
        return view('frontend.page.about');
    }
    public function contact()
    {
        return view('frontend.page.contact');
    }
    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'nullable',
            'message' => 'required',
        ]);
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);
        return back()->with('success', 'Thanks! Your Message has been sent');
    }
}
