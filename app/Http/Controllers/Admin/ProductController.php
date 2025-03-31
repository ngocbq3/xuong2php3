<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')
            ->orderBy('id', 'DESC')
            ->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        //Nhâp hình ảnh
        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('images');
        }

        //Thêm image vào data
        $data['image'] = $path_image ?? null;

        Product::query()->create($data);

        return redirect()
            ->route('admin.products.index')
            ->with('message', 'Thêm dữ liệu thành công');
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
        $product = Product::find($id);
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('images');
            $data['image'] = $path_image;
        }

        //Xóa ảnh
        if (isset($path_image)) {
            if ($product->image != null) {
                if (Storage::fileExists($product->image)) {
                    Storage::delete($product->image);
                }
            }
        }
        $product->update($data);
        return redirect()->back()->with('message', 'Cập nhật dữ liệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
