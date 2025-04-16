@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
{{-- # @lang('こんにちは！') --}}

@foreach ($introLines as $index => $line)
    @if ($index === 0)
        {{ $line }} 様,
    @endif
@endforeach

@endif
@endif

{{-- Intro Lines --}}

<p>ご利用いただき、ありがとうございます。 <br> 下記ボタンをクリックしてパスワードを再設定してください。</p>
{{-- Action Button --}}
@isset($actionText)
<?php
switch ($level) {
    case 'success':
    case 'error':
        $color = $level;
        break;
    default:
        $color = 'primary';
}
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
パスワード再設定
@endcomponent
@endisset

<p>※もし心当たりがない場合は、お手数ですが本メッセージは破棄してください。<br>
    よろしくお願いいたします。</p>
{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)

@endisset
@endcomponent
