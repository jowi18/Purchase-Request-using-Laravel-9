
    
  
    <table style="border: none;" width="100%" cellpadding="10" >

      <tr>
      <th width="75%">Name: {{$data->user->name }}</th>
      <th>P.R. No.: {{ $data->pr_no }}</th>
      </tr>
      <tr>


        <th>Department: {{ $data->department }} </th>
   
        <th>DATE: {{date('d F, Y', strtotime( $data->date_created)) }}</th>
        </tr>
       
    </table>

<table border="1" width="100%" cellpadding="10" >
    <tr>
    <th width="10%">Item No.</th>
    <th width="20%">Parituclars</th>
    <th width="30%">Description</th>
    <th width="10%">Qty</th>
    <th width="10%">Unit</th>
    <th width="20%">Date Needed</th>
    </tr>

    @foreach ($itemRequest as $itr)
    <tr>
    <td align="center">1</td>
    <td>{{ $itr->req_particulars }}</td>
    <td>{{ $itr->req_description }}</td>
    <td>{{ $itr->qty }}</td>
    <td>{{ $itr->uom }}</td>
    <td>{{ date('F d, Y', strtotime($itr->date_needed)) }}</td>
    </tr>
    @endforeach
  </table>

 
    <table border="1" width="100%" cellpadding="10" >
    <tr>
    
         
            <td>
              Remarks:
              @foreach ($itemRequest as $itr)
              {{ $itr->req_remarks }},
              @endforeach
            </td>

    
      
    </tr>

    </table>
 
    <table style="border: none;" width="100%" cellpadding="10" >
      <tr>
      <th width="40%  ">Requested By</th>
      <th>Verified By</th>
      <th>Approved By</th>
      </tr>
      <tr >
        <th>{{ $data->user->name }}</th>
        <th>{{ $data->status->verifyby }}</th>
        <th>{{ $data->status->approveby }}</th>
        </tr>
        <tr>
          <th>Received By:  </th>
        </tr>
      
    </table>

