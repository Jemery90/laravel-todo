<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Todo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = DB::table('todos')->where('complete', "=", false)->get();
        return view('app', ['todos' => $todos]);
    }

    public function getCompletedTasks() {
        $completedTasks = DB::table('todos')->where('complete', "=", true)->get();
        return view('completed', ['completedTasks' => $completedTasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|max:200'
        ]);

        DB::table('todos')->insert([
            'task' => $request->task
        ]);

        return redirect('/')->with('status', 'Task added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate the form
        $request->validate([
            'task' => 'required|max:200'
        ]);

        // update the data
        DB::table('todos')->where('id', $id)->update([
            'task' => $request->task
        ]);

        // redirect
        return redirect('/')->with('status', 'Task updated!');
    }

    public function completeTask($id)
    {
        DB::table('todos')->where('id', $id)->update((['complete' => true, 'completed_on' => Carbon::now()]));

        // redirect
        return redirect('/')->with('status', 'Task marked as complete!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete the todo
        DB::table('todos')->where('id', $id)->delete();

        // redirect
        return redirect('/')->with('status', 'Task removed!');
    }
}
