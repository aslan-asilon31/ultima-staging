@extends('templates/template')
@section('header_title')
    EDIT RATES PLAN
@endsection
@section('content')
@if(isset($room))
@php
$base_rate = $room->base_rate;
$extrabed_rate = $room->extrabed_rate;
@endphp

@else

@php
$base_rate = "0";
$extrabed_rate = "0";
@endphp

@endif

    <div class="col-lg-7">
        <div class="row">

            <div class="panel panel-default">
                <div class="panel-body shadow">
                    <form enctype="multipart/form-data" method="POST"  action="{{ route('rates_plan.update', $ratesplans->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="ratesplans_name" id="ratesplans_id" value="{{$id}}">

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <label for="rate_name">Rates Name</label>
                                <div class="form-group">
                                    <input type="text" class="form-control @error('rate_name') is-invalid @enderror" id="rate_name" name="rate_name"
                                    placeholder="Free Upgrade to Super Deluxe" value="{{ $ratesplans->rate_name }}">
                                    @error('rate_name')
                                        <div class="invalid-feedback">
                                        {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                {{-- Meals --}}
                                <h5 class="mt mb">
                                    <strong>Meals</strong>
                                </h5>
                                <p class="mt mb">Applied meals plan for this rate plan ?</p>
                                <div class="form-group">
                                    @if($ratesplans->def_meal_available == 1)
                                    <div class="radio radio-replace color-primary" style="margin-bottom: 5px;">
                                        <input type="radio" id="available" name="def_meal_available" value="1" checked>
                                        <label>Include Meal</label>
                                    </div>
                                    <div class="radio radio-replace color-primary">
                                        <input type="radio" id="no_available" name="def_meal_available" value="0" >
                                        <label>No, don’t add meal plan for this rate plan</label>
                                    </div>
                                    @elseif($ratesplans->def_meal_available == 0)
                                    <div class="radio radio-replace color-primary" style="margin-bottom: 5px;">
                                        <input type="radio" id="available" name="def_meal_available" value="1" >
                                        <label>Include Meal</label>
                                    </div>
                                    <div class="radio radio-replace color-primary">
                                        <input type="radio" id="no_available" name="def_meal_available" value="0" checked>
                                        <label>No, don’t add meal plan for this rate plan</label>
                                    </div>
                                    @endif
                                </div>
                                {{-- Bookables --}}
                                <h5 class="mt mb">
                                    <strong>Bookables</strong>
                                </h5>
                                <p class="mt mb">How many days before check-in can guest book this rate plan?</p>
                                <div class="form-group">
                                    @if($ratesplans->def_bookable == 0)
                                    <div class="radio radio-replace color-primary" style="margin-bottom: 5px;">
                                        <input type="radio" id="AnyDays" name="def_bookable" value="0" checked>
                                        <label>Any days</label>
                                    </div>

                                    <div class="radio radio-replace color-primary">
                                        <input type="radio" id="SetNumber" name="def_bookable" value="" >
                                        <label>Set number of days before check in </label>
                                    </div>

                                    <div class="input-group col-lg-12">
                                        <input type="number" name=""
                                            class="show-hide form-control "
                                            id="DaySet" value="0" style="display: none; width:200px;margin-bottom:1px;margin-left:27px;" />
                                    </div>
                                    @elseif($ratesplans->def_bookable >= 1)
                                    <div class="radio radio-replace color-primary" style="margin-bottom: 5px;">
                                        <input type="radio" id="AnyDays" name="def_bookable" value="0" >
                                        <label>Any days</label>
                                    </div>

                                    <div class="radio radio-replace color-primary">
                                        <input type="radio" id="SetNumber" name="def_bookable" value="" checked>
                                        <label>Set number of days before check in </label>
                                    </div>

                                    <div class="input-group col-lg-12">
                                        <input type="number" name=""
                                            class="show-hide form-control "
                                            id="DaySet" value="{{ $ratesplans->def_bookable }}" style=" width:200px;margin-bottom:1px;margin-left:27px;" />
                                    </div>
                                    @endif
                                </div>
                                {{-- Minimum length of stay --}}
                                <h5 class="mt mb">
                                    <strong>Minimum length of stay</strong>
                                </h5>
                                <p class="mt mb">How many nights require for guest to book for this rate plan?</p>
                                @if($ratesplans->def_minimum_stay == 0)
                                <div class="radio radio-replace color-primary" style="margin-bottom: 5px;">
                                    <input type="radio" id="NoMinimum" name="def_minimum_stay" value="1" checked>
                                    <label>No Minimum </label>
                                </div>
                                <div class="radio radio-replace color-primary">
                                    <input type="radio" id="set_minimum" name="def_minimum_stay" value="0">
                                    <label>Set Minimum Nights </label>
                                </div>

                                <div class="input-group col-lg-12">
                                    <input type="number" name="Base Weekday Publish Rate"
                                        class="show-hide1 form-control"
                                        id="InputSet" value="0" style="display: none; width:200px;margin-bottom:1px;margin-left:27px;" />
                                </div>
                                @elseif($ratesplans->def_minimum_stay >= 0)
                                <div class="radio radio-replace color-primary" style="margin-bottom: 5px;">
                                    <input type="radio" id="NoMinimum" name="def_minimum_stay" value="0" >
                                    <label>No Minimum </label>
                                </div>
                                <div class="radio radio-replace color-primary">
                                    <input type="radio" id="set_minimum" name="def_minimum_stay" value="1" checked>
                                    <label>Set Minimum Nights </label>
                                </div>

                                <div class="input-group col-lg-12">
                                    <input type="number" name="Base Weekday Publish Rate"
                                        class="show-hide1 form-control"
                                        id="InputSet" value="{{ $ratesplans->def_minimum_stay }}" style=" width:200px;margin-bottom:1px;margin-left:27px;" />
                                </div>
                                @endif
                                <div class="form-group">
                                    <h5 class="mt mb">
                                        <strong>Set Cancellation Policy</strong>
                                    </h5>
                                    <p class="mt mb">Which cancellation policy is suitable for this rate plan?</p>
                                    <select name="cancellation_id" id="" class="form-control">
                                        @foreach($cancellations as $cancel)
                                        <option value="{{ $cancel->id }}">{{ $cancel->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <h5 class="mt mb">
                                        <strong>Apply rates to room types</strong>
                                    </h5>
                                    <p class="mt mb">Which room type will be bookable with this rate plans?</p>
                                    <select name="cancellation_id" id="" class="form-control">
                                        @foreach($ratesplans->room_rate_plans as $rrp )
                                            @foreach ($rrp->types as $typ)
                                            <option id="beforeSet" name="" value="">{{ $typ->room_name }}</option>
                                            @endforeach
                                        @endforeach
                                        @foreach($rooms as $room)
                                            <option id="afterSet" name="" value="{{ $room->id }}">{{ $room->room_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6 col-md-4">
                                    <label for="weekday_base_rate" class="">Base Rate</label>
                                    <div class="input-group col-lg-12">
                                        <span class="input-group-addon">Rp.</span>
                                        <input type="text" name="Base Weekday Publish Rate"
                                            class="form-control room_price thousandSeperator" oninput="ambilRupiah(this);"
                                            id="weekday_base_rate" value="{{$ratesplans->base_rate}}" placeholder="0" required/>
                                        <input type="hidden" name="base_rate" id="weekday_base_rate_input"
                                            value="{{$ratesplans->base_rate}}" />
                                    </div>
                                        @error('base_rate')
                                            <div class="alert alert-danger mt-2">
                                            {{$message}}
                                            </div>
                                        @enderror
                                        <br>
                                    <label for="weekday_extrabed_rate" class="">Extra Bed Rate</label>
                                    <div class="input-group col-lg-12">
                                        <span class="input-group-addon">Rp.</span>
                                        <input type="text" name="Base Weekday Room Only Rate"
                                            class="form-control room_price thousandSeperator" oninput="ambilRupiah(this);"
                                            id="weekday_extrabed_rate" value="{{$ratesplans->extrabed_rate}}" placeholder="0" required/>
                                        <input type="hidden" name="extrabed_rate" id="weekday_extrabed_rate_input"
                                            value="{{$ratesplans->extrabed_rate}}" />
                                        </div>
                                        @error('extrabed_rate')
                                            <div class="alert alert-danger mt-2">
                                            {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="pull-right">
                                <a class="btn btn-white btn-padding" href="{{ route('rates_plan.index') }}">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-horison-gold btn-padding">Update</button>
                            </div>
                        </form>
                        <div class="pull-right">
                            <form method="post" class="delete_form" action="{{route('rates_plan.delete',$ratesplans->id )}}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-delete btn-padding" style="">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="{{ asset('js/ratesplancreate.js') }}"></script>

    <script type="text/javascript">
        if ("{{$base_rate}}" != "") {
                var e = document.getElementById("weekday_base_rate");
                e.value = formatRupiah(e, e.value);
        }
        if ("{{$extrabed_rate}}" != "") {
                var e = document.getElementById("weekday_extrabed_rate");
                e.value = formatRupiah(e, e.value);
        }

        function ambilRupiah(e) {
            var hiddenInput = document.getElementById(e.id + "_value");
            hiddenInput.value = hiddenInput.value.replace(/[^0-9]*/g, '');
            hiddenInput.value = e.value.match(/\d/g).join("");
            e.value = formatRupiah(e, e.value);
        }

        /* Fungsi formatRupiah */
        function formatRupiah(rupiah, angka, prefix) {
            var number_string = angka.replace(/[^0-9]*/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);
            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
        }
    </script>
    <script>
        // function set_number(){
        //     document.getElementById('input_set_number').style.display = 'inline';
        // }

        // $(document).ready(function(){
        //     $("input[name=set_number]").change(function() {
        //         var test = $(this).val();
        //         $(".class-number").hide();
        //         $("#"+test).show();
        //     });
        // });

        // $(document).ready(function(){
        //     $("input[name=action]").change(function() {
        //         var test = $(this).val();
        //         $(".show-hide").hide();
        //         $("#"+test).show();
        //     });
        // });

        $(function () {
            $("input[name='def_bookable']").click(function () {
                if ($("#AnyDays").is(":checked")) {
                    $("#DaySet").hide();
                } else {
                    $("#DaySet").show();
                }
            });
        });


        $(function () {
            $("input[name='def_minimum_stay']").click(function () {
                if ($("#NoMinimum").is(":checked")) {
                    $("#InputSet").hide();
                } else {
                    $("#InputSet").show();
                }
            });

        });

        $("#DaySet").on("input",function(){
            $("#SetNumber").val(this.value);
        });

        $("#InputSet").on("input",function(){
            $("#set_minimum").val(this.value);
        });



        $(function () {
            $("input[name='def_meal_available']").click(function () {
                if ($("#NoMinimum").is(":checked")) {
                    // $("#InputSet").hide();
                    $("#NoMinimum").is(":checked")
                } else {
                    // $("#InputSet").show();
                }
            });
        });


    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $('.delete').click(function(){
            var ratesplans_id = $(this).attr('data-id');
            var ratesplans_name = $(this).attr('data-name');
            swal({
                  title: "Are you sure ?",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                  })
                  .then((willDelete) => {
                  if (willDelete) {
                        window.location = "delete/"+ratesplans_id+""
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
