document.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', (event) => {
        event.preventDefault();

        const classParent = link.getAttribute('class');

        // Ẩn tất cả các phần tử có class 'content'
        document.querySelectorAll('.content').forEach(content => {
            content.style.display = 'none';
        });

        // Hiển thị phần tử có lớp tương ứng
        document.querySelector(`.content.${classParent}`).style.display = 'block';

    });
});

function showContent(className) {
    if (className === 'selection_list') {
        document.querySelector(`.selection.selection_add`).style.display = 'none';
        document.querySelector(`.selection.${className}`).style.display = 'Grid';
    }
    if (className === 'selection_add') {
        document.querySelector(`.selection.selection_list`).style.display = 'none';
        document.querySelector(`.selection.${className}`).style.display = 'Grid';

    }




}


