@extends('layouts.mitumori')
<style>
    .button {
        margin-left: 225px;
    }
</style>
@section('title', "備考入力")

@section('content')
<form action="/mitumori/edit_hosoku" name="form" method="POST" onsubmit="return lengthCheck();">
    <table>
        @csrf
        <tr>
            <th>備考</th>
        </tr>
        @for($i=1; $i<=$form_mitumori; $i++)
         <tr>
            <td>
                <input type="text" name="biko{{$i}}" style="width: 300px" value="{{$mitumori['biko'.$i]}}">
                <input type="hidden" name="tekiyo{{$i}}" value="{{$mitumori['tekiyo'.$i]}}">
                <input type="hidden" name="tanka{{$i}}" value="{{$mitumori['tanka'.$i]}}">
                <input type="hidden" name="suryo{{$i}}" value="{{$mitumori['suryo'.$i]}}">
                <input type="hidden" name="kingaku{{$i}}" value="{{$mitumori['kingaku'.$i]}}">
            </td>
        </tr>
        @endfor
        <input type="hidden" name="corp" value="{{$mitumori->corp}}">
        <input type="hidden" name="id" value="{{$mitumori->id}}">
    </table>
    <div class="button">
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
    </div>
</form>
<script type="text/javascript">
    function lengthCheck() {

        function count(str) {

            let len = 0;

            for (let i = 0; i < str.length; i++) {
                (str[i].match(/[ -~]/)) ? len += 1: len += 2;
            }

            return len;

        }



        var biko = document.form.biko1.value;

        var limit = 30;

        if (count(biko) > limit) {
            alert("1行目が規定文字数を超えています。\n" + biko);
            return false;
        }

        var biko = document.form.biko2.value;

        var limit = 30;

        if (count(biko) > limit) {
            alert("2行目が規定文字数を超えています。\n" + biko);
            return false;
        }
        var biko = document.form.biko3.value;

        var limit = 30;

        if (count(biko) > limit) {
            alert("3行目が規定文字数を超えています。\n" + biko);
            return false;
        }
        var biko = document.form.biko4.value;

        var limit = 30;

        if (count(biko) > limit) {
            alert("4行目が規定文字数を超えています。\n" + biko);
            return false;
        }
        var biko = document.form.biko5.value;

        var limit = 30;

        if (count(biko) > limit) {
            alert("5行目が規定文字数を超えています。\n" + biko);
            return false;
        }
        var biko = document.form.biko6.value;

        var limit = 30;

        if (count(biko) > limit) {
            alert("6行目が規定文字数を超えています。\n" + biko);
            return false;
        }
        var biko = document.form.biko7.value;

        var limit = 30;

        if (count(biko) > limit) {
            alert("7行目が規定文字数を超えています。\n" + biko);
            return false;
        }
        var biko = document.form.biko8.value;

        var limit = 30;

        if (count(biko) > limit) {
            alert("8行目が規定文字数を超えています。\n" + biko);
            return false;
        }
        var biko = document.form.biko9.value;

        var limit = 30;

        if (count(biko) > limit) {
            alert("9行目が規定文字数を超えています。\n" + biko);
            return false;
        }
        var biko = document.form.biko10.value;

        var limit = 30;

        if (count(biko) > limit) {
            alert("10行目が規定文字数を超えています。\n" + biko);
            return false;
        }
    }
</script>
@endsection