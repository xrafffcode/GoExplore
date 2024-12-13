@extends('layouts.admin')

@section('title', 'Destinasi')

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
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Destinasi</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.place.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="place_category_id">Kategori</label>
                            <select name="place_category_id" id="place_category_id"
                                class="form-control @error('place_category_id') is-invalid @enderror">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('place_category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('place_category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Thumbnail</label>
                            <input type="file" name="image" id="image"
                                class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}"
                                placeholder="Enter image">
                            @error('image')
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
                            <label for="description">Deskripsi</label>
                            <textarea name="description" id="description" cols="30" rows="10"
                                class="form-control @error('description') is-invalid @enderror" placeholder="Masukkan Deskripsi">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="text" name="price" id="price"
                                class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}"
                                placeholder="Masukkan Harga">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Telepon</label>
                            <input type="text" name="phone" id="phone"
                                class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}"
                                placeholder="Masukkan Telepon">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <input type="text" name="address" id="address"
                                class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}"
                                placeholder="Masukkan Alamat">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <input type="text" name="latitude" id="latitude"
                                class="form-control @error('latitude') is-invalid @enderror" value="{{ old('latitude') }}"
                                placeholder="Masukkan Latitude">
                            @error('latitude')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="longitude">Longitude</label>
                            <input type="text" name="longitude" id="longitude"
                                class="form-control @error('longitude') is-invalid @enderror"
                                value="{{ old('longitude') }}" placeholder="Masukkan Longitude">
                            @error('longitude')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
