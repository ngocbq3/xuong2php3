@extends('admin.layout')

@section('title')
    Danh sách sản phẩm
@endsection

@section('content')
    <!--Danh sách đơn hàng-->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Khách hàng</th>
                <th scope="col">Điện thoại</th>
                <th scope="col">Email</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Phương thức thanh toán</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">
                    Hành động
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $statuses[$order->status] }}</td>
                    <td>{{ $order->payment }}</td>
                    <td>{{ number_format($order->pay_amount, 0, ',', '.') }} VNĐ</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-primary">Xem</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    @endsection
