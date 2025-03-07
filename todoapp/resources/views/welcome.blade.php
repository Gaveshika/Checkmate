@extends("layouts.default")

@section("style")
<style>
  body {
    background-color: #f8f9fa; /* Light background for the page */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .container {
    max-width: 800px; /* Wider container for better spacing */
  }

  .bg-body {
    background-color: #ffffff; /* White background for the task list */
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
  }

  .welcome-message {
    font-size: 1.5rem;
    font-weight: 500;
    color: #333;
  }

  .task-list-header {
    font-size: 1.25rem;
    font-weight: 500;
    color: #333;
    border-bottom: 2px solid #e9ecef;
    padding-bottom: 0.5rem;
  }

  .task-item {
    display: flex;
    align-items: center;
    padding: 1rem 0;
    border-bottom: 1px solid #e9ecef;
  }

  .task-item:last-child {
    border-bottom: none;
  }

  .task-icon {
    width: 40px;
    height: 40px;
    background-color: #007bff; /* Blue background for the icon */
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 1rem;
  }

  .task-icon svg {
    width: 24px;
    height: 24px;
    fill: #ffffff; /* White icon color */
  }

  .task-details {
    flex: 1;
  }

  .task-title {
    font-size: 1.1rem;
    font-weight: 500;
    color: #333;
  }

  .task-deadline {
    font-size: 0.9rem;
    color: #6c757d;
  }

  .task-description {
    font-size: 0.95rem;
    color: #555;
    margin-top: 0.5rem;
  }

  .task-actions {
    display: flex;
    gap: 0.5rem;
  }

  .task-actions .btn {
    padding: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .task-actions .btn-success {
    background-color: #28a745; /* Green for complete action */
    border: none;
  }

  .task-actions .btn-danger {
    background-color: #dc3545; /* Red for delete action */
    border: none;
  }

  .task-actions .btn-success:hover {
    background-color: #218838; /* Darker green on hover */
  }

  .task-actions .btn-danger:hover {
    background-color: #c82333; /* Darker red on hover */
  }

  .pagination {
    margin-top: 1.5rem;
    justify-content: center;
  }

  .pagination .page-item.active .page-link {
    background-color: #007bff;
    border-color: #007bff;
  }

  .pagination .page-link {
    color: #007bff;
  }

  .pagination .page-link:hover {
    color: #0056b3;
  }
</style>
@endsection

@section("content")
<main class="flex-shrink-0 mt-5">
  <div class="container">
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
    <div class="my-3 p-4 bg-body rounded shadow-sm">
      <div class="welcome-message mb-4">Welcome {{auth()->user()->name}}!</div>
      <h6 class="task-list-header">List of Tasks</h6>
      @foreach($tasks as $task)
      <div class="task-item">
        <!-- Task Icon -->
        <div class="task-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
            <polyline points="14 2 14 8 20 8"></polyline>
            <line x1="16" y1="13" x2="8" y2="13"></line>
            <line x1="16" y1="17" x2="8" y2="17"></line>
            <polyline points="10 9 9 9 8 9"></polyline>
          </svg>
        </div>
        <!-- Task Details -->
        <div class="task-details">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <span class="task-title">{{$task->title}}</span>
              <span class="task-deadline ms-2">| {{$task->deadline}}</span>
            </div>
            <div class="task-actions">
              <!-- Complete Task Button -->
              <a href="{{route('task.status.update', $task->id)}}" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M5 12l5 5l10 -10"></path>
                </svg>
              </a>
              <!-- Delete Task Button -->
              <a href="{{route('task.delete', $task->id)}}" class="btn btn-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M4 7l16 0"></path>
                  <path d="M10 11l0 6"></path>
                  <path d="M14 11l0 6"></path>
                  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                </svg>
              </a>
            </div>
          </div>
          <div class="task-description">{{$task->description}}</div>
        </div>
      </div>
      @endforeach
      
      <!-- Pagination -->
      <div class="mt-4">
        {{$tasks->links()}}
      </div>
    </div>
  </div>
</main>
@endsection