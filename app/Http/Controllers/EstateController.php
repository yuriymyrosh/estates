<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstatesFormRequest;
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
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $regions = ['' => 'Оберіть район'];
        $regions = $regions + Region::all()->pluck('name', 'id')->toArray();

        $rooms = ['' => 'Оберіть кількість кімнат'];
        $rooms = $rooms + RoomOption::all()->pluck('name', 'id')->toArray();

        $estates = Estate::query();
        if ($region = $request->get('region')) {
            $estates = $estates->where('region_id', $region);
        }

        if ($room = $request->get('room')) {
            $estates = $estates->where('room_option_id', $room);
        }
        $estates = $estates->paginate(15);

        return view('estates.index', compact(
            'regions',
            'rooms',
            'request',
            'estates'
        ));
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
            'route' => 'estates.store',
            'method' => 'POST',
            'estate' => new Estate()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EstatesFormRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(EstatesFormRequest $request)
    {
        Estate::create($request->all());

        return redirect()->route('estates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estate $estate
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Estate $estate)
    {
        return view('estates.show', compact(
            'estate'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estate $estate
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Estate $estate)
    {
        $regions = ['' => 'Оберіть район'];
        $regions = $regions + Region::all()->pluck('name', 'id')->toArray();

        $rooms = ['' => 'Оберіть кількість кімнат'];
        $rooms = $rooms + RoomOption::all()->pluck('name', 'id')->toArray();

        return view('estates.form', [
            'title' => 'Редагувати квартиру',
            'regions' => $regions,
            'roomOptions' => $rooms,
            'route' => ['estates.update', $estate],
            'method' => 'PUT',
            'estate' => $estate
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EstatesFormRequest $request
     * @param  \App\Models\Estate $estate
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EstatesFormRequest $request, Estate $estate)
    {
        $estate->fill($request->all())->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estate $estate
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estate $estate)
    {
        $estate->delete();

        return redirect()->back();
    }
}
