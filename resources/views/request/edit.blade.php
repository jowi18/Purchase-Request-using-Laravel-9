@include('inc.header-inc');

<script>
  setTimeout(function() {
    $('.alert').fadeOut('slow');
  }, 1000); // 3000ms = 3 seconds
</script>

<style>
  .alert {
    transition: opacity 0.5s ease-in-out;
  }
</style>
<div class="container">

  <div class="card">
    <div class="card-body">
       <form action="/update/{id}" method="POST">
        @csrf
        @method('PUT')
   <table class="table">
       <thead>
           <tr> 
      
               <th>Particulars</th>
               <th>Description</th>
               <th>Quantity</th>
               <th>Unit of Measurement</th>
               <th>Date Needed</th>
               <th>Remarks</th>
           </tr>
       </thead>
       <tbody>

            @foreach($rows as $key=>$row)
           
            <tr>
 
             <input type="hidden" class="form-control" name="request_id[]" value="{{ $row->id }}">
              <td>
                <select type="text" class="form-control" name="req_particulars[]" id="req_particulars" >
                  <option value="{{ $row->req_particulars }}" selected>{{ $row->req_particulars }}</option>
                  <option value="mouse">Mouse</option>
                  <option value="keyboard">Keyboard</option>
                  <option value="headset">Headset</option>
                  <option value="folder">Folder</option>
                </select>
              
              </td>
              <td><input type="text" class="form-control" name="req_description[]" value="{{ $row->req_description }}" ></td>
              <td><input type="number" class="form-control" name="qty[]"  value="{{ $row->qty }}"></td>
              <td>
              <select name="uom[]" class="form-select" aria-label="Default select example" id="uom" required>
                <option value="">Unit Of Measurement</option>
                <option value="{{ $row->uom }}" selected>{{ $row->uom }}</option>
                 @foreach ($data as $u)
                 <option value="{{ $u->uom }}">{{ $u->uom_abv }}</option>
                 @endforeach
               </select></td>
              <td><input type="text" class="form-control" name="date_needed[]"    value="{{$row->date_needed}}"></td>
              <td><input type="text" class="form-control" name="req_remarks[]" value="{{ $row->req_remarks }}" ></td>
              <!-- DELETE BTN 
               <td>
                <button type="button" class="btn btn-danger delete-record" data-id="{$row->id }" data-target="#deleteModal">                  
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M7 11h10v2H7z"></path><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path></svg>
                  </button>
               
               </td>-->
           </tr>
       
            @endforeach
       </tbody>
   </table>
<!-- Button trigger modal -->
<button type="submit" class="btn btn-primary">
  Update Request
</button>
</form>

@include('inc.modal.confirmationModal')

</div>
</div>
</div>

<script>
  /*
$('.delete-record').on('click', function() {
    var id = $(this).data('id');
    $('#deleteModal').modal('show');
    $('#deleteBtn').on('click', function() {
        $.ajax({
            url: '/delete/' + id,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function() {
                // display success message
                toastr.success('Record deleted successfully.');
                // do something on success, like refreshing the page
                location.reload();
            }
        });
        $('#deleteModal').modal('hide');
    });
    
});

$(document).ready(function() {
    toastr.options = {
        positionClass: 'toast-top-right',
        progressBar: true,
        preventDuplicates: true,
    };
});
  </script>

<script>
  var today = new Date().toISOString().split('T')[0];
  document.getElementById("myDateField").setAttribute("min", today);

  $(document).ready(function() {
      $('#req_particulars').select2({
          placeholder: 'Select Particulars',
          allowClear: true
      });
  });

  $(document).ready(function() {
      $('#uom').select2({
          placeholder: 'Select Unit of measurement',
          allowClear: true
         
      });
  });
 </script>

   @include('inc.footer-inc')
   @include('inc.modal.modalloader')

</body>
</html>
