@extends('layout.base')

@section('content')
    <section>
        <div class="container">              @include ('resources.title')

  <ul>
   	<li><a href="http://www.codecademy.com/pt">Code Academy</a>: HTML, CSS, Javascript, jQuery, Ruby, Phython, PHP, APIs</li>
   	<li><a href="https://webmaker.org/pt">Mozilla Webmaker</a>: HTML, CSS e outros conceitos introdutórios</li>
   	<li><a href="https://developer.mozilla.org/pt-PT">Mozilla Developement Network</a>: HTML, CSS, Javascript</li>
  </ul>
  
  <h2>Code Avengers</h2>
  <ul>
    <li><a href="http://www.codeavengers.com/javascript/17?l=pt">Aprenda a criar um jogo com o Code Avengers!</a> Neste introdução de 30 minutos, voce vai usar JavaScript para construir um jogo que você pode compartir com seus amigos.</li>
    <li><a href="http://www.codeavengers.com/javascript/9?l=pt">JavaScript Hora do Tutorial do Código</a> O tutorial ensina você a fazer o jogo de perguntas de JavaScript em 5 pequenas lissões.</li>
    <li>
      <a href="https://www.apple.com/swift/playgrounds/" target="_blank">Swift Playgrounds</a>:
        Learn to code in a playful way! Solve puzzles and the same time get acquainted with Swift, a powerful programming language created by Apple and used by the pros to build today’s most popular apps. The
        <a href="https://apple.ent.box.com/s/ma3mycpc7wrqh25izbkm9qut6ktvtdqp">Facilitator’s Guide</a> with instructions of how to design activities is available in multiple languages and has been designed especially for Code Week.
    </li>
  </ul>


        </div></section>
@endsection