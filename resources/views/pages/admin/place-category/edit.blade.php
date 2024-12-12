@extends('layouts.admin')

@section('title', 'Category Edit')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.place-category.index') }}" class="btn btn-danger mb-3">Back</a>
        </div>

        <div class="col-md-12">
            @include('includes.alert')
        </div>

        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Category</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.place-category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="file" name="icon" id="icon"
                                class="form-control @error('icon') is-invalid @enderror"
                                value="{{ old('icon', $category->icon) }}">
                            @error('icon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $category->name) }}" placeholder="Enter name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="is_featured">Featured</label>
                            <select name="is_featured" id="is_featured" class="form-control">
                                <option value="0"
                                    {{ old('is_featured', $category->is_featured) == 0 ? 'selected' : '' }}>No</option>
                                <option value="1"
                                    {{ old('is_featured', $category->is_featured) == 1 ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#permission').select2();
        });
    </script>
@endsection
