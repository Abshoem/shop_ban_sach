@extends('layouts.header')

@section('title', 'Danh Sách Sản Phẩm')

<div id="layoutSidenav">
    @include('layouts.sidebar')

    <div id="layoutSidenav_content">
        <main class="container mt-4">
            <div class="card shadow-dark border-0 rounded-xl overflow-hidden">
                <div class="card-header bg-gray-800 border-bottom border-gray-700 py-3 d-flex justify-content-between align-items-center">
                    <h2 class="mb-0 text-black-300">
                        <i class="fas fa-box-open mr-2"></i>QUẢN LÝ SẢN PHẨM
                    </h2>
                    <a class="btn btn-gray-300 btn-sm" href="{{ route('categories.index') }}">
                        <i class="fas fa-arrow-left mr-1"></i>VỀ DANH MỤC
                    </a>
                </div>

                <div class="card-body bg-gray-850 p-4">
                    @if(session('success'))
                        <div class="alert alert-gray-700 text-gray-300 alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="close text-gray-400" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="mb-4 text-right">
                        <a class="btn btn-success-dark btn-sm px-4" href="{{ route('categories.createProduct',  $category->id) }}">
                            <i class="fas fa-plus-circle mr-1"></i>THÊM MỚI
                        </a>
                    </div>

                    <div class="table-responsive rounded-lg">
                        <table class="table table-dark table-hover table-striped mb-0">
                            <thead class="bg-gray-700">
                                <tr>
                                    <th class="text-center text-gray-400">STT</th>
                                    <th class="text-gray-400">TÊN SẢN PHẨM</th>
                                    <th class="text-gray-400">MÔ TẢ</th>
                                    <th class="text-center text-gray-400">GIÁ</th>
                                    <th class="text-center text-gray-400">HÌNH ẢNH</th>
                                    <th class="text-center text-gray-400">THAO TÁC</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @forelse ($products as $product)
                                <tr class="bg-gray-800-hover">
                                    <td class="text-center text-gray-300 align-middle">{{ $i++ }}</td>
                                    <td class="text-gray-200 align-middle">{{ $product->name }}</td>
                                    <td class="text-gray-400 align-middle">{{ $product->detail }}</td>
                                    <td class="text-center text-success-light align-middle fw-bold">${{ number_format($product->price, 2) }}</td>
                                    <td class="text-center align-middle">
                                        @if($product->image)
                                            <img src="{{ asset($product->image) }}" alt="Product Image" class="img-thumbnail border-gray-600" width="80">
                                        @else
                                            <span class="text-gray-500">Không có ảnh</span>
                                        @endif
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a class="btn btn-sm btn-action btn-edit px-3" href="{{ route('products.edit', $product->id) }}">
                                                <i class="fas fa-pen mr-1"></i>SỬA
                                            </a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Bạn chắc chắn muốn xóa?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-action btn-delete px-3">
                                                    <i class="fas fa-trash-alt mr-1"></i>XÓA
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-gray-500 text-center py-4">Không có sản phẩm nào</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {!! $products->onEachSide(1)->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

@include('layouts.footer')

<style>
    .bg-gray-800 { background-color: #2d3748; }
    .bg-gray-850 { background-color: #1a202c; }
    .bg-gray-700 { background-color: #4a5568; }
    .bg-gray-800-hover:hover { background-color: #374151; }

    .text-gray-200 { color: #e2e8f0; }
    .text-gray-300 { color: #cbd5e0; }
    .text-gray-400 { color: #a0aec0; }
    .text-gray-500 { color: #718096; }

    .border-gray-600 { border-color: #4a5568; }
    .border-gray-700 { border-color: #4a5568; }

    .shadow-dark { box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3); }

    .btn-gray-300 {
        background-color: #4a5568;
        border-color: #718096;
        color: #cbd5e0;
        transition: all 0.3s ease;
    }

    .btn-gray-300:hover {
        background-color: #718096;
        color: #ffffff;
    }

    .btn-success-dark {
        background-color: #2f855a;
        border-color: #38a169;
        color: #c6f6d5;
    }

    .btn-success-dark:hover {
        background-color: #38a169;
        color: #ffffff;
    }

    .btn-action {
        padding: 0.25rem 0.75rem;
        border-radius: 6px;
        font-size: 0.875rem;
        border: 1px solid transparent;
    }

    .btn-edit {
        background-color: #2b6cb0;
        color: #bee3f8 !important;
    }

    .btn-delete {
        background-color: #c53030;
        color: #fed7d7 !important;
    }

    .alert-gray-700 {
        background-color: #4a5568;
        border-color: #718096;
        color: #cbd5e0;
    }

    .text-success-light { color: #68d391; }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(74, 85, 104, 0.1);
    }

    .rounded-xl { border-radius: 12px; }
</style>
