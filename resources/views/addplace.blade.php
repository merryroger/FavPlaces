@extends('appender')

@section('title', 'Создание новой записи')

@section('hdr')
    @include('formheader', ['text' => 'Моё новое место'])
@endsection

@section('form')
    <form action="/places/create" method="post">
        @csrf
        <input type="text" name="name" class="ff" value="" placeholder="Название места" tabindex="1" required autofocus /><br />
        <select name="placetype_id" size="1" class="ff" tabindex="2">
            @foreach($types->all() as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <div class="fmctrls">
            <button type="button" class="cancel" tabindex="3" onclick="document.location.href='/'; return false;">Отменить</button>
            <button type="submit" class="do" tabindex="4">Создать</button>
        </div>
    </form>
@endsection
