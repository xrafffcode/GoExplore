@extends('layouts.admin')

@section('title', 'Tour Guide')

@section('content')
    <div class="row">

        @can('tour-guide-create')
            <div class="col-md-12">
                <a href="{{ route('admin.tour-guide.create') }}" class="btn btn-primary mb-3">Tambah Tour Guide</a>
            </div>
        @endcan

        <div class="col-md-12">
            @include('includes.alert')
        </div>

        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tour Guide</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Destinasi</th>
                                    <th>Foto Profil</th>
                                    <th>Nama</th>
                                    <th>Harga/Hari</th>
                                    <th>No Telepon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($guides as $guide)
                                    <tr>
                                        <td>{{ $guide->place->name }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $guide->image) }}" alt=""
                                                class="img-thumbnail" width="100">
                                        </td>
                                        <td>{{ $guide->name }}</td>
                                        <td>Rp {{ number_format($guide->price, 0, ',', '.') }}</td>
                                        <td>{{ $guide->phone }}</td>
                                        <td>
                                            @can('tour-guide-update')
                                                <a href="{{ route('admin.tour-guide.edit', $guide->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                            @endcan

                                            <a href="{{ route('admin.tour-guide.show', $guide->id) }}"
                                                class="btn btn-info">Show</a>

                                            @can('tour-guide-delete')
                                                <form action="{{ route('admin.tour-guide.destroy', $guide->id) }}"
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
