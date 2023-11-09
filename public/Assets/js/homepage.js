// gọi đến header
const nav = document.querySelector(`.app-header`);
fetch(`../header.html`)
.then (res => res.text())
.then(data => {
    nav.innerHTML= data
});
// gọi đến footer
function list__itemOnCick()
{
    window.location.href="product.html";
}

