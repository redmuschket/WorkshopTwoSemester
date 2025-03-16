<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование проекта: {{ $project->name }}</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite(['resources/css/edit.css'])
    @vite(['resources/js/edit.js'])
</head>
<body>
<header>
    <a href="{{ route('projects.index') }}">Главная</a>
</header>

<main>
    <!-- Верхняя часть: поля для названия и описания проекта -->
    <div class="project-form">
        <input type="text" id="projectName" placeholder="Название проекта" value="{{ $project->name }}">
        <input type="text" id="projectDescription" placeholder="Описание проекта" value="{{ $project->description }}">
    </div>

    <!-- Средняя часть: картинка и форма редактирования детали -->
    <div class="detail-section">
        <div class="image-container">
            <img src="#" alt="Деталь">
        </div>
        <div class="edit-form">
            <input type="text" id="detailTitle" placeholder="Название детали">
            <textarea id="detailDescription" placeholder="Описание детали"></textarea>
            <button id="applyDetail">Применить</button>
            <button id="deleteDetail">Удалить деталь</button>
        </div>
    </div>

    <!-- Нижняя часть: список деталей и кнопка "Сохранить" -->
    <div class="bottom-section">
        <div class="details-list">
            <button id="addDetail">+</button>
            <ul id="details">
                @foreach ($project->details as $detail)
                    <li data-detail-id="{{ $detail->id }}">
                        <strong>{{ $detail->title }}</strong>
                    </li>
                @endforeach
            </ul>
        </div>
        <button id="saveProject">Сохранить проект</button>
    </div>

    <!-- Форма для добавления детали (скрытая) -->
    <form id="addDetailForm" method="POST" style="display: none;">
        @csrf
        <input type="text" name="title" id="addDetailTitle">
        <textarea name="content" id="addDetailContent"></textarea>
    </form>

    <form id="updateProjectForm" action="{{ route('projects.update', $project) }}" method="POST" style="display: none;">
        @csrf
        @method('PUT')
        <input type="text" name="name" id="updateProjectName">
        <textarea name="description" id="updateProjectDescription"></textarea>
    </form>
</main>
</body>
</html>
