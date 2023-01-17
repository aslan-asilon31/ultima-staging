@extends('templates/template')
@section('header_title')
    EDIT CANCELLATION POLICY
@endsection
@section('content')
    <div class="col-lg-7">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body shadow">
                    <form id="delete_room" onsubmit="return confirm('Are you sure ?')" method="POST"
                        action="{{ route('cancellation_policy.delete', $cancellationpolicies->id) }}" enctype="multipart/form-data" autocomplete="off">
                        <input type="hidden" name="id" id="cancellation-id" value="{{ $cancellationpolicies->id }}">
                        {{ csrf_field() }}
                    </form>
                    <form method="POST" action="{{ route('cancellation_policy.update', $cancellationpolicies->id)}}" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                    <label>Cancellation Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Cancellation" value="{{ $cancellationpolicies->name }}">
                                <br>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label for="description">Description</label><br>
                                <textarea type="text" class="form-control" name="description" id="description" placeholder="Description" style="padding: 2% 0% 20% 2%;">{{ $cancellationpolicies->description }}</textarea><br><br>
                                <br>
                            </div>
                        </div>
                            <div class="pull-right">
                                <button type="submit" form="delete_room" class="btn btn-delete btn-padding">
                                    Delete
                                </button>
                                <a class="btn btn-white btn-padding" href="{{ route('cancellation_policy.index') }}">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-horison-gold btn-padding">Update</button>
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
