<?php

namespace App\Services;

use App\Models\Task as ModelsTask;

class Task
{
    public function getTask()
    {
        return ModelsTask::all();
    }

    public function store(array $data)
    {
        return ModelsTask::create($data);
    }
}
