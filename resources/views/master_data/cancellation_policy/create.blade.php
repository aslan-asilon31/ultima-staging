@extends('templates/template')
@section('header_title')
    CREATE CANCELLATION POLICY
@endsection
@section('content')
    <div class="col-lg-7">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body shadow">
                    <form enctype="multipart/form-data" method="POST" action="{{ route('cancellation_policy.insert') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <label for="name">Cancellations Name</label>
                                <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Cancellation name">

                                    <!-- error message untuk title -->
                                    @error('name')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <br>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label for="description">Description</label>
                                <div class="form-group">
                                    <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description" style="padding: 2% 0% 20% 2%;"></textarea>

                                    <!-- error message untuk title -->
                                    @error('description')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <br>
                            </div>
                        </div>
                            <div class="pull-right">
                                <a class="btn btn-white btn-padding" href="{{ route('cancellation_policy.index') }}">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-horison-gold btn-padding" >Save</button>
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
    </script>
@endsection
