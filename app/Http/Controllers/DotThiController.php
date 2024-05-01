<?php

// app/Http/Controllers/DotThiController.php

namespace App\Http\Controllers;

use App\Models\DotThi;
use Illuminate\Http\Request;

class DotThiController extends Controller
{
    public function index()
    {
        // Lấy tất cả các bản ghi từ model DotThi và truyền vào view
        $dotThiEntries = DotThi::all();
        return view('dot_thi.index', compact('dotThiEntries'));
    }

    public function create()
    {
        // Hiển thị view để tạo mới bản ghi
        return view('dot_thi.create');
    }

    public function store(Request $request)
    {
        // Validate dữ liệu gửi lên từ form
        $request->validate([
            'ngay_thi' => 'required|date',
            'so_quyet_dinh_hd' => 'nullable|string',
        ]);

        // Tạo mới một bản ghi trong cơ sở dữ liệu từ dữ liệu được gửi lên từ form
        DotThi::create($request->all());

        // Chuyển hướng về trang danh sách sau khi tạo mới thành công
        return redirect()->route('dot_thi.index');
    }

    public function edit($id)
    {
        // Tìm bản ghi cần chỉnh sửa và hiển thị view để chỉnh sửa
        $dotThiEntry = DotThi::findOrFail($id);
        return view('dot_thi.edit', compact('dotThiEntry'));
    }

    public function update(Request $request, $id)
    {
        // Validate dữ liệu gửi lên từ form
        $request->validate([
            'ngay_thi' => 'required|date',
            'so_quyet_dinh_hd' => 'nullable|string',
        ]);

        // Tìm bản ghi cần cập nhật và cập nhật thông tin mới từ dữ liệu được gửi lên từ form
        $dotThiEntry = DotThi::findOrFail($id);
        $dotThiEntry->update($request->all());

        // Chuyển hướng về trang danh sách sau khi cập nhật thành công
        return redirect()->route('dot_thi.index');
    }

    public function destroy($id)
    {
        // Tìm bản ghi cần xóa và xóa nó khỏi cơ sở dữ liệu
        $dotThiEntry = DotThi::findOrFail($id);
        $dotThiEntry->delete();

        // Chuyển hướng về trang danh sách sau khi xóa thành công
        return redirect()->route('dot_thi.index');
    }
}
