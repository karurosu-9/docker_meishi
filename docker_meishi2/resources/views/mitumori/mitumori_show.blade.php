@extends('layouts/mitumori_check')
<style>
    body {
        text-align: center;
        margin-left: auto;
        margin-right: auto;
        text-align: left;
        width: 1050px;
        font-family: "ＭＳ Ｐ明朝";
    }

    .print-button {
        margin-left: 935px;
    }

    table {
        border-collapse: collapse;
        border: black solid 2px;
        margin-top: 5px;
        padding: 0px;
    }

    th {
        border: black solid 2px;
        background-color: #c0c0c0;
        text-align: center;
        font-size: 15px;
        padding: 0px;
    }

    td {
        border: black solid 1px;
        border-right: black solid 2px;
        padding: 0px;
        text-align: center;
        font-size: 15px;
        white-space: nowrap;
    }

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

    .place-span1 {
        margin-left: 120px;
    }

    .place-span2 {
        margin-left: 110px;
    }

    .place-span3 {
        margin-left: 85px;
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
        margin-top: 18px;
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
@section('content')
    <br>
    <br>
    <br>
    <br>
    <div class="title">御見積書</div>
    <br>
    <div class="group">
            <div class="date">
                {{$mitumori->date}}
            </div>
            <div class="num">
                No. {{$mitumori->num}}
            </div>
        </div>
        <br>
        <br>
        <div class="corp">
            　{{$mitumori->corp}} 　　御中
        </div>
        <br>
        下記の通り御見積申し上げます。<br>
        <br>
        <div class="group2">
            <div class="condition">
                <div class="place">
                    受渡場所<span class="place-span1">{{$my_corp->place}}</span>
                </div>
                <div class="place">
                    取引条件<span class="place-span2">{{$my_corp->conditions}}</span>
                </div>
                <div class="place">
                    見積有効期限<span class="place-span3">{{$my_corp->deadline}}</span>
                </div>
                <br>
            </div>
            <div class="image">
                <image src='/img/アスカプランニング角印.png' width="95px" height="95px">
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
    <script>
        function delete_check() {
            if (key_value == "delete") {
                let msg = confirm('この情報を削除してもよろしいですか?');
                return msg;
            }
        }
    </script>
    <form action="/mitumori/show_branch" method="POST" onsubmit="return delete_check();">
        <table>
            @csrf
            <tr>
                <th width="620px" class="tekiyo">摘要</th>
                <th width="80px" class="suryo">数量</th>
                <th width="80px" class="tanka">単価</th>
                <th width="120px" class="kingaku">金額</th>
                <th width="180px" class="biko">備考</th>
            </tr>
            @for ($i = 0; $i < $form_mitumori; $i++)
            @if($kingaku[$i] == "")
                @continue;
            @endif
                <tr>
                    <td>{{$tekiyo[$i]}}</td>

                    <td>{{$suryo[$i]}}</td>

                    <td>{{number_format((int)$tanka[$i])}}</td>

                    <td>{{number_format((int)$kingaku[$i]) . " -"}}</td>

                    <td style="border:none;">{{$biko[$i]}}</td>
                </tr>
            @endfor
            <div>
                <tr>
                    <td colspan="1" class="total_price">合計</td>
                    <td class="none"></td>
                    <td class="none"></td>
                    <td class="all_total_price">{{"¥" . number_format((int)$total_price) . " -"}}</td>
                </tr>
            </div>
        </table>
        @for ($i = 0; $i <= $form_hosoku; $i++)
            <div class="hosoku">
                @if($hosoku[$i] == "")
                    @break;
                @endif
                {{$hosoku[$i]}}
            </div>
        @endfor
        <div class="no_print">
            <br>
            <br>
            <input type="hidden" name="id" value="{{$mitumori->id}}">
            <div class="button">
                <input type="submit" name="edit" value="編集" onclick="key_value='edit'">
                <input type="submit" name="delete" value="削除" onclick="key_value='delete'">
                <input type="hidden" name="key" value="">
            </div>
        </div>
    </form>
    <br>
@endsection