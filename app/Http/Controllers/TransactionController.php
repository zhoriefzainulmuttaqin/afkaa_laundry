<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $pageName = "Transaction";

        $items = Transaction::get();

        return view('pages.home', compact('pageName', 'items'));
    }

    // public function store(Request $request)
    // {
    //     $id_item = $request->input('id_item');
    //     $qty = $request->input('qty');
    //     $subtotal = $request->input('subtotal');

    //     // mencari cart item yang sesuai
    //     $cart = Cart::where('id_staff', auth()->user()->id_staff)
    //         ->where('id_item', $id_item)
    //         ->first();

    //     // jika item sudah ada di cart, update qty dan subtotal
    //     if ($cart) {
    //         $cart->qty += $qty;
    //         $cart->subtotal += $subtotal;
    //         $cart->save();
    //     } else {
    //         // jika item belum ada di cart, tambahkan baru
    //         $newCart = new Cart;
    //         $newCart->id_cart = uniqid();
    //         $newCart->id_staff = auth()->user()->id;
    //         $newCart->id_item = $id_item;
    //         $newCart->qty = $qty;
    //         $newCart->subtotal = $subtotal;
    //         $newCart->save();
    //     }

    //     return redirect()->back()->with('success', 'Item has been added to cart.');
    // }

    public function store(Request $request)
    {
        $item = Transaction::find($request->id_item);
        $subtotal = $request->qty * $item->harga;

        $cart = Cart::create([
            'id_staff' => $request->id_staff,
            'id_item' => $request->id_item,
            'qty' => $request->qty,
            'subtotal' => $subtotal,
        ]);

        if ($cart) {
            return redirect()->back()->with('success', 'Item has been added to cart.');
        }
    }


    public function edit(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tgl_masuk' => 'required',
            'kepemilikan' => 'required',
            'keterangan' => 'required',
            'id_kategori' => 'required',
            'id_lokasi' => 'required',
            'id_status' => 'required',
        ]);

        $imageName = $request->gambarLama;

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '_' . $request->file('foto')->getClientOriginalName();
            $image->move(public_path('images/'), $imageName);
        }

        $barang = Transaction::where('id', $request->id)->update([
            'nama' => $request->nama,
            'tgl_masuk' => $request->tgl_masuk,
            'kepemilikan' => $request->kepemilikan,
            'foto' => $imageName,
            'keterangan' => $request->keterangan,
            'id_kategori' => $request->id_kategori,
            'id_lokasi' => $request->id_lokasi,
            'id_status' => $request->id_status,
        ]);

        if ($barang) {
            return redirect('barang')->with('success', 'Barang Berhasil Diedit.');
        }
    }

    public function delete(Request $request)
    {
        $del = Transaction::where('id', $request->id)->delete();

        if ($del) {
            return redirect('barang')->with('success', 'barang Berhasil Dihapus.');
        }
    }
}
