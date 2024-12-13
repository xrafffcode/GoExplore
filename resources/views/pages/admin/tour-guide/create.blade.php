@extends('layouts.admin')

@section('title', 'Kategori Destinasi')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.place-category.index') }}" class="btn btn-danger mb-3">Kembali</a>
        </div>

        <div class="col-md-12">
            @include('includes.alert')
        </div>

        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Kategori Destinasi</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.place-category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="file" name="icon" id="icon"
                                class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon') }}"
                                placeholder="Enter icon">
                            @error('icon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                placeholder="Masukkan Nama">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="is_featured">Kategori Utama</label>
                            <select name="is_featured" id="is_featured" class="form-control">
                                <option value="0" {{ old('is_featured') == 0 ? 'selected' : '' }}>Tidak</option>
                                <option value="1" {{ old('is_featured') == 1 ? 'selected' : '' }}>Ya</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
