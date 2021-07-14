<div>
    <ul>
        @foreach($actions as $action)
            <li>
                {{$action->title}} - {{$action->type}} - {{$action->comment}} - {{$action->completion_date}} - {{$action->status}}
            </li>
        @endforeach
    </ul>
</div>
