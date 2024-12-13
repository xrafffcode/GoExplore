@extends('layouts.frontend')

@section('title', 'Destinasi')

@section('content')

    <main class="explore">
        <!-- search start -->
        <section class="search py-12">
            <form action="{{ route('place.index') }}">
                <div class="form-inner w-100 d-flex align-items-center gap-8 radius-24">
                    <img src="{{ asset('assets/frontend/svg/search.svg') }}" alt="search" class="shrink-0">
                    <input type="search" class="input-search input-field" name="keyword" placeholder="Cari Destinasi.."
                        value="{{ request('keyword') }}">
                    <button type="submit" class="btn-search">Cari</button>
                </div>
            </form>
        </section>
        <!-- search end -->

        <!-- all-place start -->
        <section class="all-place py-12">
            <!-- nav tabs -->
            <ul class="nav nav-tabs d-flex align-items-center gap-12 w-100 scrollbar-hidden" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button"
                        role="tab" aria-controls="all" aria-selected="false">Semua</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link " id="recommendation-tab" data-bs-toggle="tab" data-bs-target="#recommendation"
                        type="button" role="tab" aria-controls="recommendation"
                        aria-selected="true">Rekomendasi</button>
                </li>
            </ul>

            <!-- places -->
            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    <div id="place-cards" class="grid">
                        <!-- item-1 -->
                        @foreach ($places as $place)
                            <div class="place-card mix popular frequent">
                                <a href="{{ route('place.show', $place->slug) }}">
                                    <div class="image position-relative">
                                        <img src="{{ asset('storage/' . $place->image) }}" alt="desert"
                                            class="img-fluid w-100 overflow-hidden radius-8"
                                            style="height: 150px; object-fit: cover">
                                    </div>
                                    <div class="content">
                                        <h4>{{ $place->name }}</h4>
                                        <p class="d-flex align-items-center gap-04 location">
                                            <img src="{{ asset('assets/frontend/svg/map-marker.svg') }}" alt="icon">
                                            {{ substr($place->address, 0, 20) }}...
                                        </p>
                                        <div class="price d-flex align-items-center justify-content-between">
                                            <h3>Rp {{ number_format($place->price, 0, ',', '.') }}</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="tab-pane fade " id="recommendation" role="tabpanel" aria-labelledby="recommendation-tab">
                    <div id="place-cards" class="grid">
                        <!-- item-1 -->
                        @foreach ($recomendations as $recommendation)
                            <div class="place-card mix popular frequent">
                                <a href="{{ route('place.show', $recommendation->slug) }}">
                                    <div class="image position-relative">
                                        <img src="{{ asset('storage/' . $recommendation->image) }}" alt="desert"
                                            class="img-fluid w-100 overflow-hidden radius-8"
                                            style="height: 150px; object-fit: cover">
                                    </div>
                                    <div class="content">
                                        <h4>{{ $recommendation->name }}</h4>
                                        <p class="d-flex align-items-center gap-04 location">
                                            <img src="{{ asset('assets/frontend/svg/map-marker.svg') }}" alt="icon">
                                            {{ substr($place->address, 0, 20) }}...
                                        </p>
                                        <div class="price d-flex align-items-center justify-content-between">
                                            <h3>Rp {{ number_format($recommendation->price, 0, ',', '.') }}</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- all-place end -->
    </main>
@endsection
