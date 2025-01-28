@include("subview.header")

<center class="container">
    <h1 class="fs-1 my-3 text-decoration-underline text-danger">Update Operation</h1>
</center>
<div class="mx-4">
    <a href="{{route("read")}}" class="text-decoration-none">
    <button type="button" class="btn btn-primary"><i class="fas fa-long-arrow-alt-left"></i> Back</button>
    </a>
</div>

<center>
@if (session('updatefail'))
    <x-alert type="info" message="{{ session('updatefail') }}" />
@endif
</center>


<div class="w-100 mt-5 d-flex justify-content-center align-items-center ">
<form method="post" action="/updateform/{{$data->id}}" class="w-25 border border-secondary rounded-3 p-3 shadow-lg">
     @csrf
     @method("PUT")

     <!-- username section  -->
  <div class="mb-3">
    <label for="username" class="form-label fs-4 fw-semibold">Your name</label>
    <input type="text" class="form-control border border-dark text-dark" id="username" name="username" value="{{$data->username}}">
    <!-- all error will be displat here -->
    <p class="fs-5 fst-italic text-danger">
     @error("username"){{$message}}@enderror
    </p>
  </div>


     <!-- email section  -->
  <div class="mb-3">
    <label for="email" class="form-label fs-4 fw-semibold">Email address</label>
    <input type="email" class="form-control border border-dark text-dark" id="email" name="email" aria-describedby="emailHelp" value="{{$data->email}}">
        <!-- all error will be displat here -->
        <p class="fs-5 fst-italic text-danger">
     @error("email"){{$message}}@enderror
    </p>
  </div>

  <button type="submit" class="btn btn-primary w-100">Update User</button>
</form>
</div>


@include("subview.footer")