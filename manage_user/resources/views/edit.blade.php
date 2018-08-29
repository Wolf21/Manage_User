<form>
    <div class="modal-body row">
        <div class="col-md-5 row">
            <label class="label-input col-md-4">User ID</label>
            <input type="text" name="user_id" class="input-modal col-md-6" value="{{$user->user_id}}" disabled="disabled">
        </div>
        <div class="col-md-offset-1 col-md-5 row">
            <label class="label-input col-md-4">Role</label>
            <select name="role" class="col-md-6">
                <option value="{{\App\Enums\Role::USER}}" {{$user->role == \App\Enums\Role::USER ? 'selected' : ''}}>User</option>
                <option value="{{\App\Enums\Role::ADMIN}}" {{$user->role == \App\Enums\Role::ADMIN ? 'selected' : ''}}>Admin</option>
            </select>
        </div>
        <div class="col-md-5 row">
            <label class="label-input col-md-4">Email</label>
            <input type="email" name="email" class="input-modal col-md-6" value="{{$user->email}}">
        </div>
        <div class="col-md-offset-1 col-md-5 row">
            <label class="label-input col-md-4" >Name</label>
            <input type="text" name="user_name" class="input-modal col-md-6" value="{{$user->user_name}}">
        </div>
    </div>
    <div id="err-message">
        <ul>
        </ul>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default btn-success save-btn">Save</button>
        <button type="button" class="btn btn-default btn-danger close-btn" data-dismiss="modal">Close</button>
    </div>
</form>
@loadLocalJS(/js/edit_user.js)