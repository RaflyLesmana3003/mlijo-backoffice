<pre class="wp-block-code" lang="html"><code><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login </title>
    <style>
            body{
                width: 600px;
                margin: 20px auto;
                box-shadow: 2px 3px 3px 2px #888888;
                padding: 10px;
            }
            .native-class-form{
                width: 100%;
                background-color: white;
                height: 30px;
                margin-top: 13px;
                border: 1px solid black;
                border-radius: 3px;
            }
            .native-class-button{
                background: black;
                color: white;
                padding: 5px;
                border-radius: 3px;
                width: 100%;
                height: 30px;
                border: 1px solid black;
                margin-top: 13px;
            }
    </style>
</head>
<body>
    <h2>Native Login Laravel</h2>
        <form action="{{ url('native/login') }}" method="post">
             {{ @csrf_field() }}
                <input class="native-class-form" type="text" name="email" placeholder="Masukan email yang valid">
                <input class="native-class-form" type="password" name="password" placeholder="Masukan password yang valid"><br><br>
                <button class="native-class-button" type="submit">Login</button>
        </form>
</body>
</html>
</code></pre>