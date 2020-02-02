<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjaman_Model;
use App\DetailPeminjaman_Model;
use App\Anggota_Model;
use Auth;
use DB;
use Illuminate\Support\Facades\Validator;

class PeminjamanController extends Controller
{
  public function index($id){
      if(Auth::user()->level=="petugas"){
      $peminjaman = Peminjaman_Model::join('anggota', 'peminjaman.id_anggota', 'anggota.id')->where('peminjaman.id', $id)->get();

      $detail_buku="data";
      $data=array();
      foreach ($peminjaman as $pinjam){
        $ok = DetailPeminjaman_Model::where('id_peminjaman', $pinjam->id)->get();

        $arr_detail=array();
        foreach ($ok as $ok){
          $arr_detail[]=array(
            'id_peminjaman' => $ok->id_peminjaman,
            'id_buku' => $ok->id_buku,
            'qty' => $ok->qty
          );
        }

        $data[]=array(
          'id' => $pinjam->id,
          'id_anggota' => $pinjam->id_anggota,
          'nama_anggota' => $pinjam->nama_anggota,
          'id_petugas' => $pinjam->id_petugas,
          'tgl_pinjam' => $pinjam->tgl_pinjam,
          'deadline' => $pinjam->deadline,
          'tgl_kembali' => $pinjam->tgl_kembali,
          'denda' => $pinjam->denda,
          'detail_buku' => $arr_detail
        );
      }
      return response()->json(compact("data"));
    } else {
      return response()->json(['Hanya Petugas yang Bisa Mengakses']);
    }

  }

  // $detail_buku=DetailPeminjaman_Model::where('id_peminjaman', $peminjaman->id)->get();
  // $dt['data']['id_anggota']= $peminjaman->id_anggota;
  // $dt['data']['nama_anggota']= $peminjaman->nama_anggota;
  // $dt['data']['id_petugas']= $peminjaman->id_petugas;
  // $dt['data']['tgl_pinjam']= $peminjaman->tgl_pinjam;
  // $dt['data']['deadline']= $peminjaman->deadline;
  // $dt['data']['tgl_kembali']= $peminjaman->tgl_kembali;
  // $dt['data']['denda']= $peminjaman->denda;
  // $dt['data']['detail_buku']= $detail_buku;

  // $peminjaman = DB::table('peminjaman')
  // ->join('anggota', 'anggota.id', '=', 'peminjaman.id_anggota')
  // ->select('peminjaman.id', 'peminjaman.id_anggota', 'anggota.nama_anggota', 'peminjaman.id_petugas',
  //          'peminjaman.tgl_pinjam', 'peminjaman.deadline', 'peminjaman.tgl_kembali', 'peminjaman.denda')
  // ->where('peminjaman.id', $id)
  // ->get();

  public function store(Request $req)
  {
    if(Auth::user()->level=="petugas"){
      $validator=Validator::make($req->all(), [
        'id_anggota' => 'required',
        'id_petugas' => 'required',
        'tgl_pinjam' => 'required',
        'deadline' => 'required',
        'tgl_kembali' => 'required',
        'denda' => 'required',
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
        'denda' => $req->denda,
      ]);
      if($simpan){
        return response()->json(['status'=>1]);
      } else {
        return response()->json(['status'=>0]);
      }
    } else {
        return response()->json(['Hanya Petugas yang Bisa Mengakses']);
    }
  }

  public function insert(Request $req)
  {
    if(Auth::user()->level=="petugas"){
      $validator=Validator::make($req->all(), [
        'id_peminjaman' => 'required',
        'id_buku' => 'required',
        'qty' => 'required',
      ]);
      if($validator->fails()){
        return response()->json($validator->errors());
      }

      $simpan=DetailPeminjaman_Model::insert([
        'id_peminjaman' => $req->id_peminjaman,
        'id_buku' => $req->id_buku,
        'qty' => $req->qty,
      ]);
      if($simpan){
        return response()->json(['status'=>1]);
      } else {
        return response()->json(['status'=>0]);
      }
    } else {
      return response()->json(['Hanya Petugas yang Bisa Mengakses']);
    }
  }

  public function update($id, Request $req)
  {
    if(Auth::user()->level=="petugas"){
    $validator=Validator::make($req->all(), [
      'id_anggota' => 'required',
      'id_petugas' => 'required',
      'tgl_pinjam' => 'required',
      'deadline' => 'required',
      'tgl_kembali' => 'required',
      // 'denda' => 'required'
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
    } else {
    return response()->json(['Hanya Petugas yang Bisa Mengakses']);
    }
  }

  public function edit($id, Request $req)
  {
    if(Auth::user()->level=="petugas"){
    $validator=Validator::make($req->all(), [
      'id_peminjaman' => 'required',
      'id_buku' => 'required',
      'qty' => 'required',
    ]);
    if($validator->fails()){
      return response()->json($validator->errors());
    }

    $ubah=DetailPeminjaman_Model::where('id', $id)->update([
      'id_peminjaman' => $req->id_peminjaman,
      'id_buku' => $req->id_buku,
      'qty' => $req->qty,
    ]);
    if($ubah){
      return response()->json(['status'=>1]);
    } else {
      return response()->json(['status'=>0]);
    }
  } else {
    return response()->json(['Hanya Petugas yang Bisa Mengakses']);
  }
  }

  public function destroy($id)
  {
    if(Auth::user()->level=="petugas"){
    $hapus=Peminjaman_Model::where('id', $id)->delete();
    if($hapus){
      return response()->json(['status'=>1]);
    } else {
      return response()->json(['status'=>0]);
    }
  } else {
    return response()->json(['Hanya Petugas yang Bisa Mengakses']);
  }
  }

  public function hapus($id)
  {
    if(Auth::user()->level=="petugas"){
    $hapus=DetailPeminjaman_Model::where('id', $id)->delete();
    if($hapus){
      return response()->json(['status'=>1]);
    } else {
      return response()->json(['status'=>0]);
    }
  } else {
    return response()->json(['Hanya Petugas yang Bisa Mengakses']);
  }
  }
}
