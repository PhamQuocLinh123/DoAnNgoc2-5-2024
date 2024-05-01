<!DOCTYPE html>
<html>
<head>
    <title>Import Excel</title>
</head>
<body>
    <h2>Import Excel</h2>
    @if ($message = Session::get('success'))
        <div>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <form action="{{ route('hoc_vien.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <input type="file" name="file">
        </div>
        <div>
            <button type="submit">Import</button>
        </div>
    </form>
</body>
</html>
