@include('header')
 <div class="modal fade custom-modal display-table" id="add-user-modal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <label class="label-input">User ID</label>
                <input type="text" name="user_id" class="input-modal">
                <label class="label-input">First Name</label>
                <input type="text" name="first_name" class="input-modal">
                <label class="label-input" >Last Name</label>
                <input type="text" name="last_name" class="input-modal">
                <label class="label-input">Role</label>
                <input type="text" name="role" class="input-modal">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>