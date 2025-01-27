@include("subview.header");
<center class="container">
    <h1 class="fs-1 my-3 text-decoration-underline text-danger">Create Operation</h1>
</center>



<div class="mx-4">
    <a href="{{route("add")}}" class="text-decoration-none">
    
    <button type="button" class="btn btn-primary">Add project</button>
    </a>
</div>

<!-- success message goes over here -->
@if (session("success"))
<x-alert type="success" message="{{session("success")}}"/>
@endif


<center>
<table class="table text-center w-75 table-stripped table-primary table-hover">
  <thead>
    <tr>
      <th scope="col">Serial no.</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($datas as $data)
    <tr>
    <th scope="row">{{ ($datas->currentPage() - 1) * $datas->perPage() + $loop->iteration }}</th>
      <td>{{$data->username}}</td>
      <td>{{$data->email}}</td>
      <td class="d-flex justify-content-center align-items-center fs-4 gap-3">
    <!-- Update Link -->
    <a href="{{ route('updateGet', ['id' => $data->id]) }}">
        <i class="fas fa-user-edit"></i>
    </a>

    <!-- Delete Form -->
    <form action="{{ route('delete', ['id' => $data->id]) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn fs-4 p-0 border-0 text-danger" >
            <i class="fas fa-trash-alt"></i>
        </button>
    </form>
</td>

    </tr>
    @endforeach

  </tbody>
</table>
</center>

<center>
  {{$datas->links()}}
</center>
<style>
.w-5.h-5 {
  width: 20px;
  height: 20px;
}

</style>

@include("subview.footer");