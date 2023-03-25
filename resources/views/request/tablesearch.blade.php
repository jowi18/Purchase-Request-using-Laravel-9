<table class="display nowrap">
    <thead >
        <tr>
            <th scope="col">#</th>
            <th scope="col" >Name</th>
            <th scope="col" >Department /</th>
            <th scope="col">Device IP Address /</th>
            <th scope="col">Action /</th>
            <th scope="col">Date /</th>
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

