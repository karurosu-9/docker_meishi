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

    @media print {
        .page {
            width: 172mm;
            height: 251mm;
            margin-top: 190px;
            margin-left: 35px;
            page-break-after: always;
        }

        .page:last-child {
            page-break-after: auto;
        }

        .no_print {
            display: none;
        }
    }
</style>

<body>
    <div class="no_print">
        <a href="{{route('top')}}">トップメニュー</a>
    <br>
    <br>
    <br>
    </div>
    <h2 class="title">@yield('title')</h2>
    <br>
    <div class="content">
        @yield('content')
    </div>
    <div class="no_print">
    <br>
    <br>
    </div>
</body>

</html>