<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Device;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        // Crear 10 Customer con sus respectivos dispositivos.
        for ($i = 0; $i < 10; $i++) {
            $customer = new Customer();
            $customer->name = "Customer $i";
            $customer->level = rand(0, 5);
            $customer->address = "Address $i";
            $customer->save();

            // Agregar 1-2 dispositivos al Customer.
            for ($j = 0; $j < rand(1, 2); $j++) {
                $device = new Device();
                $device->brand_name = "Brand $i-$j";
                $device->model = "Model $i-$j";
                $customer->devices()->create($device->toArray());
            }
        }
    }
}