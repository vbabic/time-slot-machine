<?php

namespace App\Http\Controllers;

use App\Slot;
use Input;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slot.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $time_start = Slot::prepare_date($request->start_date, $request->start_time);
        $time_end = Slot::prepare_date($request->end_date, $request->end_time);
        
        Slot::create_slots($time_start, $time_end, 900);

        return 'DONE!';
    }


    public function list(Request $request)
    {
        $start = $request->get('start', 1);
        $end = $request->get('end', 1);



        $list = Slot::where('start', '>=', $start)->where('end', '<=', $end)->get();


        
        return view('slot.list', ['list' => $list]);
    }

    public function filter(Request $request)
    {
        $time_start = Slot::prepare_to_filter(Slot::prepare_date($request->start_date, $request->start_time));
        $time_end = Slot::prepare_to_filter(Slot::prepare_date($request->end_date, $request->end_time));
        return redirect()->route('slot.list', ['start' => $time_start, 'end' => $time_end]);
    }

    public function show(Slot $slot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function edit(Slot $slot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slot $slot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slot $slot)
    {
        //
    }
}
