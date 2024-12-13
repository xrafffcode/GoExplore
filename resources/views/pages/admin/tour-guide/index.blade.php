@extends('layouts.admin')

@section('title', 'Kategori')

@section('content')
    <div class="row">

        @can('place-category-create')
            <div class="col-md-12">
                <a href="{{ route('admin.place-category.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>
            </div>
        @endcan

        <div class="col-md-12">
            @include('includes.alert')
        </div>

        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kategori</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Icon</th>
                                    <th>Nama</th>
                                    <th>Slug</th>
                                    <th>Kategori Utama</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('storage/' . $category->icon) }}" alt=""
                                                class="img-thumbnail" width="100">
                                        </td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            @if ($category->is_featured)
                                                <span class="badge badge-primary">Ya</span>
                                            @else
                                                <span class="badge badge-secondary">Tidak</span>
                                            @endif
                                        </td>
                                        <td>
                                            @can('place-category-update')
                                                <a href="{{ route('admin.place-category.edit', $category->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                            @endcan

                                            <a href="{{ route('admin.place-category.show', $category->id) }}"
                                                class="btn btn-info">Show</a>

                                            @can('place-category-delete')
                                                <form action="{{ route('admin.place-category.destroy', $category->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endsection
