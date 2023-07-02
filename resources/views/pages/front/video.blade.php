@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column gap-4">
        <livewire:videos-component :category="$category" />
    </div>
@endsection
