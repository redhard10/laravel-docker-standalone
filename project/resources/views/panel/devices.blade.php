@extends('layouts.app')

<x-panel>
    <x-slot name="header">
        Devices
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($devices as $device)
                        <h2>Dispositivo {{ $loop->iteration }}:</h2>
                        <p>Brand: {{ $device->brand_name }}</p>
                        <p>Model: {{ $device->model }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-panel>