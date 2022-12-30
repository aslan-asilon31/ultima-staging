@extends('templates/template')
@section('header_title')
    CREATE CANCELLATION POLICY
@endsection
@section('content')
    <div class="col-lg-7">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body shadow">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <label for="cancellations_name">Cancellations Name</label>
                            <input type="text" class="form-control" id="cancellations_name" name="room_name" value=""
                                placeholder="cancellations Name">
                            <br>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <label for="cancellations_name">Description</label>
                            <textarea type="text" class="form-control" id="cancellations_name" name="room_name" value=""
                                placeholder="New Description"></textarea>
                            <br>
                        </div>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-white btn-padding" href="{{ route('rates_plan.index') }}">
                            Cancel
                        </a>
                        <button type="button" class="btn btn-horison-gold btn-padding">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    </script>
@endsection
