@extends('layout.master')
@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/perilaku.css') !!}">

<div class="container register py-5">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="{{ asset('image/garuda.png') }}" alt="" style="display: block; margin:auto">
            <h3 class="register-heading">Rencana Kinerja <br>
            Pegawai </h3>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row register-form">
                        <form class="form-card" action="{{ url('tupoksi.save/'.$product->id) }} " method="post">
                            @csrf
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Pegawai<span class="text-danger"> *</span></label> 
                                    <select name="user_id" id="user_id" class="form-control mb-2">
                                        {{-- @foreach ($user as $item) --}}
                                        <option value="{{ $product->user->id }}">{{ $product->user->name }}</option>
                                        {{-- @endforeach --}}
                                    </select>
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Aspek<span class="text-danger"> *</span></label> 
                                    <select name="aspek" id="aspek" class="form-control mb-2">aspek
                                        <option value="Kuantitas"  >Kuantitas</option>
                                        <option value="Kualitas"  >Kualitas</option>
                                        <option value="Waktu"  >Waktu</option>
                                        <option value="Biaya"  >Biaya</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="form-control-label px-3">Rencana Kerja<span class="text-danger"> *</span></label> 
                                    <select name="tugas_id" id="tugas_id" class="form-control mb-2">
                                        <option value="{{ $product->id }}" >{{ $product->name }}</option>
                                    </select>
                                </div>
                                <div>
                                    {{-- <label class="form-control-label px-3">Rencana Kerja<span class="text-danger"> *</span></label> 
                                    <select name="tugas_id" id="tugas_id" class="form-control mb-2">
                                        @foreach ($tugas as $data)
                                        <option value="{{$data->id}}" @if($item->id == $data->id) selected @endif>{{$data->name}}</option>
                                        @endforeach
                                    </select>   --}}

                                    {{-- <option value="{{ $data->id }}"{{ $item->id == $data->id ? 'selected':'' }}>{{ $data->name }}</option> --}}
                                    {{-- <option value="{{$category->id}}" @if($product->category_id == $category->id) selected @endif>{{$category->name}}</option> --}}
                                    
                                    {{-- <select class="form-control" name="tugas_id" id="tugas_id">
                                        @foreach($carModels as $model => $cars)
                                        <optgroup label="{{ $model }}">
                                            @foreach($cars as $car)
                                            <option value="{{ $car->id }}">{{ $car->name }}</option>
                                            @endforeach
                                        </optgroup>
                                        @endforeach
                                    </select> --}}


                                    {{-- <select class="form-control" name="tugas_id" id="tugas_id">
                                        @foreach($carModels as $model => $cars)
                                        <optgroup label="{{ $model }}">
                                            @foreach($cars as $car)
                                            <option value="{{ $car->id }}">{{ $car->name }}</option>
                                            @endforeach
                                        </optgroup>
                                        @endforeach
                                    </select> --}}

                                    {{-- <select class="form-control" name="tugas_id" id="tugas_id">
                                        @foreach ( $attributes as $key => $attr )    
                                            <optgroup label="{{$key}}">
                                                @foreach ( $attr as $values )
                                                    <option value="{{$values}}">{{$values}}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select> --}}
                                    
                                    {{-- <select class="form-control" name="tugas_id" id="tugas_id">
                                        @foreach( $carModels as $cars => $value )
                                            @if( is_array( $value ) )
                                                <optgroup label="{{ $cars }}">
                                                    @foreach( $value as $item)
                                                        <option value="{{ $item }}"> {{ $item }} </option>
                                                    @endforeach
                                                </optgroup>
                                            @else
                                                <option	value="{{ $value }}"> {{ $value }}</option>
                                            @endif
                                        @endforeach
                                    </select> --}}
                                    
                                    {{-- <select class="form-control" name="tugas_id" id="tugas_id">
                                        @foreach ($tugasGroup as $data)
                                            @foreach ($data as $item)
                                            <optgroup label="{{ $item->user->name }} ">
                                                <option value=" {{ $item->id }} ">
                                                    {{ $item->name }} 
                                                </option>
                                            </optgroup>
                                            @endforeach
                                        @endforeach
                                    </select> --}}
                                        
                                    {{-- <td>{{ $tugasGroup->user->pluck('name')->implode(' ') }}</td> --}}

                                    {{-- <select class="form-control" name="tugas_id" id="tugas_id">
                                        @foreach($tugasGroup as $group => $tugas)
                                            <optgroup label="{{$group}}">
                                                @foreach($tugas as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select> --}}

                                    {{-- <label class="form-control-label px-3">Rencana Kerja<span class="text-danger"> *</span></label>
                                    <textarea class="form-control mb-2" name="tugas_id" id="" cols="80" rows="3" placeholder="indikator">{{ $product->name }}</textarea> --}}
                                    {{-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Rencana Kerja<span class="text-danger"> *</span></label> <input class="form-control @error ('tugas_id') is-invalid @enderror" type="text" id="tugas_id" name="tugas_id" placeholder=" angka" onblur="validate(1)" value="{{ $product->name }}"  > </div> --}}
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div >
                                    <label class="form-control-label px-3">Indikator<span class="text-danger"> *</span></label> 
                                    <textarea class="form-control mb-2" name="indikator" id="" cols="80" rows="3" placeholder="indikator"> </textarea>
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">


                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Target<span class="text-danger"> *</span></label> <input class="form-control @error ('target') is-invalid @enderror" type="text" id="target" name="target" placeholder=" angka" onblur="validate(1)"  > </div>
                                @error('target')
                                <div class="div-alert-danger ">
                                    {{ $message }}
                                </div>
                                @enderror
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Satuan<span class="text-danger"> *</span></label> <input class="form-control @error ('satuan') is-invalid @enderror" type="text" id="satuan" name="satuan" placeholder=" satuan" onblur="validate(2)" > </div>
                                <div id="satuanFeedback" class="invalid-feedback">
                                    isi data .
                                </div>
                            </div>
                            <div class="row justify-content-end mt-3">
                                <div class="form-group col-sm-0 "> 
                                <button type="submit" class="btn btn-success btn-flat"> <i class="fa fa-check"></i> Simpan</button>
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
