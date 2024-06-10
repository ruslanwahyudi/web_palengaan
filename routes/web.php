<?php

use App\Http\Controllers\Admin\Blogs\ArticleController;
use App\Http\Controllers\Admin\Blogs\CategoryController;
use App\Http\Controllers\Admin\Blogs\TagsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LayananRekomnikahController;
use App\Http\Controllers\LayananSktmController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SakipController;
use App\Http\Controllers\SurattugasController;
use App\Http\Controllers\TransaksiLayananController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

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
// frontend
Route::get('/', [WebController::class, 'index'])->name('landingpage');
Route::get('/dok-perencanaan', [WebController::class, 'dokumenPerencanaan'])->name('dok-perencanaan');
Route::get('/all/post', [WebController::class, 'allPost'])->name('all-post');
Route::get('/detail/post/{id}', [WebController::class, 'detailPost'])->name('detail-post');

// end of frontend function

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/admin/login',[AdminController::class,'adminLogin'])->name('admin.login');
// start of middleware group admin
Route::middleware(['auth','role:admin'])->group(function(){

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/logout',[AdminController::class,'adminLogout'])->name('admin.logout');
    // profile admin
    Route::get('/admin/profile',[AdminController::class,'adminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store',[AdminController::class,'adminProfileStore'])->name('admin.profile.store');
    // setting
    Route::get('/admin/settings',[AdminController::class,'adminSettings'])->name('admin.settings');
    Route::post('/admin/settings/store',[AdminController::class,'adminSettingsStore'])->name('admin.settings.store');
    // change password
    Route::get('admin/change/password',[AdminController::class,'adminChangePassword'])->name('admin.change.password');
    Route::post('admin/change/password/store',[AdminController::class,'adminChangePasswordStore'])->name('admin.change.password.store');
    // backend
    Route::controller(PegawaiController::class)->group(function(){
        Route::get('/daftar/pegawai', 'daftarPegawai')->name('daftar.pegawai');
        Route::get('/tambah/pegawai', 'tambahPegawai')->name('tambah.pegawai');
        Route::post('/store/pegawai', 'storePegawai')->name('store.pegawai');
        Route::get('/ubah/pegawai/{id}/', 'ubahPegawai')->name('ubah.pegawai');
        Route::post('/update/pegawai/{id}/', 'updatePegawai')->name('update.pegawai');
        Route::get('/hapus/pegawai/{id}', 'hapusPegawai')->name('hapus.pegawai');
        Route::get('/detail/pegawai/{id}', 'detailPegawai')->name('detail.pegawai');
    });
    // Role and Permission
    // permission
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/permission', 'allPermission')->name('all.permission');
        Route::get('/add/permission', 'addPermission')->name('add.permission');
        Route::post('/store/permission', 'storePermission')->name('store.permission');
        Route::get('/edit/permission/{id}/', 'editPermission')->name('edit.permission');
        Route::post('/update/permission/{id}/', 'updatePermission')->name('update.permission');
        Route::get('/delete/permission/{id}', 'deletePermission')->name('delete.permission');
        Route::get('/detail/permission/{id}', 'detailPermission')->name('detail.permission');
    });

    // role
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/role', 'allRole')->name('all.role');
        Route::get('/add/role', 'addRole')->name('add.role');
        Route::post('/store/role', 'storeRole')->name('store.role');
        Route::get('/edit/role/{id}/', 'editRole')->name('edit.role');
        Route::post('/update/role/{id}/', 'updateRole')->name('update.role');
        Route::get('/delete/role/{id}', 'deleteRole')->name('delete.role');
        // Route::get('/detail/permission/{id}', 'detailPermission')->name('detail.permission');

        // role in Permission
        Route::get('/all/role/permission', 'allRolePermission')->name('all.role.permission');
        Route::get('/add/role/permission', 'addRolePermission')->name('add.role.permission');
        Route::post('/store/role/permission', 'storeRolePermission')->name('store.role.permission');
        Route::get('/edit/role/permission/{id}', 'editRolePermission')->name('edit.role.permission');
        Route::post('/update/role/permission/{id}', 'updateRolePermission')->name('update.role.permission');
        Route::get('/delete/role/permission/{id}', 'deleteRolePermission')->name('delete.role.permission');
    });

    // Blogs & News
    // Tags
    Route::controller(TagsController::class)->group(function(){
        Route::get('/all/tag', 'allTag')->name('all.tag');
        Route::get('/add/tag', 'addTag')->name('add.tag');
        Route::post('/store/tag', 'storeTag')->name('store.tag');
        Route::get('/edit/tag/{id}/', 'editTag')->name('edit.tag');
        Route::post('/update/tag/{id}/', 'updateTag')->name('update.tag');
        Route::get('/delete/tag/{id}', 'deleteTag')->name('delete.tag');
        // Route::get('/detail/permission/{id}', 'detailPermission')->name('detail.permission');
    });

    // category
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/all/category', 'allCategory')->name('all.category');
        Route::get('/add/category', 'addCategory')->name('add.category');
        Route::post('/store/category', 'storeCategory')->name('store.category');
        Route::get('/edit/category/{id}/', 'editCategory')->name('edit.category');
        Route::post('/update/category/{id}/', 'updateCategory')->name('update.category');
        Route::get('/delete/category/{id}', 'deleteCategory')->name('delete.category');
        // Route::get('/detail/permission/{id}', 'detailPermission')->name('detail.permission');
    });

    // article
    Route::controller(ArticleController::class)->group(function(){
        Route::get('/all/article', 'allArticle')->name('all.article');
        Route::get('/add/article', 'addArticle')->name('add.article');
        Route::post('/store/article', 'storeArticle')->name('store.article');
        Route::get('/edit/article/{id}/', 'editArticle')->name('edit.article');
        Route::post('/update/article/{id}/', 'updateArticle')->name('update.article');
        Route::get('/delete/article/{id}', 'deleteArticle')->name('delete.article');
        // Route::get('/detail/permission/{id}', 'detailPermission')->name('detail.permission');
    });

    // dokumen-sakip
    Route::controller(SakipController::class)->group(function(){
        Route::get('/data/sakip', 'dataSakip')->name('data.sakip');
        Route::get('/add/sakip', 'addSakip')->name('add.sakip');
        Route::post('/store/sakip', 'storeSakip')->name('store.sakip');
        Route::get('/edit/sakip/{id}/', 'editSakip')->name('edit.sakip');
        Route::post('/update/sakip/{id}/', 'updateSakip')->name('update.sakip');
        Route::get('/delete/sakip/{id}', 'deleteSakip')->name('delete.sakip');
        // Route::get('/detail/permission/{id}', 'detailPermission')->name('detail.permission');
    });

    // pages Static
    Route::controller(PagesController::class)->group(function(){
        // Route::get('/data/page/{page}', 'dataPage')->name('data.page');
        // Route::get('/add/page', 'addPage')->name('add.page');
        // Route::post('/store/page', 'storePage')->name('store.page');
        Route::get('/edit/page/{page}/', 'editPage')->name('edit.page');
        Route::post('/update/page/{page}/', 'updatePage')->name('update.page');
        // Route::get('/delete/page/{id}', 'deletePage')->name('delete.page');
        // Route::get('/detail/permission/{id}', 'detailPermission')->name('detail.permission');
    });

    // pages Static
    Route::controller(SurattugasController::class)->group(function(){
        Route::get('/all/surat_tugas/', 'allSurattugas')->name('all.surat_tugas');
        Route::get('/add/surat_tugas', 'addSurattugas')->name('add.surat_tugas');
        Route::post('/store/surat_tugas', 'storeSurattugas')->name('store.surat_tugas');
        Route::get('/edit/surat_tugas/{id}/', 'editSurattugas')->name('edit.surat_tugas');
        Route::post('/update/surat_tugas/{id}/', 'updateSurattugas')->name('update.surat_tugas');
        Route::get('/delete/surat_tugas/{id}', 'deleteSurattugas')->name('delete.surat_tugas');
        Route::get('/cetak/surat_tugas/{id}', 'cetakSurattugas')->name('cetak.surat_tugas');
    });

    // Layanan SKTM
    Route::controller(LayananController::class)->group(function(){
        Route::get('/data/layanan', 'dataLayanan')->name('data.layanan');
        // Route::get('/tambah/pegawai', 'tambahPegawai')->name('tambah.pegawai');
        // Route::post('/store/pegawai', 'storePegawai')->name('store.pegawai');
        // Route::get('/delete/pegawai/{id}', 'deletePegawai')->name('delete.pegawai');
    });

    
    // Transaksi Layanan
    Route::controller(TransaksiLayananController::class)->group(function(){
        Route::get('/checklist/layanan/{id}', 'checklistLayanan')->name('checklist.layanan');
    });

    // Layanan Rekom Nikah
    Route::controller(LayananRekomnikahController::class)->group(function(){
        Route::get('/data/rekom_nikah', 'dataRekomnikah')->name('data.rekom_nikah');
        // Route::get('/tambah/pegawai', 'tambahPegawai')->name('tambah.pegawai');
        // Route::post('/store/pegawai', 'storePegawai')->name('store.pegawai');
        // Route::get('/delete/pegawai/{id}', 'deletePegawai')->name('delete.pegawai');
    });

    // Layanan SKTM
    Route::controller(LayananSktmController::class)->group(function(){
        Route::get('/data/sktm', 'dataSktm')->name('data.sktm');
        // Route::get('/tambah/pegawai', 'tambahPegawai')->name('tambah.pegawai');
        // Route::post('/store/pegawai', 'storePegawai')->name('store.pegawai');
        // Route::get('/checklist/sktm/{id}', 'deletePegawai')->name('checklist.sktm');
    });
});
// end of middleware group admin

// start of middleware group agent
Route::prefix('user')->middleware(['auth','role.user'])->group(function(){

});
// end of middleware group agend


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
