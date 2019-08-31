@extends('layouts.app')
@php
    use App\Results;  
    use App\Child;
@endphp
@section('navigation')
    @include ('layouts.navUser')
@endsection

@section('css')
    <link href="{{asset('/css/extra-physical.css')}}?{{time()}}" rel="stylesheet" type="text/css">
@endsection

@section('content')

    @if(!isset(Auth::user()->email))
        <script>window.location = "Login";</script>
    @endif
    @php
        $data1=DB::table('summernotes')->where("item_id","=",52)->value('content'); //well done
         $data2=DB::table('summernotes')->where("item_id","=",53)->value('content'); //message for normal
         $data3=DB::table('summernotes')->where("item_id","=",54)->value('content');//getting there
         $data4=DB::table('summernotes')->where("item_id","=",55)->value('content'); //message for not normal
         $data5=DB::table('summernotes')->where("item_id","=",56)->value('content');//image

             $result = App\Results::where('childID', Auth::user()->currentChild)->first();
             $child = App\Child::where('childID', Auth::user()->currentChild)->first();
           $entries = App\Entries::where('childID', Auth::user()->currentChild)->first();
             $exercise = $result->Rexercise;
           $exercisev = date('H:i', strtotime($entries->exercise));

             if ($exercise == 0)
             {
                 $exerciseMessage = $data1;
                 $finalMessage = $child->CfName.",".$data2 ;
             }
             else
             {
                 $exerciseMessage = $data3;
                 $finalMessage = $child->CfName.",".$data4;
             }
    @endphp

    <div class="jumbotron bg-white rounded-bottom border border-danger mx-2">
        <h2 class="text-center text-danger">Exercise</h2>
        <hr>
        <div class="container text-center">
            <div class="row">
                <div class="col align-self-center">
                    <h3 class="featurette-heading text-danger">Result<span class="text-muted"></span></h3>
                    <div class="row justify-content-center  text-white">
                        <div class="col-10 lead bg-danger py-2"
                             style="background-color:#f4bec3">{{$exerciseMessage}}</div>
                    </div>
                    <p class="lead">{{$finalMessage}}</p>

                    <div class="row justify-content-center  text-white">
                        <div class="col lead bg-secondary">Your child</div>
                        <div class="col lead bg-secondary">Recommended</div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col text-black lead  border border-secondary"
                             style="background-color:#e4e6e7">{{ $exercisev}}
                        </div>
                        <div class="col text-black lead  border border-secondary" style="background-color:#e4e6e7">
                            Exercise more than 1 hour
                        </div>
                    </div>
                    <br>
                    {!! $data5 !!}
                </div>

            </div>
            <hr>
        </div>
        <!-- /END THE FEATURETTES -->
        <!-- /Start NAV Buttons -->
        <div class="av1">
            <form>
                <button onclick="location.href = 'Tests'" type="button" class="btn btn-primary btn-lg ">Next</button>
            </form>
        </div>
    </div><!-- /.container -->

@endsection
  