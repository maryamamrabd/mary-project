@extends('layouts.app')


@section('content')
<div class="conatiner mt-14">
    <h1 class="text-3xl font-bold text-center mb-8">Nos catégories de Lunettes</h1>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 ">
        @foreach ($categories as $category)
        <div>
            <a href="{{ route("category.show", $category->id) }}">
                <img class="h-auto max-w-full rounded-lg shadow-sm" src="{{ Storage::url($category->image) }}" alt="">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
