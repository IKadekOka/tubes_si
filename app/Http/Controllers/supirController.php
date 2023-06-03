<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supir;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class supirController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_supir');
    }
    public function index()
    {
        $data = Supir::all();
        return view('Supir.supir',['supir'=>$data]);
    }
    public function create()
    {
        return view('Supir.create-supir');
    }
    public function store(Request $request)
    {
        $data=$request->validate([
            'nama'=>'required',
            'alamat'=>'required',
            'no_telp'=>'required',
        ]);
        Supir::create($data);
        return redirect()->route('Supir.supir')
                        ->with('success','supir created seccessfully');
    }
    public function edit($id)
    {
        $data= Supir::find($id);
        $array = [
            'supir'=>$data
        ];
        return view('Supir.edit-supir',$array);
        
    } 
    public function update(Request $request, $id)
    {
        Supir::where('id', $id)->update([
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'no_telp'=>$request->no_telp,
        ]);
        return redirect()->route('Supir.supir');
    }
    public function destroy($id)
    {
        $data= Supir::find($id);
        $data->delete();
        return redirect()->route('Supir.supir');
    }
    public function cetak()
    {
        $datas = Supir::all();
        $pdf = App::make('dompdf.wrapper');
        $html = '<center><h3>Data Supir</h3></center><hr/><br>';
        $html .= '<table border=1 width="100%">
			<tr style="border: 1px solid #000; padding: 8px;">
                <th>Id Supir</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
			</tr>';
        $id = 1;
        foreach ($datas as $data) {
            $html .= "<tr style='text-align: center'>
            <td>" . $id++ . "</td>
            <td>" . $data->nama . "</td>
            <td>" . $data->alamat . "</td>
            <td>" . $data->no_telp . "</td>
            </tr>";
        }
        $html .= "</html>";
        $pdf = PDF::loadHTML($html)->setPaper('a4', 'landscape');
        return $pdf->stream('Barang Masuk.pdf');
    }
}
