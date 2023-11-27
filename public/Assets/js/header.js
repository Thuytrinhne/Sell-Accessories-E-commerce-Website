function redirectOnClick(url) {
    window.location.href = url;
}
window.onload = function () {
    // nếu đã login 
    // document.querySelector(`.header-auth`).style.display=`block`;
    // document.querySelector(`.header-auth-login`).style.display=`none`;

};
function changeMainPageOnClick(value) {
    if (value == `account`) {
        window.location.href = 'account.html';
    }
    else if (value == `location`) {
        window.location.href = 'address.html';
    }
    else if (value == 'orders') {
        window.location.href = 'history-orders.html';

    }
    else if (purpose == `logout`) {
        document.querySelector(`.header-auth-login`).style.display = `block`;
        document.querySelector(`.header-auth`).style.display = `none`;
        document.querySelector(`.body-main`).style.display = `block`;
        document.querySelector(`.body-user`).style.display = `none`;

    }
};



function redirectOnClick() {
    var view_screen = document.querySelector('.modal-custom-cart');
    view_screen.style.display = 'block';
}
