<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LopChungChi;

class LopChungChiController extends Controller
{
    // Hiển thị danh sách lớp
    public function index()
    {
        $lops = LopChungChi::all();
        return view('lop.index', compact('lops'));
    }

    // Hiển thị form tạo lớp
    public function create()
    {
        return view('lop.create');
    }

    // Lưu lớp mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'ten_lop' => 'required',
            'so_tiet' => 'nullable|integer',
            'hoc_phi' => 'nullable|numeric',
        ]);

        LopChungChi::create($request->all());
        return redirect()->route('lops.index')->with('success', 'Lớp đã được tạo thành công.');
    }

    // Hiển thị thông tin lớp cụ thể
    public function show($id)
    {
        $lop = LopChungChi::findOrFail($id);
        return view('lop.show', compact('lop'));
    }

    // Hiển thị form chỉnh sửa lớp
    public function edit($id)
    {
        $lop = LopChungChi::findOrFail($id);
        return view('lop.edit', compact('lop'));
    }

    // Cập nhật thông tin lớp trong cơ sở dữ liệu
    public function update(Request $request, $id)
    {
        $request->validate([
            'ten_lop' => 'required',
            'so_tiet' => 'nullable|integer',
            'hoc_phi' => 'nullable|numeric',
        ]);

        $lop = LopChungChi::findOrFail($id);
        $lop->update($request->all());
        return redirect()->route('lops.index')->with('success', 'Thông tin lớp đã được cập nhật thành công.');
    }

    // Xóa lớp khỏi cơ sở dữ liệu
    public function destroy($id)
    {
        $lop = LopChungChi::findOrFail($id);
        $lop->delete();
        return redirect()->route('lops.index')->with('success', 'Lớp đã được xóa thành công.');
    }
}
