@extends('templates/template')
@section('header_title')
    EDIT CANCELLATION POLICY
@endsection
@section('content')
    <div class="col-lg-7">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body shadow">
                    <form method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                    <label>Cancellation Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $cancellationpolicy->name) }}" placeholder="Masukkan Cancellation">
                            
                                    <!-- error message untuk title -->
                                    @error('name')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                <br>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                {{-- <label for="description">Description</label>
                                <textarea type="text" class="form-control" id="description" name="description"
                                    placeholder="New Description"></textarea> --}}
                                    {{-- <label for="description">Description</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        value="{{old('description', $description)}}" placeholder="Description">
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror --}}
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
