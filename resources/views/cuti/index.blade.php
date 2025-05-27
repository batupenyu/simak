@extends('layout.sidebar')

@section('content')
<div class=" container container-fluid py-5">
    @foreach ($data as $item)

    {{-- <a href="{{ url('cuti.kendali/'.$item->id) }}" class="btn btn-sm btn-outline-dark tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a> --}}

        {{-- @if ($item->pangkat_gol == 'IX')
            
            <p class="d-inline-flex gap-0">
                <a href="{{ url('cuti.kendali/'.$item->id) }}" class="btn btn-success tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
            </p>
            
        @elseif ($item->nip =='')
            <p class="d-inline-flex gap-0">
                <a href="{{ url('cuti.kendali/'.$item->id) }}" class="btn btn-outline-dark tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
            </p>
        @elseif ($item->unit_kerja =='KEJAKSAAN TINGGI KEP. BANGKA BELITUNG')
            <p class="d-inline-flex gap-0">
                <a href="{{ url('cuti.kendali/'.$item->id) }}" class="btn btn-secondary tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
            </p>
        @else
            
            <p class="d-inline-flex gap-0">
                <a href="{{ url('cuti.kendali/'.$item->id) }}" class="btn btn-outline-primary tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
            </p>
        @endif --}}
    @endforeach
    
</div> 


<h4 class="mx-auto" style="text-align: center">USULAN CUTI PEGAWAI</h4>
<select class="form-control col-sm-6 mx-auto mb-2" id="sampleSelect" >
    <option style="text-align: center" value="pilih">---Pilih Pegawai---</option>
    @foreach ($data as $item)
    <option style="text-align: center" value="{{ url('cuti.kendali/'.$item->id)}} " >{{$loop->iteration}}. {{$item->name}}</option>
    @endforeach
</select>
<p class="text-center mb-5">
    {{-- <a class="btn btn-primary" href="{{ url('project.edit_user/'.$akintegrasi->user->id) }}">{{$akintegrasi->user->name}}  <i class="bi-pencil-square"></i> </a>
    <a class="btn btn-primary" href="{{url('ak.create')}}"><i class="bi bi-plus-circle"></i> AK</a> --}}
    {{-- <a href="{{ url('cuti.create') }}" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-decoration:none"> Usulan Cuti</a></i> --}}
</p>


<script>
    $("select").click(function() {
  var open = $(this).data("isopen");
  if(open) {
    window.location.href = $(this).val()
  }
  $(this).data("isopen", !open);
});

</script>
@endsection