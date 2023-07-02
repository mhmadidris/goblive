@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column gap-4">
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
        </style>

        <div class="d-flex flex-column text-white">
            <div class="d-flex flex-column justify-content-center align-content-center align-items-center">
                <h2 style="font-family: Black Ops One; font-size: 2.5rem;">GOBLIVE</h2>
                <p>Get ready to explore, compete, and redefine what it means to be a hero. Step into the extraordinary, and
                    let
                    the
                    games begin.</p>
            </div>
            {{-- <div class="d-flex flex-row gap-2 mb-3">
                <div class="p-0 input-group rounded-pill shadow-sm">
                    <input class="form-control border-0 shadow-none rounded-start-pill custom-input-bg text-white px-3"
                        type="text" wire:model="search" placeholder="Search video" id="example-search-input">
                    <span class="input-group-append border-0">
                        <div class="btn text-white rounded-end-pill ms-n5 custom-button-bg">
                            <i class="fas fa-search"></i>
                        </div>
                    </span>
                </div>
                <button wire:click="resetFilters" class="btn text-white fw-bold rounded btn-color">
                    <i class="fas fa-filter"></i>
                </button>
            </div> --}}
        </div>

        {{-- <h5 class="text-white">Result of <strong>"{{ 'Mobile Legends' }}"</strong></h5> --}}

        <div class="container">
            <div class="row">
                {{-- @foreach ($videos as $item)
                    <div class="col-md-3 mb-3">
                        <div class="d-flex flex-column text-white">
                            <div class="position-relative">
                                <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                                    style="background-color: #353839;">
                                    <small>{{ $item->duration }}</small>
                                </div>
                                <img src="{{ asset('storage/' . $item->thumbnail) }}" class="rounded"
                                    style="width: 100%; height: 10rem; object-fit: cover;">
                            </div>
                            <a href="{{ route('video.show', $item->url) }}" class="nav-link">
                                <h5 class="fw-bold mt-2">{{ $item->title }}</h5>
                            </a>
                            <div class="d-flex align-items-center gap-2">
                                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                                    style="width: 25px;" alt="Avatar" />
                                <h6 class="m-0 fw-semibold">{{ $item->username }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach --}}
                <h1>live</h1>
            </div>
        </div>
    </div>
@endsection
