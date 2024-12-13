@extends('layouts.frontend')

@section('title', $guide->name)

@section('content')
    <main class="guide-profile">
        <!-- banner start -->
        <section class="banner position-relative">
            <img src="{{ asset('storage/' . $guide->place->image) }}" alt="Banner" class="w-100 img-fluid"
                style="height: 200px; object-fit: cover">

            <!-- title -->
            <div class="page-title">
                <button type="button"
                    class="back-btn back-page-btn d-flex align-items-center justify-content-center rounded-full">
                    <img src="{{ asset('assets/frontend/svg/arrow-left-black.svg') }}" alt="arrow">
                </button>
            </div>
        </section>
        <!-- banner end -->

        <!-- profile-info start -->
        <section class="profile-info px-24">
            <div class="image overflow-hidden radius-10">
                <img src="{{ asset('storage/' . $guide->image) }}" alt="Profile"
                    style="width: 150px; height: 150px; object-fit: cover">
            </div>

            <h3>{{ $guide->name }}</h3>
            <p>{{ $guide->description }}</p>
            <div class="d-flex align-items-center gap-16">
                <a href="https://api.whatsapp.com/send/?phone={{ $guide->phone }}&text=Hai+saya+tertarik+dengan+destinasi+{{ $guide->name }}+dan+ingin+membeli+tiket&type=phone_number&app_absent=0"
                    class="msg-btn flex-grow d-inline-block radius-12">
                    Hubungi
                </a>
            </div>
        </section>
        <!-- profile-info end -->

        <!-- summary start -->
        <section class="summary d-flex align-items-center justify-content-between px-24 py-24">
            <div class="text-center">
                <p>Guide</p>
                <h5>{{ $guide->total_guides }}+</h5>
            </div>
            <div class="divider"></div>
            <div class="text-center">
                <p>Experience</p>
                <h5>{{ $guide->total_years }} Tahun</h5>
            </div>
            <div class="divider"></div>
            <div class="text-center">
                <p>Rate</p>
                <h5>5<span>/5</span></h5>
            </div>
        </section>
        <!-- summary end -->

        <!-- profile-about start -->
        <section class="profile-about px-24 pb-24">
            <div class="title mb-8">
                <h4>About Us</h4>
            </div>
            <p>{{ $guide->description }}</p>
        </section>
        <!-- profile-about end -->
    </main>
@endsection
