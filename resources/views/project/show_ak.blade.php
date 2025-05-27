@extends('layout.sidebar')
@section('content')
    <div class="container">
        <h4 class="mx-auto" style="text-align: center">ANGKA KREDIT PEGAWAI</h4>
        <p style="text-align: center">
        <a class="btn btn-primary mt-2 mb-3" href="{{url('ak.create')}}">Buat AK</a>
        </p>

        <select class="form-control col-sm-6 mx-auto mb-2" id="sampleSelect" >
            <option style="text-align: center" value="pilih">---Pilih Pegawai---</option>
            @foreach ($pegawai as $item)
            <option style="text-align: center" value="{{ url('angka_kredit/'.$item->id)}} " >{{$item->name}}</option>
            @endforeach
        </select>

    </div>


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