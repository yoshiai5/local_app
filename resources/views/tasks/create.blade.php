@extends('_layouts.default')

@section('title_prefix')
    タスク登録
@endsection
@section('title', '')

<!-- コンテンツヘッダ -->
@section('content-header')
    <h1>@yield('title_prefix')</h1>
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li>@yield('title_prefix')</li>
    </ol>
@endsection

<!-- メインコンテンツ -->
@section('content-body')
    <!-- コンテンツ1 -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">登録</h3>
        </div>
        <div class="box-body">
            @include('tasks._components.form', [
                'action' => route('tasks.store'),
                'button' => '登録する',
            ])
        </div>
        <div class="box-footer">
            <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-default">タスク一覧へ戻る</a>
        </div>
    </div>
@endsection
