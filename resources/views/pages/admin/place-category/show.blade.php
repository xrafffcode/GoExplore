@extends('layouts.admin')

@section('title', $category->name)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.place-category.index') }}" class="btn btn-danger mb-3">Back</a>
        </div>

        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ $category->name }}</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Icon</th>
                                <td>
                                    <img src="{{ asset('storage/' . $category->icon) }}" alt=""
                                        class="img-thumbnail" width="100">
                                </td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $category->name }}</td>
                            </tr>
                            <tr>
                                <th>Slug</th>
                                <td>{{ $category->slug }}</td>
                            </tr>
                            <tr>
                                <th>Kategori Utama</th>
                                <td>
                                    @if ($category->is_featured)
                                        <span class="badge badge-primary">Ya</span>
                                    @else
                                        <span class="badge badge-secondary">Tidak</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
