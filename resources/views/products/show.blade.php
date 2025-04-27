@extends('layouts.app')

@section('content')
<section class="py-12 bg-gray-50 dark:bg-gray-900 antialiased">
    <div class="max-w-screen-xl px-4 mx-auto">
        <div class="mb-6">
            <!-- Fil d’Ariane -->
            <nav class="text-sm text-gray-600" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 font-semibold">
                    <li><a href="/" class="hover:underline">Accueil</a></li>
                    <li>/</li>
                    <li><a href="{{ route('products.index') }}" class="hover:underline">Produits</a></li>
                    <li>/</li>
                    <li class="text-gray-800 dark:text-gray-200">{{ $product->name }}</li>
                </ol>
            </nav>
        </div>

        <div class="grid gap-8 lg:grid-cols-2">
            <!-- Images -->
            <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm">
                    @foreach ($product->images as $image)
                        <img class="w-full rounded-lg" src="{{ Storage::url($image->path) }}" alt="{{ $product->name }}" />
                    @endforeach
                <!-- Vignettes -->
                {{-- <div class="flex gap-2 mt-4">
                    @foreach([1,2,3,4] as $thumb)
                    <button class="w-16 h-16 border rounded-lg overflow-hidden hover:ring-2 hover:ring-blue-500">
                        <img src="https://via.placeholder.com/150?text=Img+{{ $thumb }}" alt="Vignette {{ $thumb }}">
                    </button>
                    @endforeach
                </div> --}}
            </div>

            <!-- Détails -->
            <div class="space-y-6">
                <!-- Titre & Prix -->
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white">{{ $product->name }}</h1>

                    <div class="flex gap-2 justify-between">
                        <div>
                            <p class="mt-2 text-2xl text-blue-600 font-semibold">
                                {{ number_format($product->price, 2) }} MAD
                            </p>
                            <p class="mt-1 text-sm text-green-600 font-medium">En stock</p>
                        </div>
                        <div class="flex items-center">
                            <div class="flex items-center">
                                @for ($i = 0; $i < 5; $i++) <svg
                                    class="w-5 h-5 {{ $i < 4 ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.966a1 1 0 00.95.69h4.17c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.967c.3.921-.755 1.688-1.54 1.118L10 13.347l-3.381 2.456c-.784.57-1.838-.197-1.539-1.118l1.286-3.967a1 1 0 00-.364-1.118L2.622 9.393c-.783-.57-.38-1.81.588-1.81h4.17a1 1 0 00.95-.69l1.286-3.966z" />
                                    </svg>
                                    @endfor
                            </div>
                            <span class="ml-2 text-sm text-gray-600">(4,8)</span>
                        </div>
                    </div>

                </div>

                <!-- Description -->
                <div class="prose dark:prose-dark max-w-none">
                    {!! nl2br(e($product->description)) !!}
                </div>

                <!-- Actions -->
                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="flex flex-col sm:flex-row sm:space-x-4 space-y-3 sm:space-y-0">
                    @csrf
                    <input id="quantity" name="quantity" type="number" value="1" min="1"
                        class="w-20 p-2 text-center border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-700 dark:text-white" />
                    <button type="submit"
                        class="w-full inline-flex justify-center items-center px-5 py-3 border border-transparent text-sm font-medium rounded-lg bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 text-white">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4"></path>
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                        </svg>
                        Ajouter au panier
                    </button>
                    <button
                        class="w-full inline-flex justify-center items-center px-5 py-3 border border-gray-300 rounded-lg bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 text-gray-700 ">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M20.8 4.6a5.6 5.6 0 00-7.9 0L12 5.5l-1-1a5.6 5.6 0 00-7.9 7.9l1 1L12 21l7.9-7.9 1-1a5.6 5.6 0 000-7.9z" />
                        </svg>
                        Ajouter aux favoris
                    </button>
                </form>

                <!-- Livraison & Retours -->
                <div class="text-sm text-gray-600">
                    <p>🚚 Livraison standard gratuite dès 50 € d’achat</p>
                    <p>🔄 Retour possible sous 30 jours</p>
                </div>

                <!-- Tags & Partage -->
                <div class="flex flex-wrap items-center space-x-2 text-sm text-gray-500">
                    <span>Tags :</span>
                    @foreach($categories as $category)
                    <a href="#" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">
                        {{ $category->name }}
                    </a>
                    @endforeach
                    <div class="ml-auto flex space-x-3">
                        <a href="#" aria-label="Partager sur Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Partager sur Facebook"><i class="fab fa-facebook"></i></a>
                        <a href="#" aria-label="Partager sur Pinterest"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>

                <hr class="my-6 border-gray-200 dark:border-gray-700" />



                <!-- Plus de détails -->
                <a href=""
                    class="inline-block mt-4 text-sm font-medium text-blue-600 hover:underline">
                    Voir les spécifications complètes &rarr;
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
