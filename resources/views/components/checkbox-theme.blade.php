<ul id="id_theme">



    @foreach($themes as $theme)
        <li><label for="id_theme_0"><input id="id_theme_{{$theme->id}}" name="theme[]"
                                           type="checkbox"
                                           value="{{$theme->id}}"
    {{ session('theme')?in_array($theme->id,session('theme'))?'checked':'':'' }}
                                   > {{$theme->name}}</label></li>
    @endforeach


</ul>