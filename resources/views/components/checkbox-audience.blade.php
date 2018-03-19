<ul id="id_audience">
    @foreach($audiences as $audience)
        <li><label for="id_audience_0"><input id="id_audience_{{$audience->id}}" name="audience[]"
                                              type="checkbox"
                                              {{ session('audience')?in_array($audience->id,session('audience'))?'checked':'':'' }}
                                              value="{{$audience->id}}"> {{$audience->name}}</label></li>
    @endforeach

</ul>