<!-- resources/views/products/index.blade.php -->

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Products</h1>

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Title</th>
                    <th class="py-2">Description</th>
                    <th class="py-2">Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="py-2">{{ $product->title }}</td>
                        <td class="py-2">{{ $product->description }}</td>
                        <td class="py-2">
                            @if ($product->image)
                                <img src="{{ url('product/' . $product->image) }}" alt="{{ $product->title }}" class="w-14 h-14 object-cover">
                            @endif
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</body>
</html>
