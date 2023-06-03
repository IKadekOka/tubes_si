<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\gudang;
use App\Models\barang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class gudangController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }
    public function index()
    {
        $data = gudang::all();
        return view('Gudang.gudang',['gudang'=>$data]);
    }
    public function create()
    {
        $barang = barang::all();
        $array = [
            'barang'=>$barang,
        ];
        return view('Gudang.create-gudang',$array);
    }
    public function store(Request $request)
    {
        $data=$request->validate([
            'id_barang'=>'required',
            'tanggal_masuk'=>'required',
            'stok_barang'=>'required',
        ]);
        gudang::create($data);
        return redirect()->route('Gudang.gudang')
                        ->with('success','gudang created seccessfully');
    }
    public function edit($id)
    {
        $data= gudang::find($id);
        $barang = barang::all();
        $array = [
            'barang'=>$barang,
            'gudang'=>$data
        ];
        return view('Gudang.edit-gudang',$array);
    }
    public function update(Request $request,$id)    
    {
        gudang::where('id',$id)->update([
            'id_barang'=>$request->id_barang,
            'tanggal_masuk'=>$request->tanggal_masuk,
            'stok_barang'=>$request->stok_barang,
        ]);
        return redirect()->route('Gudang.gudang');
    }
    public function destroy($id)
    {
        $data= gudang::find($id);
        $data->delete();
        return redirect()->route('Gudang.gudang');
    }
    public function cetak()
    {
        $datas = gudang::all();
        $pdf = App::make('dompdf.wrapper');
        $html = '<center><h3>Data Gudang</h3></center><hr/><br>';
        $html .= '<table border=1 width="100%">
			<tr style="border: 1px solid #000; padding: 8px;">
                <th>Id Gudang</th>
                <th>Id Barang</th>
                <th>Tanggal Masuk</th>
                <th>Stok Barang</th>
			</tr>';
        $id = 1;
        foreach ($datas as $data) {
            $html .= "<tr style='text-align: center'>
            <td>" . $id++ . "</td>
            <td>" . $data->id_barang . "</td>
            <td>" . $data->tanggal_masuk . "</td>
            <td>" . $data->stok_barang . "</td>
            </tr>";
        }
        $html .= "</html>";
        $pdf = PDF::loadHTML($html)->setPaper('a4', 'landscape');
        return $pdf->stream('Barang Masuk.pdf');
    }
}
