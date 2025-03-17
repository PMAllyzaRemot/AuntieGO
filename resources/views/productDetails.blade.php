@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-12 bg-white shadow-lg rounded-lg">
    <!-- Navigation -->
    <div class="flex justify-between items-center bg-green-900 text-white px-6 py-4 rounded-md">
        <div class="flex space-x-6">
            <a href="#" class="hover:underline">Furniture</a>
            <a href="#" class="hover:underline">Painting</a>
            <a href="#" class="hover:underline">Kitchenware</a>
        </div>
        <div class="text-xl font-bold">AUNTIE GO</div>
        <div class="flex space-x-4">
            <button>🔍</button>
            <button>🛒</button>
            <button>👤</button>
        </div>
    </div>

    <!-- Product Details -->
    <div class="grid md:grid-cols-2 gap-8 mt-8 bg-gray-100 p-8 rounded-lg shadow-lg">
        <!-- Left Side: Description -->
        <div>
            <h3 class="text-gray-700 text-lg font-semibold">Furniture</h3>
            <h1 class="text-4xl font-bold text-gray-900 mt-2">Victorian Chair</h1>
            <p class="text-2xl font-semibold text-gray-700 mt-2">Php 18,000</p>

            <p class="text-gray-600 mt-4">
                Victorian furniture is characterized by ornate carvings, dark woods, and heavy luxurious fabrics. It is traditionally made from mahogany, rosewood, or walnut, sometimes painted or gilded.
            </p>

            <!-- Buttons -->
            <div class="mt-6 flex space-x-4">
                <button class="bg-green-700 text-white px-6 py-3 rounded-md shadow-md hover:bg-green-800">
                    Buy Now
                </button>
                <button class="border border-green-700 text-green-700 px-6 py-3 rounded-md shadow-md hover:bg-green-100">
                    Add To Cart
                </button>
            </div>
        </div>

        <!-- Right Side: Image -->
        <div class="flex justify-center">
            <img src="https://via.placeholder.com/300x400/FFFFFF/CCCCCC?text=Victorian+Chair" 
                 alt="Victorian Chair" class="w-72 h-auto rounded-lg shadow-md">
        </div>
    </div>

    <!-- Product Specifications -->
    <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
        <div class="grid grid-cols-2 md:grid-cols-3 gap-6 text-gray-700">
            <div>
                <span class="font-semibold">Availability:</span> One Available
            </div>
            <div>
                <span class="font-semibold">Location:</span> Camalig, Albay
            </div>
            <div>
                <span class="font-semibold">Sold as:</span> Single
            </div>
            <div>
                <span class="font-semibold">Size:</span> 500m x 100m
            </div>
            <div>
                <span class="font-semibold">Weight:</span> 50kg
            </div>
            <div>
                <span class="font-semibold">Composition:</span> Redwood
            </div>
            <div>
                <span class="font-semibold">Color:</span> Red, Dark Brown
            </div>
        </div>
    </div>
</div>
@endsection