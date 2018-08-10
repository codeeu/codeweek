<ul id="id_audience">
    @foreach($audiences as $audience)
        <li><label for="id_audience_{{$audience->id}}"><input id="id_audience_{{$audience->id}}" name="audience[]"
                                              type="checkbox"
                                                              {{--onchange="this.form.submit()"--}}
                                              {{ $selection?in_array($audience->id,$selection)?'checked':'':'' }}
                                              value="{{$audience->id}}"
                                            onchange="this.form.submit()"
                >

                {{__('event.audience.'.$audience->name)}}
                </label></li>
    @endforeach

</ul>