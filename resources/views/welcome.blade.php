<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique Collection</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .serif { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-white text-stone-900">

    <nav class="flex justify-between items-center px-10 py-6 border-b border-stone-100">
        <h1 class="serif text-2xl font-bold tracking-tighter">KSM Enterprises</h1>
        <div class="space-x-8 text-sm uppercase tracking-widest font-medium">
            <a href="#" class="hover:text-stone-500">New Arrivals</a>
            <a href="#" class="hover:text-stone-500">Collection</a>
            <a href="/cart" class="hover:text-stone-500">Cart (0)</a>
        </div>
    </nav>

    <header class="py-16 text-center bg-stone-50">
        <span class="uppercase tracking-[0.3em] text-xs text-stone-500 mb-4 block">Handpicked Metrials</span>
        <h2 class="serif text-5xl md:text-7xl mb-6">KSM Garments and Fancy Store</h2>
        <p class="text-stone-500 max-w-md mx-auto leading-relaxed">Discover a curated selection of timeless pieces designed for the modern woman.</p>
    </header>

    <main class="container mx-auto px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-12">
            
            @forelse($products as $product)
                <div class="group cursor-pointer">
                    <div class="relative overflow-hidden aspect-[3/4] bg-stone-200">
                        <img src="{{ asset('images/' . $product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        
                        <div class="absolute bottom-0 left-0 w-full p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white/80 backdrop-blur-sm">
                            <form action="/checkout/{{ $product->id }}" method="GET">
                                <button class="w-full py-2 bg-stone-900 text-white text-xs uppercase tracking-widest">
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="mt-4 flex justify-between items-start">
                        <div>
                            <h3 class="text-sm font-medium text-stone-800">{{ $product->name }}</h3>
                            <p class="text-[10px] text-stone-400 uppercase tracking-widest mt-1">
                                Posted: {{ $product->created_at->diffForHumans() }} </p>
                        </div>
                        <span class="text-sm font-semibold">${{ number_format($product->price, 2) }}</span>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <p class="text-stone-400 italic serif text-xl">New collection arriving soon...</p>
                </div>
            @endforelse

        </div>
    </main>

    <footer class="border-t border-stone-100 py-12 text-center text-xs text-stone-400 uppercase tracking-[0.2em]">
        &copy; 2025 Boutique Shop. All Rights Reserved.
    </footer>

</body>
</html>