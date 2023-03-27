@extends('layouts.mitumori_list')

@section('title', '見積一覧')

@section('content')
    <table cellpadding="2">
        <tr>
            <th>伝票番号</th>
            <th>社名</th>
            <th>日付</th>
            <th></th>
        </tr>
        @foreach ($mitumori as $val)
            <tr>
                <td><a href="/mitumori/mitumori_show?id={{$val->id}}">{{$val->num}}</a></td>
                <td>{{$val->corp}}</td>
                <td>{{$val->date}}</td>
                <form action="/mitumori/print" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$val->id}}">
                    <td><input type="submit" name="print" value="印刷"></td>
                </form>
            </tr>
        @endforeach
    </table>
@endsection

</html>