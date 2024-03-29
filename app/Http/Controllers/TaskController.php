<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Task;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $category_id = $request->category_id;
        $categories = Category::all();

        return view('tasks.create', compact('categories', 'category_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        // dd($request->all());

        Task::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
        ]);

        return redirect()->route('tasks.index')->with('success', 'タスクを作成しました。');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $previous_url = url()->previous();
        // セッションへデータ保存
        session()->put('previous_url', $previous_url);

        //
        $category_id = $task->category->id;

        $categories = Category::all();

        return view('tasks.edit', compact('task', 'category_id', 'categories', 'previous_url'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->all());
        // セッションへ保存したデータを取り出す。
        $previous_url = session()->pull('previous_url');

        // return back()->with('success', 'タスクを更新しました。');
        return redirect()->away($previous_url)->with('success', 'タスクを更新しました。');
            // 外部ドメインへのリダイレクト用の記述
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        // return redirect()->route('tasks.index')->with('success', 'タスクを削除しました。');
        return back()->with('success', 'タスクを削除しました。');
    }
}
