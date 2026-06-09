<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        $logs = ActivityLog::with(['user', 'document'])

            ->when(
                $request->user()->role !== 'admin',
                function ($query) use ($request) {
                    $query->where(
                        'user_id',
                        $request->user()->id
                    );
                }
            )

            ->when(
                $request->filled('date'),
                function ($query) use ($request) {
                    $query->whereDate(
                        'created_at',
                        $request->date
                    );
                }
            )

            ->latest()
            ->paginate(10);

        return view(
            'activity_logs.index', compact('logs')
        );
    }
}