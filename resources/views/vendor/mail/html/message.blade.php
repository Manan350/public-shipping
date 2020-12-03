@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => 'http://publicshipping.websquareit.com/demo/public/'])
<div>
<h2 style="font-family:Times new romans"><center>Public Shipping</center></h2>
</div>
@endcomponent
@endslot

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
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} Public Shipping. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
