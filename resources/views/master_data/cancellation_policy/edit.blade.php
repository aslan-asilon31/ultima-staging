@extends('templates/template')
@section('header_title')
    EDIT CANCELLATION POLICY
@endsection
@section('content')
    <div class="col-lg-7">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body shadow">
                    {{-- <form id="delete_room" onsubmit="return confirm('Are you sure ?')" method="POST"
                        action="{{ route('cancellation_policy.delete') }}" enctype="multipart/form-data" autocomplete="off">
                        <input type="hidden" name="id" id="cancellation-id" value="{{ $cancellationpolicies->id }}">
                        {{ csrf_field() }}
                    </form> --}}
                    <form method="POST" action="{{ route('cancellation_policy.update', $cancellationpolicies->id)}}" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                    <label>Cancellation Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Cancellation" value="{{ $cancellationpolicies->name }}">

                                    <!-- error message untuk title -->
                                    {{-- @error('name')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror --}}
                                <br>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label for="description">Description</label><br>
                                {{-- <input type="text" class="form-control" name="description" id="description" placeholder="Masukkan Cancellation" value="{{ $cancellationpolicies->description }}"> --}}

                                <textarea type="text" class="form-control" name="description" id="description" placeholder="Description" style="padding: 2% 0% 20% 2%;">{{ $cancellationpolicies->description }}</textarea><br><br>
                                {{-- <textarea type="text" class="form-control" id="description" name="description"
                                    placeholder="New Description"></textarea> --}}
                                    {{-- <label for="description">Description</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        value="{{old('description', $description)}}" placeholder="Description"> --}}
                          {{--           @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror --}}
                                <br>
                            </div>
                        </div>
                            <div class="pull-right">
                                <button type="submit" form="delete_room" class="btn btn-delete btn-padding delete" data-id="{{ $cancellationpolicies->id }}" data-name="{{ $cancellationpolicies->name }}">
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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $('.delete').click(function(){
            var cancellation_id = $(this).attr('data-id');
            var cancellation = $(this).attr('data-name');
            swal({
                  title: "Are you sure ?",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                  })
                  .then((willDelete) => {
                  if (willDelete) {
                        window.location = "{{ route('cancellation_policy.update', $cancellationpolicies->id)}}"
                        swal("Data berhasil di hapus", {
                        icon: "success",
                        });
                  } else {
                        // swal("cancellation "+cancellation+" gagal di hapus");
                        swal(
                              'Oooops!!!',
                              'Data gagal di hapus :)',
                              'error'
                        )
                  }
                  });
        });

    </script>
@endsection
