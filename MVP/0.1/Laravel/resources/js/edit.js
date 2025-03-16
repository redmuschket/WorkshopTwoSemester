document.addEventListener('DOMContentLoaded', function() {
    // Получаем projectId из URL
    const projectId = window.location.pathname.split('/')[2];

    // Элементы формы проекта
    const projectName = document.getElementById('projectName');
    const projectDescription = document.getElementById('projectDescription');
    const detailTitle = document.getElementById('detailTitle');
    const detailDescription = document.getElementById('detailDescription');
    const applyDetail = document.getElementById('applyDetail');
    const deleteDetail = document.getElementById('deleteDetail'); // Новая кнопка
    const addDetail = document.getElementById('addDetail');
    const saveProject = document.getElementById('saveProject');
    const detailsList = document.getElementById('details');

    // Формы
    const updateProjectForm = document.getElementById('updateProjectForm');
    const updateProjectName = document.getElementById('updateProjectName');
    const updateProjectDescription = document.getElementById('updateProjectDescription');

    const addDetailForm = document.getElementById('addDetailForm');
    const addDetailTitle = document.getElementById('addDetailTitle');
    const addDetailContent = document.getElementById('addDetailContent');

    let currentDetail = null;

    // Устанавливаем action для формы обновления проекта
    if (updateProjectForm) {
        updateProjectForm.action = `/projects/{projectId}`;
    } else {
        console.error('Форма обновления проекта (updateProjectForm) не найдена.');
    }

    // Устанавливаем action для формы добавления детали
    if (addDetailForm) {
        addDetailForm.action = `/projects/{project}/details`;
    } else {
        console.error('Форма добавления детали (addDetailForm) не найдена.');
    }

    // Функция для обновления или добавления детали
    function updateDetail() {
        const title = detailTitle.value.trim();
        const description = detailDescription.value.trim();

        if (!title) {
            alert('Название детали не может быть пустым!');
            return;
        }

        if (currentDetail) {
            // Редактирование существующей детали
            currentDetail.querySelector('strong').textContent = title; // Обновляем название
            currentDetail.dataset.detailDescription = description; // Сохраняем описание в data-атрибуте
        } else {
            // Добавление новой детали
            const li = document.createElement('li');
            li.innerHTML = `<strong>${title}</strong>`;
            li.dataset.detailDescription = description; // Сохраняем описание в data-атрибуте

            detailsList.appendChild(li);

            // Обработчик для редактирования детали
            li.addEventListener('click', function() {
                detailTitle.value = title;
                detailDescription.value = description;
                currentDetail = li;
            });
        }

        // Очистка формы и сброс текущей детали
        detailTitle.value = '';
        detailDescription.value = '';
        currentDetail = null;
    }

    // Функция для удаления детали
    function deleteCurrentDetail() {
        if (currentDetail) {
            // Удаляем текущую деталь из списка
            detailsList.removeChild(currentDetail);
            // Очищаем форму и сбрасываем текущую деталь
            detailTitle.value = '';
            detailDescription.value = '';
            currentDetail = null;
        } else {
            alert('Не выбрана деталь для удаления!');
        }
    }

    // Обработчик для кнопки "Применить"
    applyDetail.addEventListener('click', updateDetail);

    // Обработчик для кнопки "Удалить деталь"
    deleteDetail.addEventListener('click', deleteCurrentDetail);

    // Обработчик для кнопки "Добавить"
    addDetail.addEventListener('click', function() {
        detailTitle.value = '';
        detailDescription.value = '';
        currentDetail = null;
    });

    // Обработчик для кнопки "Сохранить проект"
    saveProject.addEventListener('click', function() {
        // Заполняем скрытую форму обновления проекта
        updateProjectName.value = projectName.value;
        updateProjectDescription.value = projectDescription.value;

        // Отправляем форму обновления проекта
        updateProjectForm.submit();
    });

    // Обработчик для добавления детали
    if (addDetailForm) {
        addDetailForm.addEventListener('submit', function(event) {
            event.preventDefault();

            // Заполняем скрытую форму добавления детали
            addDetailTitle.value = detailTitle.value;
            addDetailContent.value = detailDescription.value;

            // Отправляем форму добавления детали
            addDetailForm.submit();
        });
    }

    // Обработчик клика на деталь в списке
    detailsList.addEventListener('click', function(event) {
        const li = event.target.closest('li');
        if (li) {
            const titleElement = li.querySelector('strong');
            const description = li.dataset.detailDescription || '';

            console.log('Нажата деталь:', li);
            console.log('Название:', titleElement ? titleElement.textContent : 'Не найдено');
            console.log('Описание:', description);

            if (titleElement) {
                detailTitle.value = titleElement.textContent;
                detailDescription.value = description;
                currentDetail = li;
            } else {
                console.error('Элемент <strong> не найден в детали.');
            }
        }
    });

    // Инициализация существующих деталей
    document.querySelectorAll('#details li').forEach(li => {
        li.addEventListener('click', function() {
            detailTitle.value = li.querySelector('strong').textContent;
            detailDescription.value = li.dataset.detailDescription || '';
            currentDetail = li;
        });
    });
});
