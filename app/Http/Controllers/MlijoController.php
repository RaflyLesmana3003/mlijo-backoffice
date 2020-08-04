<?php

namespace App\Http\Controllers;

use App\mlijo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MlijoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $mlijousers = DB::table('users')->where('level', '=', "1")->get();
        $mlijousers = DB::table('users')
            ->join('mlijos', 'users.id', '=', 'mlijos.id_user')
            ->select('users.*', 'mlijos.*')
            ->get();
        // dd($mlijousers);

        return view('admin/mlijo/index',['mlijo' => $mlijousers]);
    }

    public function lihatproduk()
    {
        // $mlijousers = DB::table('users')->where('level', '=', "1")->get();
        $mlijousers = DB::table('users')
            ->join('mlijos', 'users.id', '=', 'mlijos.id_user')
            ->select('users.*', 'mlijos.*')
            ->get();
        // dd($mlijousers);

        return view('mlijo/produk/index',['mlijo' => $mlijousers]);
    }

    public function tambahproduk()
    {
        // $mlijousers = DB::table('users')->where('level', '=', "1")->get();
        $mlijousers = DB::table('users')
            ->join('mlijos', 'users.id', '=', 'mlijos.id_user')
            ->select('users.*', 'mlijos.*')
            ->get();
        // dd($mlijousers);

        return view('mlijo/produk/tambah',['mlijo' => $mlijousers]);
    }
    
    public function aktivasi(Request $request)
    {
        $updatemlijo = DB::table('users')
              ->where('id', $request->input("id"))
              ->update(['status' => "1"]);
    }

    public function nonaktivasi(Request $request)
    {
        $updatemlijo = DB::table('users')
              ->where('id', $request->input("id"))
              ->update(['status' => "0"]);
    }

    public function permintaan_daftar(Request $request)
    {
        // dd($request->input("nama"));

        $id = DB::table('users')->insertGetId(
            [
                'name' => $request->input("nama"),
                'phone_number' => $request->input("hp"),
                'level' => "1",
                'status' => "0",
                'password' => Hash::make($request->input("password")),
                'created_at' => now(),
            ]
        );

        
        DB::table('mlijos')->insert([
            [
                'nama' => $request->input("nama"),
                'id_user' => $id,
                'ktp' => $request->input("ktp"),
                'created_at' => now(),

            ],
        ]);

        

    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(mlijo $mlijo)
    {
        //
    }
    
    public function edit(mlijo $mlijo)
    {
        //
    }
    
    public function update(Request $request, mlijo $mlijo)
    {
        //
    }
    
    public function destroy(mlijo $mlijo)
    {
        //
    }
}
