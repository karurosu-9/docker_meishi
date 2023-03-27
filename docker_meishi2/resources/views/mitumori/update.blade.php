<?php var_dump($_POST);exit;?>
@extends('layouts.database')

@section('content')
    <script>
        alert('見積内容を更新しました。');
        location.href="/hello/mitumori_list";
    </script>
@endsection