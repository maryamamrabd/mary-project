<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تفاصيل المنتج</title>
</head>
<body>
    <h1>{{ $product['name'] }}</h1>
    <p>السعر: {{ $product['price'] }} درهم</p>
    <p>{{ $product['description'] }}</p>
    <form action="{{ route('cart.store') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $product['id'] }}">
        <input type="hidden" name="name" value="{{ $product['name'] }}">
        <input type="hidden" name="price" value="{{ $product['price'] }}">
        <button type="submit">إضافة إلى السلة</button>
    </form>
</body>
</html>