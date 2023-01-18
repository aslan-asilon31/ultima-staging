@extends('templates/template')
@section('header_title')
    ROOMS
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="row">
            <a href="/master_data/room/create" class="btn btn-horison btn-lg pull-right"><b>+ ADD NEW ROOM</b></a>
        </div>
        <br>
        <div class="row">
            <?php $no = 0; ?>
            @foreach ($rooms as $room)
                <?php $no++; ?>
                @php
                    $img = count($room['photo']) > 0 ? $room['photo'][0]->photo_path : 'insert-here.jpg';
                @endphp
                <div class="panel panel-default">
                    <div class="panel-body shadow">
                        <div class="col-lg-3 col-sm-12 mb text-center">
                            <img src="{{ asset('/user/' . $img) }}" alt="" class="containerBox shadow" loading="lazy">
                        </div>
                        <div class="col-lg-3">
                            <h4 class="mb"><strong>{{ $room->room_name }}</strong></h4>
                            @if (strlen($room->room_desc) > 350)
                                <p class="mt line-clamp-8" style="text-align:justify;">{!! strip_tags(substr($room->room_desc, 0, 350) . '...') !!}</p>
                            @else
                                <p class="mt line-clamp-8" style="text-align:justify;">{!! strip_tags($room->room_desc) !!}</p>
                            @endif

                            <h4 class="mb"><strong>Bed Type(s)</strong></h4>
                            <p class="mt"><i class="glyphicon glyphicon-bed"></i>
                                @foreach ($room['bed'] as $bed)
                                    @php
                                        switch ($bed->bed_id) {
                                            case '0':
                                                $bed_type = 'King';
                                                break;
                                            case '1':
                                                $bed_type = 'Queen';
                                                break;
                                            case '2':
                                                $bed_type = 'Double';
                                                break;
                                            default:
                                                $bed_type = 'No Bed';
                                                break;
                                        }
                                    @endphp
                                    {{ $bed_type }}
                                @endforeach
                            </p>
                            <br>
                        </div>
                        {{-- <div class="col-lg-6">
                            <h4><strong>Room Amenities</strong></h4>
                            @if (count($room['amenities']) > 0)
                                @php
                                    $path = asset('/icon-pack/') . '/';
                                    $n = 0;
                                    $exp = 1;
                                    $other_amenitites = '<ul style="width: 100%;padding: 0;display: inline-block;list-style: none;">';
                                @endphp
                                <div>
                                    <ul style="width: 100%; padding: 0; display: inline-block; list-style: none;">
                                        @foreach ($room['amenities'] as $amenities)
                                            @php $n++; @endphp
                                            @if ($n <= 6)
                                                @if ($n == $exp)
                                                    <li class="col-md-4"
                                                        style="margin-bottom: 10px; clear: both; display: flex;">
                                                        @php $exp+= 3; @endphp
                                                    @else
                                                    <li class="col-xs-6 col-md-4 col-md-4"
                                                        style="display: flex; padding-bottom: 10px;">
                                                @endif
                                                <svg width="17px" height="17px" class="horison-icon">
                                                    {!! file_get_contents($path . $amenities->amenities_name[0]->amenities_icon, false, stream_context_create($arrContextOptions)) !!}
                                                </svg>
                                                <p style="margin:0px!important">
                                                    &nbsp;&nbsp;{{ $amenities->amenities_name[0]->amenities_name }}</p>
                                                </li>
                                            @else
                                                @php
                                                    if ($n == $exp) {
                                                        $other_amenitites .= '<li class="col-xs-6 col-md-4" style="display: flex; padding-bottom: 10px;">';
                                                        $exp += 3;
                                                    } else {
                                                        $other_amenitites .= '<li class="col-xs-6 col-md-4" style="display: flex; padding-bottom: 10px;">';
                                                    }
                                                    $other_amenitites .= '<svg width="20px" height="20px" class="horison-icon">' . file_get_contents($path . $amenities->amenities_name[0]->amenities_icon, false, stream_context_create($arrContextOptions)) . '</svg>' . '<span style="margin-left: 10px"></span>' . $amenities->amenities_name[0]->amenities_name . '</li>';
                                                @endphp
                                            @endif
                                        @endforeach
                                        @if (count($room['amenities']) > 6)
                                            @php $other_amenitites.='</ul>'; @endphp

                                            <li class="col-md-6" style="clear: both; padding-left:0;">
                                                <button class="btn text-horison hovertools" style="background-color: #fff0;"
                                                    data-toggle="popover" data-html="true" data-placement="bottom"
                                                    data-content='{{ $other_amenitites }}'
                                                    data-original-title="Other amenities">
                                                    + other amenities</button>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            @else
                                <div class="col-lg-4">
                                    <label><i class=""></i> No Amenities Found</label>
                                </div>
                            @endif

                            <a href="/master_data/room/edit/{{ Crypt::encryptString($room->id) }}"
                                class="btn btn-horison pull-right manage-pkg"><b>Manage Room</b>
                            </a>
                        </div> --}}


                        <div class="col-lg-12" style="margin-top:-20px; margin-left: 7px;">

                            {{-- @foreach ($rooms as $room)
                                {{ $room->room_name }}

                            @endforeach --}}

                            @foreach ($room_rate_plans as $room_rate_plan)
                            

                                <div class="col-lg-6" style="margin-right:-20px;">
                                    <h4 class="mb" style="margin-left:50%;"><strong>Rate Plan(s)</strong></h4>
                                    <div class="panel panel-default" style="width: 60%;height:9%;margin-left:50%;margin-top:1%;">
                                            <div class="panel-body shadow">
                                                <div class="row">
                                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                                        <h5 style="margin-bottom:-5px;">
                                                            @foreach ($room_rate_plan->rate_plans as $room_rate)
                                                                 <strong>Nama Rates Plan{{ $room_rate->rate_name }}</strong>
                                                            @endforeach
                                                        </h5>
                                                        <br>

                                                    </div>
                                                    <div class="col-xs-12 col-lg-6 col-md-6">
                                                        <h6 style="margin-bottom:-5px;">
                                                            <strong>Rate strategy</strong>
                                                        </h6>
                                                        <ul class="checklist-ul mt">
                                                            {{-- @foreach ($room_rate->rate_plans as $rate_plan) --}}
                                                            {{-- @if($rate_plan->extrabed_rate == 0)
                                                            makan
                                                            @else
                                                            ga makan
                                                            @endif --}}
                                                            <li class="mt text-muted">No Meal {{-- {{ $rate_plan->rate_name }} --}} 123</li>
                                                            {{-- @endforeach --}}
                                                            <li class="mt">Allow extra beds</li>
                                                        </ul>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                </div>
                            @endforeach

                        </div>

                        <div class="">
                            <a href="/master_data/room/edit/{{ Crypt::encryptString($room->id) }}"
                                class="btn btn-horison pull-right manage-pkg"><b>Manage Room</b>
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
