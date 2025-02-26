@extends('layouts.header')

@section('title', 'Danh Sách Đơn Hàng')

<div id="layoutSidenav">
    @include('layouts.sidebar')

    <div id="layoutSidenav_content">
        <main class="container mt-5">
            <div class="card mb-5 shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <h2 class="mb-0">Danh Sách Đơn Hàng</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Order Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->order_time }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $orders->links() }}
                    </div>
                    <div class="mt-4 text-end">
                        <a href="{{ route('logout') }}" class="btn btn-danger">
                            <i class="fa fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

@include('layouts.footer')
