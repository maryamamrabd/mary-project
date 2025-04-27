@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-4 mt-16">
    <h1 class="text-2xl font-bold mb-4">Créer un Rendez-vous</h1>

    <form action="{{ route('appointments.store') }}" method="POST" class="space-y-4 rounded-lg shadow-md border p-4">
        @csrf
        <div>
            <label for="appointment_date" class="block font-medium">Date du Rendez-vous</label>
            <input type="datetime-local" name="appointment_date" id="appointment_date" class="w-full border p-2 rounded"
                required>
        </div>
        <div>
            <label for="notes" class="block font-medium">Notes (optionnel)</label>
            <textarea name="notes" id="notes" rows="4" class="w-full border p-2 rounded"></textarea>
        </div>
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Enregistrer le Rendez-vous</button>
        </div>
    </form>
</div>
@endsection
