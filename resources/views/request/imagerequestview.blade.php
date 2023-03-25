@foreach ($image as $files)
    

@if(in_array($files->req_image, ['img', 'jpg', 'png']))
<table border="2" width="100%">
<th >
<img src="{{ $files->req_image ? asset('storage/' . $files->req_image) : asset('particular_image/noimage.jpg') }}" width="500" height="300" />
</th>
</table>
@else

<table border="2" width="100%" style="height: 600px">
    <th>
    <iframe src="{{ $files->req_image ? asset('storage/' . $files->req_image) : asset('particular_image/noimage.jpg') }}" style="height: 600px; width: 100%" ></iframe>
    </th>
    </table> @endif
    @endforeach