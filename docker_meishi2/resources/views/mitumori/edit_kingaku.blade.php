@extends('layouts.mitumori')
<style>

    body {
        text-align: center;
        margin-left: auto;
        margin-right: auto;
        text-align: left;
        width: 1050px;
    }

    .button {
        margin-left: 420px;
    }

    .corp {
        width: 200px;
        border-bottom: solid 2px black;
    }
</style>
@section('title', '金額編集')

@section('content')
@if($errors->any())
<div class="error">
    <p class="p_error">※入力に問題があります。再入力してください。</p>
    @foreach($errors->all() as $error)
      <p>※{{$error}}</p>
    @endforeach
</div>
@endif
<form action="/mitumori/edit_biko" method="POST" name="form">
    @csrf
        会社<br>
        <div class="corp">
            {{$mitumori->corp}}
        </div>
        <br>
        <br>
        @if($errors->any())
            @foreach($errors as $error)
                <div class="error">
                    <p class="p_error">$error</p>
                </div>
            @endforeach
        @endif
        <table cellpadding="2">
            <tr>
                <th>摘要</th>
                <th>単価</th>
                <th>数量</th>
                <th>金額</th>
            </tr>
            <tr>
                <td><input type='text' name='tekiyo1' style="width:200px" value="{{$mitumori->tekiyo1}}"></td>
                <td><input type='text' name='tanka1' onChange='keisan()' style='width:100px' value="{{$mitumori->tanka1}}" />円</td>
                <td><input type='text' name='suryo1' onChange='keisan()' style='width:50px' value="{{$mitumori->suryo1}}" /></td>
                <td><input type='text' name='kingaku1' style='width:100px' value="{{$mitumori->kingaku1}}"/>円</td>
            </tr>
            <tr>
                <td><input type='text' name='tekiyo2' style="width:200px" value="{{$mitumori->tekiyo2}}"></td>
                <td><input type='text' name='tanka2' onChange='keisan()' style='width:100px' value="{{$mitumori->tanka2}}"/>円</td>
                <td><input type='text' name='suryo2' onChange='keisan()' style='width:50px' value="{{$mitumori->suryo2}}"/></td>
                <td><input type='text' name='kingaku2' style='width:100px' value="{{$mitumori->kingaku2}}"/>円</td>
            </tr>
            <tr>
                <td><input type='text' name='tekiyo3' style="width:200px" value="{{$mitumori->tekiyo3}}"></td>
                <td><input type='text' name='tanka3' onChange='keisan()' style='width:100px' value="{{$mitumori->tanka3}}"/>円</td>
                <td><input type='text' name='suryo3' onChange='keisan()' style='width:50px' value="{{$mitumori->suryo3}}"/></td>
                <td><input type='text' name='kingaku3' style='width:100px' value="{{$mitumori->kingaku3}}"/>円</td>
            </tr>
            <tr>
                <td><input type='text' name='tekiyo4' style="width:200px" value="{{$mitumori->tekiyo4}}"></td>
                <td><input type='text' name='tanka4' onChange='keisan()' style='width:100px' value="{{$mitumori->tanka4}}"/>円</td>
                <td><input type='text' name='suryo4' onChange='keisan()' style='width:50px' value="{{$mitumori->suryo4}}"/></td>
                <td><input type='text' name='kingaku4' style='width:100px' value="{{$mitumori->kingaku4}}"/>円</td>
            </tr>
            <tr>
                <td><input type='text' name='tekiyo5' style="width:200px" value="{{$mitumori->tekiyo5}}"></td>
                <td><input type='text' name='tanka5' onChange='keisan()' style='width:100px' value="{{$mitumori->tanka5}}"/>円</td>
                <td><input type='text' name='suryo5' onChange='keisan()' style='width:50px' value="{{$mitumori->suryo5}}"/></td>
                <td><input type='text' name='kingaku5' style='width:100px' value="{{$mitumori->kingaku5}}"/>円</td>
            </tr>
            <tr>
                <td><input type='text' name='tekiyo6' style="width:200px" value="{{$mitumori->tekiyo6}}"></td>
                <td><input type='text' name='tanka6' onChange='keisan()' style='width:100px' value="{{$mitumori->tanka6}}"/>円</td>
                <td><input type='text' name='suryo6' onChange='keisan()' style='width:50px' value="{{$mitumori->suryo6}}"/></td>
                <td><input type='text' name='kingaku6' style='width:100px' value="{{$mitumori->kingaku6}}"/>円</td>
            </tr>
            <tr>
                <td><input type='text' name='tekiyo7' style="width:200px" value="{{$mitumori->tekiyo7}}"></td>
                <td><input type='text' name='tanka7' onChange='keisan()' style='width:100px' value="{{$mitumori->tanka7}}"/>円</td>
                <td><input type='text' name='suryo7' onChange='keisan()' style='width:50px' value="{{$mitumori->suryo7}}"/></td>
                <td><input type='text' name='kingaku7' style='width:100px' value="{{$mitumori->kingaku7}}"/>円</td>
            </tr>
            <tr>
                <td><input type='text' name='tekiyo8' style="width:200px" value="{{$mitumori->tekiyo8}}"></td>
                <td><input type='text' name='tanka8' onChange='keisan()' style='width:100px' value="{{$mitumori->tanka8}}"/>円</td>
                <td><input type='text' name='suryo8' onChange='keisan()' style='width:50px' value="{{$mitumori->suryo8}}"/></td>
                <td><input type='text' name='kingaku8' style='width:100px' value="{{$mitumori->kingaku8}}"/>円</td>
            </tr>
            <tr>
                <td><input type='text' name='tekiyo9' style="width:200px" value="{{$mitumori->tekiyo9}}"></td>
                <td><input type='text' name='tanka9' onChange='keisan()' style='width:100px' value="{{$mitumori->tanka9}}"/>円</td>
                <td><input type='text' name='suryo9' onChange='keisan()' style='width:50px' value="{{$mitumori->suryo9}}"/></td>
                <td><input type='text' name='kingaku9' style='width:100px' value="{{$mitumori->kingaku9}}"/>円</td>
            </tr>
            <tr>
                <td><input type='text' name='tekiyo10' style="width:200px" value="{{$mitumori->tekiyo10}}"></td>
                <td><input type='text' name='tanka10' onChange='keisan()' style='width:100px' value="{{$mitumori->tanka10}}"/>円</td>
                <td><input type='text' name='suryo10' onChange='keisan()' style='width:50px' value="{{$mitumori->suryo10}}"/></td>
                <td><input type='text' name='kingaku10' style='width:100px' value="{{$mitumori->kingaku10}}"/>円</td>
            </tr>
            <script type='text/javascript'>
                function keisan() {
                    var tanka = document.form.tanka1.value;
                    var suryo = document.form.suryo1.value;

                    if (tanka == "" || suryo == "") {

                    } else
                    if (isFinite(suryo)) {
                        var price = tanka * suryo;
                        document.form.kingaku1.value = price;
                    } else {
                        document.form.kingaku1.value = tanka;
                    }

                    var tanka = document.form.tanka2.value;
                    var suryo = document.form.suryo2.value;

                    if (tanka == "" || suryo == "") {

                    } else
                    if (isFinite(suryo)) {
                        var price = tanka * suryo;
                        document.form.kingaku2.value = price;
                    } else {
                        document.form.kingaku2.value = tanka;
                    }

                    var tanka = document.form.tanka3.value;
                    var suryo = document.form.suryo3.value;

                    if (tanka == "" || suryo == "") {

                    } else
                    if (isFinite(suryo)) {
                        var price = tanka * suryo;
                        document.form.kingaku3.value = price;
                    } else {
                        document.form.kingaku3.value = tanka;
                    }

                    var tanka = document.form.tanka4.value;
                    var suryo = document.form.suryo4.value;

                    if (tanka == "" || suryo == "") {

                    } else
                    if (isFinite(suryo)) {
                        var price = tanka * suryo;
                        document.form.kingaku4.value = price;
                    } else {
                        document.form.kingaku4.value = tanka;
                    }

                    var tanka = document.form.tanka5.value;
                    var suryo = document.form.suryo5.value;

                    if (tanka == "" || suryo == "") {

                    } else
                    if (isFinite(suryo)) {
                        var price = tanka * suryo;
                        document.form.kingaku5.value = price;
                    } else {
                        document.form.kingaku5.value = tanka;
                    }

                    var tanka = document.form.tanka6.value;
                    var suryo = document.form.suryo6.value;

                    if (tanka == "" || suryo == "") {

                    } else
                    if (isFinite(suryo)) {
                        var price = tanka * suryo;
                        document.form.kingaku6.value = price;
                    } else {
                        document.form.kingaku6.value = tanka;
                    }

                    var tanka = document.form.tanka7.value;
                    var suryo = document.form.suryo7.value;

                    if (tanka == "" || suryo == "") {

                    } else
                    if (isFinite(suryo)) {
                        var price = tanka * suryo;
                        document.form.kingaku7.value = price;
                    } else {
                        document.form.kingaku7.value = tanka;
                    }

                    var tanka = document.form.tanka8.value;
                    var suryo = document.form.suryo8.value;

                    if (tanka == "" || suryo == "") {

                    } else
                    if (isFinite(suryo)) {
                        var price = tanka * suryo;
                        document.form.kingaku8.value = price;
                    } else {
                        document.form.kingaku8.value = tanka;
                    }

                    var tanka = document.form.tanka9.value;
                    var suryo = document.form.suryo9.value;

                    if (tanka == "" || suryo == "") {

                    } else
                    if (isFinite(suryo)) {
                        var price = tanka * suryo;
                        document.form.kingaku9.value = price;
                    } else {
                        document.form.kingaku9.value = tanka;
                    }

                    var tanka = document.form.tanka10.value;
                    var suryo = document.form.suryo10.value;

                    if (tanka == "" || suryo == "") {

                    } else
                    if (isFinite(suryo)) {
                        var price = tanka * suryo;
                        document.form.kingaku10.value = price;
                    } else {
                        document.form.kingaku10.value = tanka;
                    }
                }
            </script>
        </table>
        <br>
        <br>
        <input type="hidden" name="id" value="{{$mitumori->id}}">
        <div class="button">
            <input type="button" onclick="history.back()" value="戻る" >
            <input type="submit" value="OK">
        </div>
    </form>
@endsection