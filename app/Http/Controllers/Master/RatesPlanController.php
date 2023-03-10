<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Requests\RatesPlanInsertRequest;
use App\Models\RatesPlan\RatesPlan;
use App\Models\Room\RoomRatePlan;

use App\Models\Admin\User;
use App\Models\Allotment\Allotment;
use App\Models\Room\Type;
use Carbon\Carbon;
use DB;
use App\Models\Cancellation\CancellationPolicy;
use File;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;


class RatesPlanController extends Controller
{
    public function index(Request $request)
    {
        $setting = $this->setting();
        //menu code
        $menu = $this->menu();
        // $rooms = Type::all();
        $cancellations = CancellationPolicy::all();
        $ratesplans = RatesPlan::all();
        $roomrateplans = RoomRatePlan::all();

        $id = RatesPlan::where('id','=',$request->id)->first();
        $rooms = Type::where('id','=',$id)->first();

        return view('master_data.rates_plan.index', get_defined_vars());
    }

    public function create()
    {
        $setting = $this->setting();
        //menu code
        $menu = $this->menu();
        // $id = Crypt::decryptString($id);
        $rooms = Type::all();
        $cancellations = CancellationPolicy::all();
        return view('master_data.rates_plan.create', get_defined_vars());
    }

    public function insert(Request $request)
    {
        // dd($request->all());
        $ratesplans=RatesPlan::all();

        $request->validate([
            "cancellation_id" => "required",
            'rate_name'     => 'required',
            'def_meal_available'     => 'required|numeric',
            'def_bookable'     => 'required',
            'def_minimum_stay'     => 'required',
            // 'room_id'     => 'required',
            'base_rate'     => 'required|numeric',
            'extrabed_rate' => 'required|numeric',
        ]);


        //CREATE ID Rates Plan
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
        // $room_id = Type::select('id')->get();

        $ratesplans = RatesPlan::create([

            'id' => $id,
            'cancellation_id'   => $request->cancellation_id,
            'rate_name'   => $request->rate_name,
            'def_meal_available'   => $request->def_meal_available,
            'def_bookable'   => $request->def_bookable,
            'def_minimum_stay'   => $request->def_minimum_stay,
            // 'room_id'     => $request->room_id,
            'base_rate'   => $request->base_rate,
            'extrabed_rate'   => $request->extrabed_rate
        ]);


        // $room_id = Type::select('id')->get();
        $roomrateplan = RoomRatePlan::create([

            'room_id'                => $request->room_id,
            'rate_id'                => $id,
            'is_rate_plan_active'    => 0,
            'promo_rate'             => 0,
            'is_promo_rate_active'   => 0,

        ]);

        return redirect()->route('rates_plan.index')->with('status', 'Rates Plan Berhasil di Update');
    }

    //UPDATE DATA
    public function edit($id)
    {
        // dd($id);
        $id = Crypt::decryptString($id);

        $setting = $this->setting();
        $cancel = CancellationPolicy::find($id);
        // $cancel = CancellationPolicy::where('rate_id',$id);
        $cancellations = CancellationPolicy::all();
        $rooms = Type::all();
        $ratesplans = RatesPlan::find($id);


        return view('master_data.rates_plan.edit', get_defined_vars());
    }

    public function update(Request $request, $id)
    {

        RoomRatePlan::where('rate_id',$id)->update([
            'room_id'     => $request->room_id,
        ]);


        RatesPlan::whereId($id)->update([
            'id' => $id,
            'cancellation_id'   => $request->cancel_id,
            'rate_name'   => $request->rate_name,
            'def_meal_available'   => $request->def_meal_available,
            'def_bookable'   => $request->def_bookable,
            'def_minimum_stay'   => $request->def_minimum_stay,
            'base_rate'   => $request->base_rate,
            'extrabed_rate'   => $request->extrabed_rate
        ]);

        return redirect()->route('rates_plan.index')->with('status', 'Rates Plan Berhasil di Update');

    }

    //SET DATA
    // public function setData($id)
    // {
    //     $id = Crypt::decryptString($id);
    //     $user = User::where('id', $id)->first();
    //     return response()->json($user);
    // }


    public function destroy(Request $request, $id)
    {
        $ratesplans = RatesPlan::find($id);
        $roomratesplan = RoomRatePlan::where('rate_id',$id);

        $roomrateplan = RoomRatePlan::where('rate_id',$id)->first();
        // die($id);

        $allotments = Allotment::where('room_rate_plan_id',$roomrateplan->id)->first();
        // dd($roomrateplan->id);

        if(Allotment::where('room_rate_plan_id',$roomrateplan->id)->exists()){
            return redirect()->route('rates_plan.index')->with('warning', 'Rates plan cannot be delete because it has Allotment');
        }

            $roomrateplan->delete();
            $ratesplans->delete();
            return redirect()->route('rates_plan.index')->with('status', 'Rates Plan Deleted');
        

<<<<<<< HEAD
        $roomratesplan->delete();

        return redirect()->route('rates_plan.index')->with('status', 'Rates Plan Deleted');
=======
>>>>>>> 3fab88031a2abed6f0e86a42b9ee1acb9d929a6c

    }

}
