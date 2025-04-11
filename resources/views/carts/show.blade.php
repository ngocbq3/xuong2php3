@extends('layouts.app')
@section('title', 'Giỏ hàng')
@section('content')
    <div class="container my-5">
        <h2 class="mb-4 text-center">Giỏ hàng của bạn</h2>

        <div class="table-responsive">
            <table class="table table-bordered cart-table">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Màu sắc</th>
                        <th>Kích thước</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $stt => $product)
                        <!-- Sản phẩm 1 -->
                        <tr>
                            <td>{{ $stt }}</td>
                            <td>{{ $product['name'] }}</td>
                            <td><span class="badge bg-primary">{{ $product['color'] }}</span></td>
                            <td>{{ $product['size'] }}</td>
                            <td>
                                <input type="number" class="form-control text-center" value="{{ $product['quantity'] }}"
                                    min="1" name="quantity[{{ $product['id'] }}]">
                            </td>
                            <td>{{ $product['price'] }} đ</td>
                            <td>{{ $product['price'] * $product['quantity'] }} đ</td>
                        </tr>
                    @endforeach

                    <!-- Tổng cộng -->
                    <tr class="table-secondary">
                        <td colspan="6" class="text-end"><strong>Tổng cộng:</strong></td>
                        <td><strong>{{ $totalPrice }} đ</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between">
            <a href="/san-pham" class="btn btn-outline-secondary">Tiếp tục mua hàng</a>
            <div>
                <button type="submit" class="btn btn-primary">Cập nhật số lượng</button>
                <button type="submit" formaction="/thanh-toan" class="btn btn-success ms-2">Thanh toán</button>
            </div>
        </div>
    </div>
@endsection
