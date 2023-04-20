<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Http\Requests\StoreTarefaRequest;
use App\Http\Requests\UpdateStoreTarefaRequest;
use App\Http\Requests\UpdateTarefaRequest;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tarefas = Tarefa::all();

        return view('tarefa.index', compact('tarefas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tarefa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateStoreTarefaRequest $request)
    {
        try {
            $tarefa = Tarefa::create($request->validated());

            return redirect()->back();

        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarefa $tarefa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarefa $tarefa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatus(UpdateStoreTarefaRequest $request, Tarefa $tarefa)
    {
        $param = $request->validated();
        $tarefa = Tarefa::findOrFail($request->id);
        $tarefa->update($param);

        return redirect()->back();
    }

    public function updateTask(){
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return Tarefa::findOrFail($id)->delete();
    }
}
