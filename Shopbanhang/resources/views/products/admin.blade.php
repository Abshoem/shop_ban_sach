@extends('products.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Chỉnh sửa sách</h2>
    <div class="card-body">

        @session('success')
        <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession

        <!-- Nút quay lại trang danh mục -->
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4">
            <a class="btn btn-outline-secondary btn-sm" href="{{ route('categories.index') }}">
                <i class="fa fa-arrow-left"></i> Quay lại danh sách
            </a>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('products.create') }}">
                <i class="fa fa-plus"></i> Thêm sách mới
            </a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($products as $product)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->detail }}</td>
                    <td>{{ $product->price }} </td>
                    <td>
                        @if($product->image)
                        <img src="{{ asset($product->image) }}" alt="Product Image" class="img-thumbnail" width="100">
                        @else
                        <span>No Image</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                            <a class="btn btn-primary btn-sm" href="{{ route('products.edit',$product->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">There are no data.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {!! $products->links() !!}

    </div>
</div>
@endsection
