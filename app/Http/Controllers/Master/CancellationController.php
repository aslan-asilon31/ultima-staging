<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cancellation\CancellationPolicy;
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

        // $this->validate($request, [
        //         'name'     => 'required',
        //         'description'     => 'required',
        //     ]);

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
        $setting = $this->setting();
        //menu code
        $menu = $this->menu();
        $cancellationpolicies = CancellationPolicy::find($id);
        // $id = Crypt::decryptString($id);
        return view('master_data.cancellation_policy.edit', compact('cancellationpolicies'));
    }


    public function update(Request $request, $id)
    {
        // $cancellationpolicies = CancellationPolicy::all();
        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'description' => 'required',
        // ]);
        // CancellationPolicy::whereId($id)->update($validatedData);

            // Session::flash('success','Data berhasil di tambahkan');

            // $cancellation = CancellationPolicy::find($id);
            // $cancellation->name = e($request->input('name'));
            // $cancellation->description = e($request->input('description'));
            // $cancellation->save();
            $cancellationpolicies = CancellationPolicy::find($id);
            $cancellationpolicies->update($request->all());

            return redirect()->route('cancellation_policy.index')->with('status', 'Update cancellation Policy Berhasil');
    }

    // public function delete($id){
    //     $cancellationpolicies = CancellationPolicy::find($id);
    //     $cancellationpolicies->delete();
    //     return redirect()->route('master_data.cancellation_policy.index')->with(['success', 'data berhasil dihapus']);
    // }

    public function delete(Request $request)
    {
        $id = Crypt::decryptString($request['id']);
        if(CancellationPolicy::where('id', $id)->exists()){
            return redirect()->back()->with('warning', 'Room cannot be delete because it has reservation');
        }

        // $temp_photo = Photo::where('id', $id)->get();
        // Photo::where('id', $id)->forceDelete();
        // RoomAmenities::where('id', $id)->forceDelete();
        // Type::where('id', $id)->forceDelete();
        // Bed::where('id', $id)->forceDelete();

        // foreach ($temp_photo as $img) {
        //     File::delete($this->path . '/' . $img->photo_path);
        // }

        return redirect()->route('room.index')->with('status', 'Data Room Berhasil Dihapus');
    }

}
