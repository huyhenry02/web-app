<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CreatorController;
use App\Http\Controllers\Admin\CampaignController;

Route::get('/', static function () {
    return redirect()->route('show_login');
//    return view('customer.request-campaign');
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
    'prefix' => 'admin',
    'middleware' => 'auth'
], function () {
    Route::group([
        'prefix' => 'campaign'
    ], function () {
        Route::get('/list', [CampaignController::class, 'show_list'])->name('admin.campaign.list');
        Route::get('/request', [CampaignController::class, 'show_request'])->name('admin.campaign.request');
        Route::get('/create', [CampaignController::class, 'show_create'])->name('admin.campaign.show_create');
        Route::get('/detail/{model}', [CampaignController::class, 'show_detail'])->name('admin.campaign.detail');
        Route::get('/update/{model}', [CampaignController::class, 'show_update'])->name('admin.campaign.show_update');
        Route::get('/admin/campaigns/search', [CampaignController::class, 'search'])->name('admin.campaign.search');


        Route::post('/create', [CampaignController::class, 'create'])->name('admin.campaign.create');
        Route::get('/delete/{model}', [CampaignController::class, 'delete'])->name('admin.campaign.delete');
        Route::post('/update/{model}', [CampaignController::class, 'update'])->name('admin.campaign.update');
        Route::post('/action-request-join/{model}', [CampaignController::class, 'actionRequestJoin'])->name('admin.campaign.actionRequestJoin');
        Route::post('/requests/approve', [CampaignController::class, 'approveRequest'])->name('admin.campaign.approve');
        Route::post('/requests/reject', [CampaignController::class, 'rejectRequest'])->name('admin.campaign.reject');

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
Route::group([
    'prefix' => 'creator',
], function () {
    Route::get('/campaigns/search', [IndexController::class, 'search'])->name('campaign.search');
    Route::get('/index', [IndexController::class, 'showIndex'])->name('creator.index');
    Route::get('/detail-campaign/{model}', [IndexController::class, 'showDetailCampaign'])->name('creator.showDetailCampaign');
    Route::get('/list-campaign', [IndexController::class, 'showListCampaign'])->name('creator.showListCampaign');
    Route::get('/login', [IndexController::class, 'showLogin'])->name('creator.showLogin');
    Route::get('/register', [IndexController::class, 'showRegister'])->name('creator.showRegister');
    Route::get('/your-campaign', [IndexController::class, 'showYourCampaign'])->name('creator.showYourCampaign')->middleware('auth');
    Route::get('/request-campaign', [IndexController::class, 'showRequestCampaign'])->name('creator.showRequestCampaign')->middleware('auth');
    Route::get('/contact', [IndexController::class, 'showContact'])->name('creator.showContact');

    Route::post('/register', [IndexController::class, 'postRegister'])->name('creator.postRegister');
    Route::post('/send-request', [IndexController::class, 'sendRequest'])->name('creator.sendRequest')->middleware('auth');
});
