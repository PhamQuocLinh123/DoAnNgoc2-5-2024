<?php

// app/Http/Controllers/PhongThiController.php

namespace App\Http\Controllers;

use App\Models\PhongThi;
use Illuminate\Http\Request;

class PhongThiController extends Controller
{
    public function index()
    {
        $phongThiEntries = PhongThi::all();
        return view('phong_thi.index', compact('phongThiEntries'));
    }

    public function create()
    {
        return view('phong_thi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ten_phong' => 'required|string|max:255',
            'suc_chua' => 'required|integer|min:0',
            'so_may' => 'required|integer|min:0',
        ]);

        // Kiểm tra ràng buộc sức chứa phải nhỏ hơn số máy
        if ($request->input('suc_chua') >= $request->input('so_may')) {
            return redirect()->back()->withErrors(['suc_chua' => 'Sức chứa phải nhỏ hơn số máy.'])->withInput();
        }

        PhongThi::create($request->all());
        return redirect()->route('phong_thi.index');
    }

    public function edit($id)
{
    $phongThiEntry = PhongThi::findOrFail($id);
    return view('phong_thi.edit', compact('phongThiEntry'));
}


    public function update(Request $request, $id)
    {
        $request->validate([
            'ten_phong' => 'required|string|max:255',
            'suc_chua' => 'required|integer|min:0',
            'so_may' => 'required|integer|min:0',
        ]);

        // Kiểm tra ràng buộc sức chứa phải nhỏ hơn số máy
        if ($request->input('suc_chua') >= $request->input('so_may')) {
            return redirect()->back()->withErrors(['suc_chua' => 'Sức chứa phải nhỏ hơn số máy.'])->withInput();
        }

        $phongThi = PhongThi::findOrFail($id);
        $phongThi->update($request->all());
        return redirect()->route('phong_thi.index');
    }

    public function destroy($id)
    {
        $phongThi = PhongThi::findOrFail($id);
        $phongThi->delete();
        return redirect()->route('phong_thi.index');
    }
}
