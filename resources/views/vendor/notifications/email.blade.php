@component('mail::message')
<h1>PersonalWEB</h1>

<p>Olá, agradecemos por se cadastrar em nosso sistema e informamos que o acesso é gratuito mas a funções são limitadas, quando quiser aumentar suas funções podera contratar.</p>

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

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
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Regards'),<br>
    <p>PersonalWEB</p>
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "Caso esteja com problemas no botão \":actionText\", Copie e cole a URL na\n".
    'barra de endereço do Navegador: [:displayableActionUrl](:actionURL)',
    [
        'actionText' => $actionText,
        'actionURL' => $actionUrl,
        'displayableActionUrl' => $displayableActionUrl,
    ]
)
@endslot
@endisset
@endcomponent
