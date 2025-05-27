@extends('layout.master')

@section('content')


{{-- <style>
p {
  display: none;
  background-color: yellow;
  padding: 20px;
}

div:hover p {
  display: block;
}
</style> --}}

<style>
/* unvisited link */
a:link {
  color: rgb(21, 18, 1);
}

/* visited link */
a:visited {
  color: green;
}

/* mouse over link */
a:hover {
  color: hotpink;
}

/* selected link */
a:active {
  color: blue;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  /* border: 1px solid #dddddd; */
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}


* {
  margin: 0;
  padding: 0;
}
 
body {
  background-color: #eff1f2;
  font-family: sans-serif;
}
 
.content {
  grid-area: content;
}
 
.sidebar {
  grid-area: sidebar;
  background: linear-gradient(
    to right,
    rgba(200, 107, 142, 1),
    rgba(218, 105, 250, 1),
    rgba(110, 125, 253, 1)
  );
  justify-content: center;
}
 
.footer {
  grid-area: footer;
  background: white;
}
 
.container {
  font-size: 1em;
  width: 100%;
  height: 100;
  height: 100vh;
  display: grid;
  grid-template-areas: 'sidebar' 'content' 'footer';
  grid-template-columns: 1fr;
  grid-template-rows: 130px 800px 250px;
}
 
.content,
.sidebar,
.footer {
  padding: 1em;
}
 
nav ul {
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: space-between;
  text-align: center;
}
 
nav li {
  list-style: none;
  padding: 1em 0;
}
 
nav li a {
  color: white;
  font-weight: 700;
  opacity: 0.6;
  text-decoration: none;
  transition: 0.3s;
}
 
nav li a:hover {
  opacity: 1;
}
 
.hero {
  max-width: 90 px;
  margin: 0 auto;
  text-align: center;
}
 
.hero img {
  width: 200px;
}
 
.hero h1 {
  font-size: 2em;
  font-weight: 300;
  color: #373046;
}
 
.hero p {
  font-weight: 300;
  line-height: 1.3em;
  color: #98abad;
}
 
.action-btn {
  display: inline-block;
  text-decoration: none;
  color: white;
  font-weight: 700;
  background: #567bfb;
  padding: 0.5em 2em;
  border-radius: 60px;
  margin: 1em 0;
  transition: 0.3s;
}
 
footer ul {
  max-width: 640px;
  margin: 2em auto;
  padding: 0;
  text-align: center;
  display: flex;
  flex-direction: row;
}
 
footer ul li {
  list-style: none;
  align-self: flex-end;
}
 
footer ul li a {
  text-decoration: none;
  color: #c1c6ce;
}
 
footer ul li img {
  width: 30%;
}
 
footer p {
  font-size: 0.8em;
}
 
@media (min-width: 1040px) {
  .container {
    grid-template-areas: 'sidebar content' 'sidebar footer';
    grid-template-rows: 1fr auto;
    grid-template-columns: 300px 1f;
  }
 
  nav ul {
    display: flex;
    justify-content: space-between;
    flex-direction: column;
  }
 
  .sidebar {
    background: linear-gradient(
      rgba(200, 107, 142, 1),
      rgba(218, 105, 250, 1),
      rgba(110, 125, 253, 1)
    );
    padding-top: 2em;
  }
 
  .hero {
    text-align: left;
    margin: 1em 0;
  }
 
  .hero img {
    width: 200px;
    float: right;
  }
 
  .hero h1 {
    font-size: 3em;
  }
 
  .hero p {
    width: 60%;
  }
 
  footer ul {
    max-width: 900px;
    margin: 0 auto;
    padding: 1em 0;
  }
 
  footer ul li a img {
    width: 20%;
  }
}
</style>

{{-- <div class=" container container-fluid mt-5"> --}}
{{-- <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap border-bottom pt-2 mb-3 pt-3 ">
  <h1 class="h2">Pegawai</h1>
</div> --}}
        {{-- @foreach ($pegawai as $item)
        <p class="d-inline-flex gap-0">
          <a href="{{ url('pegawai.detail/'.$item->id) }}" onclick="clickSingleA(this)" class="btn btn-outline-primary "   role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
        </p>
        @endforeach --}}


        {{-- <table class="table table-sm table-striped">
            @foreach ($data as $item)
            <tr>
                <td>
                    <ul>
                        <li><strong>{{ $item->name }}</strong></li>
                        <li>NIP.{{ $item->nip }}</li>
                        <li>{{ $item->pangkat_gol }}</li>
                        <li>{{ $item->unit_kerja }}</li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li>Istri/Suami : {{ $item->pasangan->name }} - <strong> ({{ $item->pasangan->status }}) 
                            <a href="{{ url('pasangan.edit/'.$item->id) }}" ><i class="fa fa-edit"></i></a></strong>
                            <a href="/pasangan.kp4/{{ $item->id }}" style="text-decoration: none"> <i class="fa fa-hashtag tampil"></i></a>
                            <a href="/project.index_anak/{{ $item->id }}" style="text-decoration: none"> <i class="fa fa-users"></i></a>

                        </li>
                        <li>Tgl. Lahir : {{ Carbon\Carbon::parse($item->pasangan->tgl_lahir)->translatedFormat('d - m - Y ') }} </li>
                        <li>Tgl. Menikah : {{ Carbon\Carbon::parse($item->pasangan->tgl_kawin)->translatedFormat('d - m - Y ') }} </li>
                        <li>Pekerjaan : {{ $item->pasangan->job }}</li>
                        <li>Rp.{{number_format( $item->pasangan->net,2) }},-</li>

                    </ul>
                </td>
                @endforeach
                <td>
                    @if (count($anak->anak) ==0)
                        <div class="badge bg-success text-wrap" style="width: 6rem;">
                            Belum ada anak
                        </div>
                    @else
                        @foreach ($anak->anak as $item)
                            {{ $loop->iteration}}. 
                            {{ $item->name }} - 
                            {{ \Carbon\Carbon::parse($item->tgl_lahir)->diff(\Carbon\Carbon::now())->format('%y th, %m bln.') }}
                            <a href={{ url('project.edit_anak/'.$item->id) }}> <i class="fa fa-edit"></i></button></a>
                            <br>
                        @endforeach
                    @endif
                </td>
              </tr>
        </table> --}}
{{-- </div>     --}}

  
  <body>
    <div class="container">
      <div class="sidebar">
        <nav>
        <p>

            @foreach ($pegawai as $item)
            <a href="{{ url('pegawai.detail/'.$item->id) }}" onclick="clickSingleA(this)" class="btn btn-outline-primary "   role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
            @endforeach
          </p>
          </nav>
      </div>
      <main class="content">
        <section class="hero">
          <div class="hero-content">
            <div class="border-bottom border-primary">
              <p>
                @foreach ($data as $item)
                <ul>
                  <li><strong>{{ $item->name }}</strong> 
                        <a href="/project.edit_user/{{ $item->id }}" style="text-decoration: none"> <i class="fa fa-edit"></i></a> 
                  </li>
                  <li>NIP.{{ $item->nip }}</li>
                  <li>{{ $item->pangkat_gol }}</li>
                  <li>{{ $item->unit_kerja }}</li>
                </ul>
                @endforeach
              </p>
            </div>
              <div class="border-bottom border-primary">
              <p>
                <ul>
                  <li>Istri/Suami : {{ $item->pasangan->name }} -
                    <a href="{{ url('pasangan.edit/'.$item->id) }}" ><i class="fa fa-edit"></i></a></strong>
                    <a href="/pasangan.kp4/{{ $item->id }}" style="text-decoration: none"> <i class="fa fa-hashtag tampil"></i></a>
                      <a href="/project.index_anak/{{ $item->id }}" style="text-decoration: none"> <i class="fa fa-users"></i></a>

                  </li>
                  <li>Tgl. Lahir : {{ Carbon\Carbon::parse($item->pasangan->tgl_lahir)->translatedFormat('d - m - Y ') }} </li>
                  <li>Tgl. Menikah : {{ Carbon\Carbon::parse($item->pasangan->tgl_kawin)->translatedFormat('d - m - Y ') }} </li>
                  <li>Pekerjaan : {{ $item->pasangan->job }}</li>
                  <li>Rp.{{number_format( $item->pasangan->net,2) }},-</li>
                  <li>Keterangan : <i>({{ $item->pasangan->status }}) </i>
                  
                </ul>
              </p>
            </div>
            <br>
            <h6>
                @if (count($anak->anak) ==0)
                <div class="badge bg-success text-wrap" style="width: 12rem;">
                  Belum ada anak
                </div>
                @else
                @foreach ($anak->anak as $item)
                &nbsp; &nbsp;{{ $loop->iteration}}. 
                {{ $item->name }} - 
                {{ \Carbon\Carbon::parse($item->tgl_lahir)->diff(\Carbon\Carbon::now())->format('%y th, %m bln.') }}
                <a href={{ url('project.edit_anak/'.$item->id) }}> <i class="fa fa-edit"></i></button></a>
                <br>
                @endforeach
                @endif
              </h6>
            <div >
              <a href="{{ url('/project.anak_tambah') }}" class="float-end" ><i class="fa fa-plus-circle btn btn-sm"></i> </a>
            </div>
          </div>
        </section>
      </main>
      
      {{-- <div class="footer">
        <footer>
          <ul>
            <li>
              <img src="instagram.png" alt="" /><a><p>Instagram</p></a>
            </li>
            <li>
              <img src="facebook.png" alt="" /><a><p>Facebook</p></a>
            </li>
            <li>
              <img src="twitter.png" alt="" /><a><p>Twitter</p></a>
            </li>
            <li>
              <img src="telegram.png" alt="" /><a><p>Telegram</p></a>
            </li>
          </ul>
          
        </footer>
      </div> --}}
    </div>
  </body>

@endsection