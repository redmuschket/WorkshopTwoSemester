$(document).ready(function() {
    // Обработка создания проекта
    $('#createProjectForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                // Показываем секцию добавления деталей
                $('#addDetailsSection').show();

                // Обновляем action формы добавления деталей
                $('#addDetailForm').attr('action', '/projects/' + response.project.id + '/details');

                // Очищаем форму создания проекта
                $('#createProjectForm')[0].reset();
            },
            error: function(xhr) {
                alert('Ошибка при создании проекта.');
            }
        });
    });

    // Обработка добавления деталей
    $('#addDetailForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                // Добавляем новую деталь в список
                $('#detailsList').append(
                    '<li><strong>' + response.detail.title + '</strong><p>' + response.detail.content + '</p></li>'
                );

                // Очищаем форму добавления деталей
                $('#addDetailForm')[0].reset();
            },
            error: function(xhr) {
                alert('Ошибка при добавлении детали.');
            }
        });
    });
});
