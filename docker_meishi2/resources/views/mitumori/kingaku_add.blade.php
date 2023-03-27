@extends('layouts.mitumori')
<style>
    .button {
        margin-left: 470px;
    }
</style>
@section('title', '見積入力')

@section('content')
@if($errors->any())
<div class="error">
    <p class="p_error">※入力に問題があります。再入力してください。</p>
    @foreach($errors->all() as $error)
      <p>※{{$error}}</p>
    @endforeach
</div>
@endif
<form action="/mitumori/biko_add" method="POST" name="form">
    @csrf
        会社を選択してください。<br>
        <select name="corp">
            @foreach($cards as $card)
                <option value="{{$card->corp}}">{{$card->corp}}</option>
            @endforeach
        </select>
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
                <td><input type='text' name='tekiyo1' style="width:200px" value="{{old('tekiyo1')}}"></td>
                <td><input type='text' name='tanka1' onChange='keisan()' style='width:100px' value="{{old('tanka1')}}" />円</td>
                <td><input type='text' name='suryo1' onChange='keisan()' style='width:50px' value="{{old('suryo1')}}" /></td>
                <td><input type='text' name='kingaku1' style='width:100px' value="{{old('kingaku1')}}"/>円</td>
            </tr>
            <tr>
                <td><input type='text' name='tekiyo2' style="width:200px" value="{{old('tekiyo2')}}"></td>
                <td><input type='text' name='tanka2' onChange='keisan()' style='width:100px' value="{{old('tanka2')}}"/>円</td>
                <td><input type='text' name='suryo2' onChange='keisan()' style='width:50px' value="{{old('suryo2')}}"/></td>
                <td><input type='text' name='kingaku2' style='width:100px' value="{{old('kingaku2')}}"/>円</td>
            </tr>
            <tr>
                <td><input type='text' name='tekiyo3' style="width:200px" value="{{old('tekiyo3')}}"></td>
                <td><input type='text' name='tanka3' onChange='keisan()' style='width:100px' value="{{old('tanka3')}}"/>円</td>
                <td><input type='text' name='suryo3' onChange='keisan()' style='width:50px' value="{{old('suryo3')}}"/></td>
                <td><input type='text' name='kingaku3' style='width:100px' value="{{old('kingaku3')}}"/>円</td>
            </tr>
            <tr>
                <td><input type='text' name='tekiyo4' style="width:200px" value="{{old('tekiyo4')}}"></td>
                <td><input type='text' name='tanka4' onChange='keisan()' style='width:100px' value="{{old('tanka4')}}"/>円</td>
                <td><input type='text' name='suryo4' onChange='keisan()' style='width:50px' value="{{old('suryo4')}}"/></td>
                <td><input type='text' name='kingaku4' style='width:100px' value="{{old('kingaku4')}}"/>円</td>
            </tr>
            <tr>
                <td><input type='text' name='tekiyo5' style="width:200px" value="{{old('tekiyo5')}}"></td>
                <td><input type='text' name='tanka5' onChange='keisan()' style='width:100px' value="{{old('tanka5')}}"/>円</td>
                <td><input type='text' name='suryo5' onChange='keisan()' style='width:50px' value="{{old('suryo5')}}"/></td>
                <td><input type='text' name='kingaku5' style='width:100px' value="{{old('kingaku5')}}"/>円</td>
            </tr>
            <tr>
                <td><input type='text' name='tekiyo6' style="width:200px" value="{{old('tekiyo6')}}"></td>
                <td><input type='text' name='tanka6' onChange='keisan()' style='width:100px' value="{{old('tanka6')}}"/>円</td>
                <td><input type='text' name='suryo6' onChange='keisan()' style='width:50px' value="{{old('suryo6')}}"/></td>
                <td><input type='text' name='kingaku6' style='width:100px' value="{{old('kingaku6')}}"/>円</td>
            </tr>
            <tr>
                <td><input type='text' name='tekiyo7' style="width:200px" value="{{old('tekiyo7')}}"></td>
                <td><input type='text' name='tanka7' onChange='keisan()' style='width:100px' value="{{old('tanka7')}}"/>円</td>
                <td><input type='text' name='suryo7' onChange='keisan()' style='width:50px' value="{{old('suryo7')}}"/></td>
                <td><input type='text' name='kingaku7' style='width:100px' value="{{old('kingaku7')}}"/>円</td>
            </tr>
            <tr>
                <td><input type='text' name='tekiyo8' style="width:200px" value="{{old('tekiyo8')}}"></td>
                <td><input type='text' name='tanka8' onChange='keisan()' style='width:100px' value="{{old('tanka8')}}"/>円</td>
                <td><input type='text' name='suryo8' onChange='keisan()' style='width:50px' value="{{old('suryo8')}}"/></td>
                <td><input type='text' name='kingaku8' style='width:100px' value="{{old('kingaku8')}}"/>円</td>
            </tr>
            <tr>
                <td><input type='text' name='tekiyo9' style="width:200px" value="{{old('tekiyo9')}}"></td>
                <td><input type='text' name='tanka9' onChange='keisan()' style='width:100px' value="{{old('tanka9')}}"/>円</td>
                <td><input type='text' name='suryo9' onChange='keisan()' style='width:50px' value="{{old('suryo9')}}"/></td>
                <td><input type='text' name='kingaku9' style='width:100px' value="{{old('kingaku9')}}"/>円</td>
            </tr>
            <tr>
                <td><input type='text' name='tekiyo10' style="width:200px" value="{{old('tekiyo10')}}"></td>
                <td><input type='text' name='tanka10' onChange='keisan()' style='width:100px' value="{{old('tanka10')}}"/>円</td>
                <td><input type='text' name='suryo10' onChange='keisan()' style='width:50px' value="{{old('suryo10')}}"/></td>
                <td><input type='text' name='kingaku10' style='width:100px' value="{{old('kingaku10')}}"/>円</td>
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

        <div class="button">
            <input type="submit" value="OK">
        </div>
    </form>
@endsection