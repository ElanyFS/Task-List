<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\UpdateStoreTaskRequest;
use App\Services\Task as ServicesTask;

use function GuzzleHttp\Promise\task;

class TaskController extends Controller
{

    function  __construct(
        private ServicesTask $taskService
    ) {
    }


    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $tasks = $this->taskService->getTask();

        return view('task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateStoreTaskRequest $request)
    {
        try {
            $this->taskService->store($request->validated());

            return redirect()->back();
        } catch (\Throwable $th) {
            throw new $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editTask(UpdateStoreTaskRequest $request)
    {
        $param = $request->validated();
        $task = Task::query()->findOrFail($request->id);

        return view('task.editTask', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreTaskRequest $request, Task $task)
    {

        $param = $request->validated();
        $task = Task::query()->findOrFail($request->id);

        $task->update($param);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $task = Task::findOrFail($id)->delete();

        return redirect()->back();
    }
}
