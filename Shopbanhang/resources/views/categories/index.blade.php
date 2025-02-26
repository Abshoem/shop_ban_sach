@extends('layouts.indexadmin')

@section('title', 'Danh Mục Sản Phẩm')

@section('content')
<main class="container mt-5">
    <div class="mb-4 text-center">
        <h1 class="display-4 text-primary">Danh Mục</h1>
    </div>

    <div class="card mb-5 shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Danh Mục</h2>
            <a href="{{ route('categories.create') }}" class="btn btn-light btn-sm">
                <i class="fa fa-plus"></i> Thêm Danh Mục
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th width="80px">No</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $index => $category)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('categories.showProducts', $category->id) }}" class="btn btn-success btn-sm">
                                    <i class="fa fa-eye"></i> Xem Sản Phẩm
                                </a>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-edit"></i> Sửa
                                </a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa?');" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $categories->links() }}
            </div>
        </div>

    </div>
</main>
@endsection
