@extends('templates/template')
@section('header_title')
    ADD RATES PLAN
@endsection
@section('content')
    <div class="col-lg-7">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body shadow">
                    <form enctype="multipart/form-data" method="POST"  action="{{ route('rates_plan.insert') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <label for="rates_name">Rates Name</label>
                                <input type="text" class="form-control" id="rates_name" name="room_name"
                                    placeholder="Free Upgrade to Super Deluxe">
                                <br>

                                {{-- Meals --}}
                                <h5 class="mt mb">
                                    <strong>Meals</strong>
                                </h5>
                                <p class="mt mb">Applied meals plan for this rate plan ?</p>
                                <div class="radio radio-replace color-primary" style="margin-bottom: 5px;">
                                    <input type="checkbox" id="policy" name="policy" value="0">
                                    <label>Include Meal</label>
                                </div>
                                <div class="radio radio-replace color-primary">
                                    <input type="checkbox" id="policy" name="policy" value="0">
                                    <label>No, don’t add meal plan for this rate plan</label>
                                </div>
                                <br>

                                {{-- Bookables --}}
                                <h5 class="mt mb">
                                    <strong>Bookables</strong>
                                </h5>
                                <p class="mt mb">How many days before check-in can guest book this rate plan?</p>
                                <div class="radio radio-replace color-primary" style="margin-bottom: 5px;">
                                    <input type="radio" id="AnyDays" name="action" value="0">
                                    <label>Any days</label>
                                </div>

                                <div class="radio radio-replace color-primary">
                                    <input type="radio" id="SetNumber" name="action" value="green"/>
                                    <label>Set number of days before check in </label>
                                </div>

                                <div class="input-group col-lg-12">
                                    <input type="text" name="Base Weekday Publish Rate"
                                        class="show-hide form-control thousandSeperator" oninput="ambilRupiah(this);"
                                        id="DaySet" value="0" style="display: none; width:200px;margin-bottom:1px;margin-left:27px;"" />
                                </div>

                                <br>

                                {{-- Minimum length of stay --}}
                                <h5 class="mt mb">
                                    <strong>Minimum length of stay</strong>
                                </h5>
                                <p class="mt mb">How many nights require for guest to book for this rate plan?</p>

                                <div class="radio radio-replace color-primary" style="margin-bottom: 5px;">
                                    <input type="radio" id="NoMinimum" name="action1" value="0">
                                    <label>No Minimum </label>
                                </div>

                                <div class="radio radio-replace color-primary">
                                    <input type="radio" name="action1"/>
                                    <label>Set Minimum Nights </label>
                                </div>

                                <div class="input-group col-lg-12">
                                    <input type="text" name="Base Weekday Publish Rate"
                                        class="show-hide1 form-control thousandSeperator" oninput="ambilRupiah(this);"
                                        id="InputSet" value="0" style="display: none; width:200px;margin-bottom:1px;margin-left:27px;"" />
                                </div>

                                <hr>
                                <div class="form-group">
                                    <h5 class="mt mb">
                                        <strong>Set Cancellation Policy</strong>
                                    </h5>
                                    <p class="mt mb">Which cancellation policy is suitable for this rate plan?</p>
                                    <select name="" id="" class="form-control">
                                        <option value="">Choose Cancellation</option>
                                        @foreach($cancellations as $cancel)
                                        <option value="{{ $cancel->id }}">{{ $cancel->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <hr>
                                <h5 class="mt mb"><strong>Apply rates to room types</strong></h5>
                                <p class="mt mb">Which room type will be bookable with this rate plans?</p>
                                <div class="row">
                                    @foreach ($rooms as $room)
                                        <div class="col-lg-4">
                                            <div class="checkbox checkbox-replace color-primary">
                                                <input type="checkbox" id="rd-1" name="room_name[]" value="0">
                                                <label>{{ $room->room_name }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <br>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6 col-md-4">
                                    <label for="weekday_rate" class="">Base Rate</label>
                                    <div class="input-group col-lg-12">
                                        <span class="input-group-addon">Rp.</span>
                                        <input type="text" name="Base Weekday Publish Rate"
                                            class="form-control room_price thousandSeperator" oninput="ambilRupiah(this);"
                                            id="weekday_rate" value="" />
                                        <input type="hidden" name="room_publish_rate" id="weekday_rate_input"
                                            value="" />
                                    </div>
                                    <br>
                                    <label for="weekday_rate" class="">Extra Bed Rate</label>
                                    <div class="input-group col-lg-12">
                                        <span class="input-group-addon">Rp.</span>
                                        <input type="text" name="Base Weekday Publish Rate"
                                            class="form-control room_price thousandSeperator" oninput="ambilRupiah(this);"
                                            id="weekday_rate" value="" />
                                        <input type="hidden" name="room_publish_rate" id="weekday_rate_input"
                                            value="" />
                                    </div>
                                    <br>
                                </div>
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
            $("input[name='action']").click(function () {
                if ($("#AnyDays").is(":checked")) {
                    $("#DaySet").hide();
                } else {
                    $("#DaySet").show();
                }
            });
        });


        $(function () {
            $("input[name='action1']").click(function () {
                if ($("#NoMinimum").is(":checked")) {
                    $("#InputSet").hide();
                } else {
                    $("#InputSet").show();
                }
            });
        });


    </script>
@endsection
