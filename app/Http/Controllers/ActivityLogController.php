<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        $logs = ActivityLog::query()
            ->where('user_id', $request->user()->id)
            ->latest()
            ->paginate(10);

        return view('activity_logs.index', compact('logs'));
    }
}

