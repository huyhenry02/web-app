<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CreatorController;
use App\Http\Controllers\Admin\CampaignController;

Route::get('/', static function () {
    return view('admin.layouts.main');
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::get('/login', [AuthController::class, 'show_login'])->name('show_login');
    Route::get('/register', [AuthController::class, 'show_register'])->name('show_register');

    Route::post('/login', [AuthController::class, 'postLogin'])->name('post_login');
    Route::get('/logout', [AuthController::class, 'postLogout'])->name('logout');
});
Route::group([
    'prefix' => 'admin'
], function () {
    Route::group([
        'prefix' => 'campaign'
    ], function () {
        Route::get('/list', [CampaignController::class, 'show_list'])->name('admin.campaign.list');
        Route::get('/request', [CampaignController::class, 'show_request'])->name('admin.campaign.request');
        Route::get('/create', [CampaignController::class, 'show_create'])->name('admin.campaign.show_create');
        Route::get('/detail/{model}', [CampaignController::class, 'show_detail'])->name('admin.campaign.detail');
        Route::get('/update/{model}', [CampaignController::class, 'show_update'])->name('admin.campaign.show_update');

        Route::post('/create', [CampaignController::class, 'create'])->name('admin.campaign.create');
        Route::get('/delete/{model}', [CampaignController::class, 'delete'])->name('admin.campaign.delete');
        Route::post('/update/{model}', [CampaignController::class, 'update'])->name('admin.campaign.update');
    });

    Route::group([
        'prefix' => 'creator'
    ], function () {
        Route::get('/blacklist', [CreatorController::class, 'show_blacklist'])->name('admin.creator.blacklist');
        Route::get('/list', [CreatorController::class, 'show_list'])->name('admin.creator.list');

        Route::post('/ban-creators', [CreatorController::class, 'actionBanCreators'])->name('admin.creator.ban.multiple');
        Route::post('/restored-creators', [CreatorController::class, 'actionRestoreCreators'])->name('admin.creator.restore.multiple');
    });
});
