<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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

        return view('pages.cart', compact('pageName', 'items', 'transaction', 'itemCount', 'totalPrice', 'kgCount', 'kgTotalPrice', 'allPrice', 'deliveryPayment', 'total', 'santri'));
    }

    public function cash()
    {
        $pageName = "Cart / Cash";

        return view('pages.cash', compact('pageName'));
    }

    public function transfer()
    {
        $pageName = "Cart / transfer";

        return view('pages.transfer', compact('pageName'));
    }


    public function deleteCart($id_cart)
    {
        $cart = Cart::find($id_cart);
        $cart->delete();
        return redirect('cart')->with('success', 'Item berhasil dihapus dari keranjang belanja');
    }
}
