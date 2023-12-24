var city = "{{ $user_address[0]->city }}";
var selectElement = document.getElementById("city-select"); // Thay thế "yourSelectId" bằng id thực tế của phần tử select

// Lặp qua các phần tử option trong select
for (var i = 0; i < selectElement.options.length; i++) {
    var option = selectElement.options[i];
    console.log(option.text);

    if (option.text === city) {
        option.selected = true; // Chọn phần tử option có text bằng city
        break; // Thoát khỏi vòng lặp nếu đã tìm thấy phần tử
    }
}
