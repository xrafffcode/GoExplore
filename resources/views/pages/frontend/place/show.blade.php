@extends('layouts.frontend')

@section('title', $place->name)

@section('content')
    <main class="details vacation-details">
        <!-- banner start -->
        <section class="banner position-relative">
            <img src="{{ asset('storage/' . $place->image) }}" alt="Banner" class="w-100 img-fluid">

            <!-- title -->
            <div class="page-title">
                <a href="{{ route('home') }}"
                    class="back-btn back-page-btn d-flex align-items-center justify-content-center rounded-full">
                    <img src="{{ asset('assets/frontend/svg/arrow-left-black.svg') }}" alt="arrow">
                </a>
            </div>
        </section>
        <!-- banner end -->

        <!-- details-body start -->
        <section class="details-body">
            <!-- details-title -->
            <section class="d-flex align-items-center gap-8 details-title">
                <div class="flex-grow">
                    <h3>{{ $place->name }}</h3>
                    <ul class="d-flex align-items-center gap-8">
                        <li class="d-flex align-items-center gap-04">
                            <img src="{{ asset('assets/frontend/svg/map-black.svg') }}" alt="icon">
                            <p>{{ $place->address }}</p>
                        </li>
                    </ul>
                </div>
                <span class="d-flex align-items-center justify-content-center rounded-full shrink-0">
                    <img src="{{ asset('assets/frontend/svg/heart-red-light.svg') }}" alt="">
                </span>
            </section>

            <!-- details-info -->
            <section class="details-info pt-32 pb-16">
                <div class="title">
                    <h4>Details</h4>
                </div>
                <p>
                    {{ $place->description }}
                </p>
            </section>

            <!-- guide start -->
            <section class="guide py-16">
                <!-- title -->
                <div class="title">
                    <h4>Tour Guide</h4>
                </div>

                <!-- cards -->
                <div class="d-flex gap-24 all-cards scrollbar-hidden">
                    @forelse ($place->tourGuides as $guide)
                        <!-- item 1 -->
                        <a href="{{ route('tour-guide.show', $guide->id) }}" class="d-flex gap-16 item w-fit shrink-0">
                            <div class="image position-relative shrink-0">
                                <img src="{{ asset('storage/' . $guide->image) }}" alt="guide"
                                    class="guide-img object-fit-cover img-fluid radius-12">
                                <div class="rating d-flex align-items-center gap-04 w-fit">
                                    <img src="{{ asset('assets/frontend/svg/star-yellow.svg') }}" alt="Star">
                                    <span class="d-inline-block">5</span>
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
                    @empty
                        <p class="text-center">Tidak ada Tour Guide untuk destinasi ini</p>
                    @endforelse
                </div>
            </section>
            <!-- guide end -->

            <!-- reviews start -->
            <section class="reviews py-16">
                <!-- title -->
                <div class="title d-flex align-items-center justify-content-between">
                    <h4 class="shrink-0">Review</h4>
                </div>

                <!-- review card -->
                @for ($i = 0; $i < 4; $i++)
                    <div class="review-card d-flex gap-16">
                        <img src="{{ asset('assets/frontend/images/Avatar Image People.jpeg') }}" alt="Avatar"
                            style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">

                        <div class="flex-grow">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4>{{ ['Slamet Riyadi', 'John Doe', 'Jane Doe', 'Budi Santoso'][$i] }}</h4>
                                <span
                                    class="d-inline-block">{{ ['23 Nov 2024', '12 Dec 2024', '1 Jan 2025', '15 Jan 2025'][$i] }}</span>
                            </div>
                            <ul class="d-flex align-items-center gap-8">
                                @for ($j = 0; $j < 5; $j++)
                                    <li><img src="{{ asset('assets/frontend/svg/star-yellow.svg') }}" alt="icon"></li>
                                @endfor
                            </ul>
                            <p>
                                {{ ['Destinasi sangat bagus, sangat rekomendasi, terima kasih', 'Tempat yang bagus', 'Saya sangat senang dengan destinasi ini', 'Destinasi yang bagus, makanya rekomendasi'][$i] }}
                            </p>
                        </div>
                    </div>
                @endfor
            </section>
            <!-- reviews end -->

            <!-- location start -->
            <section class="details-location pt-16">
                <!-- title -->
                <div class="title">
                    <h4>Lokasi</h4>
                </div>

                <!-- map -->
                <div class="overflow-hidden radius-16">
                    <div id="lokasi" style="height: 200px"></div>
                </div>
            </section>
            <!-- location end -->
        </section>
        <!-- details-body end -->

        <!-- details-footer start -->
        <section class="details-footer d-flex align-items-center justify-content-between gap-8 w-100">
            <p>Rp {{ number_format($place->price, 0, ',', '.') }}<span>/Orang</span></p>
            <a
                href="https://api.whatsapp.com/send/?phone={{ $place->phone }}&text=Hai+saya+tertarik+dengan+destinasi+{{ $place->name }}+dan+ingin+membeli+tiket&type=phone_number&app_absent=0">Beli
                Tiket</a>
        </section>
        <!-- details-footer end -->
    </main>
@endsection


@section('js')
    <script>
        var mymap = L.map('lokasi').setView([{{ $place->latitude }}, {{ $place->longitude }}], 13);

        var marker = L.marker([{{ $place->latitude }}, {{ $place->longitude }}]).addTo(mymap);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
            maxZoom: 18,
        }).addTo(mymap);

        marker.bindPopup("<b>Lokasi Destinasi Wisata</b><br>{{ $place->address }}").openPopup();
    </script>
@endsection
