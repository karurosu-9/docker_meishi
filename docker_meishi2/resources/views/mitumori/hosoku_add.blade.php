@extends('layouts.mitumori')
<style>
    .button {
        margin-left: 470px;
    }
</style>
@section('title', "補足入力")

@section('content')
        <?php $count = 10; ?>
        <?php $count_hosoku = 7; ?>
        <form action="/mitumori/mitumori_check" name="form" method="POST" onsubmit="return lengthCheck()">
            <table cellpadding="2">
                @csrf
                <tr>
                    <th>補足</th>
                </tr>
                @for ($i = 1; $i <= $count_hosoku; $i++) 
                    <tr>
                        <td>
                            <input type="text" name="hosoku{{$i}}" style="width: 500px">
                        </td>
                    </tr>
                @endfor
                @for ($i = 1; $i <= $count; $i++)
                    <input type="hidden" name="tekiyo{{$i}}" value="{{$_POST['tekiyo' . $i]}}">
                    <input type="hidden" name="suryo{{$i}}" value="{{$_POST['suryo' . $i]}}">
                    <input type="hidden" name="tanka{{$i}}" value="{{$_POST['tanka' . $i]}}">
                    <input type="hidden" name="kingaku{{$i}}" value="{{$_POST['kingaku' . $i]}}">
                    <input type="hidden" name="biko{{$i}}" value="{{$_POST['biko' . $i]}}">
                @endfor
                <input type="hidden" name="corp" value="{{$_POST['corp']}}">
            </table>
            <br>
            <br>
            <div class="button">
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
@endsection