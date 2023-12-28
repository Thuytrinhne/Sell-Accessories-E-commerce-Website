// <!-- gọi api thêm ds tỉnh huyện xã tương ứng -->

window.onload = function () {
    $.ajax({
        url: "https://provinces.open-api.vn/api/p/",
        type: "get",
        dataType: "json",
        success: function (res) {
            handleProvinceData(res);
        },
    });
};

function handleProvinceData(data) {
    // Xử lý dữ liệu trả về từ API ở đây
    // load danh sách tỉnh lên thẻ select
    var selectElement = document.getElementById("city-select");

    data.forEach(function (item) {
        var option = document.createElement("option");
        option.value = item.code + "-" + item.name; // 1-Hà Nội
        option.text = item.name;
        selectElement.appendChild(option);
    });
}
// click chọn 1 tỉnh
var selectElement = document.getElementById("city-select");
selectElement.addEventListener("change", function () {
    var selectedValue = this.value;
    var parts = selectedValue.split("-");

    loadListDistrict(parts[0]);
});

function loadListDistrict(code) {
    console.log(code);
    // Thực hiện hành động dựa trên giá trị được chọn
    $.ajax({
        url: "https://provinces.open-api.vn/api/p/" + code + "?depth=2",
        type: "get",
        dataType: "json",
        success: function (res) {
            handleDistrictData(res);
        },
    });
}
function handleDistrictData(data) {
    var selectElement = document.getElementById("district-select");
    selectElement.innerHTML = "";
    // tạo option chọn khu vực
    var option = document.createElement("option");
    option.value = "";
    option.text = "Chọn khu vực";
    selectElement.appendChild(option);

    data.districts.forEach(function (item) {
        var option = document.createElement("option");
        option.value = item.code + "-" + item.name;
        option.text = item.name;
        selectElement.appendChild(option);
    });
}
// click chọn 1 huyện
var selectElement = document.getElementById("district-select");
selectElement.addEventListener("change", function () {
    var selectedValue = this.value;
    var parts = selectedValue.split("-");

    loadListWards(parts[0]);
});
function loadListWards(code) {
    console.log(code);
    // Thực hiện hành động dựa trên giá trị được chọn
    $.ajax({
        url: "https://provinces.open-api.vn/api/d/" + code + "?depth=2",
        type: "get",
        dataType: "json",
        success: function (res) {
            handleWardsData(res);
        },
    });
}
function handleWardsData(data) {
    var selectElement = document.getElementById("ward-select");
    selectElement.innerHTML = "";
    // tạo option chọn khu vực
    var option = document.createElement("option");
    option.value = "";
    option.text = "Chọn khu vực";
    selectElement.appendChild(option);

    data.wards.forEach(function (item) {
        var option = document.createElement("option");
        option.value = item.name;
        option.text = item.name;
        selectElement.appendChild(option);
    });
}
