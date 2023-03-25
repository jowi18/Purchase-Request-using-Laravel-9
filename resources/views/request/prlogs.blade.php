@include('inc.header-inc');

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.4.0/js/dataTables.dateTime.min.js"></script>
<div class="container">

  <div class="card bg-primary" >
    <div class="card-body">
      
  <div class="row g-3">
    <div class="col">
      <label for="inputEmail4" class="form-label">Start Date</label>
      <input type="date" class="form-control" id="start_date" name="start_date" >
    </div>
    <div class="col">
      <label for="inputEmail4" class="form-label">End Date</label>
      <input type="date" class="form-control" id="end_date" name="end_date">
    </div>
  </div>

</div>
</div>

<div class="card" style="padding: 30px">
  <div class="card-body">
    <table class="display nowrap" id="pr_table">
      <thead >
          <tr>
              <th scope="col">#</th>
              <th scope="col" >Name</th>
              <th scope="col" >Department</th>
              <th scope="col">Device IP Address</th>
              <th scope="col">Action</th>
              <th scope="col">Date</th>
            </tr>
      </thead>

      <tbody >

    @foreach ($logs as $key=>$log )
    <tr>      
        <td>{{ $key + 1 }}</td>
        <td>{{ $log->user->name }}</td>
        <td>{{ $log->user->department }}</td>
        <td>{{ $log->device_ipAddress }}</td>
        <td>{{ $log->action }}</td>
        <td>{{ date('Y-m-d', strtotime($log->logs_date ))}}</td>
      
        </tr>
        @endforeach
      </tbody >
    </table>
  </div>
</div>

</div>
 <script>
 var table = $('#pr_table').DataTable();

 $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var startDate = $('#start_date').val();
        var endDate = $('#end_date').val();
        var date = data[5];
        if (startDate === '' || endDate === '') {
            return true;
        }
        if (date >= startDate && date <= endDate) {
            return true;
        }
        return false;
    }
);
$('#start_date, #end_date').on('change', function () {
    table.draw();
});

    </script>
  @include('inc.footer-inc')
  @include('inc.modal.modalloader')