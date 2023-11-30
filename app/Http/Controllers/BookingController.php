<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class BookingController extends Controller
{
   
    public function index()
    {
        $data['booking']= BookingModel::get();
       
        return view('admin.pages.booking.index', $data);
    }
    public function create()
    {
        return view('admin.pages.booking.tambah');
    }

    public function store(Request $request)
    {

        if ($request->hasFile('upload')) { 
            $file = $request->file('upload')->store('booking/' . time());

        $validator = Validator::make($request->all(), [

            'nama'  => 'required',
            'email'=> 'required',
            'nohp'=> 'required',
            'tanggal'=> 'required',
            'jam'=> 'required',
            'upload'=> 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status'=> 'required',
           
       
       
      
        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        BookingModel::create([
            'id' => $request->idbooking,
            'nama' => $request->nama,
            'email'=> $request->email,
            'nohp' => $request->nohp,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'upload' => $file,
            'status' => $request->status,

        
      

    
         
        ]);
            return redirect('/booking')->with('ss', 'Berhasil tambah ');
        }
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
                'email'=> 'required',
                'nohp'=> 'required',
                'tanggal'=> 'required',
                'jam'=> 'required',
                'upload'=> 'required|image|mimes:jpeg,png,jpg|max:2048',
                'status'=> 'required',
         
               
            ]);
    
            // response error validation
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator)->withInput();
            }

            if ($request->hasFile('upload')) {
                $file = $request->file('upload')->store('booking/' . time());
            BookingModel::where('id', $id)->update([
                'id' => $request->idbooking,
                'nama' => $request->nama,
                'email'=> $request->email,
                'nohp' => $request->nohp,
                'tanggal' => $request->tanggal,
                'jam' => $request->jam,
                'upload' => $file,
                'status' => $request->status,
        
       
            ]);
            return redirect('/booking')->with('success', 'Berhasil edit ');
        }
    }



        public function destroy(string $id)
        {
            BookingModel::where('id', $id)->delete();
            return redirect('/booking')->with('success', 'Berhasil hapus data');
        }

    }