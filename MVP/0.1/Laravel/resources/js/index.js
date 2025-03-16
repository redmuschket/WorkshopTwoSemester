document.addEventListener('DOMContentLoaded', function() {
    // Обработка двойного клика на ссылку проекта
    document.querySelectorAll('.project-link').forEach(function(link) {
        link.addEventListener('click', function(event) {
            if (event.detail === 2) { // Проверка на двойной клик
                event.preventDefault(); // Отмена перехода по ссылке
                window.location.href = link.getAttribute('data-edit-url'); // Переход на страницу редактирования
            }
        });
    });

    // Обработка клика на кнопку "+"
    document.getElementById('addProjectButton').addEventListener('click', function() {
        window.location.href = document.getElementById('addProjectButton').getAttribute('data-create-url'); // Переход на страницу создания проекта
    });
});
