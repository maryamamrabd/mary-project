<!-- resources/views/cart/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 mt-6">
    <h1 class="text-2xl font-bold mb-6">Panier d'Achat</h1>

    <div class="flex flex-col md:flex-row gap-6">
        <!-- Partie panier -->
        <div class="w-full md:w-2/3">
            @if(Gloudemans\Shoppingcart\Facades\Cart::count() > 0)
            <div class="bg-white border rounded-lg shadow-sm overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Produit
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Quantité
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Sous-total
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach(Gloudemans\Shoppingcart\Facades\Cart::content() as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    @if(isset($item->options['image']))
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10  object-contain"
                                            src="{{ Storage::url($item->options['image']) }}" alt="{{ $item->name }}">
                                    </div>
                                    @endif
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $item->name }}</div>
                                        @if(isset($item->options['description']))
                                        <div class="text-sm text-gray-500">{{ $item->options['description'] }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <form action="{{ route('cart.update', $item->rowId) }}" method="POST"
                                    class="flex items-center">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" name="decrease" value="1"
                                        class="text-gray-500 focus:outline-none focus:text-gray-600 p-1">
                                        <svg class="h-4 w-4" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                            <path d="M20 12H4"></path>
                                        </svg>
                                    </button>
                                    <input type="number" name="quantity" value="{{ $item->qty }}" min="1"
                                        class="mx-2 border border-gray-300 p-1 w-14 rounded text-center focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <button type="submit" name="increase" value="1"
                                        class="text-gray-500 focus:outline-none focus:text-gray-600 p-1">
                                        <svg class="h-4 w-4" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                            <path d="M12 4v16m8-8H4"></path>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ number_format($item->subtotal, 2) }} MAD
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <form action="{{ route('cart.remove', $item->rowId) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 focus:outline-none">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="bg-gray-50">
                            <td colspan="2" class="px-6 py-4 text-right font-bold">Total</td>
                            <td class="px-6 py-4 text-sm font-bold text-gray-900">{{
                                number_format(Gloudemans\Shoppingcart\Facades\Cart::total(), 2) }} MAD</td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="mt-6">
                <a href="{{ route('products.index') }}"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-600 font-semibold py-2 px-4 rounded">
                    Continuer mes achats
                </a>
            </div>
            @else
            <div class="text-center py-8 bg-white border rounded-lg shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <h2 class="mt-2 text-lg font-medium text-gray-900">Votre panier est vide</h2>
                <p class="mt-1 text-sm text-gray-500">Commencez vos achats pour ajouter des articles à votre panier.</p>
                <div class="mt-6">
                    <a href="{{ route('products.index') }}"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Voir les produits
                    </a>
                </div>
            </div>
            @endif
        </div>

        <!-- Formulaire de commande -->
        @if(Gloudemans\Shoppingcart\Facades\Cart::count() > 0)
        <div class="w-full md:w-1/3 mt-6 md:mt-0">
            <div class="bg-white border rounded-lg shadow-sm p-6">
                <h2 class="text-lg font-semibold mb-4">Finaliser votre commande</h2>

                <form action="{{ route('cart.process') }}" method="POST">
                    @csrf

                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nom complet</label>
                            <input type="text" name="name" id="name" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
                            <input type="email" name="email" id="email" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Numéro de
                                téléphone</label>
                            <input type="tel" name="phone" id="phone" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">Ville</label>
                            <input type="text" name="city" id="city" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>

                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Adresse de livraison</label>
                            <textarea name="address" id="address" rows="3" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                        </div>

                    </div>

                    <div class="mt-6">
                        <div class="bg-gray-50 p-4 rounded-md">
                            <div class="flex justify-between font-semibold">
                                <span>Total</span>
                                <span>{{ number_format(Gloudemans\Shoppingcart\Facades\Cart::total() + 30, 2) }}
                                    MAD</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-4 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Passer la commande
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
