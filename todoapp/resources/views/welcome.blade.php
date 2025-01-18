@extends("layouts.default")

@section("content")
<main class="flex-shrink-0 mt-5">
  <div class="container" style="max-width:600px">
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
    <div class="my-3 p-3 bg-body rounded shadow-sm">
      <h6 class="border-bottom pb-2 mb-0">Suggestions</h6>
      @foreach($tasks as $task)
      <div class="d-flex text-body-secondary pt-3">
        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
        </svg>
        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
          <div class="d-flex justify-content-between">
            <strong class="text-gray-dark">{{$task->title}} | {{$task->deadline}}</strong>
            <a href="{{route('task.status.update', $task->id)}}" class="btn btn-successs">Completed</a>
          </div>
          <span class="d-block">{{$task->description}}</span>
        </div>
      </div>
      @endforeach
      
      
      <small class="d-block text-end mt-3">
        <a href="#">All suggestions</a>
      </small>
    </div>
  </div>
</main>

@endsection