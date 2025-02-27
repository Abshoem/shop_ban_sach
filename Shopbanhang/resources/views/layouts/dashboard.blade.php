@extends('layouts.header')

@section('title', 'Dashboard')

<div id="layoutSidenav">
    @include('layouts.sidebar')

    <div id="layoutSidenav_content">
        <main class="container mt-5">
            <div class="container-fluid px-4">
                <h1 class="mt-4 mb-4">Dashboard</h1>
                <div class="row">
                    <!-- Card: Loại Sách -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card bg-primary text-white shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <div class="text-uppercase mb-1">Loại Sách</div>
                                        <div class="h2 mb-0 font-weight-bold">{{ $categoriesCount }}</div>
                                    </div>
                                    <div class="col-3 text-right">
                                        <i class="fas fa-book fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="{{ route('categories.index') }}">
                                <span class="float-left">Xem chi tiết</span>
                                <span class="float-right"><i class="fas fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>
                    <!-- Card: Sách (Product) -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card bg-success text-white shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <div class="text-uppercase mb-1">Sách</div>
                                        <div class="h2 mb-0 font-weight-bold">{{ $productsCount }}</div>
                                    </div>
                                    <div class="col-3 text-right">
                                        <i class="fas fa-book-open fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="{{ route('products.index') }}">
                                <span class="float-left">Xem chi tiết</span>
                                <span class="float-right"><i class="fas fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>
                    <!-- Card: Đơn Hàng -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card bg-danger text-white shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <div class="text-uppercase mb-1">Đơn Hàng</div>
                                        <div class="h2 mb-0 font-weight-bold">{{ $ordersCount }}</div>
                                    </div>
                                    <div class="col-3 text-right">
                                        <i class="fas fa-shopping-cart fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="/listorder">
                                <span class="float-left">Xem chi tiết</span>
                                <span class="float-right"><i class="fas fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

@include('layouts.footer')
