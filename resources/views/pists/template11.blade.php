<table>
    @foreach ($d['cat'] as $x) 
    <tr>
        <td style="witdh 10px">{{ $loop->iteration }}.</td>
        <td style="witdh 30px">
            Nama
            {{-- <li>{{ $x }}</li> --}}
            @php
                $fullname = $x;
                $name = explode('-',$fullname);
                $a = $name [0];
                $b = $name [2];
                $c = $name [1];
            @endphp
        </td>
        <td style="witdh 10px">:</td>
        <td style="witdh 20px"><strong>
        
            {{ $a }}
        
        </strong></td>
    </tr>
    <tr>
        <td></td>
        <td style="witdh 30px">
            Pangkat/Gol.
            {{-- <li>{{ $x }}</li> --}}
            @php
            $fullname = $x;
            $name = explode('-',$fullname);
            $a = $name [0];
            $b = $name [2];
            $c = $name [1];
            @endphp
        </td>
        <td style="witdh 10px">:</td>
        <td style="witdh 20px">{{ $c }}</td>
    </tr>
    <tr>
        <td></td>
        <td>
            NIP
            {{-- <li>{{ $x }}</li> --}}
            @php
                $fullname = $x;
                $name = explode('-',$fullname);
                $a = $name [0];
                $b = $name [2];
                $c = $name [1];
                @endphp
        </td>
        <td style="witdh 10px">:</td>
        <td style="witdh 20px">{{ $b }}</td>
    </tr>
    <tr>
        <td></td>
        <td style="witdh 30px">
            Jabatan.
            {{-- <li>{{ $x }}</li> --}}
            @php
            $fullname = $x;
            $name = explode('-',$fullname);
            $a = $name [0];
            $b = $name [2];
            $c = $name [1];
            $d = $name [3];
            @endphp
        </td>
        <td style="witdh 10px">:</td>
        <td style="witdh 20px">{{ $d }}</td>
        <td>
            @php
            
                // $count =count($name);
                // echo 'Count is: '.$count .'</br>';
                // $i = 1 ;
                // foreach($name as $key) {
                //     echo $i.' '.$key .'</br>';
                // $i++;
                // }
                // echo count(preg_grep("/^nip(\d)+$/",array_keys(json_decode($x,true))));
                
                // $xz[0]  = 7;
                // $xz[5]  = 9;
                // $xz[10] = 11;
                // var_dump(count($name));
                // var_dump(count($name, COUNT_RECURSIVE));

                // class CountOfMethods implements Countable
                // {
                //     private function someMethod()
                //     {
                //     }

                //     public function count(): int
                //     {
                //         return count(get_class_methods($this));
                //     }
                // }

                // $obj = new CountOfMethods();
                // var_dump(count($obj));

                // Printing array size
                // echo 'Total number of elements in the $days array is - ' . count($name);
                // echo "<br>";
                // echo 'Total number of elements in the $days array is - ' . sizeof($name);
            @endphp
        </td>
    </tr>
    @endforeach
</table>