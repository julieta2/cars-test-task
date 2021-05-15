<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Storage;
use App\Models\Car;
use App\Models\CarModel;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars_json = Storage::disk('local')->get('car-models.json');
        $cars = json_decode($cars_json, true);

        foreach ($cars as $car) {
            $car_brand = Car::create([
                'brand' => $car['brand'],
            ]);

            $models = [];
            foreach ($car['models'] as $model) {
                $car_model = new CarModel();
                $car_model->model = $model;
                $models[] = $car_model;
            }

            $car_brand->models()->saveMany($models);
        }
    }
}
