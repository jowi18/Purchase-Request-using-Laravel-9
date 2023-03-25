
<script src="{{ asset('wms/js/toastr.min.js')}}" type="text/javascript"></script>
<link rel="stylesheet" href="{{ asset('wms/css/toastr.min.css')}}">

@if(session()->has('messages'))
<script>
toastr.options = {
  "progressBar" : true,
  "closeButton" : true,
}
toastr.success("{{ Session::get('messages') }}", 'Success!');
  </script>

@endif