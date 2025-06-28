<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillStoreRequest;
use App\Http\Requests\BillUpdateRequest;
use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BillController extends Controller
{
    public function index(Request $request)
    {
        $bills = Bill::all();

        return view('bill.index', [
            'bills' => $bills,
        ]);
    }

    public function create(Request $request)
    {
        return view('bill.create');
    }

    public function store(BillStoreRequest $request)
    {
        $bill = Bill::create($request->validated());

        $request->session()->flash('bill.id', $bill->id);

        return redirect()->route('bills.index');
    }

    public function show(Request $request, Bill $bill)
    {
        return view('bill.show', [
            'bill' => $bill,
        ]);
    }

    public function edit(Request $request, Bill $bill)
    {
        return view('bill.edit', [
            'bill' => $bill,
        ]);
    }

    public function update(BillUpdateRequest $request, Bill $bill)
    {
        $bill->update($request->validated());

        $request->session()->flash('bill.id', $bill->id);

        return redirect()->route('bills.index');
    }

    public function destroy(Request $request, Bill $bill)
    {
        $bill->delete();

        return redirect()->route('bills.index');
    }
}
