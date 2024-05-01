<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhoaHoc;

class KhoaHocController extends Controller
{
    public function index()
    {
        $khoaHocs = KhoaHoc::all();
        return view('khoa_hoc.index', compact('khoaHocs'));
    }

    public function create()
    {
        return view('khoa_hoc.create');
    }

    public function store(Request $request)
    {
        KhoaHoc::create($request->all());
        return redirect()->route('khoa_hoc.index');
    }

    public function show(KhoaHoc $khoaHoc)
    {
        return view('khoa_hoc.show', compact('khoaHoc'));
    }

    public function edit(KhoaHoc $khoaHoc)
    {
        return view('khoa_hoc.edit', compact('khoaHoc'));
    }

    public function update(Request $request, KhoaHoc $khoaHoc)
    {
        $khoaHoc->update($request->all());
        return redirect()->route('khoa_hoc.index');
    }

    public function destroy(KhoaHoc $khoaHoc)
    {
        $khoaHoc->delete();
        return redirect()->route('khoa_hoc.index');
    }
}
