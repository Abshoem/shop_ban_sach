@extends('layouts.indexadmin')

@section('title', 'Danh Mục Sản Phẩm')

@section('content')
<main class="container mt-5">
    <div class="mb-4 text-center">
        <h1 class="display-4 text-gray-300">QUẢN LÝ DANH MỤC</h1>
    </div>

    <div class="card mb-5 border-0 shadow-dark">
        <div class="card-header bg-gray-800 border-bottom border-gray-700 d-flex justify-content-between align-items-center py-3">
            <h2 class="mb-0 text-gray-300">
                <i class="fas fa-boxes mr-2"></i>DANH SÁCH DANH MỤC
            </h2>
            <a href="{{ route('categories.create') }}" class="btn btn-gray-300 btn-sm">
                <i class="fas fa-plus-circle mr-1"></i> Thêm Mới
            </a>
        </div>

        <div class="card-body bg-gray-850">
            @if(session('success'))
                <div class="alert alert-gray-700 text-gray-300">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-dark mb-0">
                    <thead class="bg-gray-700">
                        <tr>
                            <th width="80px" class="text-center text-gray-400">STT</th>
                            <th class="text-gray-400">TÊN DANH MỤC</th>
                            <th class="text-center text-gray-400">THAO TÁC</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $index => $category)
                        <tr class="bg-gray-800-hover">
                            <td class="text-center text-gray-300 align-middle">{{ $index + 1 }}</td>
                            <td class="text-gray-200 align-middle">{{ $category->name }}</td>
                            <td class="text-center align-middle">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('categories.showProducts', $category->id) }}" class="btn btn-sm btn-action btn-view">
                                        <i class="fas fa-eye mr-1"></i>Xem
                                    </a>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-action btn-edit">
                                        <i class="fas fa-edit mr-1"></i>Sửa
                                    </a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-action btn-delete">
                                            <i class="fas fa-trash-alt mr-1"></i>Xóa
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4 d-flex justify-content-center">
                {{ $categories->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</main>

<style>
    .bg-gray-800 { background-color: #2d3748; }
    .bg-gray-850 { background-color: #1a202c; }
    .bg-gray-700 { background-color: #4a5568; }
    .bg-gray-800-hover:hover { background-color: #2d3748; }

    .text-gray-200 { color: #e2e8f0; }
    .text-gray-300 { color: #cbd5e0; }
    .text-gray-400 { color: #a0aec0; }

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

    .btn-action {
        padding: 0.25rem 0.75rem;
        border-radius: 0.375rem;
        font-size: 0.875rem;
        border: 1px solid transparent;
    }

    .btn-view {
        background-color: #2f855a;
        color: #c6f6d5 !important;
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

    .table-dark {
        --bs-table-bg: #2d3748;
        --bs-table-striped-bg: #2a2f3d;
        --bs-table-hover-bg: #374151;
    }
</style>
@endsection
