<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;

class TripController extends Controller
{

    /**
     * Crud
     * Display form for creating a new trip data
     * GET : /trip/create
     */
    public function create() {
        $data = [
            'pageTitle' => 'Create a New Trip'
        ];
        return view('trip.create', $data);
    }

    /**
     * Crud
     * Save a trip data receiving a form data
     */
    public function store(Request $request) {
        $trip = Trip::create([
            'user_id'=>1,               // Auth::user()->id であるべき。
            'title' => $request->title,
            'destination' => $request->destination,
            'start_date' => date('Y-m-d H:i:s'),
            'end_date' => date('Y-m-d H:i:s'),
        ]);

        $request->session()->flash('message', 'Save Data.');
        return back();
    }

    // お試しメソッド
    public function index() {
        $trips = Trip::all();
        return view('index')->with('trips', $trips);
    }
}
