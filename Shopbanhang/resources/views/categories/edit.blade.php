@extends('layouts.header')

@section('title', 'Chỉnh Sửa Danh Mục')

<div id="layoutSidenav">
    @include('layouts.sidebar')

    <div id="layoutSidenav_content">
        <main class="container mt-4">
            <div class="card border-0 shadow-light-gray rounded-xl overflow-hidden">
                <div class="card-header bg-gray-200 border-bottom border-gray-300 py-3">
                    <h2 class="mb-0 text-gray-700">
                        <i class="fas fa-edit mr-2"></i>CẬP NHẬT DANH MỤC
                    </h2>
                </div>

                <div class="card-body bg-gray-100 p-4">
                    <div class="mb-4 text-right">
                        <a class="btn btn-gray-400 btn-sm" href="{{ route('categories.index') }}">
                            <i class="fas fa-arrow-left mr-1"></i>QUAY LẠI
                        </a>
                    </div>

                    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="inputName" class="form-label text-gray-700 fw-500">
                                <i class="fas fa-tag mr-1"></i>TÊN DANH MỤC
                            </label>
                            <input type="text"
                                   name="name"
                                   class="form-control bg-gray-200 border-gray-300 text-gray-700 focus-ring-gray @error('name') is-invalid @enderror"
                                   id="inputName"
                                   value="{{ old('name', $category->name) }}"
                                   placeholder="Nhập tên danh mục">
                            @error('name')
                            <div class="text-gray-500 mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="inputImage" class="form-label text-gray-700 fw-500">
                                <i class="fas fa-image mr-1"></i>HÌNH ẢNH
                            </label>
                            <input type="file"
                                   name="image"
                                   class="form-control bg-gray-200 border-gray-300 text-gray-700 file-input-custom @error('image') is-invalid @enderror"
                                   id="inputImage">
                            @error('image')
                            <div class="text-gray-500 mt-1">{{ $message }}</div>
                            @enderror

                            @if($category->image)
                            <div class="mt-3">
                                <div class="image-preview-container">
                                    <img src="{{ asset($category->image) }}"
                                         alt="{{ $category->name }}"
                                         class="img-thumbnail border-gray-300"
                                         width="120">
                                    <span class="text-gray-500 mt-1 d-block">Ảnh hiện tại</span>
                                </div>
                            </div>
                            @else
                            <div class="text-gray-500 mt-2">
                                <i class="fas fa-info-circle mr-1"></i>Chưa có ảnh
                            </div>
                            @endif
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="submit" class="btn btn-gray-400 px-4 py-2">
                                <i class="fas fa-save mr-1"></i>LƯU THAY ĐỔI
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>

@include('layouts.footer')

<style>
    .bg-gray-200 { background-color: #edf2f7; }
    .bg-gray-100 { background-color: #f7fafc; }
    .border-gray-300 { border-color: #cbd5e0; }

    .text-gray-700 { color: #4a5568; }
    .text-gray-500 { color: #718096; }

    .btn-gray-400 {
        background-color: #cbd5e0;
        border-color: #a0aec0;
        color: #4a5568;
        transition: all 0.3s ease;
    }

    .btn-gray-400:hover {
        background-color: #a0aec0;
        color: #ffffff;
    }

    .focus-ring-gray:focus {
        border-color: #a0aec0;
        box-shadow: 0 0 0 0.2rem rgba(160, 174, 192, 0.25);
    }

    .file-input-custom::-webkit-file-upload-button {
        background-color: #cbd5e0;
        color: #4a5568;
        border: 1px solid #a0aec0;
        padding: 0.375rem 0.75rem;
        border-radius: 0.375rem;
        transition: all 0.3s ease;
    }

    .file-input-custom::-webkit-file-upload-button:hover {
        background-color: #a0aec0;
        color: #ffffff;
    }

    .fw-500 { font-weight: 500; }
    .rounded-xl { border-radius: 12px; }
    .shadow-light-gray { box-shadow: 0 4px 6px -1px rgba(160, 174, 192, 0.5); }
</style>
