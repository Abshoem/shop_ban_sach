@extends('layouts.header')

@section('title', 'Danh Sách Đơn Hàng')

<div id="layoutSidenav">
    @include('layouts.sidebar')

    <div id="layoutSidenav_content">
        <main class="container mt-5">
            <div class="card mb-5 shadow-sm" style="background-color: #333333;">
                <div class="card-header text-white" style="background-color: #000000;">
                    <h2 class="mb-0">Danh Sách Đơn Hàng</h2>
                </div>
                <div class="card-body text-white">
                    <div class="table-responsive">
                        <table class="table table-dark table-striped table-hover table-bordered mb-0" style="font-size: 1.1rem;">
                            <thead>
                                <tr>
                                    <th style="padding: 1rem;">Tên Sản Phẩm</th>
                                    <th style="padding: 1rem;">Thời Gian Đặt</th>
                                    <th style="padding: 1rem;">Tên Khách Hàng</th>
                                    <th style="padding: 1rem;">SĐT</th>
                                    <th style="padding: 1rem;">Địa Chỉ</th>
                                    <th style="padding: 1rem;">Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $transaction)
                                <tr>
                                    <td style="padding: 1rem;">{{ $transaction->order->product->name ?? 'Không có dữ liệu' }}</td>
                                    <td style="padding: 1rem;">{{ $transaction->created_at->format('d/m/Y H:i') }}</td>
                                    <td style="padding: 1rem;">{{ $transaction->customer_name }}</td>
                                    <td style="padding: 1rem;">{{ $transaction->customer_phone }}</td>
                                    <td style="padding: 1rem;">{{ $transaction->customer_address }}</td>
                                    <td style="padding: 1rem;">
                                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa giao dịch này?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3" style="color: white;">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

@include('layouts.footer')
