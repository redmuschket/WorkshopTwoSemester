document.addEventListener('DOMContentLoaded', function() {
    const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');

    if (!csrfTokenMeta) {
        console.error('Мета-тег с CSRF-токеном не найден!');
        return;
    }

    const csrfToken = csrfTokenMeta.content;

    const projectName = document.getElementById('projectName');
    const projectDescription = document.getElementById('projectDescription');
    const detailTitle = document.getElementById('detailTitle');
    const detailDescription = document.getElementById('detailDescription');
    const applyDetail = document.getElementById('applyDetail');
    const addDetail = document.getElementById('addDetail');
    const saveProject = document.getElementById('saveProject');
    const detailsList = document.getElementById('details');
    const deleteDetail = document.getElementById('deleteDetail');

    let currentDetail = null;
    let projectDetails = []; // Массив для хранения деталей проекта

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
            currentDetail.title = title;
            currentDetail.description = description;
            currentDetail.element.textContent = title; // Обновляем только название в списке
        } else {
            // Добавление новой детали
            const li = document.createElement('li');
            li.textContent = title;

            // Сохраняем данные детали в объекте
            const detail = {
                title: title,
                description: description,
                element: li,
            };

            projectDetails.push(detail); // Добавляем деталь в массив
            detailsList.appendChild(li);

            // Обработчик для редактирования детали
            li.addEventListener('click', function() {
                detailTitle.value = detail.title;
                detailDescription.value = detail.description;
                currentDetail = detail;
            });
        }

    }

    // Обработчик для кнопки "Применить"
    applyDetail.addEventListener('click', updateDetail);
    // Обработчик для кнопки "Удалить деталь"
    deleteDetail.addEventListener('click', deleteCurrentDetail);
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

    // Обработчик для кнопки "Добавить"
    addDetail.addEventListener('click', function() {
        detailTitle.value = '';
        detailDescription.value = '';
        currentDetail = null;
    });

    // Обработчик для кнопки "Сохранить проект"
    saveProject.addEventListener('click', async function() {
        const name = projectName.value.trim();
        const description = projectDescription.value.trim();

        if (!name) {
            alert('Название проекта не может быть пустым!');
            return;
        }

        try {
            // Создаем проект
            const projectResponse = await fetch('/projects', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken, // Используем CSRF-токен
                },
                body: JSON.stringify({
                    name: name,
                    description: description,
                }),
            });

            if (!projectResponse.ok) {
                throw new Error('Ошибка при создании проекта');
            }

            const project = await projectResponse.json();

            // Добавляем детали проекта
            for (const detail of projectDetails) {
                const detailResponse = await fetch(`/projects/${project.project.id}/details`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken, // Используем CSRF-токен
                    },
                    body: JSON.stringify({
                        title: detail.title,
                        content: detail.description,
                    }),
                });

                if (!detailResponse.ok) {
                    throw new Error('Ошибка при добавлении детали');
                }
            }

            // Перенаправляем на страницу просмотра проекта
            window.location.href = `/projects/${project.project.id}/show`;
        } catch (error) {
            console.error('Ошибка:', error);
            alert('Произошла ошибка при сохранении проекта.');
        }
    });
});
