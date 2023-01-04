@extends('templates/template')
@section('header_title')
    ADD RATES PLAN
@endsection
@section('content')
    <div class="col-lg-7">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body shadow">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <label for="rates_name">Rates Name</label>
                            <input type="text" class="form-control" id="rates_name" name="room_name" value=""
                                placeholder="Free Upgrade to Super Deluxe">
                            <br>

                            {{-- Cancellation Policy --}}
                            {{-- <h5 class="mt mb">
                                <strong>Cancellation Policy</strong>
                            </h5>
                            <p class="mt mb">Applied cancellation policy for this rate plan</p>
                            <div class="radio radio-replace color-primary" style="margin-bottom: 5px;">
                                <input type="checkbox" id="policy" name="policy" value="0">
                                <label><strong>Flexible - 4 Days</strong></label>
                            </div>
                            <div class="radio radio-replace color-primary">
                                <input type="checkbox" id="policy" name="policy" value="0">
                                <label><strong>Apply First Night Cancellation Fee</strong>upon cancellation 4 days prior
                                    before arrival</label>
                            </div>
                            <br> --}}

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

                            {{-- <div  class="radio radio-replace color-primary" style="margin-top:1px; margin-right:5px;" hidden>
                                <input type="radio" name="action" value="red"/>
                                <label>Any Days 1 </label>
                            </div> --}}
                              <input id="DaySet" type="text"  class="show-hide" style="display:none;margin-bottom:1px;margin-left:27px;" value="0">

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

                              <input  type="text" id="InputSet" class="show-hide1" style="display:none;margin-bottom:1px;margin-left:27px;" value="0">

                            <hr>
                            <div class="form-group">
                                <h5 class="mt mb">
                                    <strong>Set Cancellation Policy</strong>
                                </h5>
                                <p class="mt mb">Which cancellation policy is suitable for this rate plan?</p>
                                <select name="" id="" class="form-control">
                                    <option value="volvo">Free Cancellation</option>
                                    <option value="saab">Free Cancellationt</option>
                                    <option value="mercedes">Free Cancellationt</option>
                                    <option value="audi">Free Cancellationt</option>
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
                                <label for="product_name">Base Rate</label>
                                <input type="text" class="form-control" id="product_name" name="room_name"
                                    value="" placeholder="Rp.">
                                <br>
                                <label for="room_order">Extra Bed Rate</label>
                                <input type="text" class="form-control" id="room_order" name="room_order"
                                    value="" placeholder="Rp.">
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-white btn-padding" href="{{ route('rates_plan.index') }}">
                            Cancel
                        </a>
                        <button type="button" class="btn btn-horison-gold btn-padding">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
