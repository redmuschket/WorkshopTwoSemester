document.addEventListener('DOMContentLoaded', function() {
    // Обработка клика на ссылку проекта
    document.querySelectorAll('.project-link').forEach(function(link) {
        let clickCount = 0; // Счетчик кликов
        let timeoutId; // Идентификатор таймера

        link.addEventListener('click', function(event) {
            event.preventDefault(); // Отменяем действие по умолчанию (переход по ссылке)

            clickCount++; // Увеличиваем счетчик кликов

            if (clickCount === 1) {
                // Одинарный клик
                timeoutId = setTimeout(function() {
                    // Переход на страницу просмотра проекта
                    window.location.href = link.getAttribute('href');
                    clickCount = 0; // Сбрасываем счетчик
                }, 300); // Задержка для определения двойного клика (300 мс)
            } else if (clickCount === 2) {
                // Двойной клик
                clearTimeout(timeoutId); // Отменяем таймер одинарного клика
                window.location.href = link.getAttribute('data-edit-url'); // Переход на страницу редактирования
                clickCount = 0; // Сбрасываем счетчик
            }
        });
    });

    // Обработка клика на кнопку "+"
    document.getElementById('addProjectButton').addEventListener('click', function() {
        window.location.href = document.getElementById('addProjectButton').getAttribute('data-create-url'); // Переход на страницу создания проекта
    });
});
