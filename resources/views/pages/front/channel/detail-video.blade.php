@extends('layouts.app')

@section('content')
    <style>
        .input-group {
            background: linear-gradient(180deg, #000000, #0e1111);
        }

        .custom-input-bg {
            background: rgb(65, 65, 73);
            background: radial-gradient(circle, rgba(65, 65, 73, 1) 0%, rgba(57, 57, 57, 1) 100%);
            color: white;
        }

        .custom-input-bg::placeholder {
            color: white;
        }

        .custom-button-bg {
            background: rgb(65, 65, 73);
            background: radial-gradient(circle, rgba(65, 65, 73, 1) 0%, rgba(57, 57, 57, 1) 100%);
        }

        .btn-color {
            background: rgb(65, 65, 73);
            background: radial-gradient(circle, rgba(65, 65, 73, 1) 0%, rgba(57, 57, 57, 1) 100%);
        }

        .bg-btn-color {
            background-color: #353839;
            color: white;
        }

        .bg-btn-color:hover {
            background-color: white;
            color: black;
        }

        /* .bg-modal {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        background: linear-gradient(60deg, #29323c 0%, #485563 100%);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } */

        .nav-channel-active {
            padding-bottom: 5px;
            text-decoration: none;
            font-weight: bold;
            border-bottom: 5px solid white;
        }
    </style>

    @include('pages.front.channel.information-channel')

    <div class="container" style="height: 150vh;">
        <livewire:channel-video :channel="$channel" />
    </div>
@endsection
