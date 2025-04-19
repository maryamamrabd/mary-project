@extends('layouts.app')


@section('content')
<div class=" mt-12">
    <h1 class="text-3xl font-bold text-center mb-8">Collection de Lunettes Haut de Gamme</h1>
    <!-- Filtres -->
    <div class="mt-8 bg-white p-4 rounded-lg shadow-sm border border-gray-300">
        <h3 class="text-lg font-semibold mb-4">Options de Filtrage</h3>
        <form method="GET" action="{{ route('home') }}" id="filterForm" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Categories</label>
                <select name="category" class="w-full border border-gray-300 rounded-md px-3 py-2"
                    onchange="document.getElementById('filterForm').submit();">
                    <option value="">Toutes les Formes</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category')==$category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Gamme de Prix</label>
                <select name="price_range" class="w-full border border-gray-300 rounded-md px-3 py-2"
                    onchange="document.getElementById('filterForm').submit();">
                    <option value="">Tous les Prix</option>
                    <option value="under_100" {{ request('price_range')=='under_100' ? 'selected' : '' }}>Moins de 100
                        MAD</option>
                    <option value="100_150" {{ request('price_range')=='100_150' ? 'selected' : '' }}>100 MAD - 150 MAD
                    </option>
                    <option value="over_150" {{ request('price_range')=='over_150' ? 'selected' : '' }}>Plus de 150 MAD
                    </option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Couleur de la Monture</label>
                <div class="flex space-x-2">
                    <button class="w-6 h-6 rounded-full bg-black"></button>
                    <button class="w-6 h-6 rounded-full bg-amber-800"></button>
                    <button class="w-6 h-6 rounded-full bg-green-600"></button>
                    <button class="w-6 h-6 rounded-full bg-red-500"></button>
                    <button class="w-6 h-6 rounded-full bg-blue-600"></button>
                    <button class="w-6 h-6 rounded-full bg-pink-300"></button>
                </div>
            </div>
        </form>

    </div>

    <div class="grid grid-cols-1 rounded-lg md:grid-cols-2 lg:grid-cols-3 gap-8 mt-6">
        <!-- Product 1 -->
        @foreach ($products as $product)
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
                    <span class="text-gray-500 text-sm">{{ $product->category->name }}</span>
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

    <!-- Pagination -->
    <div class="flex justify-center mt-8">
        {{ $products->links() }}
    </div>


    {{-- Influencer Picks Section --}}
    <div class="w-full max-w-full mx-auto">
        {{-- Title Section --}}
        <div class="w-full mt-6">
            <div class="w-full">
                <h2 class="text-2xl text-center text-gray-800 font-medium">Influencer Picks</h2>
            </div>
        </div>

        {{-- Text Section --}}
        <div class="w-full mt-3">
            <div class="w-full">
                <div class="w-full">
                    <p class="text-center text-lg text-gray-700">Obtenez une chance d'être présenté, veuillez nous
                        taguer
                        sur nos réseaux sociaux.</p>
                </div>
            </div>
        </div>

        {{-- Carousel Section --}}
        <div class="w-full mt-10 relative overflow-hidden">
            <div class="carousel-container w-full pb-10">
                <div class="swiper-wrapper flex">
                    {{-- Slide 1 --}}
                    <div class="swiper-slide w-1/5">
                        <div class="w-full">
                            <img src="https://df5apg8r0m634.cloudfront.net/images/2024/0103/ba0530a0439ea4af2fdd5b17025fce13.jpg"
                                class="w-full p-1" alt="Eyeglasses">
                        </div>
                    </div>

                    {{-- Slide 2 --}}
                    <div class="swiper-slide w-1/5">
                        <div class="w-full">
                            <img src="https://df5apg8r0m634.cloudfront.net/images/2024/0103/ef0cd677da305f83b788e00d6d1eda6d.jpg"
                                class="w-full p-1" alt="Sunglasses">
                        </div>
                    </div>

                    {{-- Slide 3 --}}
                    <div class="swiper-slide w-1/5">
                        <div class="w-full">
                            <img src="https://df5apg8r0m634.cloudfront.net/images/2024/0103/2035b3fd8e094946274816d1a7c64420.jpg"
                                class="w-full p-1" alt="Eyeglasses">
                        </div>
                    </div>

                    {{-- Slide 4 --}}
                    <div class="swiper-slide w-1/5">
                        <div class="w-full">
                            <img src="https://df5apg8r0m634.cloudfront.net/images/2024/0103/9b1a0f2b5f16014fcd712e2a48bcfd6e.jpg"
                                class="w-full p-1" alt="Sunglasses">
                        </div>
                    </div>

                    {{-- Slide 5 --}}
                    <div class="swiper-slide w-1/5">
                        <div class="w-full">
                            <img src="https://df5apg8r0m634.cloudfront.net/images/2024/0103/18cbd5718b49ec841e448acc834475f8.jpg"
                                class="w-full p-1" alt="Eyeglasses">
                        </div>
                    </div>

                    {{-- Slide 6 --}}
                    <div class="swiper-slide w-1/5">
                        <div class="w-full">
                            <img src="https://df5apg8r0m634.cloudfront.net/images/2024/0103/9a3d5c9e21e72d5620df3f32957ea9ea.jpg"
                                class="w-full p-1" alt="Sunglasses">
                        </div>
                    </div>

                    {{-- Slide 7 --}}
                    <div class="swiper-slide w-1/5">
                        <div class="w-full">
                            <img src="https://df5apg8r0m634.cloudfront.net/images/2024/0103/b2c92110492fb38a91ed877ee6045d4c.jpg"
                                class="w-full p-1" alt="Eyeglasses">
                        </div>
                    </div>

                    {{-- Slide 8 --}}
                    <div class="swiper-slide w-1/5">
                        <div class="w-full">
                            <img src="https://df5apg8r0m634.cloudfront.net/images/2024/0103/30be1253c6b2627142ad5b4a8c5edb83.jpg"
                                class="w-full p-1" alt="Sunglasses">
                        </div>
                    </div>

                    {{-- Slide 9 --}}
                    <div class="swiper-slide w-1/5">
                        <div class="w-full">
                            <img src="https://df5apg8r0m634.cloudfront.net/images/2024/0103/ae5a5dd1190a9c697d5cf6ae526f022b.jpg"
                                class="w-full p-1" alt="Eyeglasses">
                        </div>
                    </div>

                    {{-- Slide 10 --}}
                    <div class="swiper-slide w-1/5">
                        <div class="w-full">
                            <img src="https://df5apg8r0m634.cloudfront.net/images/2024/0103/7628ca3a5c3a9cce501c8c418c74ddf2.jpg"
                                class="w-full p-1" alt="Eyeglasses">
                        </div>
                    </div>
                </div>

                {{-- Pagination --}}
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
                new Swiper('.carousel-container', {
                    loop: false,
                    autoplay: {
                        delay: 2000,
                        disableOnInteraction: false // Optional: keeps autoplay running after user interaction
                    },
                    slidesPerView: 5,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true
                    },
                    // Responsive breakpoints for mobile/tablet
                    breakpoints: {
                        // When window width is <= 640px (mobile)
                        640: {
                            slidesPerView: 2,
                        },
                        // When window width is <= 768px (tablet)
                        768: {
                            slidesPerView: 3,
                        },
                        // When window width is <= 1024px (small desktop)
                        1024: {
                            slidesPerView: 4,
                        },
                    }
                });
            });
    </script>



</div>
@endsection
