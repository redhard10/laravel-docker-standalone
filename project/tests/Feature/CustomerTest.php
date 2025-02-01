<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\Models\Customer;
use App\Models\Device;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    public function testCustomerCanHaveMultipleDevices()
    {
        // Crear un customer.
        $customer = Customer::create([
            'name' => 'John Doe',
            'level' => 3,
            'address' => '123 Main St.',
        ]);

        // Agregar varios dispositivos al customer.
        for ($i = 0; $i < 5; $i++) {
            Device::create([
                'customer_id' => $customer->id,
                'brand_name' => "Brand {$i}",
                'model' => "Model {$i}",
            ]);
        }

        // Verificar que el customer tenga varios dispositivos.
        $this->assertEquals(5, $customer->devices()->count());
    }

    public function testCustomerCanHaveNoDevices()
    {
        // Crear un customer sin dispositivos.
        Customer::create([
            'name' => 'Jane Doe',
            'level' => 3,
            'address' => '123 Main St.',
        ]);

        // Verificar que el customer no tenga dispositivos.
        $customer = Customer::all()->last();
        $this->assertEquals(0, $customer->devices()->count());
    }
}