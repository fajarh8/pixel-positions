<?php

namespace App\Http\Controllers;

use App\Events\StockUpdated;
use App\Http\Requests\StoreGoodRequest;
use App\Http\Requests\UpdateGoodRequest;
use App\Models\BuyGood;
use App\Models\Good;
use App\Models\GoodTransaction;
use App\Models\SellGood;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Good $good)
    {
        return view('good.index', [
            'goods' => $good->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('good.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $good = request()->validate([
            'name' => 'required|unique:goods,name|lowercase',
            'code' => 'required|unique:goods,code|lowercase|size:4',
        ]);

        Good::create($good);
        // StockUpdated::dispatch(Good::first());

        return redirect('/good');
    }

    /**
     * Display the specified resource.
     */
    public function show(Good $good)
    {
        return view('good.transaction', data: [
            'goods' => $good->all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Good $good)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        $transaction = request()->validate([
            'good_id' => 'required|exists:goods,id',
            'quantity' => 'required|numeric|min:1',
            'transaction' => 'required|in:buy,sell',
        ]);

        switch($transaction['transaction']) {
            case 'buy':
                BuyGood::create([
                    'good_id' => $transaction['good_id'],
                    'quantity' => $transaction['quantity']
                ]);
                $transaction_id = BuyGood::latest()->first()->id;
                break;
            case 'sell':
                request()->validate([
                    'quantity' => 'max:' . intval(Good::where('id', $transaction['good_id'])->first()->stock),
                ],[
                    'quantity.max' => 'Jumlah barang dijual tidak boleh melebihi jumlah stok'
                ]);
                SellGood::create([
                    'good_id' => $transaction['good_id'],
                    'quantity' => $transaction['quantity']
                ]);
                $transaction_id = SellGood::latest()->first()->id;
                break;
        }
//         Good::where('id', $transaction['good_id'])->increment('stock', $transaction['quantity']);
//         $stock = Good::where('id', $transaction['good_id'])->value('stock');
// dd($stock);
        StockUpdated::dispatch(
            $transaction['good_id'],
            $transaction['transaction'],
            $transaction_id,
            $transaction['quantity']
        );

        return redirect('/good');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Good $good)
    {
        //
    }

    public function history(Good $good, GoodTransaction $transaction){


        return view('good.history', [
            'goods' => $good->all(),
            'transactions' => $transaction->all()
        ]);
    }
}
