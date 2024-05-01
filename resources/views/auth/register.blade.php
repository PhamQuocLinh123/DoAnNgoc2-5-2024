@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Glassmorphism Register Form</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <style media="screen">
    *,
    *:before,
    *:after {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }
    
    body {
    background-color: #7ccbea;
    position: relative;
  }

  .centered-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    width: 100%;
  }
    
    form {
      width: 400px;
      background-color: rgba(255, 255, 255, 0.13);
      border-radius: 15px;
      backdrop-filter: blur(10px);
      border: 2px solid rgba(255, 255, 255, 0.1);
      box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
      padding: 50px 35px;
    }
    
    form h3 {
      font-size: 32px;
      font-weight: 500;
      line-height: 42px;
      text-align: center;
      margin-bottom: 30px;
      color: #23a2f6;
    }
    
    label {
      display: block;
      font-size: 16px;
      font-weight: 500;
      color: #ffffff;
    }
    
    input {
      display: block;
      height: 50px;
      width: calc(100% - 20px);
      background-color: rgba(255, 255, 255, 0.07);
      border-radius: 25px;
      padding: 0 20px;
      margin-top: 8px;
      font-size: 14px;
      font-weight: 300;
      color: #ffffff;
      border: none;
      transition: all 0.3s ease;
    }
    
    input:focus {
      background-color: rgba(255, 255, 255, 0.2);
    }
    
    ::placeholder {
      color: #e5e5e5;
    }
    
    button {
      margin-top: 50px;
      width: 100%;
      background-color: #23a2f6;
      color: #ffffff;
      padding: 15px 0;
      font-size: 18px;
      font-weight: 600;
      border-radius: 25px;
      cursor: pointer;
      border: none;
      transition: all 0.3s ease;
    }
    
    button:hover {
      background-color: #1845ad;
    }
  </style>
</head>
<body>
  <form method="POST" action="{{ route('register') }}"style="position: absolute; top: 380%; left: 50%; transform: translate(-50%, -50%);">
    @csrf
    <h3>Register</h3>
    <label for="name">Name</label>
    <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your name">
    @error('name')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
    <label for="email">Email Address</label>
    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email">
    @error('email')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
    <label for="password">Password</label>
    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter your password">
    @error('password')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
    <label for="password-confirm">Confirm Password</label>
    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
    <button type="submit">Register</button>
    <br>
    <!-- Nút qua trang login -->
    <p>Bạn đã có tài khoản? <a href="{{ route('login') }}">Login</a></p>
  </form>
</body>
</html>
@endsection
