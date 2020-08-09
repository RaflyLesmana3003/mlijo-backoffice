<?php

namespace App\Http\Controllers;

use App\mlijo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

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

        return view('admin/mlijo/index', ['mlijo' => $mlijousers]);
    }

    public function lihatproduk()
    {
        // $mlijousers = DB::table('users')->where('level', '=', "1")->get();
        $mlijousers = DB::table('v_product');
        if (Auth::User()->level == '1') {
            $mlijousers =   $mlijousers->where("id_user", Auth::User()->id);
        }
        $mlijousers = $mlijousers->get();

        $kategori = DB::table('category_product')->select("id", "kategori")->get();

        return view('mlijo/produk/index', ['produk' => $mlijousers, 'kategori' => $kategori]);
    }

    public function tambahproduk(Request $request)
    {
        $this->req = $request;
        $this->req['id_mlijo'] = (DB::table('mlijos')->select("id")->where("id_user", Auth::User()->id)->get()[0]->id);
        if (!empty($this->req['img_base_64'])) {
            $upload = tryCatch(function () {
                $data = base64_decode($this->req["img_base_64"]);
                $name_file = date("Y.m.d_H.i.s.") . uniqid() . ".jpg";
                file_put_contents("file/" . $name_file, $data);
                $this->req['img'] = $name_file;
            });
            if ($upload['error']) return ["error" => true, "message" => "Gambar Gagal diupload . Data produk gagal disimpan"];
        } else {
            $this->req['img'] = "";
        }
        return TryCatch(
            function () {
                DB::table('product')->insert($this->req->except(["img_base_64", "_token"]));
            },
            "Produk Berhasil Disimpan",
            function ($err) {
                if (!empty($this->req['img'])) {
                    unlink("file/" . $this->req['img']);
                }
                // return responsdata(true, $err->getMessage());
                return responsdata(true);
            }
        );
    }

    public function editproduk(Request $request)
    {
        $this->req = $request;
        $img_back = $request['img'];
        $this->req['id_mlijo'] = (DB::table('mlijos')->select("id")->where("id_user", Auth::User()->id)->get()[0]->id);
        if (!empty($this->req['img_base_64'])) {
            $upload = tryCatch(function () {
                $data = base64_decode($this->req["img_base_64"]);
                $name_file = date("Y.m.d_H.i.s.") . uniqid() . ".jpg";
                file_put_contents("file/" . $name_file, $data);
                $this->req['img'] = $name_file;
            });
            if ($upload['error']) return ["error" => true, "message" => "Gambar Gagal diupload . Data produk gagal disimpan"];
        } else {
            $this->req['img'] = $img_back;
        }
        $Result = TryCatch(
            function () {
                DB::table('product')->where("id", $this->req['id'])->update($this->req->except(["id", "img_base_64", "_token"]));
            },
            "Produk Berhasil Diedit",
            function ($err) {
                if (!empty($this->req['img'])) {
                    unlink("file/" . $this->req['img']);
                }
                return responsdata(true, $err->getMessage());
            }
        );
        if ($img_back != $this->req['img'] && !$Result['error']) {
            error_reporting(0);
            unlink("file/" . $img_back);
        }
        return $Result;
    }

    public function deleteproduk(Request $request)
    {
        $this->req = $request;
        $this->detail = [];
        $Result = TryCatch(
            function () {
                $this->detail = (DB::table('product')->where("id", $this->req['id'])->get());
                (DB::table('product')->where("id", $this->req['id'])->delete());
            },
            "Produk Berhasil Diedit",
            function ($err) {
                if (!empty($this->req['img'])) {
                    unlink("file/" . $this->req['img']);
                }
                return responsdata(true, $err->getMessage());
            }
        );
        if (!$Result['error']) {
            error_reporting(0);
            unlink("file/" . $this->detail[0]->img);
        }
        return $Result;
    }

    public function detailproduk(Request $request)
    {
        $this->req = $request;
        if (empty($request['id'])) {
            return responsdata(true, "Data tidak tersedia");
        }
        $data = DB::table('v_product')->where("id", $request['id'])->get();
        return responsdata(false, $data);
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

    public function settingmlijo(Request $request)
    {
        $mlijo = DB::table('mlijos')
            ->where('id_user', Auth::User()->id)->get()[0];
        $bank = DB::table("bank")->get();
        return view("mlijo/setting", ["mlijo" => $mlijo, 'bank' => $bank]);
    }

    public function settingmlijoedit(Request $request)
    {
        $this->req = $request;
        $img_back = $request['foto_ktp'];
        if (!empty($this->req['img_base_64'])) {
            $upload = tryCatch(function () {
                $data = base64_decode($this->req["img_base_64"]);
                $name_file = date("Y.m.d_H.i.s.") . uniqid() . ".jpg";
                file_put_contents("file/" . $name_file, $data);
                $this->req['foto_ktp'] = $name_file;
            });
            if ($upload['error']) return ["error" => true, "message" => "Gambar Gagal diupload . Data produk gagal disimpan"];
        } else {
            $this->req['foto_ktp'] = $img_back;
        }
        $Result = TryCatch(
            function () {
                DB::table('mlijos')->where("id", $this->req['id'])->update($this->req->except(["id", "img_base_64", "_token"]));
            },
            "Mlijo Berhasil Diedit",
            function ($err) {
                if (!empty($this->req['foto_ktp'])) {
                    unlink("file/" . $this->req['foto_ktp']);
                }
                return responsdata(true, $err->getMessage());
            }
        );
        if ($img_back != $this->req['foto_ktp'] && !$Result['error']) {
            error_reporting(0);
            unlink("file/" . $img_back);
        }
        return $Result;
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
