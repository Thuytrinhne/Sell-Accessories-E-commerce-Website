document.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', (event) => {
        event.preventDefault();
        document.querySelectorAll('a').forEach(styles => {
            styles.style.color = "#183a5c";
        })
        const classParent = link.getAttribute('class');
        // Ẩn tất cả các phần tử có class 'content'
        document.querySelectorAll('.content').forEach(content => {
            content.style.display = 'none';
        })
        // Hiển thị phần tử có lớp tương ứng
        document.querySelector(`.content.${classParent}`).style.display = 'block';
        document.querySelector(`.${classParent}`).style.color = "#f78da7";
    })
})

function showContent(className) {
    if (className === 'selection_list') {
        document.querySelector(`.selection.selection_add`).style.display = 'none';
        document.querySelector(`.selection.${className}`).style.display = 'Grid';
    }
    if (className === 'selection_add') {
        document.querySelector(`.selection.selection_list`).style.display = 'none';
        document.querySelector(`.selection.${className}`).style.display = 'Grid';

    }
    if (className == 'selection_order') {
        document.querySelector(`.${className}`).style.display = 'Grid';
        document.querySelector(`.selection_product`).style.display = 'none';
    }
    if (className == 'selection_product') {
        document.querySelector(`.selection_order`).style.display = 'none';
        document.querySelector(`.selection_product`).style.display = 'Grid';
    }
};

const avatar = document.querySelector('.user_infor');
const logout = document.querySelector('.logout');
avatar.addEventListener('click', () => {
    logout.classList.toggle('active');
});

const slideValue = document.getElementById('span_sliderValue');
const inputSlider = document.getElementById('input_field');
inputSlider.oninput = (() => {
    let value = inputSlider.value;
    slideValue.textContent = value;
    slideValue.classList.add("show");
});


function AddNewTag() {
    var getTagcontent = document.querySelector('.content.category');
    document.querySelectorAll('a').forEach(styles => {
        styles.style.color = "#183a5c";
    })
    document.querySelectorAll('.content').forEach(content => {
        content.style.display = 'none';
    })
    // Hiển thị phần tử có lớp tương ứng
    getTagcontent.style.display = 'block';
    document.querySelector('.category').style.color = "#f78da7";
};


