@php($i=1)
@foreach ($users as $user)
    <tr>
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