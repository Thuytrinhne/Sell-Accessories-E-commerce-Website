<x-mail::message>
<style>
    x-mail::message
    {
      background-color: #red;

    }
    p {
      font-family: Arial, sans-serif;
      font-size: 14px;
      color: #333;
      text-align: left;
    }

    x-mail::button {
      display: inline-block;
      font-size: 16px;
      font-weight: bold;
      text-decoration: none;
      color: #fff;
      background-color: #007bff;
      border-radius: 5px;
      padding: 10px 20px;
    }
  </style>
 
    

# Xin chào {{$user->full_name}},
 
Có vẻ như bạn đã quên mật khẩu của TShopping. Nếu điều này đúng, click vào link dưới đây để đặt lại mật khẩu:
<x-mail::button :url="$url">
Click here to reset your password
</x-mail::button>
<br>
<p>
Nếu bạn có bất kỳ vấn đề nào trong quá trình khôi phục mật khẩu, đừng do dự liên lạc với chúng tôi nhé. (*)
<br>
Cảm ơn {{$user->full_name}},<br>
{{ config('app.name') }}
 <br> 
</p>
 (*) Email: 21522719@gmail.com <br>
 (*) Sđt: 052 388 789
 
</x-mail::message>