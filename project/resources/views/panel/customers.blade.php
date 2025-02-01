@extends('layouts.app')

<x-panel> 
    <x-slot name="header">
        Customers
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($customers as $customer)
                        <h2>{{ $customer->name }}</h2>
                        <ul>
                            @foreach($customer->devices as $device)
                                <li>Device {{ $loop->iteration }}: {{ $device->brand_name }} {{ $device->model }}</li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-panel>