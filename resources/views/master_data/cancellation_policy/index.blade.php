@extends('templates/template')
@section('header_title')
    CANCELLATION POLICY
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="row">
            <a href="{{ route('cancellation_policy.create') }}" class="btn btn-horison btn-lg pull-right"><b>+ ADD CANCELLATION POLICY</b></a>
        </div>
        @if ($message = Session::get('success'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
            <div>
                <strong>{{ $message }}</strong>
            </div>
            </div>
        </div>
        @endif
        <br>
        <div class="row">
            <?php $no = 0; ?>
            @foreach ($cancellationpolicies as $cancel)
                <?php $no++; ?>
                <div class="panel panel-default">
                    <div class="panel-body shadow">
                        <div class="col-lg-3">
                            <h4 class="mb"><strong>{{ $cancel->name }}</strong></h4>

                            <h4 class="mb"><strong>Description</strong></h4>
                            <p class="mt">{{ $cancel->description }}</p>

                            <a href="{{ route('cancellation_policy.edit', Crypt::encryptString($cancel->id))}}" style="margin-top:20px;"
                            class="btn btn-horison manage-pkg" style=""><b>Manage Cancellation Policy</b>
                            </a>
                        </div>
                       <br>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
    {{-- @include('sweetalert::alert') --}}
@endsection
