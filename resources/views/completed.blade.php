<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Completed Tasks</title>
    <link rel="stylesheet" href="{{ asset('css/completed.css') }}">
    </head>
    <body>
        <h1>Completed Tasks</h1>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Completed On</th>
                </tr>
            </thead>
            <tbody>
            @foreach($completedTasks as $completedTask)
                <tr>
                    <td>{{ $completedTask->task }}</td>
                    <td>{{ $completedTask->completed_on }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </body>
</html>