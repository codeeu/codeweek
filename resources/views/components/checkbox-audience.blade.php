<ul id="id_audience">
    @foreach($audiences as $audience)
        <li><label for="id_audience_{{$audience->id}}"><input id="id_audience_{{$audience->id}}" name="audience[]"
                                              type="checkbox"
                                              {{ session('audience')?in_array($audience->id,session('audience'))?'checked':'':'' }}
                                              value="{{$audience->id}}">

                {{__('event.audience.'.$audience->name)}}
                </label></li>
    @endforeach

</ul>