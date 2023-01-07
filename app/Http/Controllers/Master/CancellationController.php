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

        $cancellationpolicies = CancellationPolicy::all();

        return view('master_data.cancellation_policy.index', compact('cancellationpolicies','menu','setting'));
    }

    public function create()
    {
        $setting = $this->setting();
        //menu code
        $menu = $this->menu();
        $cancellations = CancellationPolicy::all();

        return view('master_data.cancellation_policy.create', get_defined_vars());
    }


    public function insert(Request $request)
    {
        $setting = $this->setting();
        // menu code
        $menu = $this->menu();

        $this->validate($request, [
            'name'     => 'required',
            'description'     => 'required',
        ]);

        $insertcancellations = CancellationPolicy::create([
            'name'     => $request->name,
            'description'   => $request->description
        ]);

        if($insertcancellations){
            //redirect dengan pesan sukses
            return view('master_data.cancellation_policy.index', get_defined_vars())->with('status', 'Cancellation Policy Berhasil di Insert');

          }else{
            //redirect dengan pesan error
            return view('master_data.cancellation_policy.index', get_defined_vars())->with('status', 'Cancellation Policy Gagal di Insert');

          }
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
