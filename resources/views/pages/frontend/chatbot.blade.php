@extends('layouts.frontend')

@section('title', 'Chatbot')

@section('class', 'chat')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/chat.css') }}">
@endsection

@section('content')
    <main class="chat">
        <!-- page-title -->
        <div class="page-title">
            <button type="button"
                class="back-btn back-page-btn d-flex align-items-center justify-content-center rounded-full">
                <img src="{{ asset('assets/frontend/svg/arrow-left-black.svg') }}" alt="arrow">
            </button>
            <h3 class="main-title">Chat Bot GoExplore</h3>
        </div>

        <!-- inbox start -->
        <section class="inbox px-24">
            <ul>
                <li class="left d-flex gap-12">
                    <div class="text">
                        <p class="msg">Lorem ipsum dolor sit et, consectetur adipiscing.</p>
                    </div>
                </li>

                <li class="right d-flex flex-row-reverse gap-12">
                    <div class="text">
                        <p class="msg">Lorem ipsum dolor sit et, consectetur adipiscing.</p>
                    </div>
                </li>
            </ul>
        </section>
        <!-- inbox end -->

        <!-- type-msg start -->
        <section class="type-msg">
            <form action="#">
                <div class="d-flex align-items-center gap-8 type-main">
                    <input type="text" placeholder="Tanya disini.." class="flex-grow input-msg">

                    <button type="button" class="d-flex align-items-center justify-content-center rounded-full shrink-0"
                        id="send-chat-button">
                        <img src="{{ asset('assets/frontend/svg/send.svg') }}" alt="icon">
                    </button>
                </div>
            </form>
        </section>
        <!-- type-msg end -->
    </main>
@endsection

@section('js')
    <script src="{{ asset('assets/frontend/js/chatbot.js') }}"></script>
@endsection
