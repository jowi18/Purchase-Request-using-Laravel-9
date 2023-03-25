<div class="modal fade" id="approveModal{{ $it->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation Alert</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="submit-form" method="POST" action="/request/approve/{{ $it->id }}">
          @csrf
        <div class="modal-body">
          Are you the last approver? if yes, click confirm, if no, pick user to proceed
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Pass it
          </button>
          <button type="submit" class="btn btn-primary">Confirm</button>
        </div>
      </form>
      </div>
    </div>
  </div>


  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Choose for next approver</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/request/nextApprover/{{ $it->id }}" method="POST">
          @csrf
        <div class="modal-body"> 
            <select class="form-control" name="approver">
              <option value="controller">Controller</option>
              <option value="cfo">CFO</option>
              <option value="ceo">CEO</option>
            </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Pass Request</button>
        </div>
      </form>
      </div>
    </div>
  </div>