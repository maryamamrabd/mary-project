@extends('layouts.app')


@section('content')
<div class=" mt-12">
    <h1 class="text-3xl font-bold text-center mb-8">Collection de {{ $category->name }}</h1>
    <div class="grid grid-cols-1 rounded-lg md:grid-cols-2 lg:grid-cols-3 gap-8 mt-6">
        <!-- Product 1 -->
        @foreach ($category->products as $product)
        <div class="bg-white overflow-hidden transition duration-300 hover:shadow-xl">
            <div class="relative">
                {{-- <div class="absolute top-2 left-2 bg-red-500 text-white text-xs px-2 py-1 rounded-full font-bold">
                    -69%
                </div> --}}
                <img src="{{ Storage::url($product->images?->first()?->path) }}" alt="{{ $product->name }}"
                    class="w-full h-64 object-contain p-4" />
                <button class="absolute top-2 right-2 text-blue-500 hover:text-blue-700">
                    <i class="far fa-heart text-xl"></i>
                </button>
            </div>

            <div class="p-4">
                <div class="flex justify-between items-center mb-3">
                    <h2 class="text-lg font-semibold">{{ $product->name }}</h2>
                    <span class="text-gray-500 text-sm">{{ $category->name }}</span>
                </div>

                <div class="flex space-x-2 mb-4">
                    <span class="w-5 h-5 rounded-full bg-green-500 border border-gray-300"></span>
                    <span class="w-5 h-5 rounded-full bg-amber-700 border border-gray-300"></span>
                    <span class="w-5 h-5 rounded-full bg-black border border-gray-300"></span>
                    <span class="w-5 h-5 rounded-full bg-pink-300 border border-gray-300"></span>
                    <span class="w-5 h-5 rounded-full bg-red-500 border border-gray-300"></span>
                </div>

                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-xl font-bold">{{ $product->price }} MAD</span>
                        <span class="text-gray-500 line-through text-sm ml-2">599 MAD</span>
                    </div>
                    <a href="{{ route('products.show', $product->id) }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm transition font-semibold">
                        Voir Plus
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
