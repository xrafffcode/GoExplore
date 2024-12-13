@extends('layouts.admin')

@section('title', 'Kategori Tour Guide')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.tour-guide.index') }}" class="btn btn-danger mb-3">Kembali</a>
        </div>

        <div class="col-md-12">
            @include('includes.alert')
        </div>

        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Kategori Tour Guide</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.tour-guide.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="place_id">Destinasi</label>
                            <select name="place_id" id="place_id"
                                class="form-control @error('place_id') is-invalid @enderror">
                                @foreach ($places as $place)
                                    <option value="{{ $place->id }}"
                                        {{ old('place_id') == $place->id ? 'selected' : '' }}>
                                        {{ $place->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('place_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Foto Profil</label>
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
                            <label for="total_guides">Total Guide </label>
                            <input type="number" name="total_guides" id="total_guides"
                                class="form-control @error('total_guides') is-invalid @enderror"
                                value="{{ old('total_guides') }}" placeholder="Masukkan Total Guide">
                            @error('total_guides')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="total_years">Total Tahun</label>
                            <input type="number" name="total_years" id="total_years"
                                class="form-control @error('total_years') is-invalid @enderror"
                                value="{{ old('total_years') }}" placeholder="Masukkan Total Tahun">
                            @error('total_years')
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
