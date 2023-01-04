@extends('templates/template')
@section('header_title')
    CANCELLATION POLICY
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="row">
            <a href="/master_data/cancellation_policy/create" class="btn btn-horison btn-lg pull-right"><b>ADD CANCELLATION POLICY</b></a>
        </div>
        <br>
        <div class="row">

                <div class="panel panel-default">
                    <div class="panel-body shadow">
                        <div class="col-lg-3">
                            <h4 class="mb"><strong>Free Cancellation</strong></h4>
                            <p class="mt">Can do cancellation before 2 days</i>

                            <h4 class="mb"><strong>Description</strong></h4>
                            <p class="mt">Free night cancellation 4 days prior before arrival</p>

                            <a href="{{ url('cancellation_policy.edit') }}" style="margin-top:20px;"
                            class="btn btn-horison manage-pkg" style=""><b>Manage Cancellation Policy</b>
                            </a>
                        </div>
                       <br>

                    </div>
                </div>

        </div>
    </div>
@endsection
