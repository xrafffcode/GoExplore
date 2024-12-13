@extends('layouts.admin')

@section('title', 'Tour Guide Edit')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.tour-guide.index') }}" class="btn btn-danger mb-3">Back</a>
        </div>

        <div class="col-md-12">
            @include('includes.alert')
        </div>

        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Tour Guide</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.tour-guide.update', $guide->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="place_id">Place</label>
                            <select name="place_id" id="place_id"
                                class="form-control @error('place_id') is-invalid @enderror">
                                <option value="">-- Select Place --</option>
                                @foreach ($places as $place)
                                    <option value="{{ $place->id }}"
                                        {{ old('place_id', $guide->place_id) == $place->id ? 'selected' : '' }}>
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
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image"
                                class="form-control @error('image') is-invalid @enderror"
                                value="{{ old('image', $guide->image) }}">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $guide->name) }}" placeholder="Enter name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" rows="10"
                                class="form-control @error('description') is-invalid @enderror">{{ old('description', $guide->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price"
                                class="form-control @error('price') is-invalid @enderror"
                                value="{{ old('price', $guide->price) }}" placeholder="Enter price">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone"
                                class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone', $guide->phone) }}" placeholder="Enter phone">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="total_guides">Total Guides</label>
                            <input type="number" name="total_guides" id="total_guides"
                                class="form-control @error('total_guides') is-invalid @enderror"
                                value="{{ old('total_guides', $guide->total_guides) }}" placeholder="Enter total guides">
                            @error('total_guides')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="total_years">Total Years</label>
                            <input type="number" name="total_years" id="total_years"
                                class="form-control @error('total_years') is-invalid @enderror"
                                value="{{ old('total_years', $guide->total_years) }}" placeholder="Enter total years">
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
