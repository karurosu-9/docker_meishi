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
        width: 1050px;
    }

    table {
        border-collapse: collapse;
        border: black solid 2px;
        white-space: nowrap;
    }

    th {
        border: black solid 1px;
        background-color: #c0c0c0;
        text-align: center
    }

    td {
        border: black solid 1px;
        text-align: center;
    }

    .button {
        margin-top: 30px;
    }

    .error {
        color: red;
        font-weight: bold;
    }

    .p_error {
        font-size: 22px;
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