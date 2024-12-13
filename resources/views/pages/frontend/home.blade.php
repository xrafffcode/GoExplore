@extends('layouts.frontend')

@section('title', 'Home')

@section('content')
    <main class="home">
        <!-- info start -->
        <section class="info d-flex align-items-center justify-content-between pb-12">
            <div class="d-flex flex-column justify-content-between gap-04">
                <h3>Hallo, User</h3>
                <p class="d-flex align-items-center ">
                    Selamat Datang di GoExplore
                </p>
            </div>

            <ul class="d-flex align-items-center gap-16">
                <li>
                    <a href="#" class="d-flex align-items-center justify-content-center rounded-full position-relative">
                        <img src="{{ asset('assets/frontend/svg/bell-black.svg') }}" alt="icon">
                        <span class="dot"></span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- info end -->

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

        <!-- service start -->
        <section class="service py-12">
            @foreach ($featuredCategories as $category)
                <a href="{{ route('place.index', ['category' => $category->name]) }}">
                    <figure class="item text-center">
                        <div class="image rounded-full d-flex align-items-center justify-content-center m-auto">
                            <img src="{{ asset('storage/' . $category->icon) }}" alt="airport"
                                class="img-fluid backface-hidden"
                                style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                        </div>
                        <figcaption>{{ $category->name }}</figcaption>
                    </figure>
                </a>
            @endforeach

            <!-- item 4 -->
            <figure class="item text-center" data-bs-toggle="modal" data-bs-target="#serviceModal">
                <div class="image rounded-full d-flex align-items-center justify-content-center m-auto">
                    <img src="{{ asset('assets/frontend/images/home/category.png') }}" alt="category"
                        class="img-fluid backface-hidden">
                </div>
                <figcaption>Lainya</figcaption>
            </figure>
        </section>
        <!-- service end -->

        <!-- service modal start -->
        <div class="modal fade serviceModal bottomModal modalBg" id="serviceModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="modal-close rounded-full" data-bs-dismiss="modal" aria-label="Close">
                            <img src="{{ asset('assets/frontend/svg/close-black.svg') }}" alt="Close">
                        </button>
                        <h1 class="modal-title">Semua Kategori</h1>
                    </div>
                    <div class="modal-body">
                        <!-- item 1 -->
                        @foreach ($categories as $category)
                            <a href="{{ route('place.index', ['category' => $category->name]) }}">
                                <figure class="item text-center">
                                    <div class="image rounded-full d-flex align-items-center justify-content-center m-auto">
                                        <img src="{{ asset('storage/' . $category->icon) }}" alt="airport"
                                            class="img-fluid backface-hidden"
                                            style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                                    </div>
                                    <figcaption>{{ $category->name }}</figcaption>
                                </figure>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- service modal end -->

        <!-- visited start -->
        <section class="visited py-12">
            <!-- title -->
            <div class="title d-flex align-items-center justify-content-between">
                <h2 class="shrink-0">Berdasarkan Rekomendasi Ai</h2>
                <div class="custom-pagination visited-pagination"></div>
            </div>

            <div class="swiper visited-swiper">
                <div class="swiper-wrapper">
                    <!-- item-1 -->
                    @foreach ($places as $destination)
                        <div class="swiper-slide place-card">
                            <a href="{{ route('place.show', $destination->slug) }}">
                                <div class="image position-relative">
                                    <img src="{{ asset('storage/' . $destination->image) }}" alt="desert"
                                        class="img-fluid w-100 overflow-hidden radius-8"
                                        style="height: 150px; object-fit: cover">
                                </div>
                                <div class="content">
                                    <h4>{{ $destination->name }}</h4>
                                    <p class="d-flex align-items-center gap-04 location">
                                        <img src="{{ asset('assets/frontend/svg/map-marker.svg') }}" alt="icon">
                                        {{ $destination->address }}
                                    </p>
                                    <div class="price d-flex align-items-center justify-content-between">
                                        <h3>Rp {{ number_format($destination->price, 0, ',', '.') }}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- visited end -->

        <!-- guide start -->
        <section class="guide py-12">
            <!-- title -->
            <div class="title d-flex align-items-center justify-content-between">
                <h2 class="shrink-0">Tour Guide</h2>
                <a href="tour-guide.html" class="shrink-0 d-inline-block">Lihat Semua</a>
            </div>

            <!-- cards -->
            <div class="d-flex gap-24 all-cards scrollbar-hidden">
                @foreach ($guides as $guide)
                    <!-- item 1 -->
                    <a href="{{ route('tour-guide.show', $guide->slug) }}" class="d-flex gap-16 item w-fit shrink-0">
                        <div class="image position-relative shrink-0">
                            <img src="{{ asset('storage/' . $guide->image) }}" alt="guide"
                                class="guide-img object-fit-cover img-fluid radius-12">
                            <div class="rating d-flex align-items-center gap-04 w-fit">
                                <img src="{{ asset('assets/frontend/svg/star-yellow.svg') }}" alt="Star">
                                <span class="d-inline-block">5.0</span>
                            </div>
                        </div>

                        <div class="content">
                            <h4>{{ $guide->name }}</h4>
                            <h5>Rp {{ number_format($guide->price, 0, ',', '.') }} (1 Hari)</h5>
                            <p class="d-flex align-items-center gap-8 location">
                                <img src="{{ asset('assets/frontend/svg/map-black.svg') }}" alt="icon">
                                {{ $guide->place->name }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
        <!-- guide end -->
    </main>
@endsection

@section('js')
    <script src="{{ asset('assets/frontend/js/preference.js') }}"></script>

    <script>
        const categories = {!! json_encode($allCategories) !!};

        localStorage.setItem('categories', JSON.stringify(categories));

        // Memeriksa apakah preferensi sudah diisi (melalui server-side)
        document.addEventListener('DOMContentLoaded', function() {
            const preferences = {{ $preferences ? 'true' : 'false' }};
            if (!preferences) {
                showPreferenceModal();
            }
        });
    </script>
@endsection
