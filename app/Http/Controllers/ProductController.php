<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order; // This line is crucial

class ProductController extends Controller
{
    // Fixes the error on your homepage (The Winter Edit page)
    public function index()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }

    // Fixes the "Undefined variable $orders" error in your admin page
    public function showAdmin()
    {
        $products = Product::all();
        $orders = Order::all(); // Fetches orders from database
        return view('upload', compact('products', 'orders'));
    }

    // Saves the new product the owner uploads
    public function store(Request $request)
    {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return back()->with('success', 'Product uploaded!');
    }

    public function checkout($id)
    {
        $product=\App\Models\Product::findOrFail($id);
        return view('checkout', compact('product'));
    }

    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        if(file_exists(public_path('images/'.$product->image))){
            unlink(public_path('images/'.$product->image));
        }
        $product->delete();
        return back()->with('success','Item removed from boutique.');
    }

    // Saves the customer's checkout details
    public function placeOrder(Request $request)
    {
        Order::create([
            'product_name' => $request->product_name,
            'customer_name' => $request->customer_name,
            'contact' => $request->contact,
            'address' => $request->address,
        ]);

        return redirect('/')->with('success', 'Thank you! We will contact you soon.');
    }
}
