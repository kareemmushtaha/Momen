<!DOCTYPE html>
<html>
  <head>
    <title>تفير كلمة المرور</title>

  </head>
  <body id="content" style="    padding: 25px;
    border: 1px solid #1f9609;
    font-size: 14px;
    color: #585D6A;
    font-weight: normal;
    width: 550px;
    margin: auto;
    text-align: center;">

    <img style="            width: 160px;
            margin: auto;" src="{{ it()->url(setting()->logo) }}" alt="" srcset="">
    <p style="            font-size: 17px;
            color: #0b0b0b;
            font-weight: 900;">
لقد تلقينا طلب لاستعادة كلمة المرور الخاصة بك في موقع وقف تك
لاستكمال الطلب الرجاء الضغط الى الرز في الأسفل لتعيين كلمة مرور جديدة
    </p>
    <br/>
    <br/>
    <a style="            width: auto;
            border: 1px solid #1f9609;
            padding: 10px;
            text-decoration: none;
            color: #fff;
            background: #1f9609;" href="{{route('password.reset', $link)}}" tagat="_blank">تغير كلمة المرور</a>
  </body>
</html>
