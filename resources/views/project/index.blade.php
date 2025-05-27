@extends('layout.sidebar')

@section('content')
    <div class="container mt-5" style="text-align:center">
        {{-- <div class="card-header mb-3">
            <div class="card "  >
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <h4 >&nbsp;Daftar - Pegawai : @section('title','Daftar Pegawai')</h4>
                <p>&nbsp;<a href="{{ url('pegawai.create') }}"><i class="fa fa-plus btn btn-sm btn-warning"><b style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"> Pegawai</b></i></a></p>
                
                <table class="table table-sm  ">
                    @foreach ($user as $item)
                    <tr  >
                        <td class="text-center">
                            {{ $loop->iteration }}. 
                        </td>
                        <td >
                            <a href="/project.edit_user/{{ $item->id }}" style="text-decoration: none"> <i class="fa fa-edit"></i></a> 
                            <a href="/project.main/{{ $item->id }}" style="text-decoration: none"> {{ $item->name }}</a>
                        </td>
                        <td>{{ $item->nip }}</td>
                        <td>{{ $item->pangkat_gol }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td class="text-center">
                            <a href="/project.evaluasi/{{ $item->id }}" style="text-decoration: none"> <i class="fa fa-eye"></i></a>
                            <a href="/project.report/{{ $item->id }}" style="text-decoration: none"> <i class="fa fa-check"></i></a>
                            <a href="/project.index_anak/{{ $item->id }}" style="text-decoration: none"> <i class="fa fa-users"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div> --}}



        @foreach ($pegawai as $item)
            <div class="btn-group dropend mt-1" >
                {{-- <p class="d-inline-flex gap-0">
                    <a href="{{ url('pegawai.info/'.$item->id) }}" class="btn btn-outline-primary tampil" role="button" > {{ $item->name }}</a>
                </p> --}}

                {{-- @if ($item->pangkat_gol == 'IX') --}}
                    <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <strong>{{ $loop->iteration }}. </strong>
                        {{ $item->name }}                        
                    </button>
                
                {{-- @elseif ($item->nip =='')
                    <button type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <strong>{{ $loop->iteration }}. </strong>
                        {{ $item->name }}                        
                    </button>
                    
                @elseif ($item->unit_kerja =='KEJAKSAAN TINGGI KEP. BANGKA BELITUNG')
                    <button type="button" class="btn btn-secondary  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <strong>{{ $loop->iteration }}. </strong>
                        {{ $item->name }}                        
                    </button>
                @else
                    <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <strong>{{ $loop->iteration }}. </strong>
                        {{ $item->name }}                        
                    </button>
                @endif --}}

                <ul class="dropdown-menu dropdown-menu-dark">
                    <li>
                        <a
                            href="javascript:void(0)"
                            id="show-user"
                            data-url="{{ route('users.show', $item->id) }}"
                            class="btn btn-info"
                            style="text-decoration: none"
                            class="dropdown-item"
                            >View
                        </a>
                    </li>
                    <li><a class="dropdown-item" href="/project.edit_user/{{ $item->id }}" style="text-decoration: none;color:blueviolet">Edit Pegawai</a> </li>
                    <li><a class="dropdown-item" href="/project.main/{{ $item->id }}" style="text-decoration: none;color:blueviolet"><i class="bi bi-123">Rencana SKP</i></a> </li>
                    <li><a class="dropdown-item" href="/project.evaluasi/{{ $item->id }}" style="text-decoration: none;color:blueviolet"><i class="bi bi-4-square-fill">Evaluasi SKP</i></a></li>
                    <li><a class="dropdown-item" href="/project.report/{{ $item->id }}" style="text-decoration: none;color:blueviolet"> <i class="bi bi-123">Laporan SKP</i></a></li>
                    <li><a class="dropdown-item" href="/project.index_anak/{{ $item->id }}" style="text-decoration: none;color:blueviolet">Data Anak</a></li>
                    <li><a class="dropdown-item" href="/pasangan.kp4/{{ $item->id }}" style="text-decoration: none;color:blueviolet">KP-4.1</a></li>
                    <li><a class="dropdown-item" href="/pasangan.kp3/{{ $item->id }}" style="text-decoration: none;color:blueviolet">KP-4.2</a></li>
                    <li><a class="dropdown-item" href="{{ url('cuti.kendali/'.$item->id) }}" style="text-decoration: none;color:blueviolet">Data Cuti</a></li>
                    <li><a class="dropdown-item" href="{{ url('izin.show/'.$item->id) }}" style="text-decoration: none;color:blueviolet">Surat Izin</a></li>
                    <li><a class="dropdown-item" href="{{ url('angka_kredit/'.$item->id)}} " style="text-decoration: none;color:blueviolet">Angka Kredit</a></li>
                    <li><hr class="dropdown-divider"></li>
                </ul>
            </div>
        @endforeach

        <hr>
        @foreach ($p3k as $item)
            <div class="btn-group dropend mt-1" >
                
                    <button type="button" class="btn btn-sm btn-outline-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <strong>{{ $loop->iteration }}. </strong>
                        {{ $item->name }}                        
                    </button>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li>
                        <a
                            href="javascript:void(0)"
                            id="show-user"
                            data-url="{{ route('users.show', $item->id) }}"
                            class="btn btn-info"
                            style="text-decoration: none"
                            class="dropdown-item"
                            >View
                        </a>
                    </li>
                    <li><a class="dropdown-item" href="/project.edit_user/{{ $item->id }}" style="text-decoration: none;color:blueviolet">Edit Pegawai</a> </li>
                    <li><a class="dropdown-item" href="/project.main/{{ $item->id }}" style="text-decoration: none;color:blueviolet"><i class="bi bi-123">Rencana SKP</i></a> </li>
                    <li><a class="dropdown-item" href="/project.evaluasi/{{ $item->id }}" style="text-decoration: none;color:blueviolet"><i class="bi bi-4-square-fill">Evaluasi SKP</i></a></li>
                    <li><a class="dropdown-item" href="/project.report/{{ $item->id }}" style="text-decoration: none;color:blueviolet"> <i class="bi bi-123">Laporan SKP</i></a></li>
                    <li><a class="dropdown-item" href="/project.index_anak/{{ $item->id }}" style="text-decoration: none;color:blueviolet">Data Anak</a></li>
                    <li><a class="dropdown-item" href="/pasangan.kp4/{{ $item->id }}" style="text-decoration: none;color:blueviolet">KP-4.1</a></li>
                    <li><a class="dropdown-item" href="/pasangan.kp3/{{ $item->id }}" style="text-decoration: none;color:blueviolet">KP-4.2</a></li>
                    <li><a class="dropdown-item" href="{{ url('cuti.kendali/'.$item->id) }}" style="text-decoration: none;color:blueviolet">Data Cuti</a></li>
                    <li><a class="dropdown-item" href="{{ url('izin.show/'.$item->id) }}" style="text-decoration: none;color:blueviolet">Surat Izin</a></li>
                    <li><a class="dropdown-item" href="{{ url('angka_kredit/'.$item->id)}} " style="text-decoration: none;color:blueviolet">Angka Kredit</a></li>
                    <li><hr class="dropdown-divider"></li>
                </ul>
            </div>
        @endforeach

       
         <hr>
        @foreach ($honor as $item)
            <a href="{{ url('pegawai.info/'.$item->id) }}" class="btn btn-sm btn-outline-secondary tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
        @endforeach
        
<!-- Modal -->
<div class="modal fade" id="userShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- <p><strong>ID:</strong> <span id="user-id"></span></p> --}}
                {{-- <p><strong>Email:</strong> <span id="user-email"></span></p> --}}
                <p><strong>Name:</strong> <span id="user-name"></span></p>
                <p><strong>NIP:</strong> <span id="user-nip"></span></p>
                <p><strong>Pangkat/Gol:</strong> <span id="user-pangkat_gol"></span></p>
                <p><strong>TMT :</strong> <span id="user-tmt_pangkat"></span></p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<hr>
<script type="text/javascript">
    $(document).ready(function () {
        /* When click show user */

        $('body').on('click', '#show-user', function () {
            var userURL = $(this).data('url');
            $.get(userURL, function (data) {
                $('#userShowModal').modal('show');
                $('#user-id').text(data.id);
                $('#user-name').text(data.name);
                $('#user-email').text(data.email);
                $('#user-nip').text(data.nip);
                $('#user-pangkat_gol').text(data.pangkat_gol);
                const date = new Date(data.tmt_pangkat);
                const formatDate = date.toLocaleDateString('id');
                console.log(formatDate);
                $('#user-tmt_pangkat').text(formatDate);
                // $('#user-tmt_pangkat').text(formatDate, "D-MM-YYYY HH:mm:ss").toFormat('D-MM-YYYY');
            })
        });
    });

</script>
<br>
</div>

{{-- <select class="form-control col-sm-6 mx-auto" id="sampleSelect" >
    <option style="text-align: center" value="pilih">---Pilih Pegawai---</option>
    @foreach ($pegawai as $item)
    <option style="text-align: center; background-color:rgb(181, 165, 209)" value="{{ url('angka_kredit/'.$item->id)}} " >{{$item->name}}</option>
    @endforeach
</select>


<script>
    $("select").click(function() {
  var open = $(this).data("isopen");
  if(open) {
    window.location.href = $(this).val()
  }
  $(this).data("isopen", !open);
});
</script> --}}

@endsection
