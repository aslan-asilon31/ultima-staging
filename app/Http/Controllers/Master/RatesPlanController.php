<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Requests\RatesPlanInsertRequest;
use App\Models\RatesPlan\RatesPlan;
use App\Models\Room\RoomRatePlan;

use App\Models\Admin\User;

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
            'room_id'     => 'required',
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
        $room_id = Type::select('id')->get();

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

        //CREATE ID Room Rates
        $bytes = openssl_random_pseudo_bytes(4, $cstrong);
        $hex = bin2hex($bytes);
        $id_rr = $hex;
        while (RatesPlan::where('id', $id_rr)->exists()) {
            $bytes = openssl_random_pseudo_bytes(4, $cstrong);
            $hex = bin2hex($bytes);
            $id_rr = $hex;
        }

        // $room_id = Type::select('id')->get();
        $roomrateplan = RoomRatePlan::create([

            'room_id'                => $request->room_id,
            'rate_id'                => $id,
            'is_rate_plan_active'    => NULL,
            'promo_rate'             => NULL,
            'is_promo_rate_active'   => NULL,

        ]);

        return redirect()->route('rates_plan.index')->with('status', 'Rates Plan Berhasil di Update');
    }

    //UPDATE DATA
    public function edit($id)
    {

        $id = Crypt::decryptString($id);

        $setting = $this->setting();
        $cancel = CancellationPolicy::find($id);
        $cancellations = CancellationPolicy::all();
        $rooms = Type::all();
        $ratesplans = RatesPlan::find($id);

        return view('master_data.rates_plan.edit', get_defined_vars());
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     "cancellation_id" => "required",
        //     'rate_name'     => 'required',
        //     'def_meal_available'     => 'required|numeric',
        //     'def_bookable'     => 'required',
        //     'def_minimum_stay'     => 'required',
        //     'room_name'     => 'required|array',
        //     'base_rate'     => 'required|numeric',
        //     'extrabed_rate' => 'required|numeric',
        // ]);

        $ratesplans = RatesPlan::find($id);
        $ratesplans->update($request->all());

        return redirect()->route('rates_plan.index')->with('status', 'Rates Plan Berhasil di Update');

    }

    //SET DATA
    // public function setData($id)
    // {
    //     $id = Crypt::decryptString($id);
    //     $user = User::where('id', $id)->first();
    //     return response()->json($user);
    // }

    // public function delete($id)
    // {
    //     $ratesplans = RatesPlan::where('id', $id)->first();
    //     // $ratesplans = RatesPlan::find($id);
    //     // dd($ratesplans);

    //     $ratesplans->delete();

    //     // $ratesplans = RatesPlan::find($id);
    //     // $ratesplans->delete();
    //     // if ($ratesplans != null) {
    //     //     return redirect()->route('rates_plan.index')->with(['message'=> 'Successfully deleted!!']);
    //     // }
    //     return redirect()->route('rates_plan.index')->with('status', 'Rates Plan Deleted');
    // }

    public function destroy($id)
    {
        // $id = Crypt::decryptString($id);
        // dd($id);
        $ratesplans = RatesPlan::find($id);

        $ratesplans->delete();

        return redirect()->route('rates_plan.index')->with('status', 'Rates Plan Deleted');

    }

}
