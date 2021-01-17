<?php

namespace App\Http\Controllers;

use App\Models\main;
use App\Models\hire;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $start = (!empty($_GET["start"]))? ($_GET["start"]): "";
            $end = (!empty($_GET["end"]))? ($_GET["end"]) : "";
            $data = hire::where('start','>=' , $start)->where('end','<=',$end)->get(['id','start','end', 'title','vehicle_id','driver_id']);
            return Response($data->toJson());
        }
        return view('main');
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
                return Redirect::back()->withErrors(['The Driver License Class not Compatible with this vehicle']);
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
        return Redirect::back()->withErrors(['The Driver License Class not Compatible with this vehicle']);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\main  $main
     * @return \Illuminate\Http\Response
     */
    public function show(main $main)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\main  $main
     * @return \Illuminate\Http\Response
     */
    public function edit(main $main)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\main  $main
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, main $main)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\main  $main
     * @return \Illuminate\Http\Response
     */
    public function destroy(main $main)
    {
        //
    }
}
