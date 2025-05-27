@if($d->tgl_akhir == $d->tgl_awal)
    {{Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat(' l / d F Y') }}
@else
    @if (Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat('F') == Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat('F'))
    {{ Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat(' l') }}
        s.d
        {{ Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat(' l') }}
        /
        {{ Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat(' d') }}
        s.d
        {{ Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat(' d F Y') }}
    @else{{ Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat(' l') }}
        s.d
        {{ Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat(' l') }}
        /
        {{ Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat(' d F') }}
        s.d
        {{ Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat(' d F Y') }}
    @endif
@endif