<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cancellation\CancellationPolicy;
use Carbon;


class CancellationController extends Controller
{
    public function index()
    {
        $setting = $this->setting();
        //menu code
        $menu = $this->menu();

        $cancellations = CancellationPolicy::all();

        return view('master_data.cancellation_policy.index', get_defined_vars());
    }

    public function create()
    {
        $setting = $this->setting();
        //menu code
        $menu = $this->menu();
        $cancellations = CancellationPolicy::all();

        return view('master_data.cancellation_policy.create', get_defined_vars());
    }

    public function edit($id)
    {
        $setting = $this->setting();
        // $id = Crypt::decryptString($id);
        $menu = $this->menu();
        $cancellations = CancellationPolicy::all();
        return view('master_data.cancellation_policy.edit', get_defined_vars());
    }

    public function insert(Request $request)
    {
        // $setting = $this->setting();
        // menu code
        $menu = $this->menu();

        $this->validate($request, [
            'name'     => 'required',
            'description'     => 'required',
        ]);

        $cancellation_policies = CancellationPolicy::create([
            'name'     => $request->name,
            'description'   => $request->description
        ]);
        return view('master_data.cancellation_policy.create')->with('status', 'Cancellation Policy Berhasil di Update');

    }

}
