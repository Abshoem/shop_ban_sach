@extends('products.layout')

@section('content')
<div class="container-fluid px-4">
    <!-- Header giữ nguyên -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top py-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-success fs-3" href="/products">
                <i class="fas fa-book-open me-2"></i>Sách Hay
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
                <ul class="navbar-nav align-items-center gap-3">
                    @auth
                    <li class="nav-item d-none d-lg-block">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user-circle me-2 text-success fs-5"></i>
                            <span class="text-dark fw-medium">{{ Auth::user()->name }}</span>
                        </div>
                    </li>
                    @endauth

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger px-4">
                                <i class="fas fa-sign-out-alt me-2"></i>Đăng xuất
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Nội dung chính -->
    <div class="container my-5 pt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h2 class="mb-0">Giỏ hàng &amp; Thanh Toán</h2>
            </div>
            <div class="card-body">
                <!-- Thông báo thành công -->
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <!-- Danh sách sản phẩm -->
                <div class="table-responsive mb-4">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Tên Sản Phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Hình Ảnh</th>
                                <th>Thời Gian Đặt</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $totalPrice = 0; @endphp
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->name }}</td>
                                <td>${{ number_format($order->price, 2) }}</td>
                                <td>
    <form action="{{ route('orders.update', $order->id) }}" method="POST" class="d-inline">
        @csrf
        @method('PATCH')
        <div class="input-group" style="max-width: 120px;">
            <button type="submit" name="quantity" value="{{ $order->quantity - 1 }}" class="btn btn-outline-secondary btn-sm" {{ $order->quantity <= 1 ? 'disabled' : '' }}>
                <i class="fas fa-minus"></i>
            </button>
            <input type="text" name="quantity" class="form-control text-center" value="{{ $order->quantity }}" readonly>
            <button type="submit" name="quantity" value="{{ $order->quantity + 1 }}" class="btn btn-outline-secondary btn-sm">
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </form>
</td>

                                <td>
                                    <img src="{{ asset($order->img) }}" alt="Order Image" class="img-thumbnail" style="width: 80px;">
                                </td>
                                <td>{{ $order->order_time }}</td>
                                <td>
                                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm shadow-sm" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                                            <i class="fas fa-trash-alt"></i> Xóa
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @php $totalPrice += $order->price * $order->quantity; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Tổng giá tiền -->
                <div class="text-end mt-3">
    <h4>Tổng giá: <span class="fw-bold text-success">${{ $orders->sum(fn($order) => $order->price * $order->quantity) }}</span></h4>
</div>


                <!-- Nút Quay lại -->
                <!-- <div class="d-flex justify-content-end mb-4">
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-lg">
                        <i class="fas fa-arrow-left me-2"></i> Quay lại
                    </a>
                </div> -->

                <hr class="my-4" style="border-color: #28a745;">

                <!-- Form Thanh Toán -->
                <form method="POST" id="paymentForm" action="{{ route('orders.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="customerName" class="form-label">Tên</label>
                        <input type="text" class="form-control" id="customerName" name="customer_name" placeholder="Nhập tên của bạn" required>
                    </div>
                    <div class="mb-3">
                        <label for="customerPhone" class="form-label">Số điện thoại</label>
                        <input type="tel" class="form-control" id="customerPhone" name="customer_phone" placeholder="Nhập số điện thoại" required>
                    </div>
                    <div class="mb-3">
                        <label for="customerAddress" class="form-label">Địa chỉ giao hàng</label>
                        <textarea class="form-control" id="customerAddress" name="customer_address" rows="3" placeholder="Nhập địa chỉ giao hàng" required></textarea>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success btn-lg shadow-success-hover">
                            <i class="fas fa-credit-card me-2"></i> Xác nhận thanh toán
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- CSS Tùy chỉnh -->
    <style>
        body {
            background: linear-gradient(135deg, #e0f7e9, #ffffff);
        }
        .card {
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #28a745;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(40, 167, 69, 0.2);
        }
        .shadow-success-hover {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(40, 167, 69, 0.1);
        }
        .shadow-success-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(40, 167, 69, 0.3);
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .form-control:focus {
            border-color: #28a745;
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        }
        .table th,
        .table td {
            vertical-align: middle;
        }
    </style>

    <!-- JavaScript cho tăng giảm số lượng -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-decrease').forEach(function(button) {
                button.addEventListener('click', function() {
                    var input = this.parentElement.querySelector('input[name="quantity"]');
                    var value = parseInt(input.value);
                    if (value > 1) {
                        input.value = value - 1;
                    }
                });
            });
            document.querySelectorAll('.btn-increase').forEach(function(button) {
                button.addEventListener('click', function() {
                    var input = this.parentElement.querySelector('input[name="quantity"]');
                    var value = parseInt(input.value);
                    input.value = value + 1;
                });
            });
        });
    </script>
</div>
@endsection
