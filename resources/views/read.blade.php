@include("subview.header")

<center class="container">
    <h1 class="fs-1 my-3 text-decoration-underline text-danger">Crud Operation</h1>
</center>
<div class="mx-4">
    <a href="{{route("add")}}" class="text-decoration-none">
    <button type="button" class="btn btn-primary">Add Project</button>
    </a>
</div>
<div class="w-100 mt-5 d-flex justify-content-center align-items-center">
<table class="table w-75 text-center table-stripped table-primary table-hover rounded-3">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Shubham tiari</td>
            <td>shubhamtiwari@test.com</td>
            <td class="d-flex align-items-center justify-content-center gap-3">
            <a href="{{route("update",["userID"=>"asdadada"])}}">
            <i class="fas fa-user-edit fs-3 text-info"></i>
        </a>
            <a href="{{route("delete",["userID"=>"asdad"])}}">
            <i class="fas fa-trash-alt fs-3 text-danger"></i>
            </a>
            </td>
        </tr>

    </tbody>
</table>
</div>


@include("subview.footer")