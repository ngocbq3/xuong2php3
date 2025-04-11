<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $statuses = [
        '0' => 'Chờ xác nhận',
        '1' => 'Đang giao hàng',
        '2' => 'Đã giao hàng',
        '3' => 'Đã hủy',
    ];
    public function index()
    {
        $orders = Order::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        $statuses = $this->statuses;
        return view('admin.orders.index', compact('orders', 'statuses'));
    }

    public function show($id)
    {
        $order_details = OrderDetail::with(['productVariant.product', 'size', 'color'])
            ->where('order_id', $id)
            ->get();

        $order = Order::with('user')
            ->where('id', $id)
            ->first();

        $statuses = $this->statuses;
        return view('admin.orders.show', compact('order', 'statuses', 'order_details'));
    }
}
