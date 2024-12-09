<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LibrarianProductController extends Controller
{
    public function index()
    {
        $authuserid = Auth::id();
        $stores = Store::where('user_id', $authuserid)->get();
        return view('librarian.product.create', compact('stores'));
    }

    public function manage()
    {
        $librarianid = Auth::id();
        $products = Product::where('librarian_id',$librarianid )->get();
        return view('librarian.product.manage', compact('products'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sku' => 'required|string|unique:products,sku',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'store_id' => 'required|exists:stores,id',
            'regular_price' => 'required|numeric|min:0',
            'discounted_price' => 'nullable|numeric|min:0|lt:regular_price',
            'tax_rate' => 'required|numeric|min:0|max:100',
            'stock_quantity' => 'required|integer|min:0',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Generate slug if not provided
        $slug = $request->slug ?? Str::slug($request->product_name);

        $product = Product::create([
            'product_name' => $validatedData['product_name'],
            'description' => $validatedData['description'] ?? null,
            'sku' => $validatedData['sku'],
            'librarian_id' => Auth::id(),
            'category_id' => $validatedData['category_id'],
            'subcategory_id' => $validatedData['subcategory_id'] ?? null,
            'store_id' => $validatedData['store_id'],
            'regular_price' => $validatedData['regular_price'],
            'discounted_price' => $validatedData['discounted_price'] ?? null,
            'tax_rate' => $validatedData['tax_rate'],
            'stock_quantity' => $validatedData['stock_quantity'],
            'slug' => $slug,
            'meta_title' => $request->meta_title ?? null,
            'meta_description' => $request->meta_description ?? null,
        ]);

        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('product_images', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'img_path' => $path,
                    'is_primary' => false,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Product added successfully.');
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $stores = Store::where('user_id', Auth::id())->get();

        if (!$stores) {
            return redirect()->back()->with('error', 'Store not found for this product.');
        }

        return view('librarian.product.edit', compact('product', 'stores'));
    }


    public function update(Request $request, $id){
        $product = Product::findOrFail($id);
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sku' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'store_id' => 'required|exists:stores,id',
            'regular_price' => 'required|numeric|min:0',
            'discounted_price' => 'nullable|numeric|min:0|lt:regular_price',
            'tax_rate' => 'required|numeric|min:0|max:100',
            'stock_quantity' => 'required|integer|min:0',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $product->update($validatedData);
        return redirect()->back()->with('success','Product Updated Succesfully!');
    }

    public function delete(Request $request, $id){
        Product::findOrFail($id)->delete();
        return redirect()->back()->with('success','Product Deleted Succesfully!');
    }
}
