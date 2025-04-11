@extends('admin.layout')

@section('title')
    Đơn hàng chi tiết
@endsection

@section('content')
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Hóa Đơn #HD12345</h4>
                <small>Ngày đặt: 10/04/2025</small>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h5>Thông tin khách hàng</h5>
                        <p class="mb-1"><strong>Họ tên:</strong> Nguyễn Văn A</p>
                        <p class="mb-1"><strong>Email:</strong> nguyenvana@example.com</p>
                        <p class="mb-1"><strong>Điện thoại:</strong> 0901234567</p>
                        <p class="mb-0"><strong>Địa chỉ:</strong> 123 Đường ABC, Quận 1, TP.HCM</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <h5>Trạng thái đơn hàng</h5>
                        <span class="badge bg-success fs-6">Đã thanh toán</span>
                    </div>
                </div>

                <h5 class="mb-3">Danh sách sản phẩm</h5>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Ảnh</th>
                                <th>Sản phẩm</th>
                                <th>Màu</th>
                                <th>Size</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="https://via.placeholder.com/60" alt="Áo thun" class="img-thumbnail"></td>
                                <td>Áo thun nam basic</td>
                                <td>Trắng</td>
                                <td>L</td>
                                <td>2</td>
                                <td>200,000₫</td>
                                <td>400,000₫</td>
                            </tr>
                            <tr>
                                <td><img src="https://via.placeholder.com/60" alt="Quần jean" class="img-thumbnail"></td>
                                <td>Quần jean nữ</td>
                                <td>Xanh</td>
                                <td>M</td>
                                <td>1</td>
                                <td>350,000₫</td>
                                <td>350,000₫</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row justify-content-end">
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Tạm tính:</span>
                                <strong>750,000₫</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Phí vận chuyển:</span>
                                <strong>30,000₫</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Tổng cộng:</span>
                                <strong class="text-danger fs-5">780,000₫</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Phương thức thanh toán:</span>
                                <strong>Chuyển khoản</strong>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-4">
                    <h6>Ghi chú:</h6>
                    <p>Vui lòng giao hàng trong giờ hành chính.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
