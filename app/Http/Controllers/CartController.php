<?php

namespace App\Http\Controllers;

use App\Models\Callback;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\Penarikan;
use App\Models\Transaction;
use App\Models\Santri;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index($id)
    {
        $pageName = "Cart";

        $items = Cart::where('id_item', '!=', 6)->get();
        $transaction = Transaction::all();
        $santri = Santri::where('id_santri', $id)->first();

        $kgCount = Cart::where('id_item', 6)->sum('qty');
        $kgTotalPrice = $kgCount * 4500;

        $itemCount = count($items);
        $totalPrice = $items->sum('subtotal');
        $allPrice = $kgTotalPrice + $totalPrice;
        $deliveryPayment = 8000;
        $total = $allPrice + $deliveryPayment;

        if ($santri) {
            $tabungan = Callback::where([
                ['id_santri', '=', $santri->id_santri],
                ['kode_jenis_transaksi', '=', 'KPT'],
                ['status', '=', '00'],
            ])->sum('nominal');

            $penarikan = Penarikan::where('id_santri', $santri->id_santri)->sum('jml_penarikan');
            $saldo = $tabungan - $penarikan;
        } else {
            $tabungan = 0;
            $penarikan = 0;
            $saldo = 0;
        }

        return view('pages.cart', compact('pageName', 'items', 'transaction', 'itemCount', 'totalPrice', 'kgCount', 'kgTotalPrice', 'allPrice', 'deliveryPayment', 'total', 'santri', 'saldo'));
    }

    // //Saldo tabungan
    // public function saldoTabungan($id)
    // {
    //     $santri = Santri::where('id_santri', $id)->first();
    //     $tabungan = Callback::where([
    //         ['id_santri', '=', $santri->id_santri],
    //         ['kode_jenis_transaksi', '=', 'KPT'],
    //         ['status', '=', '00'],
    //     ])->sum('nominal');
    //     $penarikan = Penarikan::where('id_santri', $santri->id_santri)->sum('jml_penarikan');
    //     $saldo = $tabungan - $penarikan;

    //     return view('saldo-tabungan', ['saldo' => $saldo]);
    // }


    public function store(Request $request)
    {
    }

    public function cash()
    {
        $pageName = "Cart / Cash";
        $nomor_urut = mt_rand(1, 999999);
        $no_transaction = str_pad($nomor_urut, 6, "0", STR_PAD_LEFT);

        return view('pages.cash', compact('pageName', 'no_transaction'));
    }

    public function transfer($id)
    {
        $pageName = "Cart / Cash";
        $nomor_urut = mt_rand(1, 999999);
        $no_transaction = str_pad($nomor_urut, 6, "0", STR_PAD_LEFT);
        $santri = Santri::where('id_santri', $id)->first();
        $tabungan = Callback::where([
            ['id_santri', '=', $santri->id_santri],
            ['kode_jenis_transaksi', '=', 'KPT'],
            ['status', '=', '00'],
        ])->sum('nominal');
        $penarikan = Penarikan::where('id_santri', $santri->id_santri)->sum('jml_penarikan');
        $saldo = $tabungan - $penarikan;

        return view('pages.transfer', compact('pageName', 'no_transaction', 'saldo'));
    }



    public function deleteCart($id_cart)
    {
        $cart = Cart::find($id_cart);
        $cart->delete();
        return redirect('cart')->with('success', 'Item berhasil dihapus dari keranjang belanja');
    }
}
