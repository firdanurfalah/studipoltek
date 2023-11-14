<?php

namespace App\Http\Controllers;

use App\Models\CategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
class CategoriController extends Controller
{
    public function index()
    {
        $data['categori']= CategoriModel::get();
        return view('admin.pages.categori.index',$data);
    }
    public function create()
    {
        return view('admin.pages.categori.tambah');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'nama'  => 'required',
            'gambar'=> 'required',
            'harga'=> 'required',
            'deskripsi'=> 'required',
           
       
       
      
        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        CategoriModel::create([
            'id' => $request->idcategori,
            'nama' => $request->nama,
            'gambar' => $request->gambar,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,

        
      

    
         
        ]);
            return redirect('/categori')->with('ss', 'Berhasil tambah ');
        }

        public function show(string $id)
        {
            // $data['edit'] = AdminModel::where('id', $id)->first();
            // return view('admin.pages.admin.edit');
        }

        public function edit(string $id)
        {
            //
        }

        public function update(Request $request, string $id)
        {
            $validator = Validator::make($request->all(), [
                'nama'  => 'required',
                'gambar'=> 'required',
                'harga'=> 'required',
                'deskripsi'=> 'required',
              
         
               
            ]);
    
            // response error validation
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator)->withInput();
            }
            CategoriModel::where('id', $id)->update([
                'id' => $request->idcategori,
                'nama' => $request->nama,
                'gambar' => $request->gambar,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
        
       
            ]);
            return redirect('/categori')->with('success', 'Berhasil edit ');
        }

        public function destroy(string $id)
        {
            CategoriModel::where('id', $id)->delete();
            return redirect('/categori')->with('success', 'Berhasil hapus data');
        }

}
