@extends('layouts.admin')

@section('title', 'Destinasi')

@section('content')
    <div class="row">

        @can('place-create')
            <div class="col-md-12">
                <a href="{{ route('admin.place.create') }}" class="btn btn-primary mb-3">Tambah Destinasi</a>
            </div>
        @endcan

        <div class="col-md-12">
            @include('includes.alert')
        </div>

        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Destinasi</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Thumbnail</th>
                                    <th>Nama</th>
                                    <th>Slug</th>
                                    <th>Harga</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($places as $place)
                                    <tr>
                                        <td>{{ $place->placeCategory->name }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $place->image) }}" alt=""
                                                class="img-thumbnail" width="100">
                                        </td>
                                        <td>{{ $place->name }}</td>
                                        <td>{{ $place->slug }}</td>
                                        <td>{{ number_format($place->price, 0, ',', '.') }}</td>
                                        <td>{{ $place->address }}</td>
                                        <td>
                                            @can('place-update')
                                                <a href="{{ route('admin.place.edit', $place->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                            @endcan

                                            <a href="{{ route('admin.place.show', $place->id) }}"
                                                class="btn btn-info">Show</a>

                                            @can('place-delete')
                                                <form action="{{ route('admin.place.destroy', $place->id) }}" method="POST"
                                                    class="d-inline">
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
