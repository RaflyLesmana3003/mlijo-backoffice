<?php

namespace App\Http\Controllers;

use App\mlijo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
    }

    public function permintaan_daftar(Request $request)
    {
        $this->req = $request;
        return TryCatch(
            function () {
                $request = $this->req;
                // dd($request->input("nama"));
                $user = DB::table('users')->insertGetId(
                    [
                        'name' => $request->input("nama"),
                        'phone_number' => $request->input("hp"),
                        'level' => "1",
                        'status' => "0",
                        'password' => Hash::make($request->input("password")),
                        'created_at' => now(),
                    ]
                );

                $mlijo = DB::table('mlijos')->insert([
                    [
                        'nama' => $request->input("nama"),
                        'id_user' => $user,
                        'ktp' => $request->input("ktp"),
                        'created_at' => now(),

                    ],
                ]);
            },
            "Data Berhasil DIsimpan ",
            "Email / No Telp Sudah Terdaftar"
        );
        // try {
        //     $user = DB::table('users')->insertGetId(
        //         [
        //             'name' => $request->input("nama"),
        //             'phone_number' => $request->input("hp"),
        //             'level' => "1",
        //             'status' => "0",
        //             'password' => Hash::make($request->input("password")),
        //             'created_at' => now(),
        //         ]
        //     );

        //     $mlijo = DB::table('mlijos')->insert([
        //         [
        //             'nama' => $request->input("nama"),
        //             'id_user' => $user,
        //             'ktp' => $request->input("ktp"),
        //             'created_at' => now(),

        //         ],
        //     ]);
        // } catch (QueryException $err) {
        //     return responsdata(true, "Email / No Telp Sudah Terdaftar");
        // }
        // return responsdata(false, "Data Berhasil Dimasukan");
    }
}
