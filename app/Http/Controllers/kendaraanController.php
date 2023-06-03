<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\Supir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;
use Laravel\Ui\Presets\React;

class kendaraanController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_supir');
    }
    public function index()
    {
        $data = Kendaraan::all();
        return view('Kendaraan.kendaraan',['kendaraan'=>$data]);
    }
    public function create()
    {
        $supir = Supir::all();
        $array = [
            'supir'=>$supir,
        ];
        return view('Kendaraan.create-kendaraan',$array);
    }
    public function store(Request $request)
    {
        $data=$request->validate([
            'id_supir'=>'required',
            'nopol_kendaraan'=>'required',
            'jenis_mobil'=>'required',
            'status_kendaraan'=>'required',
        ]);
        Kendaraan::create($data);
        return redirect()->route('Kendaraan.kendaraan')
                        ->with('success','kendaraan created seccessfully');
    }
    public function update(Request $request,$id)
    {
        Kendaraan::where('id',$id)->update([
            'id_supir'=>$request->id_supir,
            'nopol_kendaraan'=>$request->nopol_kendaraan,
            'jenis_mobil'=>$request->jenis_mobil,
            'status_kendaraan'=>$request->status_kendaraan,
        ]);
        return redirect()->route('Kendaraan.kendaraan');
    }
    public function edit($id)
    {
        $data= Kendaraan::find($id);
        $supir = Kendaraan::all();
        $array = [
            'supir'=>$supir,
            'kendaraan'=>$data
        ];
        return view('Kendaraan.edit-kendaraan',$array);
    }
    public function destroy($id)
    {
        $data= Kendaraan::find($id);
        $data->delete();
        return redirect()->route('Kendaraan.kendaraan');
    }
    public function cetak()
    {
        $datas = Kendaraan::all();
        $pdf = App::make('dompdf.wrapper');
        $html = '<center><h3>Data Kendaraan</h3></center><hr/><br>';
        $html .= '<table border=1 width="100%">
			<tr style="border: 1px solid #000; padding: 8px;">
            <th>Id Kendaraan</th>
            <td>Id Supir</td>
            <th>NoPol Kendaraan</th>
            <th>Jenis Mobil</th>
            <th>Status Kendaraan</th>
			</tr>';
        $id = 1;
        foreach ($datas as $data) {
            $html .= "<tr style='text-align: center'>
            <td>" . $id++ . "</td>
            <td>" . $data->id_supir . "</td>
            <td>" . $data->nopol_kendaraan . "</td>
            <td>" . $data->jenis_mobil . "</td>
            <td>" . $data->status_kendaraan . "</td>
            </tr>";
        }
        $html .= "</html>";
        $pdf = Pdf::loadHTML($html)->setPaper('a4', 'landscape');
        return $pdf->stream('Barang Masuk.pdf');
    }
}
