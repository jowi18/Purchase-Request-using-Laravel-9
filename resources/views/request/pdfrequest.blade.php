<style>
  table {
    table-layout: fixed;
    border-collapse: collapse;
  }

 .colnamecenter{
    text-align: center;
 }
</style>

<table class="colnamecenter" border="1" style="padding: 20px">
  <thead>
      <tr>
          <td rowspan="2" colspan="0" width="180px"></td>
          <td rowspan="2" colspan="3" width="221px" style="font-weight: bold; font-size: 15px; text-align:center; "><br><br>PURCHASE REQUEST</td>
          <td>FORM No:.</td>
      </tr>
      <tr>
          <td>PAGE 1 of 1</td>
      </tr>
  </thead>
</table>

<table class="colnamecenter" border="1" style="padding: 5px" width="100%">
  <thead>
      <tr>
          <th colspan="0" width="180">Date:</th>
          <th>{{date('d-F-Y', strtotime( $data->date_created ))}}</th>
      </tr>
  </thead>
  <tbody>
      <tr>
          <td width="180">Company: </td>
          <td>GLACIER INTEGRATED LOGISTICS INC</td>
      </tr>
      <tr>
          <td>Address: </td>
          <td>AMVEL BUSINESS PARK, BRGY SAN ISIDRO, PARANAQUE CITY</td>
      </tr>
      <tr>
          <td>Control No:</td>
          <td>{{ $data->pr_no }}</td>
      </tr>
  </tbody>
</table>

<table class="colnamecenter" border="1" style="padding: 2px">
  <thead>
      <tr>
          <th class="colnamecenter" width="40">Item No.</th>
          <th class="colnamecenter" width="139.6">Particulars</th>
          <th class="colnamecenter" width="186.3">Description</th>
          <th class="colnamecenter" width="40">Quantity</th>
          <th class="colnamecenter" width="43">UOM</th>
          <th class="colnamecenter" >Date Needed</th>
      </tr>
  </thead>
  <tbody>
      @foreach ($itemRequest as $key=>$itr)
      <tr>
          <td width="40">{{ $key + 1 }}</td>
          <td width="139.6">{{ $itr->req_particulars }}</td>
          <td width="186.3">{{ $itr->req_description }}</td>
          <td width="40">{{ $itr->qty }}</td>
          <td width="43">{{ $itr->uom }}</td>
          <td>{{ date('d-F-Y', strtotime($itr->date_needed)) }}</td>
      </tr>
      @endforeach
  </tbody>
</table>
<table border="1" cellpadding="15">
  <tr>
  <th>Remarks: 
      @foreach ($itemRequest as $itr)
      @if($itr->req_remarks != '')
      {{ $itr->req_remarks }},
      @else
      {{ $itr->req_remarks }}
      @endif
      @endforeach
  </th>
  </tr>
</table>

<table border="1" cellpadding="10">
  <thead>
      <tr>
          <td>Requested By:<br><br> {{$data->user->name }}<br>_______________________<br>Signature Over Printed Name</td>
          <td>Verified By: <br><br> {{ $data->status->verifyby }}<br>_______________________<br>Signature Over Printed Name</td>
          @if($data->status->status_code != 'Rejected')
          <td>Approved By:<br><br> {{ $data->status->approveby }}<br>_______________________<br>Signature Over Printed Name</td>
          @else
          <td>Rejected By:<br><br> {{ $data->status->approveby }}<br>_______________________<br>Signature Over Printed Name</td>
          @endif
         

      </tr>
  </thead>
</table>



