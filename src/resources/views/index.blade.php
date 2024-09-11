@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="content">
        <!-- 支出一覧テーブル　 -->
        <div class="budget-table">
            <h2 class="budget-table__title">支出一覧</h2>
            <table class="budget-table__inner">
                <!-- 1行目：「日付・カテゴリ・金額」 -->
                <tr class="budget-table__row">
                    <th class="budget-table__header">日付</th>
                    <th class="budget-table__header">カテゴリ</th>
                    <th class="budget-table__header">金額</th>
                </tr>
                <!-- 2行目～：「データ」 -->
                <tr class="budget-table__row">
                    <td class="budget-table__item">
                        
                    </td>
                </tr>
                <!-- 更新 -->
                 <!-- <form class="update-form"> -->
                <!-- 削除 -->
                <!-- ページ移動 -->
            </table>
        </div>
            

        
        <!-- 支出追加フォーム -->
        <div class="create-form">
            <h2 class="create-form__title">支出の追加</h2>

            <!-- メッセージ -->
             <div class="create-form__message">
                @if(session('message'))
                    <div class="create-form__message--success">
                        {{ session('message') }}
                    </div>
                @endif
             </div>
            
            <form class="create-form__form" action="/badgets" method="post">
            @csrf
                <div class="create-form__item">
                    <!-- 項目：日付 -->
                    <h3 class="create-form__label">日付：</h3>
                    <input class="create-form__date" type="date" id="date" name="date">
                    <div class="form__error">
                        @error('date')
                        {{ $message }}
                        @enderror
                    </div>

                    <!-- 項目：カテゴリ -->
                    <h3 class="create-form__label">カテゴリ：</h3>
                    <select class="create-form__category-select">
                        @foreach ($categories as $category)
                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                        @endforeach
                    </select>
                    <div class="form__error">
                        @error('category')
                        {{ $message }}
                        @enderror
                    </div>

                    <!-- 項目：金額 -->
                    <h3 class="create-form__label">金額：</h3>
                    <input class="create-form__price" type="text" id="price" name="price">
                </div>
                  <div class="form__error">
                        @error('price')
                        {{ $message }}
                        @enderror
                    </div>

                <div class="create-form__button">
                    <button class="create-form__button--submit" type="submit">追加</button>
                </div>
            </form>
        </div>
    </div>
@endsection