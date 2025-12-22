<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Boutique Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-50 p-6 md:p-12">

    <div class="max-w-5xl mx-auto">
        <h1 class="text-3xl font-serif mb-8 text-stone-800 text-center">Admin Dashboard</h1>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1">
                <form action="/admin/products" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200">
                    @csrf
                    <h2 class="text-lg font-bold mb-4">Upload New Item</h2>
                    
                    <input type="text" name="name" placeholder="Product Name" class="w-full border-b p-2 mb-4 outline-none focus:border-black" required>
                    <input type="number" name="price" placeholder="Price" class="w-full border-b p-2 mb-4 outline-none focus:border-black" required>
                    <textarea name="description" placeholder="Description" class="w-full border-b p-2 mb-4 outline-none focus:border-black"></textarea>
                    
                    <label class="block text-xs text-stone-400 mb-1 uppercase">Product Photo</label>
                    <input type="file" name="image" class="w-full text-sm mb-6" required>

                    <button type="submit" class="w-full bg-stone-900 text-white py-3 rounded-xl hover:bg-black transition">PUBLISH ITEM</button>
                </form>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200">
                    <h2 class="text-lg font-bold mb-4">Active Collection</h2>
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-xs uppercase text-stone-400 border-b">
                                <th class="pb-2">Item</th>
                                <th class="pb-2">Posted Date</th>
                                <th class="pb-2 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @foreach($products as $product)
                            <tr class="border-b">
                                <td class="py-3 font-medium">{{ $product->name }}</td>
                                <td class="py-3 text-stone-500">{{ $product->created_at->format('M d, Y') }}</td>
                                <td class="py-3 text-right">
                                    <form action="/admin/products/{{ $product->id }}" method="POST" onsubmit="return confirm('Remove this from the shop?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:font-bold">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-12 bg-white p-6 rounded-2xl shadow-sm border border-stone-200">
            <h2 class="text-lg font-bold mb-4 text-stone-800 text-center">Customer Order List</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-xs uppercase text-stone-400 border-b">
                            <th class="pb-2">Order Date</th>
                            <th class="pb-2">Product Name</th>
                            <th class="pb-2">Customer Details</th>
                            <th class="pb-2">Contact</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        @forelse($orders as $order)
                        <tr class="border-b hover:bg-stone-50">
                            <td class="py-4 text-stone-500 italic">{{ $order->created_at->format('M d, h:i A') }}</td>
                            <td class="py-4 font-bold">{{ $order->product_name }}</td>
                            <td class="py-4">
                                <div class="font-bold uppercase tracking-tighter">{{ $order->customer_name }}</div>
                                <div class="text-xs text-stone-500">{{ $order->address }}</div>
                            </td>
                            <td class="py-4 text-green-600 font-bold">
                                <a href="https://wa.me/{{ $order->contact }}" target="_blank">
                                    Chat: {{ $order->contact }}
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="py-10 text-center text-stone-400">No orders received yet.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>