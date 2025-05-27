<td style="text-align: center" >
    {{-- <button type="button" value="ok" class="btn btn-outline-dark" ><i class="fa fa-check" ></i></button> --}}
    {{-- <span>DISETUJUI</span> --}}
    {{-- <span><input type="checkbox" name="feature1" value="1"><b> DISETUJUI</b></span> --}}
    <span>
        @if ($item->no_surat >= 0)
                <input type="checkbox" name="feature1" value="1">
                <a type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#approve-cuti"><b>DISETUJUI</b></a>
                &nbsp;
                &nbsp;
                &nbsp;
                <input type="checkbox" name="feature1" value="1">
                <a type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#revisi-cuti"><b>PERUBAHAN</b></a>
                &nbsp;
                &nbsp;
                &nbsp;
                <input type="checkbox" name="feature1" value="1">
                <a type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#tangguhkan-cuti"><b>DITANGGUHKAN</b></a>
                &nbsp;
                &nbsp;  
                &nbsp;
                <input type="checkbox" name="feature1" value="1">
                <a type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#tolak-cuti"><b>TIDAK DISETUJUI</b></a>
            @endif
    </span>

    {{-- <label>
    @if ($item->user->name  ==='')
        <input type="checkbox" name="play" checked="">
    @else
        <input type="checkbox" name="play" {{ old('play') ? 'checked' : '' }} >
    @endif
    <b> DISETUJUI</b>
    </label> --}}
    {{-- &nbsp;
    &nbsp;
    &nbsp;
    &nbsp; --}}
    <div class="modal fade" id="approve-cuti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Approve</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Setujui Pengajuan Cuti?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="#" type="button" class="btn btn-primary">Iya</a>
            </div>
            </div>
        </div>
    </div>
</td>
<td style="text-align: center" >
    {{-- <button type="button" class="btn btn-outline-dark">
        <span class="badge badge-sm badge-light">  </span>
    </button>
    <span>PERUBAHAN</span> --}}
    {{-- <span><input type="checkbox" name="feature1" value="1"><b> PERUBAHAN</b></span> --}}
    <span>
        {{-- @if ($riwayat_cuti->status_cuti != 'approved') --}}
                {{-- <input type="checkbox" name="feature1" value="1"> --}}
                {{-- <a type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#revisi-cuti"><b>PERUBAHAN</b></a> --}}
            {{-- @endif --}}
    </span>
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    <div class="modal fade" id="revisi-cuti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Perubahan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Revisi Pengajuan Cuti?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="#" type="button" class="btn btn-primary">Iya</a>
            </div>
            </div>
        </div>
    </div>
</td>
<td style="text-align: center" >
    {{-- <button type="button" class="btn btn-outline-dark">
        <span class="badge badge-sm badge-light">  </span>
    </button>
    <span>DITANGGUHKAN</span> --}}
    {{-- <span><input type="checkbox" name="feature1" value="1"><b> DITANGGUHKAN</b></span> --}}
    <span>
        {{-- @if ($riwayat_cuti->status_cuti != 'approved') --}}
                {{-- <input type="checkbox" name="feature1" value="1">
                <a type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#tangguhkan-cuti"><b>DITANGGUHKAN</b></a> --}}
            {{-- @endif --}}
    </span>
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    <div class="modal fade" id="tangguhkan-cuti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ditangguhkan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Pengajuan Cuti Ditangguhkan</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="#" type="button" class="btn btn-primary">Iya</a>
            </div>
            </div>
        </div>
    </div>
</td>
<td style="text-align: center" >
    {{-- <button type="button" class="btn btn-outline-dark">
        <span class="badge badge-sm badge-light">  </span>
    </button>
    <span>TIDAK DISETUJUI</span> --}}
    {{-- <span><input type="checkbox" name="feature1" value="1"><b> TIDAK DISETUJUI</b></span> --}}
    <span>
        {{-- @if ($riwayat_cuti->status_cuti != 'approved') --}}
                {{-- <input type="checkbox" name="feature1" value="1">
                <a type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#tolak-cuti"><b>TIDAK DISETUJUI</b></a> --}}
            {{-- @endif --}}
    </span>
    <div class="modal fade" id="tolak-cuti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tidak disetujui</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Pengajuan cuti tidak disetujuai</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="#" type="button" class="btn btn-primary">Iya</a>
            </div>
            </div>
        </div>
    </div>
</td>