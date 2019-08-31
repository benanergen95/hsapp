@extends('layouts.app')
@php
    use App\Child;
    use App\Entries;
    use App\User;

    $child = App\Child::where('childID', Auth::user()->currentChild)->first();
    $entries = App\Entries::where('childID', Auth::user()->currentChild)->first();
@endphp
@section('navigation')
    @if (Auth::user()->admin == 1)
        @include ('layouts.navAdmin')
    @else
        @include ('layouts.navUserHome')
    @endif

@endsection

@section('script')
    <link href="{{asset('/css/sticky-footer-navbar.css')}}?{{time()}}" rel="stylesheet">
@endsection

@section('content')
    <div class="jumbotron bg-gery rounded-top rounded-bottom border border-secondry mx-2">

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                {{$message}}
            </div>
        @endif
        <h2 class="av1"><b>Hello {{ Auth::user()->fname}} {{ Auth::user()->lname}}!</b></h2>
        <h2 class="av1"><b>Welcome to {{$child->CfName}} {{$child->ClName}}'s health journey.</b></h2>
        <div class="av1">
            <p class=""><b>Please Select a test</b></p>
        </div>
        <hr>
        <!--<div class="container">-->
        <div class="row no-gutters">
            @if (is_null($entries->height) || is_null($entries->weight) || is_null($entries->waist))
                <div class="col-2">
                    <a href="Weight0"  class="btn btn-primary btn-lg btn-block"><i
                                class="fas fa-weight"></i></a>
                </div>
                <div class="col">
                    <a href="Weight0"  class="btn btn-primary btn-lg btn-block">Weight</a>
                </div>
            @endif
            @if (isset($entries->height) && isset($entries->weight) && isset($entries->waist))
                <div class="col-2">
                    <a href="Weight4"  class="btn btn-primary btn-lg btn-block"><i
                                class="fas fa-weight"></i></a>
                </div>
                <div class="col-7">
                    <a href="Weight4" class="btn btn-primary btn-lg btn-block">Weight</a>
                </div>
                <div class="col-3">
                    <a href="Weight5" class="btn btn-outline-primary btn-lg btn-block">Tips</a>
                </div>
            @endif
        </div>
        <br>
        <div class="row no-gutters">

            @if (is_null($entries->fruits) || is_null($entries->veggies))
                <div class="col-2">
                    <a href="Diet0"  class="btn btn-success btn-lg btn-block"><i
                                class="fas fa-apple-alt"></i></a>
                </div>
                <div class="col">
                    <a href="Diet0"  class="btn btn-success btn-lg btn-block">Fruit & Veggies</a>
                </div>
            @endif

            @if (isset($entries->fruits) && isset($entries->veggies))
                <div class="col-2">
                    <a href="Diet3" class="btn btn-success btn-lg btn-block "><i
                                class="fas fa-apple-alt"></i></a>
                </div>
                <div class="col-7">
                    <a href="Diet3"  class="btn btn-success btn-lg btn-block ">Fruit & Veggies</a>
                </div>
                <div class="col-3">
                    <a href="Diet4" class="btn btn-outline-success btn-lg btn-block">Tips</a>
                </div>
            @endif
        </div>
        <br>
        <div class="row no-gutters">

            @if (is_null($entries->exercise))
                <div class="col-2">
                    <a href="Exercise0"  class="btn btn-danger btn-lg btn-block"><i
                                class="fas fa-walking"></i></a>
                </div>
                <div class="col">
                    <a href="Exercise0" class="btn btn-danger btn-lg btn-block">Exercise</a>
                </div>
            @endif
            @if (isset($entries->exercise))
                <div class="col-2">
                    <a href="Exercise2" class="btn btn-danger btn-lg btn-block "><i
                                class="fas fa-walking"></i></a>
                </div>
                <div class="col-7">
                    <a href="Exercise2"  class="btn btn-danger btn-lg btn-block ">Exercise</a>
                </div>
                <div class="col-3">
                    <a href="Exercise3"  class="btn btn-outline-danger btn-lg btn-block">Tips</a>
                </div>
            @endif
        </div>
        <br>
        <div class="row no-gutters">

            @if (is_null($entries->screenTimeSD) || is_null($entries->screenTimeNSD))
                <div class="col-2">
                    <a href="ScreenTime0"  class="btn btn-info btn-lg btn-block"><i class="fas fa-tv"></i></a>
                </div>
                <div class="col">
                    <a href="ScreenTime0"  class="btn btn-info btn-lg btn-block">Screen time</a>
                </div>
            @endif
            @if (isset($entries->screenTimeSD) && isset($entries->screenTimeNSD))
                <div class="col-2">
                    <a href="ScreenTime4"  class="btn btn-info btn-lg btn-block "><i class="fas fa-tv"></i></a>
                </div>
                <div class="col-7">
                    <a href="ScreenTime4"  class="btn btn-info btn-lg btn-block ">Screen time</a>
                </div>
                <div class="col-3">
                    <a href="ScreenTime5"  class="btn btn-outline-info btn-lg btn-block">Tips</a>
                </div>
            @endif
        </div>
        <br>
        <div class="row no-gutters">

            @if (is_null($entries->sleepSD) || is_null($entries->sleepNSD))
                <div class="col-2">
                    <a href="Sleep0"  class="btn btn-tears btn-lg btn-block"><i class="fas fa-bed"></i></a>
                </div>
                <div class="col">
                    <a href="Sleep0"  class="btn btn-tears btn-lg btn-block">Sleep</a>
                </div>
            @endif
            @if (isset($entries->sleepSD) && isset($entries->sleepNSD))
                <div class="col-2">
                    <a href="Sleep3"  class="btn btn-tears btn-lg btn-block "><i
                                class="fas fa-bed"></i></a>
                </div>
                <div class="col-7">
                    <a href="Sleep3"  class="btn btn-tears btn-lg btn-block ">Sleep</a>
                </div>
                <div class="col-3">
                    <a href="Sleep4"  class="btn btn-outline-tears btn-lg btn-block ">Tips</a>
                </div>
            @endif
        </div>


        <!--</div>-->
        <br>


        <hr>
        <div class="">
            <p class="text-center"><b>Your Progress </b></p>
            <div class="progress bg-white border border-dark">
                @if (isset($entries->height) && isset($entries->weight))
                    <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: 20%"
                         aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%
                    </div>
                @endif
                @if (isset($entries->fruits) && isset($entries->veggies))
                    <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 20%"
                         aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%
                    </div>
                @endif
                @if (isset($entries->exercise))
                    <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 20%"
                         aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%
                    </div>
                @endif
                @if (isset($entries->screenTimeSD) && isset($entries->screenTimeNSD))
                    <div class="progress-bar bg-info progress-bar-striped" role="progressbar" style="width: 20%"
                         aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%
                    </div>
                @endif
                @if (isset($entries->sleepSD) && isset($entries->sleepNSD))
                    <div class="progress-bar bg-tears progress-bar-striped" role="progressbar" style="width: 20%"
                         aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%
                    </div>
                @endif
            </div>

        </div>
    </div>
@endsection