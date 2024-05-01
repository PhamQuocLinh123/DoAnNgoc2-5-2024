<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nganh;

class NganhController extends Controller
{
    public function index()
    {
        $nganhs = Nganh::all();
        return view('nganh.index', compact('nganhs'));
    }

    public function create()
    {
        return view('nganh.create');
    }

    public function store(Request $request)
    {
        Nganh::create($request->all());
        return redirect()->route('nganh.index');
    }

    public function show(Nganh $nganh)
    {
        return view('nganh.show', compact('nganh'));
    }

    public function edit(Nganh $nganh)
    {
        return view('nganh.edit', compact('nganh'));
    }

    public function update(Request $request, Nganh $nganh)
    {
        $nganh->update($request->all());
        return redirect()->route('nganh.index');
    }

    public function destroy(Nganh $nganh)
    {
        $nganh->delete();
        return redirect()->route('nganh.index');
    }
}
