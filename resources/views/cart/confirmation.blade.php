<!-- resources/views/checkout/confirmation.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 mt-6">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-sm border p-6">
        <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-16 w-16 text-green-500" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>

            <h1 class="mt-4 text-2xl font-bold text-gray-900">Merci pour votre commande!</h1>
            <p class="mt-2 text-gray-600">Votre commande a été reçue et est en cours de traitement.</p>

            <div class="mt-6 border-t border-b border-gray-200 py-4">
                <p class="text-gray-700">Numéro de commande: <span class="font-semibold">{{ $order->id }}</span></p>
                <p class="text-gray-700 mt-1">Date: <span class="font-semibold">{{ $order->created_at->format('d/m/Y')
                        }}</span></p>
                <p class="text-gray-700 mt-1">Montant total: <span class="font-semibold">{{ number_format($order->total,
                        2) }} MAD</span></p>
                <p class="text-gray-700 mt-1">Mode de paiement: <span class="font-semibold">
                        @if($order->payment_method == 'cash')
                        Paiement à la livraison
                        @elseif($order->payment_method == 'card')
                        Carte bancaire
                        @elseif($order->payment_method == 'transfer')
                        Virement bancaire
                        @endif
                    </span></p>
            </div>

            <div class="mt-6">
                <h2 class="text-lg font-semibold">Récapitulatif de la commande</h2>
                <div class="mt-4 space-y-3">
                    @foreach($order->orderItems as $item)
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <span class="text-gray-800 font-medium">{{ $item->product->name }}</span>
                            <span class="text-gray-500 ml-2">x {{ $item->quantity }}</span>
                        </div>
                        <span class="text-gray-800">{{ number_format($item->product->price, 2) }} MAD</span>
                    </div>
                    @endforeach
                </div>

                <div class="mt-6 border-t border-gray-200 pt-4">
                    {{-- <div class="flex justify-between items-center">
                        <span class="text-gray-600">Sous-total</span>
                        <span class="text-gray-800">{{ number_format($order->subtotal, 2) }} MAD</span>
                    </div> --}}
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-gray-600">Frais de livraison</span>
                        <span class="text-gray-800">{{ number_format($order->shipping_cost, 2) }} MAD</span>
                    </div>
                    <div class="flex justify-between items-center mt-2 font-semibold">
                        <span>Total</span>
                        <span>{{ number_format($order->total, 2) }} MAD</span>
                    </div>
                </div>
            </div>

            <div class="mt-8">
                <a href="{{ route('products.index') }}"
                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Continuer vos achats
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
