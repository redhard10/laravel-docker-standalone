<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Customer;
use App\Models\Device;

class UsersListCommand extends Command
{
    protected $signature = 'users:list';

    public function handle()
     {
         $customers = Customer::all();

        foreach ($customers as $customer) 
        {
            echo "Nombre: {$customer->name}\n";
            
            if (count($customer->devices) > 0)
            {
                echo "  Dispositivos\n";
                
                $index = 1;
                foreach ($customer->devices as $device)
                {
                    echo "      $index. {$device->brand_name}\n";
                    $index++;
                }
            } 
            else
            {
                echo "  No tiene dispositivos.\n";
            }
        }
     }
}
