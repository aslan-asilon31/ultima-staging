@extends('templates/template')
@section("header_title") FUNCTION ROOM @endsection
@section('content')
<div class="col-lg-12">
    <div class="row">
        <a href="/master_data/function_room/create" class="btn btn-horison btn-lg pull-right"><b>+ ADD NEW FUNCTION ROOM</b></a>
        <div class="center" style="margin-top: 10vh;">
            <img src="{{asset('/images/dashboard/fr_no_data.png')}}" alt="No Data" class="center" style="margin-top: 0px;">
            <center>
                <h4>It’s seem you doesn’t have any function room</h4>
                <h4>Try adding your function room!</h4>
            </center>
        </div>
    </div>
</div>
@endsection
