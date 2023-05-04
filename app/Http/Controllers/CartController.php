<?php

namespace App\Http\Controllers;

use App\Models\Callback;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Penarikan;
use App\Models\Transaction;
use App\Models\Santri;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $pageName = "Cart";

        $items = Cart::where('id_item', '!=', 6)->get();
        $transaction = Transaction::all();
        $santri = Santri::all();

        $kgCount = Cart::where('id_item', 6)->sum('qty');
        $kgTotalPrice = $kgCount * 4500;

        $itemCount = count($items);
        $totalPrice = $items->sum('subtotal');
        $allPrice = $kgTotalPrice + $totalPrice;
        $deliveryPayment = 8000;
        $total = $allPrice + $deliveryPayment;

        // $tabungan = Callback::where(
        //     ['id_santri', '=', $santri->id_santri],
        //     ['kode_jenis_transaksi', '=', 'KPT'],
        //     ['status', '=', '00'],
        // )->sum('nominal');
        // $penarikan = Penarikan::where('id_santri', $santri->id_santri)->sum('jml_penarikan');
        // $saldo = $tabungan - $penarikan;

        return view('pages.cart', compact('pageName', 'items', 'transaction', 'itemCount', 'totalPrice', 'kgCount', 'kgTotalPrice', 'allPrice', 'deliveryPayment', 'total', 'santri'));
    }

    //Saldo tabungan
    public function saldoTabungan($id)
    {
        $santri = Santri::where('id_santri', $id)->first();
        $tabungan = Callback::where([
            ['id_santri', '=', $santri->id_santri],
            ['kode_jenis_transaksi', '=', 'KPT'],
            ['status', '=', '00'],
        ])->sum('nominal');
        $penarikan = Penarikan::where('id_santri', $santri->id_santri)->sum('jml_penarikan');
        $saldo = $tabungan - $penarikan;

        return view('pages.cart', ['saldo' => $saldo]);
    }


    public function store(Request $request)
    {
        $lastOrder = Order::orderBy('no_order', 'desc')->first(); // Ambil nomor order terakhir
        $newOrderNumber = $lastOrder ? intval($lastOrder->no_order) + 1 : 1; // Tambahkan 1 pada nomor order terakhir jika ada, atau mulai dari 1 jika tidak ada

        // Format nomor order menjadi 6 digit dengan leading zeros
        $newOrderNumber = str_pad($newOrderNumber, 6, '0', STR_PAD_LEFT);

        $history = new Order();
        $history->no_order = $newOrderNumber;
        $history->order_date = date('Y-m-d'); // Set nilai order_date dengan tanggal hari ini
        $history->save();

        if ($history) {
            return view('pages.history')->with('newOrderNumber', $newOrderNumber);
        }
    }


    public function deleteCart($id_cart)
    {
        $cart = Cart::find($id_cart);
        $cart->delete();
        return redirect('cart')->with('success', 'Item berhasil dihapus dari keranjang belanja');
    }
}
