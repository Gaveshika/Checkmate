@extends("layouts.default")

@section("style")
<style>
  body {
    background-color: #f8f9fa; /* Light background for the page */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
  }

  .container.card {
    background-color: #ffffff; /* White background for the form */
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
    padding: 2rem;
    max-width: 500px;
    width: 100%;
  }

  .fs-3.fw-bold {
    font-size: 1.75rem;
    font-weight: 600;
    color: #333;
    text-align: center;
    margin-bottom: 1.5rem;
  }

  .form-control {
    padding: 0.75rem;
    border-radius: 8px;
    border: 1px solid #ddd;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
  }

  .form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
  }

  textarea.form-control {
    resize: vertical; /* Allow vertical resizing */
  }

  .btn-success {
    background-color: #28a745; /* Green for the submit button */
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 25px; /* Rounded pill shape */
    font-size: 1rem;
    font-weight: 500;
    transition: background-color 0.3s ease;
  }

  .btn-success:hover {
    background-color: #218838; /* Darker green on hover */
  }

  .alert {
    margin-top: 1rem;
    padding: 0.75rem;
    border-radius: 8px;
    font-size: 0.9rem;
  }

  .alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
  }

  .alert-danger {
    background-color: #f8d7da;
    border-color: #f5c6cb;
    color: #721c24;
  }

  /* Optional: Add a background image or illustration */
  .form-image {
    text-align: center;
    margin-bottom: 1.5rem;
  }

  .form-image img {
    width: 150px;
    height: auto;
  }
</style>
@endsection

@section("content")
<div class="d-flex align-items-center">
  <div class="container card shadow-sm">
    <!-- Optional: Add an image or illustration -->
    <div class="form-image">
      <img src="{{ asset('assets/img/task-illustration.png') }}" alt="Task Illustration">
    </div>

    <div class="fs-3 fw-bold text-center">Add New Task</div>
    <form class="p-3" method="POST" action="{{ route('task.add.post') }}">
      @csrf
      <!-- Task Title -->
      <div class="mb-3 mt-1">
        <input type="text" name="title" class="form-control" placeholder="Task Title">
      </div>

      <!-- Task Deadline -->
      <div class="mb-3">
        <input type="datetime-local" class="form-control" name="deadline">
      </div>

      <!-- Task Description -->
      <div class="mb-3">
        <textarea name="description" class="form-control" rows="3" placeholder="Task Description"></textarea>
      </div>

      <!-- Success/Error Messages -->
      @if(session()->has("success"))
        <div class="alert alert-success">
          {{ session()->get("success") }}
        </div>
      @endif
      @if(session("error"))
        <div class="alert alert-danger">
          {{ session("error") }}
        </div>
      @endif

      <!-- Submit Button -->
      <button class="btn btn-success rounded-pill w-100" type="submit">Submit</button>
    </form>
  </div>
</div>
@endsection