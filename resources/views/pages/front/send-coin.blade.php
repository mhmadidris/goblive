@extends('layouts.app')

@section('content')
    <div class="container min-vh-100 d-flex flex-column justify-content-center align-items-center gap-2 w-75">
        <div class="container-fluid card shadow text-white" style="background: linear-gradient(#161616, #1c1c1c);">
            <div class="card-body d-flex flex-md-row flex-column justify-content-between align-items-center gap-3">
                <form class="w-100" action="{{ route('coins.store') }}" method="POST" id="sendCoinForm">
                    @csrf
                    <input type="hidden" value="{{ $videoId }}" name="videoId">
                    <input type="hidden" value="{{ $channelId }}" name="channelId">

                    <div class="text-center">
                        <img src="{{ asset('images/send-coin.png') }}" alt="Send Coin"
                            style="object-fit: cover; width: 15rem;">
                    </div>

                    <div class="d-flex flex-column align-items-center align-content-center justify-content-center">
                        <h2 class="fw-bold" id="sliderValue">0</h2>
                        <input type="range" class="form-control-range w-100" id="rangeCoin" max="{{ $myChannel->coin }}"
                            step="1" value="0" name="rangeCoins">
                        <h4 class="fw-bold my-2">My Coins: {{ number_format($myChannel->coin) }}</h4>
                    </div>

                    <div class="w-100">
                        <label for="pesanTextarea" class="form-label h5 fw-medium">Message <small>(optional)</small></label>
                        <textarea class="form-control" id="pesanTextarea" rows="6" name="pesan" placeholder="Type message for creator"
                            style="resize: none;"></textarea>
                    </div>

                    <div class="d-flex justify-content-end gap-2 w-100 mt-2">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const slider = document.getElementById('rangeCoin');
        const sliderValue = document.getElementById('sliderValue');

        // Add event listener to track changes in slider value
        slider.addEventListener('input', function() {
            const value = slider.value;
            sliderValue.textContent = value;
        });

        const sendCoinForm = document.getElementById('sendCoinForm');
        const minSliderValue = 5;

        sendCoinForm.addEventListener('submit', function(event) {
            if (slider.value == 0) {
                event.preventDefault();
                alert('Please select a value greater than 0.');
            } else if (slider.value < minSliderValue) {
                event.preventDefault();
                alert('The minimum value should be ' + minSliderValue + '.');
            }
        });
    </script>
@endsection
