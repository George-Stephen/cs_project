<?php

namespace App\Http\Controllers;

use App\Mail\RequestToBuy;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $products = Product::search($search)->paginate(10);


        return view('products.index', compact('products', 'search'));
    }

    public function latestProducts()
    {
        $products = Product::latestProducts(10)->get();

        return view('products.latest', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'category' => 'required',
            'condition' => 'required',
            'availability' => 'required',
            'additional_info'=> 'required',
        ]);

        $imagePath = $request->file('image')->store('product-images', 'public');

        // Retrieve the authenticated user's ID
        $userId = Auth::id();

        // Create a new product instance and fill it with the validated data
        $product = new Product();
        $product->title = $validatedData['title'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->category = $validatedData['category'];
        $product->image = $imagePath;
        $product->condition = $validatedData['condition'];
        $product->availability = $validatedData['availability'];
        $product->additional_information = $validatedData['additional_info'];
        $product->seller_id = $userId;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'condition' => 'required',
            'availability' => 'required',
            'additional_info'=> 'required',
        ]);


        // Create a new product instance and fill it with the validated data
        $product->title = $validatedData['title'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->condition = $validatedData['condition'];
        $product->availability = $validatedData['availability'];
        $product->additional_information = $validatedData['additional_info'];
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
    public function requestToBuy($id)
    {
    // Find the product by its ID
        $product = Product::findOrFail($id);

        $sellerEmail = $product->seller->email;
        // Get the current authenticated user
        $user = Auth::user();

        // Send the seller an email
        $data = [
            'product' => $product,
            'buyerName' => $user->full_name,
            'buyerEmail' => $user->email,
            'buyerPhone' => $user->phone,
        ];

        Mail::to($sellerEmail)->send(new RequestToBuy($data));

        return redirect()->back()->with('success', 'Your request to buy has been sent.');
    }

}

