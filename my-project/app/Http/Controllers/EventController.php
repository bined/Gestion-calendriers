<?php

namespace App\Http\Controllers;

use App\Models\Calender;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('events.index', ['data' => Event::orderByDesc('id')->get()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $calenders = Calender::select('id', 'title')->get();
        return view('events.create', ['calenders' => $calenders]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeEvent = new Event();
        $storeEvent->title = $request->title;
        $storeEvent->description = $request->description;
        $storeEvent->start_date = Carbon::parse($request->start_date);
        $storeEvent->end_date = Carbon::parse($request->end_date);
        $storeEvent->calender_id = $request->calender;
        $storeEvent->save();

        return redirect(route('event.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calenders = Calender::select('id', 'title')->get();
        return view('events.edit', ['item' => Event::find($id), 'calenders' => $calenders]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $storeEvent = Event::find($id);;
        $storeEvent->title = $request->title;
        $storeEvent->description = $request->description;
        $storeEvent->start_date = Carbon::parse($request->start_date);
        $storeEvent->end_date = Carbon::parse($request->end_date);
        $storeEvent->calender_id = $request->calender;
        $storeEvent->save();

        return redirect(route('event.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::find($id)->delete();
        return redirect(route('event.index'));
    }
}
