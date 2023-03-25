<style>
    table {
      table-layout: fixed;
      border-collapse: collapse;
    }
  
  </style>
<table border="2" style="padding: 20px">
    <thead>
        <tr>
            <td rowspan="2" colspan="2"></td>
            <td rowspan="2" colspan="2" style="font-weight: bold; font-size: 20px; text-align:center; ">PURCHASE REQUEST</td>
            <td>FORM No:.</td>
        </tr>
        <tr>
            <td>PAGE 1 of 1</td>
        </tr>
    </thead>
</table>

<table border="2" style="padding: 5px" width="100%">
    <thead>
        <tr>
            <th colspan="0" width="196">Date:</th>
            <th>{{date('F d, Y', strtotime( $data->date_created ))}}</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td width="196">Company: </td>
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

<table border="2" style="padding: 2px">
    <thead>
        <tr>
            <th width="40">Item No.</th>
            <th width="222">Particulars</th>
            <th>Description</th>
            <th>Qty</th>
            <th>Unit</th>
            <th>Date Needed</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($itemRequest as $key=>$itr)
        <tr>
            <td width="40">{{ $key + 1 }}</td>
            <td width="222">{{ $itr->req_particulars }}</td>
            <td>{{ $itr->req_description }}</td>
            <td>{{ $itr->qty }}</td>
            <td>{{ $itr->uom }}</td>
            <td>{{ date('F d, Y', strtotime($itr->date_needed)) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<table border="2" cellpadding="15">
    <tr>
    <th>Remarks: 
        @foreach ($itemRequest as $itr)
        {{ $itr->req_remarks }},
        @endforeach
    </th>
    </tr>
</table>

<table border="2" cellpadding="10">
    <thead>
        <tr>
            <td>Requested By:<br> {{$data->user->name }}</td>
            <td>Verified By: <br> {{ $data->status->verifyby }}</td>
            <td>Approved By:<br> {{ $data->status->approveby }}</td>
        </tr>
    </thead>
</table>



