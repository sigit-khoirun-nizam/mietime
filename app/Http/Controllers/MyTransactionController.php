<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MyTransactionController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $query = Transaction::with(['user'])->where('users_id', Auth::user()->id);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <a class="inline-block border border-indigo-500 bg-indigo-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline" 
                        href="' . route('dashboard.my-transaction.show', $item->id) . '">
                        Show
                    </a>
                    ';
                })
                ->editColumn('total_price', function($item){
                    return number_format($item->total_price);
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.dashboard.mytransaction.index');
    }

    public function show(Transaction $myTransaction)
    {
        if(request()->ajax())
        {
            $query = TransactionItem::with(['menu'])->where('transactions_id', $myTransaction->id);

            return DataTables::of($query)
                ->editColumn('menu.price', function($item){
                    return number_format($item->menu->price);
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.dashboard.mytransaction.show', [
            'transaction'   => $myTransaction
        ]);
    }
}
