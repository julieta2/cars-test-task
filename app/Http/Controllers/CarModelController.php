<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarModelRequest;
use App\Http\Requests\UpdateCarModelRequest;
use App\Models\CarModel;

class CarModelController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  CarModelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarModelRequest $request)
    {
        $data = $request->all();

        $car_model = CarModel::create($data);

        return $car_model;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCarModelRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarModelRequest $request, $id)
    {
        $data = $request->all();
        $car_model = CarModel::find($id);

        $car_model->update($data);

        return $car_model;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = CarModel::find($id);

        $car->delete();
    }
}
