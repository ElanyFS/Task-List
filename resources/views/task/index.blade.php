<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>

<body>
    <h1 style="text-align:center;">Tarefas</h1>


    <table class="table table-striped" style="width:70%;margin-left:15%">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Status</th>
                <th scope="col" colspan="3">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)

            <tr>
                <th scope="row">{{$task->nome}}</th>
                <th scope="row">{{mb_strtoupper($task->status)}}</th>
                <td>
                    <form action="{{route('updateStatus', $task->id)}}" method="post">
                        @csrf
                        @method('put')

                        @if($task->status === 'aberto')
                        <input type="hidden" name="status" value="pendente">
                        <button type="submit" class="btn">Pendente</i></button>

                        @elseif($task->status === 'pendente')
                        <input type="hidden" name="status" value="concluida">
                        <button type="submit" class="btn">Concluir</button>
                        @else()
                        <button class="btn"><i class="bi bi-check-circle" style="color:green;"></i></button>
                        @endif

                    </form>
                </td>
                <td>
                    @if($task->status === 'concluida')
                    <form action="{{route('deletar', $task->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn"><i class="bi bi-x-circle" style="color:red;"></i></button>
                    </form>
                    @endif
                </td>

                <th><a href="{{route('editTask', $task->id)}}"><i class="bi bi-pencil text-info"></a></th>

            </tr>
            @endforeach

        </tbody>
    </table>

    <div class="d-grid gap-2 d-md-block">
        <button class="btn btn-primary m-5" type="button"><a style="color: white;text-decoration:none;" href="{{route('create')}}">Criar</a></button>
    </div>

</body>

</html>