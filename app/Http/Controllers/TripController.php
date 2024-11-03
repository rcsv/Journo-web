<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Carbon::setLocale(config('app.locale'));

        $data = [
            'pageTitle' => 'My Trips',
            //'trips' => Trip::orderby('start_date')->paginate(5),
            'trips' => Trip::where('user_id', auth()->id())
                    ->orderBy('start_date')
                    ->paginate(5),
        ];

        return view('trip.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'pageTitle' => 'Create a new trip',
        ];
        return view('trip.create', $data);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' =>  'required|max:20',
            'destination' => 'required|max:30',

        ]);

        $validated['user_id'] = auth()->id();
        $validated['start_date'] = date('Y-m-d H:i:s');
        $validated['end_date'] = date('Y-m-d H:i:s');
        
        $trip = Trip::create($validated);

        // フラッシュメッセージをセッションに追加
        return redirect()
            ->route('trip.index')
            ->with(
                'success', 
                'Your trip data has been saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Trip $trip)
    {
        // ログインしているユーザーが、この Trip の所有者であるかを確認
        if ($trip->user_id !== auth()->id()) {
            abort(404); // 所有者でない場合は、404 エラーを返す
        }
        
        $data = [
            'pageTitle' => 'Trip Info',
            'trip' => $trip,
        ];
        return view('trip.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trip $trip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip)
    {
        //
    }
}
