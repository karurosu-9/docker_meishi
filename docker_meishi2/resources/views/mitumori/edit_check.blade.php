@extends('layouts/mitumori')
<style>
    .button {
        margin-left: 455px;
    }
</style>
@section('title', '編集確認')

@section('content')
<div class="corp">
    　{{$mitumori->corp}} 　　御中
</div>
<form action="/mitumori/edit_check_confirm" method="POST" onsubmit="return mitumoriCheck()">
@csrf
    <div class="group">
        <div class="msg">※日付を選択してください</div>
        <div class="date">

            <select name="year">
                @for($i=2021; $i<=$year; $i++) 
                    @if ($i==$year) 
                        <option value="{{$i}}" selected>{{$i}}</option>
                    @else
                        <option value="{{$i}}">{{$i}}</option>
                    @endif
                @endfor
            </select> 年
            <select name="month">
                @for ($i = 1; $i <= 12; $i++) 
                    @if ($i==$month) 
                        <option value="{{$i}}" selected>{{$i}}</option>
                    @else
                        <option value="{{$i}}">{{$i}}</option>
                    @endif
                @endfor
            </select> 月
            <select name="date">
                @for ($i = 1; $i <= 31; $i++) 
                    @if ($i==$date) 
                        <option value="{{$i}}" selected>{{$i}}</option>
                    @else
                        <option value="{{$i}}">{{$i}}</option>
                    @endif
                @endfor
            </select> 日
        </div>
    </div>
    <br>
    <br>
    <table cellpadding="2">
        <tr>
            <th width="500px">摘要</th>
            <th>数量</th>
            <th>単価</th>
            <th>金額</th>
            <th width="700px">備考</th>
        </tr>
        @for($i=0; $i<$form_mitumori; $i++) 
            @if($kingaku[$i]=="" ) 
                @break 
            @endif 
        <tr>
            <td>{{$tekiyo[$i]}}</td>

            <td>{{$suryo[$i]}}</td>

            <td>
               {{number_format((int)$tanka[$i])}}
            </td>

            <td>
                {{number_format((int)$kingaku[$i])}}
            </td>
            
            <td style="border:none;">{{$biko[$i]}}</td>
        </tr>
        @endfor
        <tr>
            <th>合計金額</th>
            <td></td>
            <td></td>
            <td></td>
            <td>{{number_format((int)$all_total_price)}}</td>
        </tr>
    </table>
    <div class="hosoku">
        @for($i=0; $i<$form_hosoku; $i++) 
            @if($hosoku=="" ) 
                @break 
            @endif 
            {{$hosoku[$i]}} 
        @endfor 
    </div>
            <br>
            <br>
            @for ($i = 1; $i <= $form_mitumori; $i++) 
                <input type="hidden" name="tekiyo{{$i}}" value="{{$_POST['tekiyo' . $i]}}">
                <input type="hidden" name="suryo{{$i}}" value="{{$_POST['suryo' . $i]}}">
                <input type="hidden" name="tanka{{$i}}" value="{{$_POST['tanka' . $i]}}">
                <input type="hidden" name="kingaku{{$i}}" value="{{$_POST['kingaku' . $i]}}">
                <input type="hidden" name="biko{{$i}}" value="{{$_POST['biko' . $i]}}">
            @endfor
            @for ($i = 1; $i <= $form_hosoku; $i++) 
                    <input type="hidden" name="hosoku{{$i}}" value="{{$_POST['hosoku' . $i]}}">
            @endfor
                    <input type="hidden" name="id" value="{{$mitumori->id}}">
                    <input type="hidden" name="total_price" value="{{$all_total_price}}">
                    <div class="button">
                        <input type="button" onclick="history.back()" value="BACK">
                        <input type="submit" value="OK">
                    </div>
</form>
@endsection