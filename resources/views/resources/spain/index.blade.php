@extends('layout.base')

@section('content')
  <section>
    <div class="container">              @include ('resources.title')
<h2>Apple</h2>

<ul>
  <li><a href="https://www.apple.com/es/everyone-can-code/">Programación para todos</a> El lenguaje de la tecnología es la programación. En Apple, creemos que aprender a programar es una habilidad básica. ¿Por qué? Porque te enseña a resolver problemas y a trabajar en equipo de formas creativas. Además te ayuda a diseñar apps capaces de hacer realidad tus ideas. Todos deberíamos tener la oportunidad de crear algo que pueda cambiar el mundo. Por eso, Apple ha desarrollado un programa que permite a cualquier persona aprender y enseñar programación.</li>
  <li>
    <a href="https://www.apple.com/swift/playgrounds/" target="_blank">Swift Playgrounds</a>:
    Learn to code in a playful way, solving puzzles and getting acquainted the same time with Swift, a powerful programming language created by Apple and used by the pros to build today’s most popular apps. Translations in 18 languages have been provided in this link to be used in the national Code Week website pages.
    <a href="https://apple.ent.box.com/s/ma3mycpc7wrqh25izbkm9qut6ktvtdqp">A guide for Swift with hyperlinks leading to tutorials can be found here in this PDF.</a>
  </li>
</ul>
<h2>Comunidad Programamos</h2>
<ul>
  <li>La <a href="https://comunidad.programamos.es/">Comunidad Programamos</a> es una red social de personas que aprenden y enseñan a programar con cientos de recursos organizados por tecnologías.</li>
</ul>

<h2>Recursos para aprender a programar con SCRATCH JR.</h2>
<ul>
  <li><a href="http://programamos.es/probamos-el-nuevo-scratch-jr/">Programamos en infantil y primaria con Scratch Jr.</a> ¿Cómo funciona el nuevo Scratch JR. diseñado para niños de 5 a 7 años?</li>
</ul>

<h2>Recursos para aprender a programar con SCRATCH</h2>
<ul>
  <li><a href="http://programamos.es/materiales/educacion-primaria/">Programamos en primaria con Scratch</a> Recursos preparados para alumnado de primaria (entre 7 y 11 años).</li>
  <li><a href="http://programamos.es/materiales/secundaria/">Programamos en secundaria con Scratch</a> Recursos preparados para alumnado de secundaria (a partir de 12 años).</li>
  <li><a href="http://programamos.es/creando-un-videojuego-paso-a-paso-con-scratch-desde-cero/">Mi primer videojuego</a> Aprende a programar un videojuego paso a paso con Scratch desde cero. </li>
</ul>
<h2>EN CATALÀ</h2>
<ul>
  <li><a href="https://www.dropbox.com/sh/4fjzwno1qjkcekv/AAC6E6Dps8ulzBYF9EpEOaU1a?dl=0">Scratch Cards en català</a> Fitxes per treballar de forma autònoma a partir d'un repte.</li>
  <li><a href="https://www.screenr.com/user/franksabate">Vídeos curts</a> Vídeos de cinc minuts amb solucions a diferents reptes.</li>
  <li><a href="http://crearjocs.blogspot.com">Crear Jocs</a> Vídeotutorials i explicacions per a crear diferents tipus de jocs amb l'Scratch (de 10 a 14 anys).</li>
</ul>

<h2>Recursos para aprender a programar con AppInventor</h2>
<ul>
  <li><a href="http://programamos.es/materiales/bachillerato/">Programamos aplicaciones móviles con AppInventor</a> Recursos preparados para alumnado de bachillerato y formación profesional (a partir de 16 años).</li>
  <li><a href="http://programamos.es/crea-tu-propio-videojuego-para-moviles-android/">Videojuegos para móviles Android</a> Aprende a programar un videojuego para dispositivos móviles Android, paso a paso y desde cero, con App Inventor.</li>
  <li><a href="{{asset('docs/spain/guia-iniciacion-app-inventor.pdf')}}">Guía de Iniciación a App Inventor</a> Estupenda guía visual para docentes, estructurada en sesiones, para enseñar desde cero a crear aplicaciones android divertidas.</li>
</ul>

<h2>Recursos para aprender a programar con SNAP!</h2>
<ul>
  <li><a href="http://programamos.es/materiales/ciclos-formativos/">Programamos aplicaciones con SNAP!</a> Recursos preparados para alumnado de bachillerato y formación profesional (a partir de 16 años).</li>
</ul>

<h2>Code Avengers</h2>
<ul>
  <li><a href="http://www.codeavengers.com/javascript/17?l=es">Aprende a construir juegos con Code Avengers</a> En esta introducción de 40 minutos, utilizarás JavaScript para construir un juego que puedas compartir con tus amigos.</li>
  <li><a href="http://www.codeavengers.com/javascript/9?l=es">JavaScript en Una Hora</a> Este tutorial te enseñará a hacer un juego de preguntas en JavaScript  en 5 breves lecciones.</li>
</ul>

<h2>Web Development</h2>
<ul>
  <li><a href="http://django-marcador.keimlink.de/es/">django-marcador</a> - un tutorial libre de Django</li>
</ul>

<h2>Recursos para aprender a programar con Pixie</h2>
<ul>
  <li><a href="http://pixie.es/">Pixie, aprende a programar</a> Pixie es un sistema de apoyo para enseñar y aprender a programar inspirado en Scratch y basado en Blockly. Pixie ofrece un lenguaje visual para enseñar nuevos conceptos de programación a los alumnos paso a paso a través de retos y juegos diseñados por docentes. El sistema controla el avance de los estudiantes, mide su progreso y evalúa autimáticamente los resultados.</li>
</ul>

    </div></section>
@endsection

