<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MitumoriController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('top', [MitumoriController::class, 'index'])->name('top');

Route::get('mitumori/kingaku_add', [MitumoriController::class, 'kingaku_add'])->name('mitumori.kingaku_add');
Route::post('mitumori/biko_add', [MitumoriController::class, 'biko_add']);
Route::post('mitumori/hosoku_add', [MitumoriController::class, 'hosoku_add']);
Route::post('mitumori/mitumori_check', [MitumoriController::class, 'mitumori_check']);
Route::post('mitumori/mitumori_check_confirm', [MitumoriController::class, 'mitumori_check_confirm']);
Route::post('mitumori/mitumori_toroku', [MitumoriController::class, 'mitumori_toroku']);
Route::get('mitumori/mitumori_list', [MitumoriController::class, 'mitumori_list'])->name('mitumori.list');
Route::post('mitumori/mitumori_list', [MitumoriController::class, 'mitumori_list']);
Route::get('mitumori/mitumori_show', [MitumoriController::class, 'mitumori_show']);
Route::post('mitumori/show_branch', function(){

if(isset($_POST['edit'])){
    $disp_id = $_POST['id'];
    header('Location:/mitumori/edit_kingaku?id='.$disp_id);
    exit;
}

if(isset($_POST['delete'])){
    $disp_id=$_POST['id'];
    header('Location:/mitumori/mitumori_delete?id='.$disp_id);
    exit;
}

});

Route::get('mitumori/edit_kingaku', [MitumoriController::class, 'edit_kingaku']);
Route::post('mitumori/edit_biko', [MitumoriController::class, 'edit_biko']);
Route::post('mitumori/edit_hosoku', [MitumoriController::class, 'edit_hosoku']);
Route::post('mitumori/edit_check', [MitumoriController::class, 'edit_check']);
Route::post('mitumori/edit_check_confirm', [MitumoriController::class, 'edit_check_confirm']);
Route::post('mitumori/update', [MitumoriController::class, 'update']);
Route::post('mitumori/print', [MitumoriController::class, 'print']);
Route::get('mitumori/mitumori_delete', [MitumoriController::class, 'mitumori_delete']);