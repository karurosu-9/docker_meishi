@extends('layouts.mitumori_check')
<style>
    .title {
        font-size: 25px;
    }

    .group {
        display: flex;
        margin-left: 300px;
    }

    .group2 {
        display: flex;
        margin-top: 10px;
    }


    .group3 {
        display: flex;
    }

    .group4 {
        display: flex;
    }

    .date {
        width: 140px;
        padding: 0px;
        margin-left: 250px;
        border-bottom: black solid 1px;
        text-align: center;
        padding: auto;
        font-size: 16px;
    }

    .num {
        border-bottom: black solid 1px;
        margin-left: 200px;
        font-size: 16px;
    }

    .corp {
        border-bottom: 1px solid black;
        width: 330px;
        padding: auto;
        flex-basis: auto;
        white-space: nowrap;
        font-size: 19px;
        margin-top: -15px;
    }

    .language {
        margin-top: 20px;
    }

    .place {
        border-bottom: 1px solid black;
        width: 300px;
        font-size: 15px;
        margin-bottom: 5px;
    }

    .place-span {
        margin-left: 110px;
    }

    .goukei {
        font-size: 20px;
        font-weight: bold;
        border-bottom: 2px solid black;
        width: 300px;
        margin-top: 25px;
        padding: 0px;
    }

    .price {
        margin-left: 50px;
        font-size: 20px;
    }


    .mycorp {
        position: relative;
        margin-left: 400px;
        margin-top: 13px;
        font-size: 15px;
    }

    .postal {
        margin-right: 10px;
    }

    .corp_name {
        font-size: 17px;
        letter-spacing: 3px;
        margin-top: 3px;
        margin-bottom: 3px;
    }

    .tel {
        margin-right: 20px;
    }

    .image {
        position: absolute;
        margin-left: 800px;
    }

    .total_price {
        border-top: solid 2px black;
        border-right: solid 2px black;
    }

    .none {
        border-top: solid 2px black;
    }

    .all_total_price {
        border-top: solid 2px black;
        border-right: solid 2px black;
    }

    .hosoku {
        font-size: 18px;
    }

    .tekiyo{
        letter-spacing: 120px;
        text-indent: 120px;
    }

    .suryo{
        letter-spacing: 10px;
        text-indent: 10px;
    }

    .tanka{
        letter-spacing: 10px;
        text-indent: 10px;
    }

    .kingaku{
        letter-spacing: 20px;
        text-indent: 20px;
    }

    .biko{
        letter-spacing: 50px;
        text-indent: 50px;
    }

    .total_price{
        letter-spacing: 100px;
        text-indent: 100px;
    }

    .button {
        margin-left: 900px;
    }
    
</style>
@section('titele', '見積確認')

@section('content')
<form action="/mitumori/mitumori_toroku" method="POST" onsubmit="return mitumoriCheck();">
        @csrf
        <div class="group">
            <div class="date">
                {{$date_new}}
            </div>
            <div class="num">
                No. {{$num}}
            </div>
        </div>
        <br>
        <br>
        <div class="corp">
            　{{$_POST['corp']}} 　　御中
        </div>
        <br>
        下記の通り御見積申し上げます。<br>
        <br>
        <div class="group2">
            <div class="condition">
                <div class="place">
                    受渡場所<span class="place-span">{{$my_corp->place}}</span>
                </div>
                <div class="place">
                    取引条件<span class="place-span">{{$my_corp->conditions}}</span>
                </div>
                <div class="place">
                    見積有効期限<span class="place-span">{{$my_corp->deadline}}</span>
                </div>
                <br>
            </div>
            <div class="image">
                <image src='/img/アスカプランニング角印.png' width="100px" height="100px">
            </div>
            <div class="mycorp">
                <div class="group3">
                    <div class="postal">〒{{$postal_new}}</div>
                    <div class="address">
                        {{$my_corp->address}}
                    </div>
                </div>
                <div class="corp_name">
                    {{$my_corp->corp}}
                </div>
                <div class="group4">
                    <div class="tel">
                        {{$tel_new}}
                    </div>
                    <div class="fax">
                        {{$fax_new}}
                    </div>
                </div>
            </div>
        </div>
        <br>
        <table cellpadding="2">
        <tr>
            <th width="500px">摘要</th>
            <th>数量</th>
            <th>単価</th>
            <th>金額</th>
            <th>備考</th>
        </tr>
        @for($i=0; $i<$form_mitumori; $i++) 
        <tr>
            @if($kingaku[$i] == "")
                @break
            @endif
            <td>
                {{$tekiyo[$i]}}
            </td>

            <td>{{$suryo[$i]}}</td>

            <td>
                {{number_format((int)$tanka[$i])}}
            </td>

            <td>
                {{number_format((int)$kingaku[$i])}}
            </td>
            <td style= 'border:none'>

                @if($biko[$i] == "")
                @break
                @else
                {{$biko[$i]}}
                @endif
            </td>
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
            @if($hosoku == "")
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
            <input type="hidden" name="num" value="{{$num}}">
            <input type="hidden" name="date" value="{{$date_new}}">
            <input type="hidden" name="corp" value="{{$_POST['corp']}}">
            <input type="hidden" name="total_price" value="{{$_POST['total_price']}}">
            <div class="button">
                <input type="button" onclick="history.back()" value="BACK">
                <input type="submit" value="OK">
            </div>
</body>
<script>
    function mitumoriCheck() {
        var msg = confirm("この内容で登録してよろしいですか?");
        return msg;
    }
</script>
@endsection