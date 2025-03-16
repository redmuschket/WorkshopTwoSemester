<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Проект</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite(['resources/css/show.css'])
</head>
<body>
<h1>Просмотр проекта: {{ $project->name }}</h1>
<p>{{ $project->description }}</p>

<h2>Детали проекта:</h2>
<ul>
    @foreach($project->details as $detail)
        <li>
            <strong>{{ $detail->title }}</strong>
            <p>{{ $detail->content }}</p>
        </li>
    @endforeach
</ul>
</body>
</html>
