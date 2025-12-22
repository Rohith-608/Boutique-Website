<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-50 p-10">
    <div class="max-w-md mx-auto bg-white p-8 rounded-2xl shadow-lg">
        <h2 class="text-2xl font-serif mb-6">Customer Details</h2>
        <form action="/place-order" method="POST">
            @csrf
            <input type="hidden" name="product_name" value="{{ $product->name }}">
            
            <div class="space-y-4">
                <div>
                    <label class="text-xs uppercase text-gray-500">Full Name</label>
                    <input type="text" name="customer_name" class="w-full border-b p-2 outline-none" required>
                </div>
                <div>
                    <label class="text-xs uppercase text-gray-500">Contact Number</label>
                    <input type="text" name="contact" class="w-full border-b p-2 outline-none" required>
                </div>
                <div>
                    <label class="text-xs uppercase text-gray-500">Shipping Address</label>
                    <textarea name="address" class="w-full border-b p-2 outline-none" required></textarea>
                </div>
            </div>

            <button type="submit" class="w-full mt-8 bg-black text-white py-3 rounded-lg hover:bg-stone-800 transition">
                CONFIRM ORDER
            </button>
        </form>
    </div>
</body>
</html>