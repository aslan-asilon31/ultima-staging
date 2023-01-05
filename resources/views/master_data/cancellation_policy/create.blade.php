@extends('templates/template')
@section('header_title')
    CREATE CANCELLATION POLICY
@endsection
@section('content')
    <div class="col-lg-7">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body shadow">
                    <form enctype="multipart/form-data" method="POST"  action="{{ route('cancellation_policy.insert') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <label for="name">Cancellations Name</label>
                                <input type="text" class="form-control" id="name" name="name" value=""
                                    placeholder="cancellation Name">
                                <br>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label for="description">Description</label>
                                <textarea type="text" class="form-control" id="description" name="description" value=""
                                    placeholder="New Description"></textarea>
                                <br>
                            </div>
                        </div>
                            <div class="pull-right">
                                <a class="btn btn-white btn-padding" href="{{ route('cancellation_policy.index') }}">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-horison-gold btn-padding">Save</button>
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
    </script>
@endsection
