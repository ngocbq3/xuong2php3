<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        //Lấy tất cả sản phẩm
        $products = Product::all();

        //Lấy dữ liệu có phân trang, sắp xếp
        $products = Product::query()
            ->orderBy('id', 'desc')
            ->paginate(10);

        //Tìm kiếm, câu lệnh có điều kiện
        $products = Product::query()
            ->where('category_id', 2)
            ->where('name', 'LIKE',  '%ve%')
            ->get();

        //Lấy ra 1 phần tử
        $products = Product::query()
            ->where('category_id', 2)
            ->where('name', 'LIKE',  '%ve%')
            ->first();

        //Lấy 1 phần tử theo id
        $products = Product::query()->find(2);

        //Thống kê
        //Đếm số lượng sản phẩm
        $product_count = Product::query()->count();

        //Tính trung bình (giá trung bình)
        $product_count = ProductVariant::query()
            ->avg('price');

        $product_count = ProductVariant::query()->sum('price');

        //Thống kê số lượng sản phẩm trong danh mục
        $product_count = Product::query()
            ->select('category_id', DB::raw('count(*) '))
            ->groupBy('category_id')
            ->get();

        return $product_count;
        return $products;
    }

    public function list()
    {
        //Lazy loading
        $products = Product::query()->paginate(10);

        $categories = Category::query()->get();

        return view('test', compact('categories', 'products'));
    }

    public function listEagerLoading()
    {
        // $products = Product::with('category')->paginate(8);

        $products = Product::with(['variants.color', 'variants.size'])
            ->paginate(8);
        // return $products;
        return view('test2', compact('products'));
    }
}
