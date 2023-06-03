<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use Illuminate\Http\Request;

class outletController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_customer');
    }
    public function index()
    {
        $data = Outlet::all();
        return view('Outlet.outlet',['outlet'=>$data]);
    }
    public function create()
    {
        return view('Outlet.create-outlet');
    }
    public function store(Request $request)
    {
        $data=$request->validate([
            'nama_outlet'=>'required',
            'no_telp'=>'required',
            'lokasi'=>'required',
        ]);
        Outlet::create($data);
        return redirect()->route('Outlet.outlet')
                        ->with('success','outlet created seccessfully');
    }
    public function edit($id)
    {
        $data= Outlet::find($id);
        $array = [
            'outlet'=>$data
        ];
        return view('Outlet.edit-outlet',$array);
        
    } 
    public function update(Request $request, $id)
    {
        Outlet::where('id', $id)->update([
            'nama_outlet'=>$request->nama_outlet,
            'no_telp'=>$request->no_telp,
            'lokasi'=>$request->lokasi,
        ]);
        return redirect()->route('Outlet.outlet');
    }
    public function destroy($id)
    {
        $data= Outlet::find($id);
        $data->delete();
        return redirect()->route('Outlet.outlet');
    }
}
