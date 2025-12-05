@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
    <img src="{{ asset('storage/' . $product->image) }}" class="w-64 mb-4">

    <p class="text-lg text-green-600 font-semibold mb-4">
        {{ number_format($product->price) }} đ
    </p>

    <div class="mt-4">
        {!! nl2br(e($product->description)) !!}
    </div>
</div>
@endsection
