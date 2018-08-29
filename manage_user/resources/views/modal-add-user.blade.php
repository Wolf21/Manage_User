@include('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
 <div class="modal fade custom-modal display-table" id="add-user-modal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form>

                <div class="modal-body row">
                    <div class="col-md-5 row">
                        <label class="label-input col-md-4">User ID</label>
                        <input type="text" name="user_id" class="input-modal col-md-6">
                    </div>
                    <div class="col-md-offset-1 col-md-5 row">
                        <label class="label-input col-md-4">Role</label>
                        <select name="role" class="col-md-6">
                            <option value="{{\App\Enums\Role::USER}}">User</option>
                            <option value="{{\App\Enums\Role::ADMIN}}">Admin</option>
                        </select>
                    </div>
                    <div class="col-md-5 row">
                        <label class="label-input col-md-4">Email</label>
                        <input type="email" name="email" class="input-modal col-md-6">
                    </div>
                    <div class="col-md-offset-1 col-md-5 row">
                        <label class="label-input col-md-4" >Name</label>
                        <input type="text" name="user_name" class="input-modal col-md-6">
                    </div>
                    <div class="col-md-5 row">
                        <label class="label-input col-md-4" >Password</label>
                        <input type="password" name="password" class="input-modal col-md-6">
                    </div>
                    <div class="col-md-offset-1 col-md-5 row">
                        <label class="label-input col-md-4" >Retype Pass</label>
                        <input type="password" name="confirm_password" class="input-modal col-md-6">
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
        </div>
    </div>
</div>
@loadLocalJS(/js/add_user.js)