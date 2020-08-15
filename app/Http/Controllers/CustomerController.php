<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $produk = DB::table('v_product');
        if (!empty($req['key'])) {
            $produk->where("name", 'like', '%' . $req['key'] . '%');
        }
        $produk = $produk->get();
        // $req->session()->put("data", $produk);
        // dd(Session::pull('data'));
        return view("customer/home", ["product" => $produk]);
    }

    public function detail(Request $req)
    {
        // dd(Session::pull("data"));
        $produk = DB::table('v_product')->where("id", "=", $req['id']);
        $produk = $produk->get();
        if (empty($produk[0]))  return  abort(404);

        $produkLain = [];
        $Mlijo = [];
        $produkLain = DB::table('v_product')->where([
            ["id_mlijo", "=", $produk[0]->id_mlijo],
            ["id", "!=", $req['id']]
        ])->get();
        $Mlijo = DB::table('users', 'a')
            ->join('mlijos', 'a.id', '=', 'mlijos.id_user')
            ->select('mlijos.*', 'a.id as id_user', 'a.email', 'a.phone_number')
            ->where("a.id", "=", $produk[0]->id_user)->get();
        return view("customer/detail", ["produk" => $produk[0], "lain" => $produkLain, "mlijo" => $Mlijo]);
    }

    public function detail_mlijo(Request $req)
    {
        if (empty($req['id']))  return  abort(404);
        $produkLain = [];
        $Mlijo = DB::table('users', 'a')
            ->join('mlijos', 'a.id', '=', 'mlijos.id_user')
            ->select('mlijos.*', 'a.id as id_user', 'a.email', 'a.phone_number')
            ->where("a.id", "=", $req['id'])->get();
        if (empty($Mlijo[0])) return abort(404);

        $produkLain = DB::table('v_product')->where([
            ["id_mlijo", "=", $req['id']],
        ])->get();
        return view("customer/detail_mlijo", ["lain" => $produkLain, "mlijo" => $Mlijo]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AddCart(Request $req)
    {
        if (!Auth::user()) {
            return responsdata(true, "Login");
        }


        $this->req = $req;
        $resp = tryCatch(
            function () {
                $idUser = Auth::user()->id;

                // dd($idUser);
                Cart::add([
                    'id' => $this->req['id'],
                    'name' => $this->req['name'],
                    'price' =>  (int)$this->req['price'],
                    'quantity' =>  $this->req['qty'],
                ]);

                return responsdata(true, "cok");
            },
            "con",
            function ($resp) {
                return responsdata(true, $resp->getMessage());
            }

        );

        return json_encode($resp);
    }

    public function chard()
    {
        if (!Auth::user()) {
            return redirect(url("customers"));
        }
        $produk = DB::table('v_product')->get();

        return view('customer/checkout', ["produk" => $produk]);
    }

    public function daftar(Request $request)
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
                        'level' => "2",
                        'status' => "1",
                        'password' => Hash::make($request->input("password")),
                        'created_at' => now(),
                    ]
                );

                $mlijo = DB::table('customers')->insert([
                    [
                        'nama' => $request->input("nama"),
                        'alamat' => $request->input("alamat"),
                        'id_user' => $user,
                        'created_at' => now(),

                    ],
                ]);
            },
            "Data Berhasil DIsimpan ",
            "Email / No Telp Sudah Terdaftar"
        );
    }

    public function login(Request $req)
    {
        $email = $req->email;
        $pwd   = $req->password;
        // dd($req->input());
        if (Auth::attempt(['phone_number' => $email, 'password' =>  $pwd])) {
            if (Auth::user()->level != "2") {
                Auth::logout();
                return responsdata(true, "Mohom mendaftar sebagai customer.");
            }
            return responsdata(false, "Login Berhasil");
        } else {
            return responsdata(true, "Maaf email atau password yang anda masukan tidak sesuai.");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,   $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($customer)
    {
        //
    }
}
