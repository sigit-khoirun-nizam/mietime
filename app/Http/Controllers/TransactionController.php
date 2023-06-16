<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use PDF;

class TransactionController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $query = Transaction::query();
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <a class="inline-block border border-indigo-500 bg-indigo-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline" 
                        href="' . route('dashboard.transaction.show', $item->id) . '">
                        Show
                    </a>
                    <a class="inline-block border focus:ring-4 focus:ring-gray-300 text-white bg-blue-500 hover:bg-blue-600 rounded-md px-2 py-1 m-2 transition duration-500 ease select-none focus:outline-none focus:shadow-outline" 
                        href="' . route('dashboard.transaction.edit', $item->id) . '">
                        Edit
                    </a>
                    ';
                })
                ->editColumn('total_price', function($item){
                    return number_format($item->total_price);
                })
                ->rawColumns(['action', 'url'])
                ->make();
        }
        return view('pages.dashboard.transaction.index');
    }

    public function show(Transaction $transaction)
    {
        if(request()->ajax())
        {
            $query = TransactionItem::with(['menu'])->where('transactions_id', $transaction->id);

            return DataTables::of($query)
                ->editColumn('menu.price', function($item){
                    return number_format($item->menu->price);
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.dashboard.transaction.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        return view('pages.dashboard.transaction.edit', compact('transaction'));
    }

    public function update(TransactionRequest $request, Transaction $transaction)
    {
        $data = $request->all();

        $transaction->update($data);

        return redirect()->route('dashboard.transaction.index');
    }

    // Generate PDF
    public function createPDF() {
        $transaction = Transaction::all();

        $pdf = PDF::loadview('pdf.template', ['transaction'=>$transaction]);
        return $pdf->stream();
    }
}
