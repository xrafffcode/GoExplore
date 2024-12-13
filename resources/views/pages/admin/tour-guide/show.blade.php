@extends('layouts.admin')

@section('title', $guide->name)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.tour-guide.index') }}" class="btn btn-danger mb-3">Back</a>
        </div>

        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ $guide->name }}</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Place</th>
                                <td>{{ $guide->place->name }}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td>
                                    <img src="{{ asset('storage/' . $guide->image) }}" alt="" class="img-thumbnail"
                                        width="100">
                                </td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $guide->name }}</td>
                            </tr>
                            <tr>
                                <th>Slug</th>
                                <td>{{ $guide->slug }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $guide->description }}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>Rp {{ number_format($guide->price, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $guide->phone }}</td>
                            </tr>
                            <tr>
                                <th>Total Guides</th>
                                <td>{{ $guide->total_guides }}</td>
                            </tr>
                            <tr>
                                <th>Total Years</th>
                                <td>{{ $guide->total_years }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
