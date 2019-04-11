@component('mail::message')
Dear editor,


A new resource has been suggested on the Codeweek Website. <br/>
<ul>
    <li>{{$resourceItem->name}}</li>
    <li>{{$resourceItem->source}}</li>
    <li>{{$resourceItem->description}}</li>
</ul>


Please log into the administrative area to complete this entry<br/>

@component('mail::button', ['url' => env('APP_URL') . "/nova/resources/resource-items/{$resourceItem->id}"])
    Admin Area
@endcomponent





Thank you,<br/>

The EU Code Week Team




@endcomponent