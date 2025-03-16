<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Проект</title>
    @vite(['resources/css/create.css'])
    @vite(['resources/js/create.js'])
</head>
<body>
    <header>
        <a href="{{ route('projects.index') }}">Главная</a>
    </header>

    <main>
        <!-- Верхняя часть: поля для названия и описания проекта -->
        <div class="project-form">
            <input type="text" id="projectName" placeholder="Название проекта">
            <input type="text" id="projectDescription" placeholder="Описание проекта">
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
                    <!-- Детали будут добавляться сюда -->
                </ul>
            </div>
            <button id="saveProject">Сохранить проект</button>
        </div>
    </main>
</body>
</html>
