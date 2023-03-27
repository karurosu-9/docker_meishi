<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body {
        text-align: center;
        margin-left: auto;
        margin-right: auto;
        text-align: left;
        width: 550px;
    }

    table {
        border: black solid 2px;
        border-collapse: collapse;
        white-space: nowrap;
    }

    th {
        border: black solid 2px;
        text-align: center;
        background-color: #a9a9a9;

    }

    td {
        border: black solid 2px;
        text-align: center;
    }

    span {
        color: red;
        font-weight: bold;
    }

    .button {
        margin-left: 160px;
    }

    .button2 {
        margin-left: 20px;
    }
</style>

<body>
<a href="{{route('top')}}">トップメニュー</a>
    <br>
    <br>
    <br>
    <h2 class="title">@yield('title')</h2>
    <br>
    <div class="content">
        @yield('content')
    </div>
    <br>
    <br>
</body>

</html>