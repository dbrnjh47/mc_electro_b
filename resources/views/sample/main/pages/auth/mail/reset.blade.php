@extends('sample.main.mail.layout', ['title' => $title])

@php
    $url = route('restore.new.password', ['user_id' => $user->id, 'token' => $token]);
@endphp


@section('content')
    <p class="darkmode_color"
        style="color: #181B22; text-align: center; font-size: 18px; font-style: normal; font-weight: 600; line-height: normal;">
        {{$title}}</p>

    <p class="darkmode_color"
        style="margin-top: 20px; color: #9D948A; text-align: center;font-size: 16px; font-style: normal; font-weight: 400; line-height: 150%;">
        Здравствуйте, {{$user->name}}!<br>

        Для сброса пароля, пожалуйста, перейдите по ссылке: <a href="{{$url}}" style="color: #de6b81;display: block;display: contents;">{{$url}}</a><br>
        Если вы не запрашивали ссылку для сброса пароля, проигнорируйте это сообщение.<br>
    </p>

    <a href="{{$url}}" class="darkmode_button"
        style="text-decoration: none; color: #FFF; text-align: center;font-size: 16px;font-style: normal;font-weight: 400;line-height: normal;padding-top: 12px;padding-bottom: 12px;max-width: 286px;display: block;margin: 0 auto;margin-top: 25px;margin-bottom: 25px;border-radius: 8px;background: #DE002B;cursor: pointer;transition: all .5s;">Сброс пароля</a>
@endsection
