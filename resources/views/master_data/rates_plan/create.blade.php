@extends('templates/template')
@section('header_title')
    ADD RATES PLAN
@endsection

@section('content')
@php
$set_days = "0";
$base_rate_val = "1.000.000";
$extrabed_rate_val = "1.000.000";
@endphp


    <div class="col-lg-7">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body shadow">
                    <form enctype="multipart/form-data" method="POST"  action="{{ route('rates_plan.insert') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <label for="rate_name">Rates Name</label>
                                <input type="text" class="form-control @error('rate_name') is-invalid @enderror" id="rate_name" name="rate_name"
                                    placeholder="Free Upgrade to Super Deluxe">
                                    @error('rate_name')
                                        <div class="invalid-feedback">
                                        {{$message}}
                                        </div>
                                    @enderror
                                <br>

                                {{-- Meals --}}
                                <h5 class="mt mb">
                                    <strong>Meals</strong>
                                </h5>
                                <p class="mt mb">Applied meals plan for this rate plan ?</p>
                                <div class="radio radio-replace color-primary" style="margin-bottom: 5px;">
                                    <input type="radio" class="form-control @error('def_meal_available') is-invalid @enderror" id="available" name="def_meal_available" value="1">

                                    <label>Include Meal</label>
                                </div>
                                <div class="radio radio-replace color-primary">
                                    <input type="radio" class="form-control @error('def_meal_available') is-invalid @enderror" id="no_available" name="def_meal_available" value="0">

                                    <label>No, don’t add meal plan for this rate plan</label>
                                </div>

                                @error('def_meal_available')
                                <div class="invalid-feedback">
                                {{$message}}
                                </div>
                                @enderror
                                <br>

                                {{-- Bookables --}}
                                <h5 class="mt mb">
                                    <strong>Bookables</strong>
                                </h5>
                                <p class="mt mb">How many days before check-in can guest book this rate plan?</p>
                                <div class="radio radio-replace color-primary" style="margin-bottom: 5px;">
                                    <input type="radio" id="AnyDays" name="def_bookable" value="0">
                                    <label>Any days</label>
                                </div>

                                <div class="radio radio-replace color-primary">
                                    <input type="radio" id="SetNumber" name="def_bookable" value="setnumber"/>
                                    <label>Set number of days before check in </label>
                                </div>

                                <div class="input-group col-lg-12">
                                    <input type="text" class="form-control @error('def_meal_available') is-invalid @enderror " onkeypress="return onlyNumberKey(event)" maxlength="11" name="SetNumber"
                                        class="show-hide form-control "
                                        id="DaySet" value="{{ $set_days }}" style="display: none; width:200px;margin-bottom:1px;margin-left:27px;" />
                                </div>

                                @error('def_meal_available')
                                <div class="invalid-feedback">
                                {{$message}}
                                </div>
                                @enderror

                                <br>

                                {{-- Minimum length of stay --}}
                                <h5 class="mt mb">
                                    <strong>Minimum length of stay</strong>
                                </h5>
                                <p class="mt mb">How many nights require for guest to book for this rate plan?</p>

                                <div class="radio radio-replace color-primary" style="margin-bottom: 5px;">
                                    <input type="radio" class="form-control @error('def_minimum_stay') is-invalid @enderror" id="NoMinimum" name="def_minimum_stay" value="1">
                                    <label>No Minimum </label>
                                </div>

                                <div class="radio radio-replace color-primary">
                                    <input type="radio" class="form-control @error('def_minimum_stay') is-invalid @enderror" id="set_minimum" name="def_minimum_stay" value="0">
                                    <label>Set Minimum Nights </label>
                                </div>

                                <div class="input-group col-lg-12">
                                    <input type="text"  name="Base Weekday Publish Rate"
                                        class="show-hide1 form-control " onkeypress="return onlyNumberKey(event)" maxlength="11"
                                        id="InputSet" value="0" style="display: none; width:200px;margin-bottom:1px;margin-left:27px;" />
                                </div>

                                @error('def_minimum_stay')
                                <div class="invalid-feedback">
                                {{$message}}
                                </div>
                                @enderror

                                <hr>
                                <div class="form-group">
                                    <h5 class="mt mb">
                                        <strong>Set Cancellation Policy</strong>
                                    </h5>
                                    <p class="mt mb">Which cancellation policy is suitable for this rate plan?</p>
                                    <select name="cancellation_id" id="" class="form-control @error('cancellation_id') is-invalid @enderror">
                                        <option value="">Choose Cancellation</option>
                                        @foreach($cancellations as $cancel)
                                        <option value="{{ $cancel->id }}">{{ $cancel->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                @error('cancellation_id')
                                <div class="invalid-feedback">
                                {{$message}}
                                </div>
                                @enderror
                                <hr>
                                <h5 class="mt mb"><strong>Apply rates to room types</strong></h5>
                                <p class="mt mb">Which room type will be bookable with this rate plans?</p>
                                    <select name="" id="" class="form-control  " >
                                        <option value="">Choose Room</option>
                                        @foreach($rooms as $room)
                                        <option  value="{{ $room->id }}"><label>{{ $room->room_name }}</label></option>
                                        @endforeach
                                    </select>

                                @error('room_name[]')
                                <div class="invalid-feedback">
                                {{$message}}
                                </div>
                                @enderror
                                <br>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6 col-md-4">
                                    <label for="base_rate" class="">Base Rate</label>
                                    {{-- <div class="input-group col-lg-12">
                                        <span class="input-group-addon">Rp.</span>
                                        <input type="text" name="Base Weekday Publish Rate"
                                            class="form-control room_price thousandSeperator" oninput="ambilRupiah(this);"
                                            id="weekday_rate" value="{{$base_rate_val}}" />
                                        <input type="hidden" name="base_rate_val" id="weekday_rate_input"
                                            value="{{$base_rate_val}}" />
                                    </div> --}}
                                    <div class="input-group col-lg-12">
                                        <span class="input-group-addon">Rp.</span>
                                        <input type="text" name="Base Weekday Publish Rate"
                                            class="form-control room_price thousandSeperator" oninput="ambilRupiah(this);"
                                            id="weekday_rate" value="{{$base_rate_val}}" />
                                        <input type="hidden" name="base_rate_val" id="weekday_rate_input"
                                            value="{{$base_rate_val}}" />
                                        {{-- <input type="number" name="base_rate"
                                            class="form-control @error('base_rate') is-invalid @enderror room_price thousandSeperator" oninput="ambilRupiah(this);"
                                            id="base_rate" value="{{ $base_rate_val }}" /> --}}
                                    </div>
                                    @error('base_rate')
                                    <div class="invalid-feedback">
                                    {{$message}}
                                    </div>
                                    @enderror
                                    <br>
                                    <label for="extrabed_rate" class="">Extra Bed Rate</label>
                                    <div class="input-group col-lg-12">
                                        <span class="input-group-addon">Rp.</span>
                                        <input type="text" name="Base Weekday Publish Rate"
                                            class="form-control room_price thousandSeperator" oninput="ambilRupiah(this);"
                                            id="weekday_rate" value="{{$extrabed_rate_val}}" />
                                        <input type="hidden" name="extrabed_rate_val" id="weekday_rate_input"
                                            value="{{$extrabed_rate_val}}" />
                                        {{-- <input x-mask:dynamic="$money($input, ',')" type="number" name="extrabed_rate"
                                            class="form-control @error('extrabed_rate') is-invalid @enderror room_price thousandSeperator" oninput="ambilRupiah(this);"
                                            id="extrabed_rate" value="{{ $extrabed_rate_val }}" /> --}}
                                      {{--   <input type="hidden" name="extrabed_rate" id="extrabed_rate"
                                            value="" /> --}}
                                    </div>
                                    @error('extrabed_rate')
                                    <div class="invalid-feedback">
                                    {{$message}}
                                    </div>
                                    @enderror
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-white btn-padding" href="{{ route('rates_plan.index') }}" onclick="confirmBox(this)">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-horison-gold btn-padding" onclick="confirmBox(this)">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/ratesplancreate.js') }}"></script>

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

<script>
    var e = document.getElementById("extrabed_rate");
    e.value = formatRupiah(e, e.value);
</script>

<script type="text/javascript">
    if ("{{$set_days}}" != "") {
            var e = document.getElementById("weekday_rate");
            e.value = formatRupiah(e, e.value);
    }

    if ("{{ $extrabed_rate_val }}" != "") {
        var e = document.getElementById("extrabed_rate");
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

    function confirmBox(e) {
        var room_price = document.getElementsByClassName('room_price');
        console.log(room_price.length);
        var cek = true;
        var msg = '';

        for (let index = 0; index < room_price.length; index++) {
            const element = room_price[index];

            if(element.value == "0"){
                if(msg == ''){
                    msg += element.name;
                }else{
                    msg += ', '+element.name;
                }
                cek = false;
            }
            console.log(msg);
            if(msg != ''){
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This '+msg+' will be sold for Rp 0 ',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No'
                    }).then((result) => {
                    if (result.value) {
                        e.setAttribute('type','submit');
                        e.setAttribute('onclick','');
                        e.click();
                        cek = false;
                    // For more information about handling dismissals please visit
                    // https://sweetalert2.github.io/#handling-dismissals
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire(
                        'Cancelled',
                        'Operation Cancel!',
                        'error'
                        )
                    }
                })
            }

        }

        if(cek){
            e.setAttribute('type','submit');
            e.setAttribute('onclick','');
            e.click();
        }
    }
</script>

<script>
    function onlyNumberKey(evt) {

        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>

@endsection
