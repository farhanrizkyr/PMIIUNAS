<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kader\CategoryController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Mrc\MerchandiseController;
use App\Http\Controllers\Kader\PostController;
use App\Http\Controllers\Kader\AfirasiController;
use App\Http\Controllers\Pengurus\HomeeController;
use App\Http\Controllers\Pengurus\TahunController;
use App\Http\Controllers\Pengurus\ProgdiController;
use App\Http\Controllers\Pengurus\PemberitahuanController;
use App\Http\Controllers\Pengurus\MrcController;
use App\Http\Controllers\Pengurus\SliderController;
use App\Http\Controllers\Pengurus\SigController;
use App\Http\Controllers\Pengurus\FileArsipPengurusController;
use App\Http\Controllers\Pengurus\FileArsipMapabaController;
use App\Http\Controllers\Pengurus\StrukturOrganisasiController;
use App\Http\Controllers\Pengurus\ProfileRayonController;
use App\Http\Controllers\Pengurus\UserController;
use App\Http\Controllers\Pengurus\UserPanitiaController;
use App\Http\Controllers\Kader\UserKaderController;
use App\Http\Controllers\Pengurus\MapabaController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Pengurus\ImportDataMapabaController;
use App\Http\Controllers\Pengurus\ImportDataPengurusController;
use App\Http\Controllers\Pengurus\PengurusController;
use App\Http\Controllers\Pengurus\AdminLoginController;
use App\Http\Controllers\Pengurus\ChangePasswordController;
use App\Http\Controllers\Pengurus\AdminRegisterController;
use App\Http\Controllers\Pengurus\KaderRegisterController;
use App\Http\Controllers\Kader\KaderLoginController;
use App\Http\Controllers\Kader\ChangePasswordKaderController;
use App\Http\Controllers\Pengurus\ProfilePMIIUNASController;
use App\Http\Controllers\Pengurus\SejarahPMIIController;
use App\Http\Controllers\Pengurus\SaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/formpendaftaranMapaba',[DashboardController::class,'formapaba']);
Route::post('/formpendaftaranMapaba/proses_pendaftaran_mapaba',[DashboardController::class,'tambah']);
Route::get('/formpendaftaranSIG',[DashboardController::class,'formsig']);
Route::post('/formpendaftaranSIG/proses_pendaftaran_sig',[DashboardController::class,'simpan_sig']);
//===============================ImportDataPengurus===================//
Route::get('/history-datamapaba',[ImportDataMapabaController::class,'index']);
Route::get('//history-datamapaba/list-tahun-angkatan/{id}',[ImportDataMapabaController::class,'list_tahun_mahasiswa']);
Route::get('/history-datamapaba/list-mahasiswa-program-studi/{id}',[ImportDataMapabaController::class,'list']);

//================================Dashboard==================//
Route::get('/home',[HomeeController::class,'home']);
Route::get('/grafiks',[HomeeController::class,'grafik']);
//================================LoginAdmin==================//
Route::get('/home/login',[AdminLoginController::class,'login'])->name('login');
Route::post('/home',[AdminLoginController::class,'proses_login'])->name('loginakses');
Route::get('/login',[AdminLoginController::class,'logout'])->name('logout');

//================================RegisterAdmin==================//
Route::get('/anggota_pengurus/tambah_pengurus',[AdminRegisterController::class,'add']);
Route::post('/anggota_pengurus/tambah_akun_pengurus',[AdminRegisterController::class,'daftar'])->name('register_admin');
//================================RegisterKader==================//
Route::post('/anggota_kader/tambah_user',[KaderRegisterController::class,'daftarkader']);
//================================Slider==================//
Route::get('/sliders',[SliderController::class,'index']);
Route::delete('/sliders/hapus_slider/{id}',[SliderController::class,'destroy']);
Route::get('/sliders/add',[SliderController::class,'create']);
Route::post ('/sliders/proses_tambah_slider',[SliderController::class,'store']);
Route::get('/sliders/edit_slider/{id}',[SliderController::class,'edit']);
Route::post('/sliders/proses_edit_slider/{id}',[SliderController::class,'update']);
//================================Profile==================//
Route::get('/profilesrayon',[profileRayonController::class,'index']);
Route::get('/profilesrayon/more/{slug}',[profileRayonController::class,'show']);
Route::delete('/profilesrayon/hapus_rayon/{id}',[profileRayonController::class,'destroy']);
Route::get('/profilesrayon/edit_rayon/{id}',[profileRayonController::class,'edit']);
Route::get('/profilesrayon/add',[profileRayonController::class,'create']);
Route::post('/profilesrayon/proses_tambah_rayon',[profileRayonController::class,'store']);
Route::post('/profilesrayon/proses_edit_rayon/{id}',[profileRayonController::class,'update']);
//================================FileArsiMapaba==================//
Route::get('/filearsipmapabaraya',[FileArsipMapabaController::class,'index']);
Route::get('/filearsipmapabaraya/add',[FileArsipMapabaController::class,'create']);
Route::post('/filearsipmapabaraya/proses_tambah_filemapaba',[FileArsipMapabaController::class,'store']);
Route::delete('/filearsipmapabaraya/hapus_file_mapaba/{id}',[FileArsipMapabaController::class,'destroy']);
Route::get('/filearsipmapabaraya/edit_file_mapaba/{id}',[FileArsipMapabaController::class,'edit']);
Route::post('/filearsipmapabaraya/proses_edit_file_mapaba/{id}',[FileArsipMapabaController::class,'update']);
//================================Mapaba==================//
Route::get('/listmapaba',[MapabaController::class,'index']);
Route::get('/listmapaba/pdf',[MapabaController::class,'pdf']);
Route::get('/listmapaba/sub/{slug}',[MapabaController::class,'show1']);
Route::get('/listmapaba/m/{slug}',[MapabaController::class,'show']);
Route::put('/listmapaba/ver_mapaba/{id}',[MapabaController::class,'ver']);
Route::delete('/listmapaba/hapus_mapaba/{id}',[MapabaController::class,'destroy']);
Route::delete('/history-datamapaba/delete-history/{id}',[MapabaController::class,'destroyhistory']);
Route::get('/listmapaba/tambah_mapaba',[MapabaController::class,'create']);
Route::post('/listmapaba/proses_tambah_mapaba',[MapabaController::class,'store']);
Route::get('/listmapaba/edit_mapaba/{id}',[MapabaController::class,'edit']);
Route::get('/history-datamapaba/edit-arsip/{id}',[MapabaController::class,'edithi']);
Route::post('/history-datamapaba/proses_update_data/{id}',[MapabaController::class,'updatehi']);
Route::post('/listmapaba/proses_update_mapaba/{id}',[MapabaController::class,'update']);
//================================FileArsipPengurus==================//
Route::get('/filearsipkomi',[FileArsipPengurusController::class,'index']);
Route::get('/filearsipkomi/add',[FileArsipPengurusController::class,'create']);
Route::post('/filearsipkomi/proses_tambah_filepengurus',[FileArsipPengurusController::class,'store']);
Route::get('/filearsipkomi/edit_file_pengurus/{id}',[FileArsipPengurusController::class,'edit']);
Route::delete('/filearsipkomi/hapus_file_pengurus/{id}',[FileArsipPengurusController::class,'destroy']);
Route::post('/filearsipkomi/proses_edit_file_pengurus/{id}',[FileArsipPengurusController::class,'update']);
//================================Tahun===================//
Route::get('/tahun',[TahunController::class,'index']);
Route::get('/tahun/add',[TahunController::class,'create']);
Route::post('/tahun/proses_tambah_tahun',[TahunController::class,'store']);
Route::get('/tahun/edit_tahun/{id}',[TahunController::class,'edit']);
Route::delete('/tahun/delete-tahun-angkatan/{id}',[TahunController::class,'destroy']);
Route::post('/tahun/proses_edit_tahun/{id}',[TahunController::class,'update']);
//================================Mrc===================//
Route::get('/merchandise',[MrcController::class,'index']);
Route::get('/merchandise/detail/{slug}',[MrcController::class,'show']);
Route::delete('/merchandise/hapus_mrc/{id}',[MrcController::class,'destroy']);
Route::get('/merchandise/add_mrc',[MrcController::class,'create']);
Route::post('/merchandise/proses_tambah_mrc',[MrcController::class,'store']);
Route::get('/merchandise/edit_mrc/{id}',[MrcController::class,'edit']);
Route::post('/merchandise/proses_edit_mrc/{id}',[MrcController::class,'update']);
//================================Struktur===================//
Route::get('/strukturs',[StrukturOrganisasiController::class,'index']);
Route::delete('/strukturs/hapus_pengurus/{id}',[StrukturOrganisasiController::class,'destroy']);
Route::get('/strukturs/edit_pengurus/{id}',[StrukturOrganisasiController::class,'edit']);
Route::post('/strukturs/proses_edit_pengurus/{id}',[StrukturOrganisasiController::class,'update']);
Route::get('/strukturs/tambah_struktur',[StrukturOrganisasiController::class,'create']);
Route::post('/strukturs/proses_tambah_struktur',[StrukturOrganisasiController::class,'store']);
//================================SIG===================//
Route::get('/listsig',[SigController::class,'index']);
Route::delete('/listsig/hapus_peserta_sig/{id}',[SigController::class,'destroy']);
Route::get('/listsig/edit_peserta_sig/{id}',[SigController::class,'edit']);
Route::post('/listsig/proses_edit_peserta/{id}',[SigController::class,'update']);
//================================Progdi===================//
Route::get('/progdi',[ProgdiController::class,'index']);
Route::delete('/progdi/delete-progdi/{id}',[ProgdiController::class,'destroy']);
Route::get('/progdi/add',[ProgdiController::class,'create']);
Route::post('/progdi/proses_tambah_progdi',[ProgdiController::class,'store']);
Route::get('/progdi/edit_progdi/{id}',[ProgdiController::class,'edit']);
Route::post('/progdi/proses_edit_progdi/{id}',[ProgdiController::class,'update']);
//================================Pemberitahuan===================//
Route::get('/pemberitahuan',[PemberitahuanController::class,'index']);
Route::get('/pemberitahuan/add',[PemberitahuanController::class,'create']);
Route::delete('/pemberitahuan/hapus_pem/{id}',[PemberitahuanController::class,'destroy']);
Route::post('/pemberitahuan/proses_edit_pem/{id}',[PemberitahuanController::class,'update']);
Route::get('/pemberitahuan/edit_pem/{id}',[PemberitahuanController::class,'edit']);
Route::post('/pemberitahuan/proses_tambah_pem',[PemberitahuanController::class,'store']);
Route::get('/pemberitahuan/{slug}',[PemberitahuanController::class,'show']);
//================================Categories===================//
Route::get('/kader/category',[CategoryController::class,'index']);
Route::get('/kader/category/tambah_category',[CategoryController::class,'add']);
Route::post('/kader/proses_tambah_category',[CategoryController::class,'create']);
Route::post('/kader/proses_edit_category/{id}',[CategoryController::class,'update']);
Route::delete('/kader/hapus_category/{id}',[CategoryController::class,'destroy']);
//===============================Post===================//
Route::get('/kader/artikel',[PostController::class,'index']);
Route::get('/kader/artikel/tambah_artikel',[PostController::class,'create']);
Route::post('/kader/proses_tambah_postingan',[PostController::class,'store']);
Route::delete('/kader/proses_hapus_post/{id}',[PostController::class,'destroy']);
Route::get('/kader/edit_post/{slug}',[PostController::class,'edit']);
Route::post('/kader/proses_edit_post/{id}',[PostController::class,'update']);
Route::get('/kader/detail/{slug}',[PostController::class,'show']);
Route::get('/kader/allposts',[PostController::class,'all']);
Route::post('/kader/allposts/proses_tambah_post1/',[PostController::class,'store1']);
//==============================UserPengurus===================//
Route::get('/anggota_pengurus',[UserController::class,'pengurus']);
Route::get('/anggota_kader',[UserController::class,'kaders']);
Route::post('/anggota_kader/ubah-password-kader/{id}',[UserController::class,'prosess']);
Route::get('/anggota_kader/ubah-password-kader/{id}',[UserController::class,'ubah_password_kader']);
Route::get('/anggota_kader/postingan_kader/{user:username}',[UserController::class,'postingan_kaders']);
Route::get('/anggota_kader/detail-kader/{username}',[UserController::class,'detailkader']);
Route::get('/anggota_kader/ubahstatus/{id}',[UserController::class,'status']);
Route::post('/anggota_kader/proses-ubah-status/{id}',[UserController::class,'proses_ubah']);
Route::get('/anggota_kader/tambah_akun',[UserController::class,'addkader']);
Route::get('/user/',[UserController::class,'settings']);
Route::get('/user/ubah-user/',[UserController::class,'ubah']);
Route::delete('/user/hapus/{id}',[UserController::class,'hapusakun']);
Route::delete('/delete-account-kader/{id}',[UserController::class,'hapus_kader']);
Route::post('/user/update_check/{id}',[UserController::class,'update']);
Route::post('/user/update_avatar/{id}',[UserController::class,'update_avatar']);
Route::delete('/user/hapus_avatar/{avatar}',[UserController::class,'hapus_avatar']);
Route::delete('/anggota_pengurus/{id}',[UserController::class,'destroy']);
Route::get('/anggota_pengurus/ubah-role/{username}',[UserController::class,'role']);
Route::post('/anggota_pengurus/proses-ubah-role/{id}',[UserController::class,'proses']);
Route::get('/anggota_kader/detail',[UserController::class,'settingskader']);
Route::get('/change/password',[UserController::class,'password']);
//==============================Pengurus===================//
Route::get('/ubah/password',[ChangePasswordController::class,'passwordpanitia']);
Route::post('/password/ubah_password',[ChangePasswordController::class,'change_password']);
//==============================Password-change===================//
Route::get('/listpengurus',[PengurusController::class,'index']);
Route::get('/listpengurus/tambah_data_pengurus',[PengurusController::class,'create']);
Route::put('/listpengurus/demisioner_pengurus/{id}',[PengurusController::class,'demisioner']);
Route::delete('/listpengurus/hapus_pengurus/{id}',[PengurusController::class,'destroy']);
Route::post('/listpengurus/proses_tambah_data',[PengurusController::class,'store']);
Route::get('/listpengurus/edit_pengurus/{id}',[PengurusController::class,'edit']);
Route::post('/listpengurus/proses_update_data/{id}',[PengurusController::class,'update']);
//==============================UserKader===================//
Route::get('/user',[UserPanitiaController::class,'settingspanitia']);
Route::get('/user/ubah/{username}',[UserPanitiaController::class,'ubahpanitia']);
Route::post('/user/update_avatar/{id}',[UserPanitiaController::class,'update_avatarpanitia']);
Route::delete('/user/hapus/{id}',[UserPanitiaController::class,'hapusakunpanitia']);
Route::post('/user/update_check/{id}',[UserPanitiaController::class,'updatepanitia']);
//==============================UserKader===================//
Route::get('/kader',[UserKaderController::class,'index']);
Route::get('/user-profile',[UserKaderController::class,'profile']);
Route::post('/user-profile/update/{id}',[UserKaderController::class,'update']);
Route::post('/user-profile/check_avatar/{id}',[UserKaderController::class,'check_avatar']);
Route::get('/user-change-profile/',[UserKaderController::class,'change_profile']);
//==============================LoginKader===================//
Route::get('/kader/login',[KaderLoginController::class,'login'])->name('kader.login');
Route::get('/kader/logout',[KaderLoginController::class,'logout'])->name('kader.logout');
Route::post('/kader/login',[KaderLoginController::class,'post_kader'])->name('login:kader');

//==============================ProfilePMIIUNAS===================//
Route::get('/profpmiiunas/',[ProfilePMIIUNASController::class,'index']);
Route::get('/profpmiiunas/edit_profile/{id}',[ProfilePMIIUNASController::class,'edit']);
Route::get('/profpmiiunas/more/{id}',[ProfilePMIIUNASController::class,'more']);
Route::post('/profpmiiunas/proses-edit/{id}',[ProfilePMIIUNASController::class,'update']);

//==============================SejarahPMIIUNAS===================//
Route::get('/sejarah-pmii/',[SejarahPMIIController::class,'index']);
Route::get('/sejarah-pmii/more/{id}',[SejarahPMIIController::class,'show']);
Route::get('/sejarah-pmii/edit_sejarah/{id}',[SejarahPMIIController::class,'edit']);
Route::post('/sejarah-pmii/proses-edit/{id}',[SejarahPMIIController::class,'update']);
//==============================ImportDataPengurus===================//
Route::get('/history-datapengurus/',[ImportDataPengurusController::class,'index']);
Route::delete('/historydatapengurus/hapus_pengurus/{id}',[ImportDataPengurusController::class,'destroy']);
Route::get('/historydatapengurus/edit_data/{id}',[ImportDataPengurusController::class,'edit']);
Route::post('/historydatapengurus/proses_update_data/{id}',[ImportDataPengurusController::class,'update']);
//==============================Password_kader===================//
Route::get('/password',[ChangePasswordKaderController::class,'password']);
Route::post('/password/ubah_password_kader',[ChangePasswordKaderController::class,'proses']);
//==============================Saran===================//
Route::get('/saran',[SaranController::class,'index']);
Route::delete('/saran/hapus/{id}',[SaranController::class,'destroy']);
//==============================Saran===================//
Route::get('/kader/testimoni',[AfirasiController::class,'index']);
Route::delete('/kader/testimoni/delete-testimoni/{id}',[AfirasiController::class,'delete']);
Route::post('/kader/create-testimoni',[AfirasiController::class,'create']);
Route::get('/kader/testimoni/edit-testimoni/{id}',[AfirasiController::class,'edit']);
Route::post('/kader/proses-edit-testimoni/{id}',[AfirasiController::class,'proses_edit']);
//==============================Blog===================//
Route::get('/blog',[BlogController::class,'blog']);
Route::get('/blog/author/{kader:username}',[BlogController::class,'author']);
Route::get('/blog/category/{category:slug}',[BlogController::class,'category']);
//==============================Mrc===================//
Route::get('/merchandises',[MerchandiseController::class,'merchandise']);
