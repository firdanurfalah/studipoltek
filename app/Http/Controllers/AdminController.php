<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function index()
    {
        $data['admin']= AdminModel::get();
      
        return view('admin.pages.admin.index',$data);
    }
    public function create()

    {
    
        return view('admin.pages.admin.tambah');
    }

    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [

            // 'id' => $request->idadmin,
            'nama' => 'required',
            'Email' => 'required',
            'nohp' => 'required',
   
           
       
       
      
        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        AdminModel::create([
            'id' => $request->idadmin,
            'nama' => $request->nama,
            'Email' => $request->Email,
            'nohp' => $request->nohp,
   
         
        ]);
            return redirect('/adminxxx')->with('ss', 'Berhasil tambah ');
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
                'Email'=> 'required',
                'nohp'=> 'required',
              
         
               
            ]);
    
            // response error validation
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator)->withInput();
            }
            AdminModel::where('id', $id)->update([
                'id' => $request->idadmin,
                'nama' => $request->nama,
                'Email' => $request->Email,
                'nohp' => $request->nohp,
        
       
            ]);
            return redirect('/admin')->with('success', 'Berhasil edit ');
        }

        public function destroy(string $id)
        {
            AdminModel::where('id', $id)->delete();
            return redirect('/admin')->with('success', 'Berhasil hapus data');
        }
}
