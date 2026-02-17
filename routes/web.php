<?php

use App\Http\Controllers\AnakController;
use App\Http\Controllers\AngkakreditController;
use App\Http\Controllers\AtasanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BkuController;
use App\Models\Tag;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\EkspektasiController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ImgController;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KonController;
use App\Http\Controllers\Laporan_1_Controller;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\PasanganController;
use App\Http\Controllers\PenilaiController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PistController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SdmController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SkController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\TimController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\Tupoksi_tugasController;
use App\Http\Controllers\TupoksiController;
use App\Http\Controllers\TutamController;
use App\Http\Controllers\TutiController;
use App\Http\Controllers\UmpanController;
use App\Models\Angka_kredit;
use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Routing\RouteCollection;
use Illuminate\Routing\LiburController;
use Illuminate\Contracts\Session\Session;
use Symfony\Component\Routing\Route as RoutingRoute;

use App\Http\Controllers\GambarController;
use App\Http\Controllers\UnitKerjaController;

Route::resource('unit_kerja', UnitKerjaController::class);



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Existing routes...

Route::get('/bku/view', [BkuController::class, 'view'])->name('bku.view');
Route::get('/bku/pdf/{id}', [BkuController::class, 'generatePdf'])->name('bku.pdf');
// $project = Project::all();

// return $project->users[0]->tasks;
// return $project->users[1]->tasks;
// return $project->tasks;
// return $project->task;
// dd($project->task);
// return view('project', ['project' => $project]);

// $project = Project::create([
//     'title' => 'project B',
// ]);
// $user1 = User::create([
//     'name' => 'user 3',
//     'email' => 'email3@example.com',
//     'password' => Hash::make('password'),
//     'project_id' => $project->id,
// ]);
// $user2 = User::create([
//     'name' => 'user 4',
//     'email' => 'email4@example.com',
//     'password' => Hash::make('password'),
//     'project_id' => $project->id,
// ]);
// $user5 = User::create([
//     'name' => 'user 5',
//     'email' => 'email5@example.com',
//     'password' => Hash::make('password'),
//     'project_id' => $project->id,
// ]);
// $task1 = Task::create([
//     'title' => 'Task 4 for project 2 by user 3',
//     'user_id' => $user1->id,
// ]);
// $task5 = Task::create([
//     'title' => 'Task 4 for project 2 by user 3',
//     'user_id' => $user1->id,
// ]);
// $task3 = Task::create([
//     'title' => 'Task 5 for project 2 by user 4',
//     'user_id' => $user2->id,
// ]);
// $task3 = Task::create([
//     'title' => 'Task 6 for project 2 by user 5',
//     'user_id' => $user5->id,
// ]);
// });



// Route::get('/', function () {
//     return view('coba');
// });

// Route::get("path", 'controller file');

// Route::get("coba/{user}", [CobaController::class, 'index']);

// Route::view('coba1', 'coba1');

// Route::get('/coba1', function () {
//     return view('coba1');
// });

// Route::get('/{nama}', function ($nama) {
//     return view('coba', ['nama' => $nama]);
// });


// Route::get('/', function () {
//     return view('home', [
//         'nama' => 'hendri',
//         'role' => 'admin',
//         'buah' => ['anggur', 'pisang', 'pepaya', 'nanas', 'durian']
//     ]);
// });

// Route::get('/contact', function () {
//     return view('contact', ['name' => 'hendri', 'hp' => '132423434']);
// });

// Route::redirect('/contact', '/contact_us');

// Route::get('/product/{id}', function ($id) {
//     return 'product dengan id - ' . $id;
// });


Route::prefix('admin')
    ->group(function () {
        Route::get('/profil-admin', function () {
            return 'profil admin';
        });
        Route::get('/about-admin', function () {
            return 'about admin';
        });
        Route::get('/contact-admin', function () {
            return 'contact admin';
        });
    });

Route::get('/product/{id}', function ($id) {
    return view('product.detail', ['id' => $id]);
});

// student
Route::get('/student.index', [StudentController::class, 'index']);
Route::get('/student.detail/{id}', [StudentController::class, 'show']);
Route::get('/student.add', [StudentController::class, 'create']);
Route::post('/student.index', [StudentController::class, 'store']);
Route::get('/student.edit/{id}', [StudentController::class, 'edit']);
Route::put('/student.index/{id}', [StudentController::class, 'update']);
Route::get('/student.hapus/{id}', [StudentController::class, 'delete']);
Route::delete('/student.index/{id}', [StudentController::class, 'destroy']);


//class
Route::get('/class', [ClassController::class, 'index']);
Route::get('/class-detail/{id}', [ClassController::class, 'show']);


//extra
Route::get('/eskul', [ExtracurricularController::class, 'index']);
Route::get('/eskul-detail/{id}', [ExtracurricularController::class, 'show']);


//guru
Route::get('/guru', [GuruController::class, 'index']);
Route::get('/guru-detail/{id}', [GuruController::class, 'show']);


//phone
Route::get('/phone', [PhoneController::class, 'index']);


//user


Route::get('/user.index', [UserController::class, 'index'])->name('user.index');
Route::get('/pegawai.pns', [UserController::class, 'pns'])->name('pns');
Route::get('/pegawai.p3k', [UserController::class, 'p3k'])->name('p3k');
Route::get('/pegawai.gtt', [UserController::class, 'gtt'])->name('gtt');
Route::get('/pegawai.ptt', [UserController::class, 'ptt'])->name('ptt');
Route::get('/pegawai.create', [UserController::class, 'create'])->name('pegawai.create');
Route::post('/pegawai.store', [UserController::class, 'store'])->name('pegawai.store');
Route::get('/pegawai.index', [UserController::class, 'index'])->name('pegawai.index');
Route::get('/show_ak', [UserController::class, 'show_ak'])->name('show_ak');
Route::get('/pegawai.info/{id}', [UserController::class, 'info'])->name('info');
Route::get('/project.edit_user/{id}', [UserController::class, 'edit']);
Route::put('/project/update/{id}', [UserController::class, 'update']);
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/pegawai.delete/{id}', [UserController::class, 'delete']);
Route::delete('/pegawai.destroy/{id}', [UserController::class, 'destroy']);
Route::get('/pegawai.rekap', [UserController::class, 'rekap'])->name('pegawai.rekap');
Route::get('/rekap_kp4_pdf', [UserController::class, 'rekap_pdf'])->name('rekap_pdf');


// angka kredit
Route::get('/ak.create', [AngkakreditController::class, 'postCreate'])->name('ak.postCreate');
Route::post('/ak.postData', [AngkakreditController::class, 'postData'])->name('ak.postData');
Route::get('/angka_kredit/{id}', [AngkakreditController::class, 'index'])->name('angka_kredit');
Route::get('/ak.edit/{id}', [AngkakreditController::class, 'edit'])->name('ak.edit');
Route::put('/ak.update/{id}', [AngkakreditController::class, 'update'])->name('updateAK');
Route::get('/ak.delete/{id}', [AngkakreditController::class, 'delete'])->name('ak.delete');
Route::delete('/ak.destroy/{id}', [AngkakreditController::class, 'destroy'])->name('ak.destroy');
Route::get('/ak.konversi/{id}', [AngkakreditController::class, 'konversi'])->name('konversi');
Route::get('/ak.akumulasi/{id}', [AngkakreditController::class, 'akumulasi'])->name('akumulasi');
Route::get('/ak.penetapan/{id}', [AngkakreditController::class, 'penetapan'])->name('penetapan');
Route::get('/ak.pdfReport/{id}', [AngkakreditController::class, 'pdfReport'])->name('pdfReport');



//project
Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
Route::get('/project.main/{id}', [ProjectController::class, 'show'])->name('project.show');
Route::get('/project.rencana_pdf/{id}', [ProjectController::class, 'rencana_pdf'])->name('project.rencana_pdf');
Route::get('/project.evaluasi_pdf/{id}', [ProjectController::class, 'evaluasi_pdf'])->name('project.evaluasi_pdf');
Route::get('/project.report_pdf/{id}', [ProjectController::class, 'report_pdf'])->name('project.report_pdf');
// Route::get('/project.main_pdf/{id}/cetak', [ProjectController::class, 'cetak']);
// Route::get('/project.rencana_pdf/{id}/cetak', [ProjectController::class, 'rencana_pdf'])->name('project.rencana_pdf.cetak');
Route::get('/tabel', [ProjectController::class, 'tabel']);
Route::get('/tabelpdf', [ProjectController::class, 'tabelPdf']);
Route::get('/tabelrekap', [ProjectController::class, 'tabelrekap']);
Route::get('/rekappdf', [ProjectController::class, 'rekappdf']);
Route::get('/jekel', [ProjectController::class, 'jekel'])->name('pegawai.jekel');
Route::get('/jekelpdf', [ProjectController::class, 'jekelpdf'])->name('pegawai.jekelpdf');
Route::get('/all', [ProjectController::class, 'all'])->name('pegawai.all');
Route::get('/allpdf', [ProjectController::class, 'allpdf'])->name('pegawai.allpdf');
Route::get('/pergaji', [ProjectController::class, 'pergaji'])->name('pegawai.pergaji');
Route::get('/pergajipdf', [ProjectController::class, 'pergajipdf'])->name('pegawai.pergajipdf');
Route::get('/usulanapbd', [ProjectController::class, 'usulanapbd'])->name('usulanapbd');
Route::get('/usulanapbn', [ProjectController::class, 'usulanapbn'])->name('usulanapbn');
Route::get('/usulanipp', [ProjectController::class, 'usulanipp'])->name('usulanipp');



//evaluasi
Route::get('/project.index', [EvaluasiController::class, 'index']);
Route::get('/project.evaluasi/{id}', [EvaluasiController::class, 'show']);


// Route::get('/project.index', [Laporan_1_Controller::class, 'index']);
Route::get('/project.report/{id}', [Laporan_1_Controller::class, 'show']);
Route::get('/laporan', [LegalController::class, 'index']);
Route::get('/laporan/cetak', [LegalController::class, 'cetak']);
Route::get('/ekspektasi.edit_perilaku_1/{id}', [EkspektasiController::class, 'edit_1']);
Route::get('/ekspektasi.add1', [EkspektasiController::class, 'create1']);
Route::get('/ekspektasi.edit_perilaku_2/{id}', [EkspektasiController::class, 'edit_2']);
Route::get('/ekspektasi.edit_perilaku_3/{id}', [EkspektasiController::class, 'edit_3']);
Route::get('/ekspektasi.edit_perilaku_4/{id}', [EkspektasiController::class, 'edit_4']);
Route::get('/ekspektasi.edit_perilaku_5/{id}', [EkspektasiController::class, 'edit_5']);
Route::get('/ekspektasi.edit_perilaku_6/{id}', [EkspektasiController::class, 'edit_6']);
Route::get('/ekspektasi.edit_perilaku_7/{id}', [EkspektasiController::class, 'edit_7']);
Route::put('/ekspektasi/update/{id}', [EkspektasiController::class, 'update']);
Route::get('/ekspektasi/index', [EkspektasiController::class, 'index']);


//penilai
Route::get('/penilai.index', [PenilaiController::class, 'index'])->name('penilai.index');
Route::get('/penilai.create', [PenilaiController::class, 'create'])->name('penilai.create');
Route::post('/penilai.store', [PenilaiController::class, 'store'])->name('penilai.store');
Route::get('/penilai.edit/{id}', [PenilaiController::class, 'edit'])->name('penilai.edit');
Route::get('/penilai.edit_penilai/{id}', [PenilaiController::class, 'edit'])->name('penilai.edit_penilai');
Route::put('/penilai.update/{id}', [PenilaiController::class, 'update'])->name('penilai.update');
Route::put('/penilai.update_penilai/{id}', [PenilaiController::class, 'update'])->name('penilai.update_penilai');
Route::get('/penilai.delete/{id}', [PenilaiController::class, 'delete'])->name('penilai.delete');
Route::delete('/penilai.destroy/{id}', [PenilaiController::class, 'destroy'])->name('penilai.destroy');


//anak
Route::get('/anak', [AnakController::class, 'index']);
Route::get('/project.index_anak/{id}', [AnakController::class, 'show'])->name('anak.show');
Route::get('/daftar.anak/{id}', [AnakController::class, 'anakpdf'])->name('anakpdf');
Route::get('/project.anak_tambah', [AnakController::class, 'create']);
Route::post('/project.index', [AnakController::class, 'store']);
Route::get('/project.edit_anak/{id}', [AnakController::class, 'edit']);
Route::put('/anak/update_anak/{id}', [AnakController::class, 'update'])->name('anak.update');
Route::get('/hapus_anak/{id}', [AnakController::class, 'delete']);
Route::delete('/project.hapus_anak/{id}', [AnakController::class, 'destroy']);


//pasangan
Route::get('pasangan.index', [PasanganController::class, 'index'])->name('pasangan.index');
Route::get('pasangan.kp4/{id}', [PasanganController::class, 'kp4'])->name('kp4');
Route::get('kp4pdf/{id}', [PasanganController::class, 'kp4pdf'])->name('kp4pdf');
Route::get('kp4newpdf/{id}', [PasanganController::class, 'kp4newpdf'])->name('kp4newpdf');
Route::get('pasangan.kp3/{id}', [PasanganController::class, 'kp3'])->name('kp3');
Route::get('pasangan.add', [PasanganController::class, 'create'])->name('pasangan.create');
Route::post('pasangan.index', [PasanganController::class, 'store'])->name('pasangan.store');
Route::get('pasangan.edit/{id}', [PasanganController::class, 'edit'])->name('pasangan.edit');
Route::put('pasangan.update/{id}', [PasanganController::class, 'update'])->name('pasangan.update');



//atasan
Route::get('/atasan.index', [AtasanController::class, 'index'])->name('index_atasan');
Route::get('/atasan.edit/{id}', [AtasanController::class, 'edit'])->name('atasan.edit');
Route::put('/atasan.update/{id}', [AtasanController::class, 'update'])->name('atasan.update');

Route::get('/atasan.create', [AtasanController::class, 'create'])->name('create_atasan');
Route::post('/atasan.store', [AtasanController::class, 'store'])->name('store_atasan');

Route::delete('/atasan.destroy/{id}', [AtasanController::class, 'destroy'])->name('atasan.destroy');


// sdm
Route::get('/sdm.index', [SdmController::class, 'index'])->name('sdm.index');
Route::get('/sdm.add', [SdmController::class, 'create'])->name('sdm.create');
Route::post('/sdm.index', [SdmController::class, 'store'])->name('sdm.store');
Route::get('/sdm.edit/{id}', [SdmController::class, 'edit'])->name('sdm.edit');
Route::put('/sdm.update/{id}', [SdmController::class, 'update'])->name('sdm.update');
Route::get('/hapus_sdm/{id}', [SdmController::class, 'delete'])->name('sdm.delete');
Route::delete('/delete_sdm/{id}', [SdmController::class, 'destroy'])->name('sdm.destroy');

// skema
Route::get('/skema.index', [SkemaController::class, 'index'])->name('skema.index');
Route::get('/skema.add', [SkemaController::class, 'create'])->name('skema.create');
Route::post('/skema.index', [SkemaController::class, 'store'])->name('skema.store');
Route::get('/skema.edit/{id}', [SkemaController::class, 'edit'])->name('skema.edit');
Route::put('/skema.update/{id}', [SkemaController::class, 'update'])->name('skema.update');
Route::get('/hapus_skema/{id}', [SkemaController::class, 'delete'])->name('skema.delete');
Route::delete('/delete_skema/{id}', [SkemaController::class, 'destroy'])->name('skema.destroy');

// kon

Route::get('/kon.index', [KonController::class, 'index'])->name('kon.index');
Route::get('/kon.add', [KonController::class, 'create'])->name('kon.create');
Route::post('/kon.index', [KonController::class, 'store'])->name('kon.store');
Route::get('/kon.edit/{id}', [KonController::class, 'edit'])->name('kon.edit');
Route::put('/kon.update/{id}', [KonController::class, 'update'])->name('kon.update');
Route::get('/hapus_kon/{id}', [KonController::class, 'delete'])->name('kon.delete');
Route::delete('/delete_kon/{id}', [KonController::class, 'destroy'])->name('kon.destroy');


// umpan 
Route::get('umpan.edit1/{id}', [UmpanController::class, 'edit1']);
Route::get('umpan.edit2/{id}', [UmpanController::class, 'edit2']);
Route::get('umpan.edit3/{id}', [UmpanController::class, 'edit3']);
Route::get('umpan.edit4/{id}', [UmpanController::class, 'edit4']);
Route::get('umpan.edit5/{id}', [UmpanController::class, 'edit5']);
Route::get('umpan.edit6/{id}', [UmpanController::class, 'edit6']);
Route::get('umpan.edit7/{id}', [UmpanController::class, 'edit7']);
Route::put('umpan.update/{id}', [UmpanController::class, 'update']);


// post
Route::resource('/posts', \App\Http\Controllers\PostController::class);


// Tupoksi
Route::get('/tupoksi.tambah/{id}', [TupoksiController::class, 'create']);
Route::post('/tupoksi.save/{id}', [TupoksiController::class, 'store']);
Route::get('/tupoksi.edit_tupoksi/{id}', [TupoksiController::class, 'edit']);
Route::put('/tupoksi.index/{id}', [TupoksiController::class, 'update']);
Route::get('/edit_indikator/{id}', [TupoksiController::class, 'editIndikator']);
Route::put('/update_indikator/{id}', [TupoksiController::class, 'updateIndikator']);
Route::get('/edit_aspek/{id}', [TupoksiController::class, 'editAspek']);
Route::put('/update_aspek/{id}', [TupoksiController::class, 'updateAspek']);
Route::get('/edit_target/{id}', [TupoksiController::class, 'editTarget']);
Route::put('/update_target/{id}', [TupoksiController::class, 'updateTarget']);
Route::get('/tupoksi.delete/{id}', [TupoksiController::class, 'delete']);
Route::delete('/tupoksi.destroy/{id}', [TupoksiController::class, 'destroy']);
Route::get('/tupoksi.report/{id}', [TupoksiController::class, 'getAtasanProfileForReport'])->name('tupoksi.report');



// Route::get('/tupoksi_tugas.index',[Tupoksi_tugasController::class,'index']);


// Tugas
Route::get('/tugas.tambah/{id}', [TugasController::class, 'create']);
Route::post('/tugas.simpan', [TugasController::class, 'store']);
Route::get('/tugas.edit_tugas/{id}', [TugasController::class, 'edit']);
Route::put('/tugas/update/{id}', [TugasController::class, 'update']);
Route::get('/tugas.hapus/{id}', [TugasController::class, 'delete']);
Route::delete('/tugas.delete/{id}', [TugasController::class, 'destroy']);

// Tutam
Route::get('/tutam.tambah/{id}', [TutamController::class, 'create'])->name('tutam.create');
Route::post('/tutam.simpan', [TutamController::class, 'store']);
Route::get('/tutam.edit/{id}', [TutamController::class, 'editTutam']);
Route::put('/tutam.update/{id}', [TutamController::class, 'updateTutam']);
Route::get('/tutam.delete/{id}', [TutamController::class, 'delete']);
Route::delete('/tutam.destroy/{id}', [TutamController::class, 'destroy']);


// Tuti
Route::get('/tuti.tambah/{id}', [TutiController::class, 'create']);
Route::post('/tuti.simpan', [TutiController::class, 'store']);
Route::get('/tuti.edit/{id}', [TutiController::class, 'editTuti']);
Route::put('/tuti.update/{id}', [TutiController::class, 'updateTuti']);
Route::get('/tuti.delete/{id}', [TutiController::class, 'delete']);
Route::delete('/tuti.destroy/{id}', [TutiController::class, 'destroy']);




//rk
Route::resource('/rk', \App\Http\Controllers\RkAtasanController::class);

//mapel
Route::resource('/mapel', \App\Http\Controllers\MapelController::class);


//login
Route::get('/test', function () {
    return 'Test works!';
});

Route::get('/pegawai', [UserController::class, 'index']);

Route::get('/', function () {
    return redirect('/pegawai');
});
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('main', [HomeController::class, 'index'])->name('main');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout');

//REGISTER
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');



// middleware
// Route::middleware('auth')->group(function(){

// });



// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/session', [App\Http\Controllers\HomeController::class, 'session'])->name('session');

//Cuti
Route::get('/cuti.index', [CutiController::class, 'index'])->name('cuti.index');
Route::get('/cuti.form_1/{id}', [CutiController::class, 'form_1'])->name('form_1');
Route::get('/cuti.form_2/{id}', [CutiController::class, 'form_2'])->name('form_2');
Route::get('/cuti.sementara/{id}', [CutiController::class, 'sementara'])->name('sementara');
Route::get('/cuti.kendali/{id}', [CutiController::class, 'kendali'])->name('kendali');
Route::get('/kendalipdf/{id}', [CutiController::class, 'kendaliPdf'])->name('kendaliPdf');
Route::get('/cuti.create', [CutiController::class, 'create'])->name('cuti.create');
Route::post('/cuti.store', [CutiController::class, 'store'])->name('cuti.store');
Route::get('/cuti.edit/{id}', [CutiController::class, 'edit'])->name('cuti.edit');
Route::put('/cuti.update/{id}', [CutiController::class, 'update'])->name('cuti.update');
Route::get('/cuti.delete/{id}', [CutiController::class, 'delete'])->name('cuti.delete');
Route::delete('/cuti.destroy/{id}', [CutiController::class, 'destroy'])->name('cuti.destroy');
Route::get('/cuti.rekap', [CutiController::class, 'rekap'])->name(('cuti.rekap'));
Route::get('/filter', [CutiController::class, 'filter'])->name(('filter'));
Route::get('/cutipdf', [CutiController::class, 'cutipdf'])->name(('cutipdf'));
Route::get('/pdf/{id}', [CutiController::class, 'pdf']);
Route::get('/approve/{cuti}', [CutiController::class, 'approveCutiDB'])->name('admin.cuti.approve');
Route::get('cuti.report', [CutiController::class, 'generateCutiReport'])->name('generateCutiReport');
Route::get('/calculate-workdays', [CutiController::class, 'calculateWorkdays']);



//Sesi
Route::get('/sesi', [SessionController::class, 'index']);
Route::post('/sesi/login', [SessionController::class, 'login']);
Route::get('/sesi/logout', [SessionController::class, 'logout']);
Route::get('/sesi/register', [SessionController::class, 'register']);
Route::post('/sesi/create', [SessionController::class, 'create']);


//Izin
Route::get('/izin.show/{id}', [IzinController::class, 'show']);
Route::get('/izin.form/{id}', [IzinController::class, 'form'])->name('izin.form');
Route::get('/izin.srtizin/{id}', [IzinController::class, 'srtizin'])->name('srtizin');
Route::get('/izin.keluar/{id}', [IzinController::class, 'keluar'])->name('keluar');
Route::get('/izin.suket/{id}', [IzinController::class, 'suket'])->name('suket');
Route::get('/izin.surat/{id}', [IzinController::class, 'surat'])->name('surat');
Route::get('/izin.create', [IzinController::class, 'create'])->name('izin.create');
Route::post('/izin.store', [IzinController::class, 'store'])->name('izin.store');
Route::get('/izin.edit/{id}', [IzinController::class, 'edit'])->name('izin.edit');
Route::put('/izin.update/{id}', [IzinController::class, 'update'])->name('izin.update');
Route::get('/izin.index', [IzinController::class, 'index'])->name('izin.index');
Route::get('/izin.delete/{id}', [IzinController::class, 'delete'])->name('izin.delete');
Route::delete('/izin.destroy/{id}', [IzinController::class, 'destroy'])->name('izin.destroy');

Route::get('/izin.img/{izinId}', [ImgController::class, 'img'])->name('img');
Route::post('/izin.store/{izinId}', [ImgController::class, 'store'])->name('img.store');
Route::get('/img.hapus/{izinId}', [ImgController::class, 'destroy'])->name('img.destroy');

//pists
Route::get('/pists.create', [PistController::class, 'postCreate'])->name('pists.postCreate');
Route::post('/pists.postData', [PistController::class, 'postData'])->name('pists.postData');
Route::get('/pists.index', [PistController::class, 'index'])->name('pists.index');
Route::get('/pists.edit/{id}', [PistController::class, 'edit'])->name('pists.edit');
Route::put('/pists.update/{id}', [PistController::class, 'update'])->name('pists.update');
Route::get('/pists.delete/{id}', [PistController::class, 'delete'])->name('pists.delete');
Route::delete('/pists.destroy/{id}', [PistController::class, 'destroy'])->name('pists.destroy');
Route::get('/pists.form/{id}', [PistController::class, 'form'])->name('pists.form');
Route::get('/pists.laporan/{id}', [PistController::class, 'laporan'])->name('laporan');
Route::get('/pists.laporanpdf/{id}', [PistController::class, 'laporanpdf'])->name('laporanpdf');
Route::get('/pists.form2/{id}', [PistController::class, 'form2'])->name('form2');
Route::get('/pists.form3/{id}', [PistController::class, 'form3'])->name('form3');
Route::get('/pists.form4/{id}', [PistController::class, 'form4'])->name('form4');
Route::get('/pists.dispen/{id}', [PistController::class, 'dispen'])->name('dispen');
Route::get('/pists.cari', [PistController::class, 'cari'])->name('cari');
Route::get('/stpdf/{id}', [PistController::class, 'stPdf'])->name('stpdf');
Route::get('/status/{pists}/buktipengajuan', [PistController::class, 'statusCutiBuktipengajuanPDF'])->name('pegawai.cuti.status.buktipengajuan');

Route::post('/ajukan', [PistController::class, 'ajukanCutiDB'])->name('ajukan');
Route::get('/riwayat', [PistController::class, 'riwayatCutiHTML'])->name('pegawai.cuti.riwayat');
Route::get('/status/{pists}', [PistController::class, 'statusCutiHTML'])->name('pegawai.cuti.status');
Route::get('/status/{pists}/suratizin', [PistController::class, 'statusCutiSuratizinPDF'])->name('pegawai.cuti.status.suratizin');


Route::get('/pists.photo/{pistsId}', [PhotoController::class, 'photo'])->name('photo');
Route::post('/pists.store/{pistsId}', [PhotoController::class, 'store'])->name('photo.store');
Route::get('/photo.hapus/{photoId}', [PhotoController::class, 'destroy'])->name('photo.destroy');

// Route::get('/create',function(){
//     return view('create');
//     });
// // Route::post('/pists.buat',[PistController::class,'store']);
// Route::delete('/delete/{id}',[PistController::class,'destroy']);
// Route::get('/edit/{id}',[PistController::class,'edit']);
// Route::delete('/deleteimage/{id}',[PistController::class,'deleteimage']);
// Route::delete('/deletecover/{id}',[PistController::class,'deletecover']);
// Route::put('/update/{id}',[PistController::class,'update']);


//sk
Route::get('/sk.index', [SkController::class, 'index'])->name('sk.index');
Route::get('/sk.spmt/{id}', [SkController::class, 'spmt'])->name('spmt');
Route::get('/sk.create', [SkController::class, 'create'])->name('sk.create');
Route::post('/sk.store', [SkController::class, 'store'])->name('sk.store');
Route::get('/sk.edit/{id}', [SkController::class, 'edit'])->name('sk.edit');
Route::put('/sk.update/{id}', [SkController::class, 'update'])->name('sk.update');
Route::get('/sk.delete/{id}', [SkController::class, 'delete'])->name('sk.delete');
Route::delete('/sk.destroy/{id}', [SkController::class, 'destroy'])->name('sk.destroy');
Route::get('sk.cetak/{id}', [SkController::class, 'spmtPDF'])->name('spmtPDF');

Route::controller(ImageController::class)->group(function () {
    Route::get('image-upload', 'index');
    Route::post('image-upload', 'store')->name('image.store');
});

Route::get('/bku.bku', [BkuController::class, 'index'])->name('bku.index');
Route::get('/bku/pdf', [BkuController::class, 'generatePdf'])->name('bku.pdf.list');
Route::get('/bku/pdf/{id}', [BkuController::class, 'generatePdf'])->name('bku.pdf');
Route::get('/bku.umum', [BkuController::class, 'umum'])->name('umum');
Route::get('/bku.pengeluaran', [BkuController::class, 'pengeluaran'])->name('pengeluaran');
Route::get('/bku.create', [BkuController::class, 'create'])->name('bku.create');
Route::post('/bku.store', [BkuController::class, 'store'])->name('bku.store');
Route::get('/filterpengeluaran', [BkuController::class, 'filterpengeluaran'])->name(('filterpengeluaran'));
Route::get('/filterpengeluaranPDF', [BkuController::class, 'filterpengeluaranPDF'])->name(('filterpengeluaranPDF'));
Route::get('/filterpenerimaan', [BkuController::class, 'filterpenerimaan'])->name(('filterpenerimaan'));


Route::get('form/holidays/new', [HolidayController::class, 'holiday'])->name('form/holidays/new');
Route::post('form/holidays/save', [HolidayController::class, 'saveRecord'])->name('form/holidays/save');
Route::post('form/holidays/update',  [HolidayController::class, 'updateRecord'])->name('form/holidays/update');
Route::get('/delete/{id}', [HolidayController::class, 'delete'])->name('holiday.delete');
Route::delete('/destroy/{id}', [HolidayController::class, 'destroy'])->name('holiday.destroy');

Route::resource('products-ajax-crud', \App\Http\Controllers\LiburController::class);

Route::resource('customers', \App\Http\Controllers\CustomerController::class);
// Route::get('customers/{id}/edit/','CustomerController@edit');


// Tim Kerja
Route::get('/tim.index', [TimController::class, 'index'])->name('tim.index');
Route::get('/tim.create', [TimController::class, 'create'])->name('tim.create');
Route::post('/tim.store', [TimController::class, 'store'])->name('tim.store');
Route::get('/tim.edit/{id}', [TimController::class, 'edit'])->name('tim.edit');
Route::put('/tim.update/{id}', [TimController::class, 'update'])->name('tim.update');
Route::get('/tim.delete/{id}', [TimController::class, 'delete'])->name('tim.delete');
Route::delete('/tim.destroy/{id}', [TimController::class, 'destroy'])->name('tim.destroy');
Route::get('/timpdf', [TimController::class, 'timpdf'])->name('timpdf');

//Barang
Route::get('indexbarang', [BarangController::class, 'index'])->name('barang.index');
Route::get('bastb/{id}', [BarangController::class, 'show'])->name('barang.show');
Route::get('lampiran', [BarangController::class, 'lampiran'])->name('lampiran');


Route::resource('karyawan', KaryawanController::class)->names([
    'index' => 'karyawan.index',
    'create' => 'karyawan.create',
    'store' => 'karyawan.store',
    'show' => 'karyawan.show',
    'edit' => 'karyawan.edit',
    'update' => 'karyawan.update',
    'destroy' => 'karyawan.destroy'
]);

Route::get('logo', [LogoController::class, 'index'])->name('logo.index');
Route::post('logo', [LogoController::class, 'store'])->name('logo.store');
Route::get('logo/create', [LogoController::class, 'create'])->name('logo.create');
Route::get('logo/{id}/edit', [LogoController::class, 'edit'])->name('logo.edit');
Route::put('logo/{id}', [LogoController::class, 'update'])->name('logo.update');
Route::delete('logo/{id}', [LogoController::class, 'destroy'])->name('logo.destroy');
Route::get('logo/{id}/delete', [LogoController::class, 'delete'])->name('logo.delete');
Route::get('logo/{id}/show', [LogoController::class, 'show'])->name('logo.show');
Route::get('logo/{id}/download', [LogoController::class, 'download'])->name('logo.download');
Route::get('logo/{id}/preview', [LogoController::class, 'preview'])->name('logo.preview');




Route::get('/upload-image', [GambarController::class, 'index'])->name('image.index');
Route::post('/upload-image', [GambarController::class, 'store'])->name('gambar.store');
// Di routes/web.php
Route::get('/latest-image', [GambarController::class, 'getLatestImage']);
