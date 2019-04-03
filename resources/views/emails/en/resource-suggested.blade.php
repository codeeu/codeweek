@component('mail::message')
Dear editor,


A new resource has been suggested on the Codeweek Website. {{$resourceItem->name}}<br/>
Please log into the administrative area to moderate this entry<br/>

@component('mail::button', ['url' => env('APP_URL') . "/nova"])
    Admin Area
@endcomponent





Thank you,<br/>

The EU Code Week Team




@endcomponent