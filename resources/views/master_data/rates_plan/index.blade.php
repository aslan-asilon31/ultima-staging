@extends('templates/template')
@section('header_title')
    RATES PLAN
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <p>Create and review different types of rate plans for your customers. You can manage availability and
                    pricing in Allotment. You have {{ $ratesplans->count() }} rates plan.</p>
            </div>
            <div class="col-lg-6 col-sm-12">
                <a href="/master_data/rates-plan/create" class="btn btn-horison btn-lg pull-right">
                    <b>+ ADD RATE PLAN</b>
                </a>
            </div>
        </div>

        <br>

        <div class="row">

            @foreach ($ratesplans as $rate)
            <div class="panel panel-default">
                <div class="panel-body shadow">
                    <div class="row">

                        <div class="col-xs-12 col-lg-12 col-md-12">
                            <h5 style="margin-bottom:-5px;">
                                    <strong>{{ $rate->rate_name }}</strong>
                            </h5>
                            <p class="mt">Applied for 
                                @foreach($rate->room_rate_plans as $tp)
                                    @foreach($tp->types as $typ)
                                        {{ $typ->room_name }}
                                    @endforeach
                                @endforeach
                            </p>
                        </div>


                        <div class="col-xs-12 col-lg-6 col-md-6">
                            <h5 style="margin-bottom:-5px;">
                                <strong>Rate Strategy</strong>
                            </h5>
                            <ul class="checklist-ul mt">
                                    @if($rate->def_meal_available == 0 || $rate->def_meal_available == NULL)
                                    <li class="mt text-muted">No Meal</li>
                                    @elseif($rate->def_meal_available == 1 )
                                    <li class="mt ">Meal</li>
                                    @endif

                                    @if($rate->extrabed_rate == 0 || $rate->extrabed_rate == NULL)
                                    <li class="mt text-muted">No extra bed</li>
                                    @elseif($rate->extrabed_rate >= 1)
                                    <li class="mt">Allow extra bed</li>
                                    @endif 

                            </ul>
                        </div>
                        <div class="col-xs-12 col-lg-6 col-md-6">
                            <h5 style="margin-bottom:-5px;">
                                <strong>Cancel Policy</strong>
                            </h5>

                            @foreach($rate->cancellations as $cl)
                            <p class="mt"><strong>{{ $cl->name }}</strong> {{ $cl->description }}</p>
                            @endforeach

                        </div>

                        <div class="col-xs-12 col-lg-6 col-md-6">
                            {{-- @foreach($rrt->rate_plans as $rp) --}}
                            <a href="/master_data/rates-plan/edit/{{ Crypt::encryptString($rate->id) }}" class="btn btn-horison pull-right">
                            {{-- @endforeach --}}
                            {{-- <a href="/master_data/rates-plan/edit/{{ Crypt::encryptString($rate->id) }}" class="btn btn-horison pull-right"> --}}
                                <b>Manage Rates Plan</b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>

    <script>
    </script>
@endsection
