<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|integer|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validating the image
        ]);

        // Handle the file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Store in public/images directory
            $validated['image'] = $imagePath;
        }

        // Create the product with the validated data
        Product::create($validated);

        return redirect()->route('product.index')->with('success', 'Product created successfully');
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Fetch the product by ID or fail if not found
        $product = Product::findOrFail($id);

        // Return the view with the product data
        return view('product.edit', compact('product'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // Validate the image
        ]);
    
        $product = Product::find($id);
    
        // Check if a new image was uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($product->image) {
                \Storage::disk('public')->delete($product->image);
            }
    
            // Store the new image
            $validated['image'] = $request->file('image')->store('images', 'public');
        } else {
            // If no image was uploaded, do not include the image field in the update
            unset($validated['image']);
        }
    
        // Update the product with the validated data
        $product->update($validated);

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }
    
    



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);

        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }
}
