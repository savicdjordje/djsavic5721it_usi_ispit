<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusStoreRequest;
use App\Http\Requests\StatusUpdateRequest;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StatusController extends Controller
{
    public function index(Request $request)
    {
        $statuses = Status::all();

        return view('status.index', [
            'statuses' => $statuses,
        ]);
    }

    public function create(Request $request)
    {
        return view('status.create');
    }

    public function store(StatusStoreRequest $request)
    {
        $status = Status::create($request->validated());

        $request->session()->flash('status.id', $status->id);

        return redirect()->route('statuses.index');
    }

    public function show(Request $request, Status $status)
    {
        return view('status.show', [
            'status' => $status,
        ]);
    }

    public function edit(Request $request, Status $status)
    {
        return view('status.edit', [
            'status' => $status,
        ]);
    }

    public function update(StatusUpdateRequest $request, Status $status)
    {
        $status->update($request->validated());

        $request->session()->flash('status.id', $status->id);

        return redirect()->route('statuses.index');
    }

    public function destroy(Request $request, Status $status)
    {
        $status->delete();

        return redirect()->route('statuses.index');
    }
}
