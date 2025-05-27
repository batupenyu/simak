<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentRequest;
use App\Models\Student;
use Dotenv\Parser\Value;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::get();
        return view('student.index', ['studentlist' => $student]);
        // pakai eloquent
        // tampilan data tanpa relationship
        // $student = Student::all();
        // tampilan data dengan relationship
        // $student = Student::with('class')->get();
        // $student = Student::with('class', 'eskuls')->get();
        // $student = Student::with('class.gurus', 'eskuls')->get();
        // Student::create([
        //     'class_id' => 1,
        //     'name' => 'eloquent',
        //     'gender' => 'P',
        //     'nis' => '0000006'
        // ]);
        // DB::table('students')->where('id', 7)->update([
        //     'name' => 'query builder 2',
        //     'class_id' => 2,
        //     'nis' => '0000007',
        // ]);

        // DB::table('students')->where('id', 8)->delete();

        // pakai query builder
        // $student = DB::table('students')->get();
        // dd($student);
        // DB::table('students')->insert([
        //     'class_id' => 1,
        //     'name' => 'query builder',
        //     'gender' => 'L',
        //     'nis' => '0000005'
        // ]);
        // Student::findOrfail(8)->update([
        //     'nis' => '0000008',
        // ]);
        // Student::findOrfail(7)->delete();

        $nilai = [9, 8, 7, 6, 4, 8, 9, 0, 10, 3, 9, 7, 1, 5, 3, 9, 1];
        // dd($nilai);

        // cara php
        // $countNilai = count($nilai);
        // $totalNilai = array_sum($nilai);
        // $nilaiRatarata = $countNilai / $totalNilai;
        // dd($nilaiRatarata);

        // cara laravel
        // $nilaiRatarata = collect($nilai)->avg();
        // dd($nilaiRatarata);

        // methode contains

        // $a = collect($nilai)->contains(3);
        // $a = collect($nilai)->contains(function ($value) {
        // return $value < 6;
        // });

        // $restoA = ["burger", "siomay", "pizza", "spaghetti", "makaroni", "martabak", "bakso"];
        // $restoB = ["pizza", "fried chicken", "martabak", "sayur asem", "pecel lele", "bakso"];
        // $a = collect($restoA)->diff($restoB);
        // $a = collect($nilai)->filter(function ($value) {
        //     return $value > 7;
        // })->all();
        // $biodata = [
        //     ['nama' => 'budi', 'umur' => 17],
        //     ['nama' => 'ani', 'umur' => 16],
        //     ['nama' => 'siti', 'umur' => 17],
        //     ['nama' => 'rudi', 'umur' => 20],
        // ];

        // $a = collect($biodata)->pluck('nama')->all();

        // $nilaiKaliDua = [];
        // foreach ($nilai as $value) {
        //     array_push($nilaiKaliDua, $value * 2);
        // }
        // dd($nilaiKaliDua);

        // $a = collect($nilai)->map(function ($value) {
        //     return $value * 2;
        // });
        // dd($a)->all();


    }

    public function show($id)
    {
        $student = Student::with(['class.gurus', 'eskuls'])
            ->findOrfail($id);
        return view('student.detail', ['student' => $student]);
    }

    public function create()
    {
        $class = ClassRoom::select('id', 'name')->get();
        return view('student.add', ['class' => $class]);
    }

    public function store(CreateStudentRequest $request)
    {
        // $student = new Student;
        // $student->name = $request->name;
        // $student->gender = $request->gender;
        // $student->nis = $request->nis;
        // $student->class_id = $request->class_id;
        // $student->save();
        $student = Student::create($request->all());
        if ($student) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil di tambahkan');
        }
        return redirect('/student.index');
    }

    public function edit($id)
    {
        $student = Student::with('class')->findOrFail($id);
        $class = ClassRoom::where('id', '!=', $student->class_id)->get(['id', 'name']);
        return view('student.edit', ['student' => $student, 'class' => $class]);
    }

    public function update($id, Request $request)
    {
        $student = Student::findOrFail($id);
        $student->update($request->all());
        return redirect('/student.index');
        //     $student->name = $request->name;
        //     $student->gender = $request->gender;
        //     $student->nis = $request->nis;
        //     $student->class_id = $request->class_id;
        //     $student->save();
    }
    public function delete($id)
    {
        $student = Student::findOrFail($id);
        return view('student.hapus', ['student' => $student]);
    }

    public function destroy($id)
    {
        // dd($id);
        // $delete = DB::table('students')->where('id', $id)->delete();
        $hapus = Student::findOrFail($id);
        $hapus->delete();
        if ($hapus) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil di hapus');
        }
        return redirect('/student.index');
    }

}
