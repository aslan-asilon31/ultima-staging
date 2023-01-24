<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cancellation\CancellationPolicy;
use App\Models\RatesPlan\RatesPlan;
use Carbon;
use Session;
use Alert;
use Validator;
use Illuminate\Support\Facades\Crypt;

class CancellationController extends Controller
{

    public function index()
    {
        $setting = $this->setting();
        //menu code
        $menu = $this->menu();

        $cancellationpolicies = CancellationPolicy::all();

        return view('master_data.cancellation_policy.index', compact('cancellationpolicies'));
    }

    public function create()
    {
        // $setting = $this->setting();
        // //menu code
        // $menu = $this->menu();
        // $cancellationpolicies = CancellationPolicy::all();

        return view('master_data.cancellation_policy.create', get_defined_vars());
    }

    public function insert(Request $request)
    {

        $cancellationpolicies = CancellationPolicy::all();

        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        //CREATE ID
        $bytes = openssl_random_pseudo_bytes(4, $cstrong);
        $hex = bin2hex($bytes);
        $id = $hex;
        while (CancellationPolicy::where('id', $id)->exists()) {
            $bytes = openssl_random_pseudo_bytes(4, $cstrong);
            $hex = bin2hex($bytes);
            $id = $hex;
        }

        $cancellationpolicies = CancellationPolicy::create([
            'id'     => $id,
            'name'     => $request->name,
            'description'   => $request->description
        ]);

        // Session::flash('success','Data berhasil di tambahkan');

        return redirect()->route('cancellation_policy.index')->with('status', 'Cancellation Policy Berhasil di tambah');
    }

    //Edit DATA
    public function edit($id){
        $id = Crypt::decryptString($id);
        $setting = $this->setting();
        $menu = $this->menu();
        $cancellationpolicies = CancellationPolicy::find($id);
        return view('master_data.cancellation_policy.edit', compact('cancellationpolicies'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $cancellationpolicies = CancellationPolicy::find($id);
        $cancellationpolicies->update($request->all());

        return redirect()->route('cancellation_policy.index')->with('status', 'Update cancellation Policy Berhasil');
    }

    public function delete($id)
    {
        if(RatesPlan::where('cancellation_id', $id)->exists()){
            return redirect()->route('cancellation_policy.index')->with('warning', 'Cancellation cannot be delete because it has Rate Plans');
        }
        CancellationPolicy::where('id', $id)->forceDelete();

        return redirect()->route('cancellation_policy.index')->with('status', 'Data Cancellation Berhasil Dihapus');
    }
}
