@extends('layouts.app')

<x-panel>
    <x-slot name="header">
        Edit Customer
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form>
                        @csrf

                        <h2>Customer Information</h2>

                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full md:w-1/2 xl:w-1/3 px-3 mb-6 md:mb-0">
                                <label for="name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Name</label>
                                <input type="text" id="name" name="name" value="{{ $customer->name }}" placeholder="Name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            </div>

                            <div class="w-full md:w-1/2 xl:w-1/3 px-3 mb-6 md:mb-0">
                                <label for="level" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Level</label>
                                <input type="number" id="level" name="level" value="{{ $customer->level }}" placeholder="Level" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            </div>

                            <div class="w-full md:w-1/2 xl:w-1/3 px-3 mb-6 md:mb-0">
                                <label for="address" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Address</label>
                                <input type="text" id="address" name="address" value="{{ $customer->address }}" placeholder="Address" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            </div>
                        </div>

                        <h2>Device Information</h2>

                        @foreach($devices as $device)
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 xl:w-1/3 px-3">
                                    <label for="brand_name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Brand Name</label>
                                    <input type="text" id="brand_name" name="brand_name" value="{{ $device->brand_name }}" placeholder="Brand Name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                </div>

                                <div class="w-full md:w-1/2 xl:w-1/3 px-3">
                                    <label for="model" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Model</label>
                                    <input type="text" id="model" name="model" value="{{ $device->model }}" placeholder="Model" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                </div>
                            </div>
                        @endforeach

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-panel>