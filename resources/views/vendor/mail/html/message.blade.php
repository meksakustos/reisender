@component('mail::layout')
{{-- Header --}}
{{--@slot('header')--}}
{{--@component('mail::header', ['url' => config('app.url')])--}}
{{--    <img src="https://pixabay.com/vectors/icon-summer-beach-sunset-5577198/">--}}
{{--@endcomponent--}}
{{--@endslot--}}

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
{{--@slot('footer')--}}
{{--@component('mail::footer')--}}
{{--© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')--}}
{{--@endcomponent--}}
{{--@endslot--}}
@endcomponent
