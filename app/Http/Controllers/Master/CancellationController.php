<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cancellation\CancellationPolicy;
use Carbon;
use Session;
use Alert;

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

        $this->validate($request, [
                'name'     => 'required',
                'description'     => 'required',
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

    public function edit(Cancellationpolicy $cancellationpolicy){
        $setting = $this->setting();
        //menu code
        $menu = $this->menu();
        $cancellationpolicy = CancellationPolicy::orderBy('id')->first();
        // $id = Crypt::decryptString($id);
        return view('master_data.cancellation_policy.edit', compact('cancellationpolicy'));
    }

    public function update(Request $request, Cancellationpolicy $cancellationpolicy){

        $setting = $this->setting();
        //menu code
        $menu = $this->menu();

        // dd($cancellationpolicy);

        $cancellationpolicies = CancellationPolicy::orderBy('id')->first();

        $this->validate($request, [
            'name'     => 'required',
            'description'     => 'required',
        ]);


        $cancellationpolicy = CancellationPolicy::update([
            'name'     => $request->name,
            'description'   => $request->description
        ]);

        return redirect()->route('cancellation_policy.index')->with('status', 'Cancellation Policy Berhasil di update');
    }


    public function delete($id){
        $cancellationpolicies = CancellationPolicy::find($id);
        $cancellationpolicies->delete();
        return redirect()->route('master_data.cancellation_policy.index')->with(['success', 'data berhasil dihapus']);
    }


}
