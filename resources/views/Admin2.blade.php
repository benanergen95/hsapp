@extends('layouts.appAdmin')
@section('navigation')
    @include ('layouts.navAdmin')
@endsection

@section('content')
    @if(!isset(Auth::user()->email))
        <script>window.location = "Login";</script>
    @endif
    @if(Auth::user()->admin == 0)
        <script>window.location = "Tests";</script>
    @endif
    @php
        //get data from tables
            use App\Child;
            use App\Entries;
            use App\User;
            use App\Results;
            $parents = DB::table('users')->join('child', 'child.parentID', '=', 'users.id')
             ->orderBy('users.id', 'ASC')
             ->select('users.id','users.email','users.fname','users.lname','users.pType','child.childID','child.CfName AS cfname','child.ClName')
              ->get();
    @endphp
    <div class="row no-gutters">
        <div class="col">
            <a href="Admin"  class="btn btn-outline-primary btn-block ">Child Table</a>
        </div>
        <div class="col">
            <a href="Admin2"  class="btn btn-outline-primary  btn-block">Parent Table</a>
        </div>
        <div class="col">
            <a href="Admin3"  class="btn btn-outline-primary  btn-block">Entries value Table</a>
        </div>
        <div class="col">
            <a href="Admin4"  class="btn btn-outline-primary  btn-block">Results Table</a>
        </div>
        <div class="col">
            <a href="{{ route('export') }}"  class="btn btn-outline-dark  btn-block"><b>Export all tables
                    to Excel</b></a>
        </div>
    </div>
    <hr>
    <div align="center">
        <a href="{{ route('export2') }}" class="btn btn-success">Export Parents Table to Excel</a>
    </div>
    <hr>
    <h1 class="av1">Parent Table</h1>
    <hr>
    <!-- Begin page content -->
    <main role="main" class="container">
        <form>
            <div class="text-center">
                <table class="table table-bordered"><!--Table headings -->
                    <thead>
                    <tr>
                        <td> Parent ID</td>
                        <td>Email</td>
                        <td>Firstname</td>
                        <td>Lastname</td>
                        <td>Parent Type</td>
                        <td>Child ID</td>
                        <td>Child Firstname</td>
                        <td>Child Lastname</td>

                    </tr>
                    </thead>
                    <tbody id="dst">
                    @foreach($parents as $p)<!--Get data from database and display -->
                    <tr>
                        <td>{{ $p->id}}</td>
                        <td>{{ $p->email}}</td>
                        <td>{{ $p->fname}}</td>
                        <td>{{ $p->lname}}</td>
                        <td>{{ $p->pType}}</td>
                        <td>{{ $p->childID}}</td>
                        <td>{{ $p->cfname}}</td>
                        <td>{{ $p->ClName}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <hr>
            </div>
        </form>
    </main>
@endsection