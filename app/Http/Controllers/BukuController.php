<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku_Model;
use Illuminate\Support\Facades\Validator;
use Auth;

class BukuController extends Controller
{
  public function show(){
    if(Auth::user()->level=="admin"){
      $data=Buku_Model::all();
      return response()->json($data);
    } else {
      return response()->json(['Hanya Admin yang Bisa Mengakses']);
    }
  }
  
  public function store(Request $req)
  {
    if(Auth::user()->level=="admin"){
      $validator=Validator::make($req->all(), [
        'judul' => 'required',
        'penerbit' => 'required',
        'pengarang' => 'required',
        'foto' => 'required'
      ]);
      if($validator->fails()){
        return response()->json($validator->errors());
      }

      $simpan=Buku_Model::insert([
        'judul' => $req->judul,
        'penerbit' => $req->penerbit,
        'pengarang' => $req->pengarang,
        'foto' => $req->foto
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
    if(Auth::user()->level="admin"){
      $validator=Validator::make($req->all(), [
        'judul' => 'required',
        'penerbit' => 'required',
        'pengarang' => 'required',
        'foto' => 'required'
      ]);
      if($validator->fails()){
        return response()->json($validator->errors());
      }

      $ubah=Buku_Model::where('id', $id)->update([
        'judul' => $req->judul,
        'penerbit' => $req->penerbit,
        'pengarang' => $req->pengarang,
        'foto' => $req->foto
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
    if(Auth::user()->level="admin"){
      $hapus=Buku_Model::where('id', $id)->delete();
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
