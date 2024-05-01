<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GioThi;

class GioThiController extends Controller
{
    /**
     * Hiển thị danh sách các bản ghi gio_thi.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gioThiEntries = GioThi::all();
        return view('gio_thi.index', compact('gioThiEntries'));
    }

    /**
     * Hiển thị form để tạo bản ghi gio_thi mới.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gio_thi.create');
    }

    /**
     * Lưu bản ghi gio_thi mới được tạo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'gio_bat_dau' => 'required',
            'gio_ket_thuc' => 'required',
        ]);

        GioThi::create($request->all());

        // Chuyển hướng về trang index sau khi đã lưu thành công
        return redirect()->route('gio_thi.index')
            ->with('success', 'GioThi entry created successfully.');
    }

    /**
     * Hiển thị form để chỉnh sửa một bản ghi gio_thi.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gioThiEntry = GioThi::find($id);
        return view('gio_thi.edit', compact('gioThiEntry'));
    }

    /**
     * Cập nhật thông tin của một bản ghi gio_thi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'gio_bat_dau' => 'required',
            'gio_ket_thuc' => 'required',
        ]);

        $gioThiEntry = GioThi::find($id);
        $gioThiEntry->update($request->all());

        return redirect()->route('gio_thi.index')
            ->with('success', 'GioThi entry updated successfully');
    }

    /**
     * Xóa một bản ghi gio_thi từ cơ sở dữ liệu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GioThi::find($id)->delete();
        return redirect()->route('gio_thi.index')
            ->with('success', 'GioThi entry deleted successfully');
    }
}
