<div class="box box-primary">

    <div class="box-header with-border">
        <h3 class="box-title">Lampiran SKP
        </h3>
    </div>
    
    <div class="box-body">
        
        <table class="table table-bordered border-primary">
            <tbody>
                <tr>
                    <td >
                        Dukungan Sumber Daya 
                        <a href="{{ url('sdm.add') }}"  ><i class="fa fa-plus-circle"></i></a>
                        <br>
                        @foreach ($user->sdm as $item)
                            - {{ $item->sdm }} 
                            <button class="btn btn-sm btn-warning">
                                <a href="{{ url('sdm.edit/'.$item->id) }}" ><i class="fa fa-edit"></i></a>
                            </button>
                            <form class="d-inline" action="{{ url('delete_sdm/'.$item->id) }}" method="post" onclick="return confirm ('yakin hapus data?')">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                            </form>
                            <br>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td >
                            Skema Pertanggungjawaban 
                            <a href="{{ url('skema.add') }}" class="tampil"  ><i class="fa fa-plus-circle "></i></a>
                            <br>
                                    
                                @foreach ($user->skema as $item)
                                    - {{ $item->skema }} 
                                    
                                    <button class="btn btn-sm btn-warning" >
                                        <a href="{{ url('skema.edit/'.$item->id) }}" ><i class="fa fa-edit"></i></a>
                                    </button>
                                    <form class="d-inline" action="{{ url('delete_skema/'.$item->id) }}" method="post" onclick="return confirm ('yakin hapus data?')">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                                    <br>
                                    @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td >
                                Konsekuensi 
                                <a href="{{ url('kon.add') }}"  ><i class="fa fa-plus-circle"></i></a>
                                <br>
                                @foreach ($user->kon as $item)
                                    - {{ $item->kon }}
                                    <button class="btn btn-sm btn-warning">
                                        <a href="{{ url('kon.edit/'.$item->id) }}"><i class="fa fa-edit"></i></a>
                                    </button>
                                    <form class="d-inline" action="{{ url('delete_kon/'.$item->id) }}" method="post" onclick="return confirm ('yakin hapus data?')">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                                    <br>
                                    @endforeach
                            </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>