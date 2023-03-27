<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
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

    .content {
        margin: 10px;
    }

    .button {
        margin-top: 30px;
    }

</style>

<body>
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