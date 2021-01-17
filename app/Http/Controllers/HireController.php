<?php

namespace App\Http\Controllers;

use App\Models\hire;
use Illuminate\Http\Request;

class HireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hire');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $booking = new hire();
        $class = \DB::table('drivers')->where('id', $request->driver_id)->pluck('license_class');
        
        $validated = $request->validate([
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
            'driver_id' => 'required|numeric',
            'vehicle_id' => 'required|numeric',
            'vehicle' => 'required|string',
        ]);
        if($validated){
       if($request->vehicle == 'Bus'){
            if($class == "D"){
                $booking->title = $request->title;
                $booking->start = $request->start;
                $booking->end = $request->end;
                $booking->driver_id = $request->driver_id;
                $booking->vehicle_id = $request->vehicle_id;
                $booking->vehicle = $request->vehicle;
                $booking->save();
                return redirect('/')->with('success', 'Booked Added Successfully'); 
               
            }else{
                return \Redirect::back()->withErrors(['The Driver License Class not for this vehicle']);
            }
          }
                    
        $booking->title = $request->title;
        $booking->start = $request->start;
        $booking->end = $request->end;
        $booking->driver_id = $request->driver_id;
        $booking->vehicle_id = $request->vehicle_id;
        $booking->vehicle = $request->vehicle;

        $booking->save();
        return redirect('/')->with('success', 'Booked Added Successfully'); 
       }else{
        return Redirect::back()->withErrors(['msg', 'The Driver License Class not Compatible with this vehicle']);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hire  $hire
     * @return \Illuminate\Http\Response
     */
    public function show(hire $hire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hire  $hire
     * @return \Illuminate\Http\Response
     */
    public function edit(hire $hire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hire  $hire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hire $hire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hire  $hire
     * @return \Illuminate\Http\Response
     */
    public function destroy(hire $hire)
    {
        //
    }
}
