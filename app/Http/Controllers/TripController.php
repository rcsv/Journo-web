<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;

class TripController extends Controller
{

    public function create() {
        
        $data = [
            'pageTitle' => 'Create a New Trip'
        ];
        return view('trip.create', $data);
    }

    public function store(Request $request) {
        $trip = Trip::create([
            'user_id'=>1,               // Auth::user()->id であるべき。
            'title' => $request->title,
            'destination' => 'Somewhere',
            'start_date' => date('Y-m-d H:i:s'),
            'end_date' => date('Y-m-d H:i:s'),
        ]);

        return back();
    }

    // お試しメソッド
    public function index() {
        $trips = Trip::all();
        return view('index')->with('trips', $trips);
    }
}
