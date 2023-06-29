@extends('layouts.front')

@section('content')
    <style>
        .bg-custom {
            background: linear-gradient(112.1deg, rgb(32, 38, 57) 11.4%, rgb(63, 76, 119) 70.2%);
        }
    </style>

    <div class="bg-custom px-4 py-2">
        <div class="container-fluid">
            <div class="d-flex flex-row gap-4">
                <div class="w-100 d-flex flex-column">
                    <video src="https://youtu.be/FEoK645h4h4" class="rounded my-3 shadow" controls></video>
                    <h2 class="fw-bold" style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </h2>

                    <div class="mt-3 d-flex justify-content-between">
                        <div class="d-flex flex-row gap-4">
                            <div class="d-flex flex-row align-content-center align-items-center gap-1 text-gray-800">
                                <i class="fas fa-clock"></i>
                                <span title="12 October 2012 | 16:34">2 hours ago</span>
                            </div>

                            <div class="d-flex flex-row align-content-center align-items-center gap-1 text-gray-800">
                                <i class="fas fa-eye"></i>
                                <span>123,456 views</span>
                            </div>

                            {{-- <div class="d-flex flex-row align-content-center align-items-center gap-1 text-gray-800">
                            <i class="fas fa-comment"></i>
                            <span>23 comments</span>
                        </div> --}}

                            <div class="d-flex flex-row align-content-center align-items-center gap-1 text-gray-800">
                                <i class="fas fa-hashtag"></i>
                                <span>Console</span>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-sm rounded-pill" style="background-color: #a8b8d0;">
                                <i class="fas fa-share"></i>
                                Share
                            </button>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex flex-row justify-content-between align-content-center align-items-center">
                            <div class="d-flex flex-row align-content-center align-items-center gap-2">
                                <img class="rounded-circle shadow" style="width: 3.5rem; height: 3.5rem; object-fit: cover;"
                                    src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80"
                                    alt="avatar">
                                <div class="d-flex flex-column">
                                    <h5 class="fw-bold">Pewdiepie</h5>
                                    <p class="fw-medium p-0 m-0">123 Subscribers</p>
                                </div>
                            </div>
                            <div>
                                <button type="button" class="btn btn-sm btn-primary">Subscribe</button>
                            </div>
                        </div>

                        <p style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque
                            accusamus ipsam possimus
                            consectetur,
                            porro neque corporis temporibus tempore aliquid enim voluptatum illo libero nemo. Est, placeat
                            veniam? Corrupti, provident dicta.</p>
                    </div>
                </div>

                <div class="card w-25 d-none" style="height: 27.5rem;">
                    asa
                </div>
            </div>

            <h4 class="fw-bold mt-4 mb-3">Another Video</h4>
            <div class="owl-carousel owl-theme">
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
