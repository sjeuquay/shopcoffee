<?php

use App\Http\Controllers\User\UserDeviceController;
use App\Http\Controllers\User\UserListController;
use App\Http\Controllers\User\UserRoleController;
use App\Http\Controllers\User\RolePermissionController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->name('user.')->group(function () {
    //UserList
    Route::resource('/list', UserListController::class);
    Route::get('update/status/{id}',[UserListController::class,'updateStatus'])->name('update.status');
    //UserRole
    Route::resource('/role', UserRoleController::class);

    //Reset
    Route::get('/resetpassword', function () {
        return view('admin.user.resetPassword');
    })->name('resetpassword');
    Route::get('/resetPasswordAnnounce', function () {
        return view('admin.user.resetPasswordAnnounce');
    })->name('resetPasswordAnnounce');

    //Role Permission

    Route::get('/rolepermission', function () {
        return view('admin.user.rolePermission');
    })->name('rolepermission');
    Route::get('/rolepermission/editForm/{rolePerMisID}', function ($rolePerMisID) {
        return view('admin.user.rolePermissionEditForm', compact('rolePerMisID'));
    })->name('rolepermission.editForm');
    Route::get('/rolepermission/addForm/', function () {
        return view('admin.user.rolePermissionAddForm');
    })->name('rolepermission.addForm');

    Route::resource('rolePermission', RolePermissionController::class);

    //Device
    Route::resource('/device', UserDeviceController::class);
});
