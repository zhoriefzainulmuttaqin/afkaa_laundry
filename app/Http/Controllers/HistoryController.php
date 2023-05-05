<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Santri;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $pageName = "History Transaction";
        $order =  Order::simplePaginate(5); // 5 adalah jumlah item per halaman


        return view('pages.history', compact('pageName', 'order'));
    }

    public function store(Request $request)
    {
        $history = Order::create([
            'no_order' => $request->no_order,
            'order_date' => $request->order_date,
        ]);
        if ($history) {
            return redirect('history');
        }
    }

    public function print(Request $request)
    {
        $history = Order::all();

        return view('export.pdf_order', compact('history'));
    }
}
