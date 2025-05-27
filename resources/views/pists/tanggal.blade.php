<?php 
$formatted_dt1 = Carbon\Carbon::Parse($d->tgl_awal);
$formatted_dt2 = Carbon\Carbon::Parse($d->tgl_akhir);
$date_diff = $formatted_dt1->diffInDays($formatted_dt2);
?>
@if ($formatted_dt2 == $formatted_dt1)
    <strong>
    {{ Carbon\Carbon::Parse($formatted_dt1)->translatedFormat('  d F Y') }}
    </strong>
@else
    @if (Carbon\Carbon::Parse($formatted_dt1)->translatedFormat('F') ===
    Carbon\Carbon::Parse($formatted_dt2)->translatedFormat('F'))
    <strong>
        {{-- {{ Carbon\Carbon::Parse($formatted_dt1)->translatedFormat(' l') }}
        - 
        {{ Carbon\Carbon::Parse($formatted_dt2)->translatedFormat(' l') }}
        / --}}
        {{ Carbon\Carbon::Parse($formatted_dt1)->translatedFormat(' d') }}  
    </strong>
        - 
    <strong>
        {{ Carbon\Carbon::Parse($formatted_dt2)->translatedFormat(' d F Y') }}
    </strong>
    @else
    <strong>
        {{-- {{ Carbon\Carbon::Parse($formatted_dt1)->translatedFormat(' l') }}
        - 
        {{ Carbon\Carbon::Parse($formatted_dt2)->translatedFormat(' l') }}
        / --}}
        {{ Carbon\Carbon::Parse($formatted_dt1)->translatedFormat(' d F') }}
    </strong>
        - 
    <strong>
        {{ Carbon\Carbon::Parse($formatted_dt2)->translatedFormat(' d F Y') }}
    </strong>

    @endif
@endif