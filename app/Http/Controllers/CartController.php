<?php

namespace App\Http\Controllers;

use App\Models\ProductVariant;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $variantId = $request->input('variant_id');
        $quantity = $request->input('quantity', 1);

        //Lấy ra biến thể có id là $variantId
        $variant = ProductVariant::with(['product', 'size', 'color'])
            ->findOrFail($variantId);

        $cart = session()->get('cart', []);
        if (isset($cart[$variantId])) {
            $cart[$variantId]['quantity'] += $quantity;
        } else {
            $cart[$variantId] = [
                'id' => $variantId,
                'name' => $variant->product->name,
                'image' => $variant->image,
                'size' => $variant->size->name,
                'color' => $variant->color->name,
                'price' => $variant->price,
                'quantity' => $quantity,
            ];
        }
        //Gán lại giỏ hàng vào session
        session()->put('cart', $cart);
        //Trả về thông báo thành công
        return redirect()->back()->with('success', 'Thêm sản phẩm vào giỏ hàng thànhf công!');
    }
}
