    <div class="box-header with-border">
        <h3 class="box-title">Lampiran SKP</h3>
    </div>
    
    <div class="box-body">
        <table class="table table-bordered border-primary" style="width: 100%; border-collapse: collapse;">
            <tbody>
                <tr>
                    <td style="border: 1px solid #000;">
                        Dukungan Sumber Daya 
                        @foreach ($user->sdm as $item)
                            - {{ $item->sdm }} 
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000;">
                    Skema Pertanggungjawaban 
                    <br>
                        @foreach ($user->skema as $item)
                            - {{ $item->skema }} 
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000;">
                        Konsekuensi 
                        @foreach ($user->kon as $item)
                            - {{ $item->kon }}
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
    </div>