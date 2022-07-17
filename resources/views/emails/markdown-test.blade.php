@component('mail::message')
# Introduction

Hello Friendo

@component('mail::button', ['url' => $url,'color'=>'success'])
Click here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
