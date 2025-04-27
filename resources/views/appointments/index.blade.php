@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6 mt-16">
    <h1 class="text-3xl font-bold mb-6 text-center">Mes Rendez-vous</h1>

    @if (session('success'))
    <div class="mb-6 p-4 bg-green-100 text-green-700 rounded">
        {{ session('success') }}
    </div>
    @endif

    @if ($appointments->isEmpty())
    <div class="text-center text-gray-500">
        Vous n'avez pas encore de rendez-vous.
    </div>
    @else
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="py-3 px-6 text-left">Date</th>
                    <th class="py-3 px-6 text-left">Statut</th>
                    <th class="py-3 px-6 text-left">Notes</th>
                    <th class="py-3 px-6 text-left">Créé le</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($appointments as $appointment)
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-3 px-6">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y, H:i')
                        }}</td>
                    <td class="py-3 px-6">
                        @if ($appointment->status === 'En attente')
                        <span class="px-2 py-1 text-sm bg-yellow-100 text-yellow-700 rounded-full">En attente</span>
                        @elseif ($appointment->status === 'Confirmé')
                        <span class="px-2 py-1 text-sm bg-green-100 text-green-700 rounded-full">Confirmé</span>
                        @else
                        <span class="px-2 py-1 text-sm bg-red-100 text-red-700 rounded-full">Annulé</span>
                        @endif
                    </td>
                    <td class="py-3 px-6">{{ $appointment->notes ?? '-' }}</td>
                    <td class="py-3 px-6">{{ $appointment->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
