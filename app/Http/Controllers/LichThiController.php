<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LichThi;
use App\Models\DotThi;
use App\Models\GioThi;
use App\Models\PhongThi;

class LichThiController extends Controller
{
    public function create()
    {
        $dotThiList = DotThi::all();
        $gioThiList = GioThi::all();
        $phongThiList = PhongThi::all();
        return view('lich_thi.create', compact('dotThiList', 'gioThiList', 'phongThiList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_dot_thi' => 'required',
            'id_gio_thi' => 'required',
            'id_phong_thi' => 'required',
            'so_luong' => 'required'
        ]);

        LichThi::create($request->all());

        return redirect()->route('lich_thi.index')
            ->with('success', 'Lịch thi đã được tạo thành công.');
    }

    public function edit($id)
    {
        $lichThiEntry = LichThi::findOrFail($id);
        $dotThiList = DotThi::all();
        $gioThiList = GioThi::all();
        $phongThiList = PhongThi::all();
        return view('lich_thi.edit', compact('lichThiEntry', 'dotThiList', 'gioThiList', 'phongThiList'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_dot_thi' => 'required',
            'id_gio_thi' => 'required',
            'id_phong_thi' => 'required',
            'so_luong' => 'required'
        ]);

        $lichThiEntry = LichThi::findOrFail($id);
        $lichThiEntry->update($request->all());

        return redirect()->route('lich_thi.index')
            ->with('success', 'Lịch thi đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $lichThiEntry = LichThi::findOrFail($id);
        $lichThiEntry->delete();

        return redirect()->route('lich_thi.index')
            ->with('success', 'Lịch thi đã được xóa thành công.');
    }

    public function index()
    {
        $lichThiEntries = LichThi::all();
        return view('lich_thi.index', compact('lichThiEntries'));
    }
}
