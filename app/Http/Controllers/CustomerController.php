<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
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
        $produkLain = [];
        if (empty($produk)) {
            goto Last;
        }
        $produkLain = DB::table('v_product')->where([
            ["id_mlijo", "=", $produk[0]->id_mlijo],
            ["id", "!=", $req['id']]
        ])->get();

        Last: return view("customer/detail", ["produk" => $produk[0], "lain" => $produkLain]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AddCart()
    {

        Cart::session(Auth::User()->id)->add(array(
            'id' => $rowId,
            'name' => $Product->name,
            'price' => $Product->price,
            'quantity' => 4,
        ));
    }

    public function create()
    {
        //
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
