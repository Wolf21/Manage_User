<!DOCTYPE html>
<html>

<head>
    <title>User Management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" href="{{asset('/css/vendors/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('/css/vendors/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/vendors/jquery-ui.min.css')}}">
</head>
<body>
    <div class="container">
        <h1 class="text-center">User Management</h1>
        <button class="btn-primary add-btn" data-toggle="modal" data-target="#add-user"> Add User</button>
        <table class="row table">
            <th class="col-md-3 text-center">ID</th>
            <th class="col-md-4 text-center">Name</th>
            <th class="col-md-2 text-center">Role</th>
            @foreach ($users as $user)
            <tr>
                <td class="text-center">{{$user->user_id}}</td>
                <td class="text-center">{{$user->first_name}} {{$user->last_name}}</td>
                <td class="text-center">{{$user->role}}</td>
                <td> <button class="btn-primary edit-btn">Edit</button></td>
                <td> <button class="btn-danger delete-btn">Delete</button></td>
                <td></td>
            </tr>
            @endforeach
        </table>
    </div>
</body>