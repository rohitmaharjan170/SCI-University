@extends('frontend.layouts.app')
@push('styles')
    <style>
        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu .dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -1px;
        }
    </style>
@endpush
@section('content')
    <!DOCTYPE html>
    <html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            .dropdown-submenu {
                position: relative;
            }

            .dropdown-submenu .dropdown-menu {
                top: 0;
                left: 100%;
                margin-top: -1px;
            }
        </style>
    </head>
    <body>

    <div class="container">
        <div class="dropdown mt-3">
            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Programs
                <span class="caret"></span></button>
            <ul class="dropdown-menu">
                @foreach($programs as $program)
                    <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" href="{{route('programs.show',$program->id)}}">{{$program->title_en}} <span class="caret"></span></a>
                        @if(!empty($program->courses))
                            <ul class="dropdown-menu">
                                @foreach($program->courses as $c)
                                    <li><a tabindex="-1" href="{{route('course.show', $c->id)}}">{{$c->title_en}}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.dropdown-submenu a.test').on("click", function (e) {
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
            });
        });
    </script>

    </body>
    </html>

@endsection