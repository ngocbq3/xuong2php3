<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     * List variants of product id
     */
    public function index($id)
    {
        $product = Product::with(['variants.color', 'variants.size'])
            ->where('id', $id)
            ->first();
        return view('admin.products.variants.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $product = Product::findOrFail($id);
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.products.variants.create', compact('product', 'colors', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        //xử lý ảnh bằng Storage
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $filename, 'public');
        }

        $data['image'] = $path ?? null;

        ProductVariant::create($data);
        return redirect()->route('admin.variants.index', $data['product_id'])
            ->with('message', 'Thêm biến thể thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $variant = ProductVariant::findOrFail($id);
        $colors = Color::all();
        $sizes = Size::all();
        return view(
            'admin.products.variants.edit',
            compact('variant', 'colors', 'sizes')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $variant = ProductVariant::findOrFail($id);
        $data = $request->all();

        //xử lý ảnh bằng Storage
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $filename, 'public');
            $data['image'] = $path;
        }

        //xóa ảnh cũ
        if ($variant->image && isset($path)) {
            if (Storage::fileExists($variant->image)) {
                Storage::delete($variant->image);
            }
        }

        $variant->update($data);
        return redirect()->route('admin.variants.index', $variant->product_id)
            ->with('message', 'Cập nhật biến thể thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $variant = ProductVariant::findOrFail($id);
        $productId = $variant->product_id;

        //xóa ảnh cũ
        if ($variant->image) {
            if (Storage::fileExists($variant->image)) {
                Storage::delete($variant->image);
            }
        }

        $variant->delete();
        return redirect()->route('admin.variants.index', $productId)
            ->with('message', 'Xóa biến thể thành công.');
    }
}
