<div class="modal fade" id="rejectModal{{ $it->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation Alert</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="submit-form" method="POST" action="/request/reject/{{ $it->id }}">
          @csrf
        <div class="modal-body">
          Click confirm to reject request
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Confirm</button>
        </div>
      </form>
      </div>
    </div>
  </div>