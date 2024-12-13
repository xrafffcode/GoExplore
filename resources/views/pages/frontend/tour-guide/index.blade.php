@extends('layouts.frontend')

@section('title', 'Tour Guide')

@section('content')

    <main class="tour-guide">
        <!-- page-title -->
        <div class="page-title">
            <a href="{{ route('home') }}"
                class="back-btn back-page-btn d-flex align-items-center justify-content-center rounded-full">
                <img src="{{ asset('assets/frontend/svg/arrow-left-black.svg') }}" alt="arrow">
            </a>
            <h3 class="main-title">Tour Guide</h3>
        </div>

        <section class="guide px-24 pb-24">
            <ul>
                <!-- guide card 1 -->
                @foreach ($guides as $guide)
                    <li>
                        <a href="{{ route('tour-guide.show', $guide->slug) }}" class="d-flex gap-16 item w-fit shrink-0">
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
                    </li>
                @endforeach
            </ul>
        </section>
    </main>
@endsection
