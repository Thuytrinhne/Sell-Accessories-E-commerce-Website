function addToCart() {
    alert("Product added to Whistlist_cart!");
}

var isHidden = false;

function Filter_display() {
    if(!isHidden){
        document.querySelector('.filter-widget').style.display='none';
        isHidden = true;
    }
    else {
        document.querySelector('.filter-widget').style.display='block';
        isHidden = false;
    }
   
}