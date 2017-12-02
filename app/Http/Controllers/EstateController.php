<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use App\Models\Region;
use App\Models\RoomOption;
use Illuminate\Http\Request;

class EstateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('estates.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = ['' => 'Оберіть район'];
        $regions = $regions + Region::all()->pluck('name', 'id')->toArray();

        $rooms = ['' => 'Оберіть кількість кімнат'];
        $rooms = $rooms + RoomOption::all()->pluck('name', 'id')->toArray();

        return view('estates.form', [
            'title' => 'Додати квартиру',
            'regions' => $regions,
            'roomOptions' => $rooms,
            'estate' => new Estate()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Estate::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estate $estate
     * @return \Illuminate\Http\Response
     */
    public function show(Estate $estate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estate $estate
     * @return \Illuminate\Http\Response
     */
    public function edit(Estate $estate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Estate $estate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estate $estate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estate $estate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estate $estate)
    {
        //
    }
}
