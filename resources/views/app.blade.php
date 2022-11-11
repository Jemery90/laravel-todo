<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
        <title>Todo</title>
    </head>
    <nav>
        <a class="active">Home</a>
        <a href="{{ route('completed') }}">Completed</a>
    </nav>
    <body>
        <h1>Todo</h1>
        <hr>
        
        <h2>Add new task</h2>
        <hr>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('/todos') }}" method="POST">
            @csrf
            <input type="text" class="form-control" name="task" placeholder="Add new task">
            <button class="btn btn-primary" type="submit">Store</button>
        </form>

        <h2>Pending tasks</h2>
        <hr>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <table>
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($todos as $todo)
            <tr>
            <td class="list-group-item">
                {{ $todo->task }}
            </td>    
            <td>
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $loop->index }}" aria-expanded="false">
                    Edit
                </button>

                <div class="collapse mt-2" id="collapse-{{ $loop->index }}">
                    <div class="card card-body">
                        <form action="{{ url('todos/'.$todo->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" name="task" value="{{ $todo->task }}">
                            <button class="btn btn-secondary" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            <form action="{{ url('completeTask/'.$todo->id) }}" method="POST">
                 @csrf
                 @method('PUT')
                <button class="buttonComplete" type="submit">Complete</button>
            </form>
            <form action="{{ url('todos/'.$todo->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        @endforeach
        </ul>
        </td>
        </tr>
            </tbody>
        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>