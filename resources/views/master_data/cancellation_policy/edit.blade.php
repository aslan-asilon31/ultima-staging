@extends('templates/template')
@section('header_title')
    EDIT CANCELLATION POLICY
@endsection
@section('content')
    <div class="col-lg-7">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body shadow">
                    <form method="POST" action="{{ route('cancellation_policy.insert') }}" enctype="multipart/form-data" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <label for="name">Cancellations Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name', $name)}}"
                                    placeholder="cancellation Name">
                                <br>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label for="description">Description</label>
                                <textarea type="text" class="form-control" id="description" name="description" value="{{old('description', $description)}}"
                                    placeholder="New Description"></textarea>
                                <br>
                            </div>
                        </div>
                            <div class="pull-right">
                                <a class="btn btn-white btn-padding" href="{{ route('rates_plan.index') }}">
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
