@extends('layout.base')

@section('content')
    <section>
        <div class="container">              @include ('resources.title')

  <h2>Code Avengers</h2>
  <ul>
  	<li><a href="http://www.codeavengers.com/javascript/9?l=sr">JavaScript туториал</a> У овом туториалу научићете како да на JavaScript-у направите квиз у 5 кратких лекција.</li>
    <li><a href="http://www.academy-of-code.com/sr">Academy Of Code на српском језику</a> Academy Of Code на српском језику тренутно нуди курсеве HTML-а и MySQL-а, док су остали у поступку превођења.</li>
        <ul>
          <li><a href="http://www.academy-of-code.com/sr/getstarted/html/lesson/1/step/1">HTML курс</a> У оквиру курса, кроз 8 лекција можете стећи основна знања из HTML-a.</li>
          <li><a href="http://www.academy-of-code.com/sr/getstarted/mysql/lesson/1/step/1">MySQL курс</a> У оквиру курса, кроз 7 лекција можете стећи основна знања из MySQL-a.</li>
        </ul>
  </ul>

        </div></section>
@endsection