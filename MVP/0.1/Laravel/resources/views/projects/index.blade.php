<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Проекты</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite(['resources/css/index.css'])
    @vite(['resources/js/index.js'])
</head>

<body>
<main>
    <div class="projects-container">
        <h1>Проекты</h1>
        <ul class="project-list" id="projectsList">
            @foreach ($projects as $project)
                <li class="project-item">
                    <a href="{{ route('projects.show', $project) }}" class="project-link" data-edit-url="{{ route('projects.edit', $project) }}">
                        {{ $project->name }}
                    </a>
                </li>
            @endforeach
        </ul>
        <a href="{{ route('projects.create') }}" id="addProjectButton" class="project-link-add">+</a>
    </div>
</main>
</body>
</html>
