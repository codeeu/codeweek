<ul id="id_theme">
    @foreach($themes as $theme)
        <li>
            <label for="id_theme_{{$theme->id}}"><input id="id_theme_{{$theme->id}}" name="theme[]"
                                                        type="checkbox"
                                                        value="{{$theme->id}}"
                                                        onchange="'{{$mode}}' == 'search' ? this.form.submit() : ''"
                        {{ $selection?in_array($theme->id,$selection)?'checked':'':'' }}>
                {{__('event.theme.'.$theme->name)}}
            </label></li>
    @endforeach
</ul>