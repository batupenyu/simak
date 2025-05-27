<?php

namespace App\Http\Controllers;

use App\Models\Libur;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
            
    class LiburController extends Controller
    {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Libur::latest()->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                            $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('libur');
    }
        
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        Libur::updateOrCreate([
                    'id' => $request->product_id
                ],
                [
                    'name' => $request->name, 
                    'detail' => $request->detail
                ]);        
        
        return response()->json(['success'=>'Libur saved successfully.']);
    }
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Libur  $product
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $libur = Libur::find($id);
        return response()->json($libur);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Libur  $libur
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        Libur::find($id)->delete();
        
        return response()->json(['success'=>'Libur deleted successfully.']);
    }
}