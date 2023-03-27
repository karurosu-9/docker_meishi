<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>mitumori</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
</head>
<style>
    .body {
        text-align: center;
        margin-left: auto;
        margin-right: auto;
        text-align: left;
        width: 550px;
    }

    table {
        border-collapse: collapse;
        border: black solid 2px;
        white-space: nowrap;
        width:500px;
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

    .btn {
        margin-left: 495px;
    }
</style>

<body>
    <br>
    <div class="body">
        <?php
        echo '<a href="../staff_login/staff_top.php">トップページ　</a>';
        echo '<a href="../staff_login/staff_logout.php">ログアウト　</a>';
        echo '<hr>';
        ?>
        <br>
        <br>
        補足入力<br>
        <br>
        <?php $text = 10; ?>
        <?php $text2 = 7; ?>
        <form action="mitumori_add_check_master.php" name="form" method="post" onsubmit="return lengthCheck()">
            <table cellpadding="2">
                <tr>
                    <th>補足</th>
                </tr>
                <?php for ($i = 1; $i <= $text2; $i++) : ?>
                    <tr>
                        <td>
                            <input type="text" name="hosoku<?php echo $i; ?>" style="width: 500px">
                        </td>
                    </tr>
                <?php endfor; ?>
                <?php for ($i = 1; $i <= $text; $i++) : ?>
                    <input type="hidden" name="tekiyo<?php echo $i; ?>" value="<?php echo $_POST["tekiyo" . $i]; ?>">
                    <input type="hidden" name="suryo<?php echo $i; ?>" value="<?php echo $_POST["suryo" . $i]; ?>">
                    <input type="hidden" name="tanka<?php echo $i; ?>" value="<?php echo $_POST["tanka" . $i]; ?>">
                    <input type="hidden" name="kingaku<?php echo $i; ?>" value="<?php echo $_POST["kingaku" . $i]; ?>">
                    <input type="hidden" name="biko<?php echo $i; ?>" value="<?php echo $_POST["biko" . $i]; ?>">
                <?php endfor; ?>
            </table>
            <br>
            <br>
            <input type="hidden" name="corp" value="<?php echo $_POST['corp'];?>">
            <div class="btn">
                <input type="submit" value="OK">
            </div>
        </form>
        <br>
        <br>
    </div>
</body>
<script type="text/javascript">
    function lengthCheck() {

        function count(str) {

            let len = 0;

            for (let i = 0; i < str.length; i++) {
                (str[i].match(/[ -~]/)) ? len += 1: len += 2;
            }

            return len;

        }

        var limit = 255;

        var hosoku = document.form.hosoku1.value;

        //var limit = 255;

        if (count(hosoku) > limit) {
            alert("1行目が規定文字数を超えています。\n" + hosoku);
            return false;
        }


        var hosoku = document.form.hosoku2.value;

        if (count(hosoku) > limit) {
            alert("2行目が規定文字数を超えています。\n" + hosoku);
            return false;
        }


        var hosoku = document.form.hosoku3.value;

        if (count(hosoku) > limit) {
            alert("3行目が規定文字数を超えています。\n" + hosoku);
            return false;
        }


        var hosoku = document.form.hosoku4.value;

        if (count(hosoku) > limit) {
            alert("4行目が規定文字数を超えています。\n" + hosoku);
            return false;
        }


        var hosoku = document.form.hosoku5.value;

        if (count(hosoku) > limit) {
            alert("5行目が規定文字数を超えています。\n" + hosoku);
            return false;
        }


        var hosoku = document.form.hosoku6.value;

        if (count(hosoku) > limit) {
            alert("6行目が規定文字数を超えています。\n" + hosoku);
            return false;
        }


        var hosoku = document.form.hosoku7.value;

        if (count(hosoku) > limit) {
            alert("7行目が規定文字数を超えています。\n" + hosoku);
            return false;
        }


        var hosoku = document.form.hosoku8.value;

        if (count(hosoku) > limit) {
            alert("8行目が規定文字数を超えています。\n" + hosoku);
            return false;
        }


        var hosoku = document.form.hosoku9.value;

        if (count(hosoku) > limit) {
            alert("9行目が規定文字数を超えています。\n" + hosoku);
            return false;
        }


        var hosoku = document.form.hosoku10.value;

        if (count(hosoku) > limit) {
            alert("10行目が規定文字数を超えています。\n" + hosoku);
            return false;
        }
    }
</script>

</html>