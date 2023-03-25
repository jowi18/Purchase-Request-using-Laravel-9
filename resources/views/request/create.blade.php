@include('inc.header-inc');
<script>
  setTimeout(function() {
    $('.alert').fadeOut('slow');
  }, 5000); // 3000ms = 3 seconds
</script>
<style>
  .alert {
    transition: opacity 0.5s ease-in-out;
  }
  .center {
  text-align: center;
}
.btn{
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>

<div class="container" >
  @if(session('controlNo') || session('new_window_url'))
  <div class="alert alert-primary alert-dismissible fade show" role="alert">
    Click the Control Number <a href="/pdfview/{{ session('controlId') }}" class="alert-link" target="_blank">{{ session('controlNo') }}</a>. Give it a click if you like.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <script>
    window.open('{{ session('new_window_url') }}', '_blank');
</script>
@endif

  <div class="row">
    

    <div class="col-4" >
      <div id="list-example" class="list-group">

        <div class="card">
          <div class="card-body">

  <form action="/submit" method="POST" enctype="multipart/form-data" class="row g-3">
    @csrf
    <div class="mb-1">
      
      <label for="inputParticulars" class="form-label">Particulars</label>
      <select name="req_particulars" id="req_particulars" class="form-control" required>
        <option value="">Select Request Items</option>
        <option value="mouse">Mouse</option>
        <option value="keyboard">Keyboard</option>
        <option value="headset">Headset</option>
        <option value="folder">Folder</option>
      </select>
    </div>
    <div class="mb-1">
      <label for="inputDescription" class="form-label">Description</label>
      <input type="text" name="req_description" class="form-control"    required>
    </div>

    <div class="mb-1">
      <label for="inputQuantity" class="form-label">Quantity  </label>
      <input type="number" name="qty" class="form-control" min="1" oninput="this.value = Math.abs(this.value)" id="inputQuantity" required> 
    </div>

    <div class="mb-1">
      <label for="inputUnit" class="form-label">Unit</label>
      <select name="uom" class="form-select" aria-label="Default select example" id="uom" required>
       <option value="">Unit Of Measurement</option>
        @foreach ($data as $u)
        <option value="{{ $u->uom }}">{{ $u->uom_abv }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-1">
      <label for="inputDateneed" class="form-label">Date Needed</label>
      <input type="date" name="date_needed" class="form-control" id="myDateField" required>
    </div>
    <div class="mb-1">
      <label for="inputRemarks" class="form-label">Remarks</label>
      <input type="text" name="req_remarks" class="form-control" id="inputRemarks" >
    </div>
    <div class="mb-1">
      <label for="inputRemarks" class="form-label">Attachments</label>
      <input type="file" name="req_image" id="file-input" class="form-control" accept=".pdf,.jpg,.jpeg,.png" onchange="validateFile(this)">
      <span id="file-error" style="color: red;"></span>
    </div>
    <div class="btn">
    <button type="submit" class="btn btn-primary">Add Request</button>
    </div>
  </form>
</div>
</div>

</div>
</div>

<div class="col-8 overflow-auto" style="height: 400px;">
  <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">


        <table class="table">
          <thead class="bg-primary">
              <tr>
                  <th>Particulars</th>
                  <th>Description</th>
                  <th>Quantity</th>
                  <th>UOM</th>
                  <th>Date Needed</th>
                  <th>Remarks</th>
                  <th>Attachment</th>
                  <th>Action</th>
                  
              </tr>
        
   @if(session('rows'))
       <tbody>
        
        @if(is_array(session('rows')))
            @foreach(session('rows') as $index=>$row)
            <tr>
              <td class="center">{{ $row['req_particulars'] }} </td>
              <td class="center">{{ $row['req_description'] }} </td>
              <td class="center">{{ $row['qty'] }} </td>
              <td class="center">{{ $row['uom'] }} </td>
              <td class="center">{{ $row['date_needed'] }} </td>
              <td class="center">{{ $row['req_remarks'] }} </td>
             
              <td class="center">
                @if(!empty($row['req_image']))
                @if (\Illuminate\Support\Str::contains($row['req_image'], ['.jpg', '.jpeg', '.png', '.gif']))
                <img height="40" width="50" src="{{ asset('storage/'.$row['req_image']) }}" >
                @else
                <img height="40" width="40" src="{{ asset('particular_image/pdfimage.png') }}" >                @endif
                @else
                {{ 'NA' }}
                @endif
               </td>
        
               <td> 
                <form method="POST" action="/request/removerow/{{ $index }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M7 11h10v2H7z"></path><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path></svg>
                    </button>
                </form>
            </td>

           </tr>
           @if(session('rows') && !empty($row['req_image']))
           <script>
                const fileInput = document.getElementById('file-input');
          // Set a timeout of 2 seconds
          setTimeout(() => {
            // Disable the file input element
            fileInput.disabled = true;
            document.getElementById('file-error').textContent = 'You can upload attachment once';
          }, 1000);
        
            </script>@endif
           @endforeach
           @endif
       </tbody>
   </table>
    
<!-- Button trigger modal -->
<div class="btn">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Submit Request
</button></div>
<!-- Modal -->
@include('inc.modal.confirmationModal')
@endif


</div>
</div>
</div>


   @include('inc.footer-inc')
   @include('inc.modal.modalloader')

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

    function validateFile(input) {
  const allowedTypes = ['application/pdf', 'image/jpeg', 'image/png'];
  const file = input.files[0];
  
  if (file && !allowedTypes.includes(file.type)) {
    document.getElementById('file-error').textContent = 'Invalid file type. Please select a PDF, JPG, or PNG file.';
    input.value = ''; // reset the file input
  } else {
    document.getElementById('file-error').textContent = '';
  }
}
   </script>

   


</body>
</html>
