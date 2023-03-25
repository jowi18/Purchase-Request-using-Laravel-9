

@include('inc.header-inc');

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<div class="card">
  <div class="card-body">
<div class="container-xxl">

    <table class="display nowrap" id="pr_table">
      <thead >
          <tr>
              <th scope="col">#</th>
              <th scope="col" >Pr No.</th>
              <th scope="col" >Date Created</th>
              <th scope="col">Requested By</th>
              <th scope="col">Department</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
      </thead>

      <tbody>

    @foreach ( $items as $key=>$it )
   
    <tr>      
        <td>{{ $key + 1 }}</td>
        <td>{{ $it->pr_no }}</td>
        <td>{{date('F d, Y', strtotime($it->date_created) ) }}</td>
        <td>{{ $it->user->name }}</td>
        <td class="camelCase">{{ $it->user->department }}</td>
        @if($it->status->status_code == 'under approval' || $it->status->status_code == 'verified')
        <td class="camelCase">{{ $it->status->status_code }} - waiting for approval of {{ $it->status->approver }}</td>
       @else
        <td class="camelCase">{{ $it->status->status_code }} - {{ $it->status->approveby }}</td>
        @endif
       
        <td class="text-right">
        <button class="btn btn-success" data-bs-toggle="tooltip" title="View Request"  onclick="openNewWindow({{ $it->id }})">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M14 12c-1.095 0-2-.905-2-2 0-.354.103-.683.268-.973C12.178 9.02 12.092 9 12 9a3.02 3.02 0 0 0-3 3c0 1.642 1.358 3 3 3 1.641 0 3-1.358 3-3 0-.092-.02-.178-.027-.268-.29.165-.619.268-.973.268z"></path><path d="M12 5c-7.633 0-9.927 6.617-9.948 6.684L1.946 12l.105.316C2.073 12.383 4.367 19 12 19s9.927-6.617 9.948-6.684l.106-.316-.105-.316C21.927 11.617 19.633 5 12 5zm0 12c-5.351 0-7.424-3.846-7.926-5C4.578 10.842 6.652 7 12 7c5.351 0 7.424 3.846 7.926 5-.504 1.158-2.578 5-7.926 5z"></path></svg>
        </button>
       
        <button class="btn btn-success"  data-bs-toggle="tooltip" title="View Attachments"  onclick="openimage({{ $it->id }})">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><circle cx="7.499" cy="9.5" r="1.5"></circle><path d="m10.499 14-1.5-2-3 4h12l-4.5-6z"></path><path d="M19.999 4h-16c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm-16 14V6h16l.002 12H3.999z"></path></svg>        
        </button>
        @if($it->status->status_code != 'approved' && $it->status->status_code != 'Rejected' && $it->status->status_code != 'verified')

        <a href="/edit/{{ $it->id }}"><button class="btn btn-primary" data-bs-toggle="tooltip" title="Edit Request">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="m7 17.013 4.413-.015 9.632-9.54c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.756-.756-2.075-.752-2.825-.003L7 12.583v4.43zM18.045 4.458l1.589 1.583-1.597 1.582-1.586-1.585 1.594-1.58zM9 13.417l6.03-5.973 1.586 1.586-6.029 5.971L9 15.006v-1.589z"></path><path d="M5 21h14c1.103 0 2-.897 2-2v-8.668l-2 2V19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2z"></path></svg>
        </button></a>
        @if($it->status->status_code != 'verified')
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" title="Verify Request" data-bs-target="#verifyModal{{ $it->id }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
        </button>@endif
        

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" title="Approve Request" data-bs-target="#approveModal{{ $it->id }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M20 8h-5.612l1.123-3.367c.202-.608.1-1.282-.275-1.802S14.253 2 13.612 2H12c-.297 0-.578.132-.769.36L6.531 8H4c-1.103 0-2 .897-2 2v9c0 1.103.897 2 2 2h13.307a2.01 2.01 0 0 0 1.873-1.298l2.757-7.351A1 1 0 0 0 22 12v-2c0-1.103-.897-2-2-2zM4 10h2v9H4v-9zm16 1.819L17.307 19H8V9.362L12.468 4h1.146l-1.562 4.683A.998.998 0 0 0 13 10h7v1.819z"></path></svg>           
      </button>

        @if($it->status->status_code != 'verified')
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" title="Reject Request" data-bs-target="#rejectModal{{ $it->id }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M20 3H6.693A2.01 2.01 0 0 0 4.82 4.298l-2.757 7.351A1 1 0 0 0 2 12v2c0 1.103.897 2 2 2h5.612L8.49 19.367a2.004 2.004 0 0 0 .274 1.802c.376.52.982.831 1.624.831H12c.297 0 .578-.132.769-.36l4.7-5.64H20c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zm-8.469 17h-1.145l1.562-4.684A1 1 0 0 0 11 14H4v-1.819L6.693 5H16v9.638L11.531 20zM18 14V5h2l.001 9H18z"></path></svg>              
        </button>@endif
        @endif
        @include('inc.modal.verifyModal')
    
       
      </td> 
    
        </tr>
     
        @endforeach
      </tbody >
    </table> </div> </div>
 

  </div><!-- div container -->
 <script>

function openNewWindow(id) {
    window.open('/pdfview/' + id);
}
function openimage(id) {
    window.open('/imageview/' + id);
}

$(document).ready(function() {
    $('#pr_table').DataTable({
        dom: '<"filter"<"row"<"col-sm-12"tr>>><"clear">',
        initComplete: function() {
            var table = this;
            var filter = $('.filter');
            filter.prepend('<div class="form-group"><label>Filter by Status:</label></div>');
            filter.find('.form-group').append('<div class="btn-group" data-toggle="buttons"></div>');
            filter.find('.btn-group').append('<label class="btn btn-default active"><input type="radio" name="status" value="">All</label>');
            filter.find('.btn-group').append('<label class="btn btn-default active"><input type="radio" name="status" value="pending">Pending</label>');
            filter.find('.btn-group input').on('change', function() {
                table.api().column(5).search($(this).val()).draw();
            });
        }
    });
});

var table= new DataTable('#pr_table');

  </script>

  @include('inc.modal.modalloader')
  
  @include('inc.footer-inc')