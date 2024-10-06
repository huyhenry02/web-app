<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Creator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class CreatorController extends Controller
{
    public function show_blacklist(): View|Factory|Application
    {
        $inactiveCreators = Creator::where('status', Creator::STATUS_BANNED)->get();
        $count = $inactiveCreators->count();
        return view('admin.creator.blacklist', [
                'inactiveCreators' => $inactiveCreators,
                'count' => $count,
            ]);
    }

    public function show_list(): View|Factory|Application
    {
        $creators = Creator::where('status', Creator::STATUS_ACTIVE)->get();
        $count = $creators->count();
        return view('admin.creator.list', [
            'creators' => $creators,
            'count' => $count,
        ]);
    }

    public function actionBanCreators(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $creatorIds = explode(',', $request->creator_ids);
            $banReason = $request->ban_reason;

            Creator::whereIn('id', $creatorIds)->update([
                'status' => Creator::STATUS_BANNED,
                'ban_reason' => $banReason,
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Selected creators have been banned');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    public function actionRestoreCreators(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $creatorIds = explode(',', $request->creator_ids);

            Creator::whereIn('id', $creatorIds)->update([
                'status' => Creator::STATUS_ACTIVE,
                'ban_reason' => null,
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Selected creators have been restored');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
