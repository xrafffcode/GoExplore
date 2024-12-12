@extends('layouts.admin')

@section('title', $place->name)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.place.index') }}" class="btn btn-danger mb-3">Back</a>
        </div>

        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ $place->name }}</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Icon</th>
                                <td>
                                    <img src="{{ asset('storage/' . $place->image) }}" alt="" class="img-thumbnail"
                                        width="100">
                                </td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $place->name }}</td>
                            </tr>
                            <tr>
                                <th>Slug</th>
                                <td>{{ $place->slug }}</td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>{{ number_format($place->price, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $place->address }}</td>
                            </tr>
                            <tr>
                                <th>Latitude</th>
                                <td>{{ $place->latitude }}</td>
                            </tr>
                            <tr>
                                <th>Longitude</th>
                                <td>{{ $place->longitude }}</td>
                            </tr>
                            <tr>
                                <th>Map</th>
                                <td>
                                    <div id="map" style="height: 300px"></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var mymap = L.map('map').setView([{{ $place->latitude }}, {{ $place->longitude }}], 13);

        var marker = L.marker([{{ $place->latitude }}, {{ $place->longitude }}]).addTo(mymap);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
            maxZoom: 18,
        }).addTo(mymap);

        marker.bindPopup("<b>Lokasi Destinasi Wisata</b><br>{{ $place->address }}").openPopup();
    </script>
@endsection
