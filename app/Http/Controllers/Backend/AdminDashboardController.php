<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Task;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        $tasks = Task::all();

        $data['totalTasks']     = $tasks->count();
        $data['pendingTasks']   = $tasks->where('status', 'pending')->count();
        $data['completedTasks'] = $tasks->where('status', 'completed')->count();
        $data['highPriority']   = $tasks->where('priority', 'high')->count();

        return view('backend.dashboard', $data);
    }
}
