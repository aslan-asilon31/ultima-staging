<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Requests\RatesPlanInsertRequest;
use App\Models\RatesPlan\RatesPlan;
use App\Models\Room\Type;
use Carbon\Carbon;
use DB;
use App\Models\Cancellation\CancellationPolicy;
use File;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class RatesPlanController extends Controller
{
    public function index()
    {
        $setting = $this->setting();
        //menu code
        $menu = $this->menu();
        $ratesplans = RatesPlan::all();

        return view('master_data.rates_plan.index', get_defined_vars());
    }

    public function create()
    {
        $setting = $this->setting();
        //menu code
        $menu = $this->menu();
        $rooms = Type::orderBy('room_order', 'ASC')->with('bed')->with('amenities')->with('photo')->get();
        $cancellations = CancellationPolicy::all();
        return view('master_data.rates_plan.create', get_defined_vars());
    }

    public function insert(Request $request)
    {
        // $body = $ratesPlanInsertRequest->validated();
        // dd($body);
        // $rates_plans = RatesPlan::create(Arr::except($body,"room_name"));
        // $rates_plans = RatesPlan::create();

        $this->validate($request, [
            "cancellation_id" => "required",
            // "cancellation_id" => "required",
            'rate_name'     => 'required',
            'def_meal_available'     => 'required|numeric',
            'def_bookable'     => 'required',
            'def_minimum_stay'     => 'required',
            'room_name'     => 'required|array',
            'base_rate'     => 'required|numeric',
            'extrabed_rate'     => 'required|numeric',
        ]);

        //CREATE ID
        $bytes = openssl_random_pseudo_bytes(4, $cstrong);
        $hex = bin2hex($bytes);
        $id = $hex;
        while (RatesPlan::where('id', $id)->exists()) {
            $bytes = openssl_random_pseudo_bytes(4, $cstrong);
            $hex = bin2hex($bytes);
            $id = $hex;
        }

        //it will return single model
        $cancellation_id = CancellationPolicy::select('id')->get(); 
        $ratesplans = RatesPlan::create([
            'id' => $id,
            'cancellation_id'   => $request->cancellation_id,
            'rate_name'   => $request->rate_name,
            'def_meal_available'   => $request->def_meal_available,
            'def_bookable'   => $request->def_bookable,
            'def_minimum_stay'   => $request->def_minimum_stay,
            'base_rate'   => $request->base_rate,
            'extrabed_rate'   => $request->extrabed_rate,
        ]);

        dd($ratesplans);
        return redirect()->route('rates_plan.index')->with('status', 'Cancellation Policy Berhasil di Update');
    }

    //UPDATE DATA
    public function edit($id)
    {
        $setting = $this->setting();
        $rooms = Type::orderBy('id')->first();
        $ratesplans = RatesPlan::orderBy('id')->first();
        $cancellations = CancellationPolicy::all();
        // $id = Crypt::decryptString($id);
        return view('master_data.rates_plan.edit', get_defined_vars());
    }

}
