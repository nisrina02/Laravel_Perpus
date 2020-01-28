<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjaman_Model;
use Illuminate\Support\Facades\Validator;

class PeminjamanController extends Controller
{
  public function store(Request $req)
  {
    $validator=Validator::make($req->all(), [
      'id_anggota' => 'required',
      'id_petugas' => 'required',
      'tgl_pinjam' => 'required',
      'deadline' => 'required',
      'tgl_kembali' => 'required',
      'denda' => 'required'
    ]);
    if($validator->fails()){
      return response()->json($validator->errors());
    }

    $simpan=Peminjaman_Model::insert([
      'id_anggota' => $req->id_anggota,
      'id_petugas' => $req->id_petugas,
      'tgl_pinjam' => $req->tgl_pinjam,
      'deadline' => $req->deadline,
      'tgl_kembali' => $req->tgl_kembali,
      'denda' => $req->denda
    ]);
    if($simpan){
      return response()->json(['status'=>1]);
    } else {
      return response()->json(['status'=>0]);
    }
  }

  public function update($id, Request $req)
  {
    $validator=Validator::make($req->all(), [
      'id_anggota' => 'required',
      'id_petugas' => 'required',
      'tgl_pinjam' => 'required',
      'deadline' => 'required',
      'tgl_kembali' => 'required',
      'denda' => 'required'
    ]);
    if($validator->fails()){
      return response()->json($validator->errors());
    }

    $ubah=Peminjaman_Model::where('id', $id)->update([
      'id_anggota' => $req->id_anggota,
      'id_petugas' => $req->id_petugas,
      'tgl_pinjam' => $req->tgl_pinjam,
      'deadline' => $req->deadline,
      'tgl_kembali' => $req->tgl_kembali,
      'denda' => $req->denda
    ]);
    if($ubah){
      return response()->json(['status'=>1]);
    } else {
      return response()->json(['status'=>0]);
    }
  }

  public function destroy($id)
  {
    $hapus=Peminjaman_Model::where('id', $id)->delete();
    if($hapus){
      return response()->json(['status'=>1]);
    } else {
      return response()->json(['status'=>0]);
    }
  }
}
