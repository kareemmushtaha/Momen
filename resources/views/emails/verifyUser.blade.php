<!DOCTYPE html>
<html>
  <head>
    <title>مرحبا </title>

  </head>
  <body id="content">
  <style>
        #content {
            text-align: center;
            border: 2px solid #1f960a;
            width: 270px;
            margin: 20px auto;
            padding: 30px;
            font-family: sans-serif;
        }
        #content img {
            width: 160px;
            margin: auto;
        }
        #content p
        {
            font-size: 17px;
            color: #0b0b0b;
            font-weight: 900;
        }
        #content a
        {
            width: auto;
            border: 1px solid #1f9609;
            padding: 10px;
            text-decoration: none;
            color: #fff;
            background: #1f9609;
        }
    </style>
    <img src="{{ it()->url(setting()->logo) }}" alt="" srcset="">
    <h2>مرحبا  , {{$user['name']}}</h2>
    <p>
    يرجى النقر على الرابط أدناه للتحقق من حساب بريدك الإلكتروني
    </p>
    <br/>
    <br/>
    <a href="{{url('user/verify', $user->verifyUser->token)}}">تفعيل الان</a>
  </body>
</html>
