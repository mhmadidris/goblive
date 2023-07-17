@extends('layouts.front')

@section('content')
    <style>
        .card-block {
            width: 200px;
            border: 1px solid lightgrey;
            border-radius: 5px !important;
            background-color: #FAFAFA;
        }

        .card-body.show {
            display: block;
        }

        .card {
            padding-bottom: 20px;
            box-shadow: 2px 2px 6px 0px rgb(200, 167, 216);
        }

        .radio {
            display: inline-block;
            border-radius: 0;
            box-sizing: border-box;
            cursor: pointer;
            color: #000;
            font-weight: 500;
            -webkit-filter: grayscale(100%);
            -moz-filter: grayscale(100%);
            -o-filter: grayscale(100%);
            -ms-filter: grayscale(100%);
            filter: grayscale(100%);
        }


        .radio:hover {
            box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.1);
        }

        .radio.selected {
            -webkit-filter: grayscale(0%);
            -moz-filter: grayscale(0%);
            -o-filter: grayscale(0%);
            -ms-filter: grayscale(0%);
            filter: grayscale(0%);
        }

        .selected {
            background-color: #FCD411;
        }

        .a {
            justify-content: center !important;
        }

        .btn {
            border-radius: 0px;
        }

        .btn,
        .btn:focus,
        .btn:active {
            outline: none !important;
            box-shadow: none !important;
        }
    </style>


    <div class="container min-vh-100 d-flex flex-column justify-content-center align-items-center gap-2 w-75">
        <form class="w-100" action="{{ route('coins.topupCoin') }}" method="POST">
            @csrf
            <div class="mb-4">
                <h2 class="text-center fw-bold">Package Available</h2>
            </div>

            <livewire:topup-coin :myChannel="$myChannel" :paket="$paket" />
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#plusBtn').on('click', function() {
                var value = parseInt($('#myInput').val());
                value++;
                $('#myInput').val(value);
            });

            $('#minusBtn').on('click', function() {
                var value = parseInt($('#myInput').val());
                if (value > 0) {
                    value--;
                    $('#myInput').val(value);
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.radio-group .radio').click(function() {
                $('.selected .fa').removeClass('fa-check');
                $('.radio').removeClass('selected');
                $(this).addClass('selected');
            });
        });
    </script>
@endsection
