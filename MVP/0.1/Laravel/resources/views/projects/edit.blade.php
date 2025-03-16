<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование проекта</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<h1>Редактирование проекта: {{ $project->name }}</h1>

<!-- Форма для обновления проекта -->
<form action="{{ route('projects.update', $project) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $project->name }}" required>
    <textarea name="description">{{ $project->description }}</textarea>
    <button type="submit">Обновить</button>
</form>

<!-- Добавление деталей проекта -->
<h2>Детали проекта</h2>
<form action="{{ route('projects.details.store', $project) }}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Заголовок" required>
    <textarea name="content" placeholder="Содержимое"></textarea>
    <button type="submit">Добавить</button>
</form>

<!-- Список деталей проекта -->
<ul>
    @foreach ($project->details as $detail)
        <li>
            <strong>{{ $detail->title }}</strong>
            <p>{{ $detail->content }}</p>
        </li>
    @endforeach
</ul>
</body>
</html>
