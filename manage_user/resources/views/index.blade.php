@include ('header')
<body>
    <div class="container">
        <h1 class="text-left">User Management</h1>
        {{--<div class="profile">--}}
            {{--<i class="far fa-user"> {{\Cookie::get('email')}}</i>--}}
            {{--<a href="{{url('logout')}}"><i class="fas fa-sign-out-alt "></i></a>--}}
        {{--</div>--}}
        <button class="btn-primary add-btn" data-toggle="modal" data-target="#add-user-modal"> Add User</button>
        <table class="row table">
            <thead>
                <tr>
                    <th class="col-md-1 text-center">STT</th>
                    <th class="col-md-2 text-center">ID</th>
                    <th class="col-md-3 text-center">Email</th>
                    <th class="col-md-2 text-center">Name</th>
                    <th class="col-md-2 text-center">Role</th>
                </tr>
            </thead>
            <tbody>
                @php($i=1)
                @foreach ($users as $user)
                <tr data-user_id="{{$user->user_id}}"
                    data-email="{{$user->email}}"
                    data-user_name="{{$user->user_name}}"
                    data-role="{{$user->role}}">
                    <td class="text-center">{{$i}}</td>
                    <td class="text-center">{{$user->user_id}}</td>
                    <td class="text-center">{{$user->email}}</td>
                    <td class="text-center">{{$user->user_name}}</td>
                    <td class="text-center">{{$user->role}}</td>
                    <td> <button class="btn-primary edit-btn" data-toggle="modal" data-target="#edit-user-modal">Edit</button></td>
                    <td> <button class="btn-danger delete-btn" data-toggle="modal" data-target="#delete-user-modal">Delete</button></td>
                    <td></td>
                </tr>
            @php($i++)
            @endforeach
            </tbody>
        </table>
    </div>
    <div id="client"></div>
@include('modal-add-user')
@include('modal-edit-user')
@include('modal-delete-user')
</body>
@loadLocalJS(/js/main.js)