<x-mail::message>
# {{ __('Hello, :name.', ['name' => $employee->user->name]) }}

{{ __('You have been registered in the RH Nada Básico application. Use the details below to access it:') . ' ' . __('Use the details below to access it:') }}


{{ __('Email') }}: {{ $employee->user->email }}<br>
{{ __('Password') }}: {{ $rawPassword }}

<x-mail::button :url="$url">
{{ __('Access') }} RH Nada Básico
</x-mail::button>

{{ __('Thanks') }}!
</x-mail::message>
