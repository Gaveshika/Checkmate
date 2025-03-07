@extends("layouts.auth")

@section("style")
   <style>
    html,
    body {
      height: 100%;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #6a11cb, #2575fc); /* Gradient background */
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-signin {
      max-width: 400px; /* Slightly wider for better spacing */
      padding: 2rem;
      background: #ffffff;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Soft shadow for depth */
      text-align: center;
    }

    .form-signin .form-floating:focus-within {
      z-index: 2;
    }

    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }

    .form-signin img {
      width: 100px; /* Larger logo */
      height: auto;
      margin-bottom: 1.5rem;
    }

    .form-signin h1 {
      font-size: 1.75rem;
      margin-bottom: 1.5rem;
      color: #333;
    }

    .form-signin .form-floating {
      margin-bottom: 1rem;
    }

    .form-signin .form-control {
      padding: 12px;
      border-radius: 8px;
      border: 1px solid #ddd;
      transition: border-color 0.3s ease;
    }

    .form-signin .form-control:focus {
      border-color: #6a11cb;
      box-shadow: 0 0 5px rgba(106, 17, 203, 0.5);
    }

    .form-signin .btn-primary {
      background-color: #6a11cb;
      border: none;
      padding: 12px;
      font-size: 1rem;
      border-radius: 8px;
      transition: background-color 0.3s ease;
    }

    .form-signin .btn-primary:hover {
      background-color: #2575fc;
    }

    .form-signin .btn-link {
      color: #6a11cb;
      text-decoration: none;
      font-size: 0.9rem;
    }

    .form-signin .btn-link:hover {
      text-decoration: underline;
    }

    .form-signin .alert {
      margin-top: 1rem;
    }

    .form-signin .text-danger {
      font-size: 0.875rem;
      margin-top: 0.25rem;
      display: block;
    }

    .form-signin .form-check-label {
      font-size: 0.9rem;
      color: #555;
    }

    .form-signin .text-body-secondary {
      font-size: 0.875rem;
      color: #777;
    }
   </style>
@endsection

@section("content")
<main class="form-signin">
  <form method="POST" action="{{route("login.post")}}">
    @csrf
    <!-- Updated logo image -->
    <img class="mb-4" src="{{asset('assets/img/todolist.png')}}" alt="Logo" width="100" height="auto">
    <h1 class="h3 mb-3 fw-normal">Welcome Back!</h1>

    <!-- Email Input -->
    <div class="form-floating">
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
      @error('email')
      <span class="text-danger">{{ $message}}</span>
      @enderror
    </div>

    <!-- Password Input -->
    <div class="form-floating" style="margin-bottom: 10px">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
      @error('password')
      <span class="text-danger">{{ $message}}</span>
      @enderror
    </div>

    <!-- Remember Me Checkbox -->
    <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Remember me
      </label>
    </div>

    <!-- Success/Error Messages -->
    @if(session()->has("success"))
      <div class="alert alert-success">
            {{session()-> get("success")}}
      </div>
    @endif
    @if(session("error"))
      <div class="alert alert-danger">
            {{session("error")}}
      </div>
    @endif

    <!-- Submit Button -->
    <button class="btn btn-primary w-100 py-2" type="submit">
      Sign in
    </button>

    <!-- Register Link -->
    <a href="{{route("register")}}" class="btn btn-link w-100">Create new account</a>

    <!-- Footer -->
    <p class="mt-5 mb-3 text-body-secondary">&copy; 2025</p>
  </form>
</main>
@endsection