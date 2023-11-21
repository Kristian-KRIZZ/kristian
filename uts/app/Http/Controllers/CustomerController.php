<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CustomerController extends Controller
{

    public function index()
    {
        $customer = DB::table('customer')
        ->select("customer.id", "cid", "customer.nama", "customer.alamat", "paket_id", "paket.nama AS paket_nama")
        ->join('paket', 'paket.id', '=', 'customer.paket_id')
        ->get();

        return view('customer.index', ['data' => $customer]);
    }

    public function create()
    {
        $paket = DB::table('paket')->get();
       
        return view('sparepart.create', ['paket' => $paket]);
    }

    public function store(Request $request)
    {
        DB::table('customer')->insert([
            'cid' => $request->cid,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'paket_id' => $request->paket,
        ]);

        return redirect(url('/customer'));
    }

    public function update(Request $request, $id)
    {
        DB::table('customer')
        ->where('id', $id)
        ->update([
            'cid' => $request->cid,
            'nama' => $request->nama,
            'alamat' => $request->harga,
            'paket_id' => $request->paket,
        ]);

        return redirect(url('/customer'));
    }

    public function edit($id)
    {
        $customer = DB::table('customer')
        ->select("customer.id", "cid", "customer.nama", "customer.alamat", "paket_id", "paket.nama AS paket_nama")
        ->join('paket', 'paket.id', '=', 'customer.paket_id')
        ->where('cuctomer.id', $id)
        ->first();

        $merk = DB::table('paket')->get();

        return view('customer.edit', ['data' => $customer, 'id' => $id, 'paket' => $paket]);
    }

    public function show($id)
    {
        $sparepart = DB::table('customer')
        ->select("customer.id", "cid", "customer.nama", "customer.harga", "paket_id", "paket.nama AS paket_nama")
        ->join('paket', 'paket.id', '=', 'customer.paket_id')
        ->where('customer.id', $id)
        ->first();

        $merk = DB::table('paket')->get();

        return view('customer.show', ['data' => $customer, 'id' => $id, 'paket' => $paket]);
    }
    public function destroy($id)
    {
        DB::table('customer')
        ->where('id', $id)
        ->delete();

        return redirect(url('/customer'));
    }
}