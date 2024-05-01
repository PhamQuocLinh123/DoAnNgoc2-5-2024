<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Password</title>
</head>
<body>
    <h1>Generate Password for All Students</h1>
    <form action="{{ route('generate-password-for-all') }}" method="POST">
        @csrf
        <button type="submit">Generate Password for All</button>
    </form>

    @isset($message)
        <p>{{ $message }}</p>
    @endisset
</body>
</html>
