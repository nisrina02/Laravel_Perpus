<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggota_Model;
use Illuminate\Support\Facades\Validator;
use Auth;

class AnggotaController extends Controller
{
  public function show(){
    if(Auth::user()->level=="admin"){
      $data=Anggota_Model::all();
      return response()->json($data);
    } else {
      return response()->json(['Hanya Admin yang Bisa Mengakses']);
    }
  }

  public function store(Request $req)
  {
    if(Auth::user()->level=="admin"){
      $validator=Validator::make($req->all(), [
        'nama_anggota' => 'required',
        'alamat' => 'required',
        'no_telp' => 'required'
      ]);
      if($validator->fails()){
        return response()->json($validator->errors());
      }

      $simpan=Anggota_Model::insert([
        'nama_anggota' => $req->nama_anggota,
        'alamat' => $req->alamat,
        'no_telp' => $req->no_telp
      ]);
      if($simpan){
        return response()->json(['status'=>1]);
      } else {
        return response()->json(['status'=>0]);
      }
    } else {
      return response()->json(['Hanya Admin yang Bisa Mengakses']);
    }
  }

  public function update($id, Request $req)
  {
    if(Auth::user()->level=="admin"){
      $validator=Validator::make($req->all(), [
        'nama_anggota' => 'required',
        'alamat' => 'required',
        'no_telp' => 'required'
      ]);
      if($validator->fails()){
        return response()->json($validator->errors());
      }

      $ubah=Anggota_Model::where('id', $id)->update([
        'nama_anggota' => $req->nama_anggota,
        'alamat' => $req->alamat,
        'no_telp' => $req->no_telp
      ]);
      if($ubah){
        return response()->json(['status'=>1]);
      } else {
        return response()->json(['status'=>0]);
      }
    } else {
      return response()->json(['Hanya Admin yang Bisa Mengakses']);
    }
  }

  public function destroy($id)
  {
    if(Auth::user()->level=="admin"){
      $hapus=Anggota_Model::where('id', $id)->delete();
      if($hapus){
        return response()->json(['status'=>1]);
      } else {
        return response()->json(['status'=>0]);
      }
    } else {
      return response()->json(['Hanya Admin yang Bisa Mengakses']);
    }
  }
}
