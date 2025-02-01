<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    public function testCustomerCanHaveMultipleDevices()
    {
        // Crear un customer.
        $customer = DB::table('customers')->create([
            'name' => 'John Doe',
            'level' => 3,
            'address' => '123 Main St.',
        ]);

        // Agregar varios dispositivos al customer.
        for ($i = 0; $i < 5; $i++) {
            DB::table('devices')->create([
                'customer_id' => $customer->id,
                'brand_name' => "Brand $i",
                'model' => "Model $i",
            ]);
        }

        // Verificar que el customer tenga varios dispositivos.
        $this->assertEquals(5, count(DB::table('devices')->where('customer_id', '=', $customer->id)->get()));
    }

    public function testCustomerCanHaveNoDevices()
    {
        // Crear un customer sin dispositivos.
        DB::table('customers')->create([
            'name' => 'Jane Doe',
            'level' => 3,
            'address' => '123 Main St.',
        ]);

        // Verificar que el customer no tenga dispositivos.
        $this->assertEquals(0, count(DB::table('devices')->where('customer_id', '=', DB::table('customers')->max('id'))->get()));
    }
}