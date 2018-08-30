
<div class="modal-body">
    <h3 data-user_id="{{$user->user_id}}" class="delete-confirm-message">Do you want to delete user <b> {{$user->user_id}} </b> ?</h3>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default btn-success save-btn">Save</button>
    <button type="button" class="btn btn-default btn-danger close-btn" data-dismiss="modal">Close</button>
</div>
@loadLocalJS(/js/delete_user.js)