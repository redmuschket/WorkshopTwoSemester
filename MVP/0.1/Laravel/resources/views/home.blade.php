<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Проект</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Hello</h1>

    <form action="{{ route('projects.index') }}" method="get">
        <button type="submit">Начать</button>
    </form>
</body>
</html>
