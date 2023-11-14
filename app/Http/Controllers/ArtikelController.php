<?php

namespace App\Http\Controllers;

use App\Models\ArtikelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class ArtikelController extends Controller
{
    public function index()
    {
        $data['artikel']= ArtikelModel::get();

        return view('admin.pages.artikel.index', $data);
    }
    public function create()
    {
        return view('admin.pages.artikel.tambah');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

          
            'gambar'=> 'required',
            'judul'  => 'required',
            'deskripsi'  => 'required',
          
           
       
       
      
        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        ArtikelModel::create([
            'id' => $request->idartikel,
            'gambar' => $request->gambar,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            

        
      

    
         
        ]);
            return redirect('/artikel')->with('ss', 'Berhasil tambah ');
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
             
                'gambar'=> 'required',
                'judul'=> 'required',
                'deskripsi'=> 'required',
              
              
         
               
            ]);
    
            // response error validation
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator)->withInput();
            }
            ArtikelModel::where('id', $id)->update([
                'id' => $request->idartikel,
           
                'gambar' => $request->gambar,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
              
       
            ]);
            return redirect('/artikel')->with('success', 'Berhasil edit ');
        }

        public function destroy(string $id)
        {
            ArtikelModel::where('id', $id)->delete();
            return redirect('/artikel')->with('success', 'Berhasil hapus data');
        }
}
