<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Http\Requests\CarsRequest;
use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  CarsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(CarsRequest $request)
    {
        $per_page = $request->get('per_page');

        $cars = Car::orderBy('created_at', 'desc')->paginate($per_page);

        return $cars;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request)
    {
        $data = $request->all();

        return Car::create([
           'brand' => $data['brand']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $data = $request->all();
        $search_string = $data['q'] ?? '';
        $car = Car::with(['models' => function ($query) use ($search_string) {
            $query->where('model', 'like', '%'.$search_string.'%');
        }])->find($id);

        return $car;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CarRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarRequest $request, $id)
    {
        $data = $request->all();
        $car = Car::find($id);
        $car->update([
            'brand' => $data['brand']
        ]);

        return $car;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);

        $car->models()->delete();

        $car->delete();
    }
}
