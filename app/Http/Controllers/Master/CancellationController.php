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

            $cancellationpolicies = CancellationPolicy::create([
                'name'     => $request->name,
                'description'   => $request->description
            ]);
            Session::flash('success','Data berhasil di tambahkan');

            if($cancellationpolicies){
                //redirect dengan pesan sukses

                return redirect()->route('cancellation_policy.index')->withSuccess('Data berhasil disimpan');
              }else{
                //redirect dengan pesan error
                return redirect()->route('cancellation_policy.index')->with(['error', 'data gagal ditambahkan']);
              }

        // return view('master_data.cancellation_policy.index', get_defined_vars())->with('status', 'Cancellation Policy Berhasil di Insert');
        // $this->validate($request, [
        //     'name'     => 'required',
        //     'description'     => 'required',
        // ]);

        // $cancellationpolicies = CancellationPolicy::create([
        //     'name'     => $request->name,
        //     'description'   => $request->description
        // ]);

        // if($cancellationpolicies){
        //     //redirect dengan pesan sukses

        //   }else{
        //     //redirect dengan pesan error
        //     return view('master_data.cancellation_policy.index', get_defined_vars())->with('status', 'Cancellation Policy Gagal di Insert');

        //   }
        // return view('master_data.cancellation_policy.index')->with('status', 'Cancellation Policy Berhasil di Update');
        // return redirect()->route('master_data/cancellation-policy/index');

    }

    // public function edit($id)
    // {
    //     $setting = $this->setting();
    //     // $id = Crypt::decryptString($id);
    //     $menu = $this->menu();
    //     $cancellations = CancellationPolicy::find($id);
    //     return view('master_data.cancellation_policy.edit', get_defined_vars());
    // }

    // public function edit(Cancellationpolicy $cancellationpolicy)
    // {
    //     // $setting = $this->setting();
    //     // $menu = $this->menu();
    //     // $cancellations = CancellationPolicy::find($id);
    //     $setting = $this->setting();
    //     $menu = $this->menu();
    //     $cancellationpolicies = CancellationPolicy::all();
    //     return view('master_data.cancellation_policy.edit', get_defined_vars());
    //     // return view('master_data.cancellation_policy.edit', compact('setting','menu'));

    // }

    // public function update(Request $request, $id){
    //     $setting = $this->setting();
    //     // $id = Crypt::decryptString($id);
    //     $menu = $this->menu();
    //     $cancellations = CancellationPolicy::find($id);

    //     $data->update($request->all());

    //     return redirect()->route('master_data.cancellation_policy.index')->with(['success', 'data berhasil diedit']);
    // }

    public function edit($id){
        $cancellationpolicies = CancellationPolicy::find($id);
        // $id = Crypt::decryptString($id);
        return view('master_data.cancellation_policy.edit', compact('cancellationpolicies'));
    }
    public function update(Request $request, $id){
        $cancellationpolicies = CancellationPolicy::find($id);
        $cancellationpolicies->update($request->all());

        return redirect()->route('master_data.cancellation_policy.index')->with(['success', 'data berhasil diedit']);
    }
    public function delete($id){
        $cancellationpolicies = CancellationPolicy::find($id);
        $cancellationpolicies->delete();
        return redirect()->route('master_data.cancellation_policy.index')->with(['success', 'data berhasil dihapus']);
    }
}
