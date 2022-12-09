<?php

namespace App\Http\Controllers;

use App\Services\RandomTaskService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class RandomTask extends Controller
{
    public function get()
    {
        $taskService = new RandomTaskService();
        $task = $taskService->getRandomTask();
        DB::table('todos')->insert([
            'task' => $task,
            'created_at' => Carbon::now(),
            'user_id' => Auth::id()
        ]);

        return redirect('/')->with('Status', 'Random Task Added');
    }
}