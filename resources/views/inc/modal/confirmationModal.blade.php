<!-- DELETE REQUEST MODAL -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              Are you sure you want to delete this record?
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-danger" id="deleteBtn">Delete</button>
          </div>
      </div>
  </div>
</div><!-- END DELETE REQUEST MODAL -->

<!-- CONFIRMATION UPDATE REQUEST MODAL -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation Request</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="submit-form" method="POST" action="/request/store">
        @csrf
      <div class="modal-body">
        Click confirm to update the request
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="send_request" class="btn btn-primary">Confirm</button>
      </div>
    </form>
    </div>
  </div>
</div><!--END CONFIRMATION UPDATE REQUEST MODAL -->

<!-- CONFIRMATION SEND REQUEST MODAL -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation Request</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="submit-form" method="POST" action="/request/store">
          @csrf
        <div class="modal-body">
          Cick confirm to Submit Request
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         
          <button type="submit" name="send_request" class="btn btn-primary">Confirm</button>
        
        </div>
      </form>
      </div>
    </div>
  </div><!--END CONFIRMATION SEND REQUEST MODAL -->


 