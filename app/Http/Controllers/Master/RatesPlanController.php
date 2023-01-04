<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RatesPlan;
use App\Models\Room\Type;
use Carbon\Carbon;
use DB;
use App\Models\Cancellation\CancellationPolicy;
use File;
use Illuminate\Support\Str;

class RatesPlanController extends Controller
{
    public function index()
    {
        $setting = $this->setting();
        //menu code
        $menu = $this->menu();

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
        $setting = $this->setting();
        //menu code
        $menu = $this->menu();

        $this->validate($request, [
            'cancellation_id'     => 'required',
            'def_meal_available'     => 'required',
            'def_bookable'     => 'required',
            'def_minimum_stay'     => 'required',
            'base_rate'     => 'required',
            'extrabed_rate'     => 'required',
            'promo_rate'     => 'required',
            'is_rate_plan_activate'     => 'required',
            'is_promo_rate'     => 'required'
        ]);

        $rates_plans = RatesPlan::create([
            'cancellation_id'     => $request->cancellation_id,
            'def_meal_available'   => $request->def_meal_available,
            'def_bookable'   => $request->def_bookable,
            'def_minimum_stay'   => $request->def_minimum_stay,
            'base_rate'   => $request->base_rate,
            'extrabed_rate'   => $request->extrabed_rate,
            'promo_rate'   => $request->promo_rate,
            'is_rate_plan_activate'   => $request->is_rate_plan_activate,
            'is_promo_rate_activate'   => $request->def_meal_available,

        ]);
        return redirect()->route('cancellation_policy.index')->with('status', 'Cancellation Policy Berhasil di Update');

    }

        //UPDATE DATA
        // public function edit($id)
        // {
        //     $setting = $this->setting();
        //     $amenitiess = Amenities::orderBy('id')->get();
        //     $id = Crypt::decryptString($id);
        //     return view('master_data.room.create', get_defined_vars());
        // }

}
