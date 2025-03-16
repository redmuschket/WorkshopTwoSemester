<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание проекта</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite(['resources/js/create.js'])
</head>
<body>
    <main>
        <!-- Форма создания проекта -->
        <h1>Создание проекта</h1>
        <form id="createProjectForm" action="{{ route('projects.store') }}" method="post">
            @csrf
            <div class="form-control">
                <label for="name" class="form-label">Название проекта</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-control">
                <label for="description" class="form-label">Описание проекта</label>
                <textarea name="description" id="description" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Создать проект</button>
        </form>

        <!-- Форма добавления деталей (скрыта до создания проекта) -->
        <div id="addDetailsSection" style="display: none;">
            <h2>Добавить детали проекта</h2>
            <form id="addDetailForm" action="" method="POST">
                @csrf
                <div class="form-control">
                    <label for="title">Заголовок</label>
                    <input type="text" name="title" id="title" placeholder="Заголовок" required>
                </div>

                <div class="form-control">
                    <label for="content">Содержимое</label>
                    <textarea name="content" id="content" placeholder="Содержимое"></textarea>
                </div>

                <button type="submit">Добавить</button>
            </form>

            <!-- Список деталей проекта -->
            <h2>Детали проекта</h2>
            <ul id="detailsList">
                <!-- Детали будут добавляться сюда динамически -->
            </ul>
        </div>
    </main>
</body>
</html>
