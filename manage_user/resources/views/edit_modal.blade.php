@include('header')
 <div class="modal fade custom-modal display-table" id="add-user-modal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body row">
                <div class="col-md-5 row">
                    <label class="label-input col-md-4">User ID</label>
                    <input type="text" name="user_id" class="input-modal col-md-6">
                </div>
                <div class="col-md-5 row">
                    <label class="label-input col-md-4">Role</label>
                    <input type="text" name="role" class="input-modal col-md-6">
                </div>
                <div class="col-md-5 row">
                    <label class="label-input col-md-4">Email</label>
                    <input type="text" name="first_name" class="input-modal col-md-6">
                </div>
                <div class="col-md-5 row">
                    <label class="label-input col-md-4" >Name</label>
                    <input type="text" name="last_name" class="input-modal col-md-6">
                </div>
                <div class="col-md-5 row">
                    <label class="label-input col-md-4" >Password</label>
                    <input type="password" name="last_name" class="input-modal col-md-6">
                </div>
                <div class="col-md-5 row">
                    <label class="label-input col-md-4" >Retype Pass</label>
                    <input type="password" name="last_name" class="input-modal col-md-6">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>