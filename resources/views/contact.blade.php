@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-lg bg-white p-8 rounded-2xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Contactez-nous</h2>

        @if (session('success'))
        <div class="mb-4 text-green-600">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
            @csrf

            <div>
                <label for="full_name" class="block text-sm font-medium text-gray-700">Nom complet</label>
                <input id="full_name" name="full_name" type="text" required value="{{ old('full_name') }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
                <input id="email" name="email" type="email" required value="{{ old('email') }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea id="message" name="message" rows="4" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('message') }}</textarea>
            </div>

            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-xl transition">Envoyer le
                message</button>
        </form>
    </div>
</div>
@endsection
