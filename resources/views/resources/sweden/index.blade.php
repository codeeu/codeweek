@extends('layout.base')

@section('content')
	<section>
		<div class="container">              @include ('resources.title')
<h2>Apple</h2>
<ul>
	<li><a href="https://www.apple.com/se/everyone-can-code/">Alla kan koda</a>Tekniken har ett språk. Det kallas kod. Vi på Apple anser att det är otroligt viktigt att kunna koda. När du lär dig koda lär du dig också att lösa problem och samarbeta på kreativa sätt. Och det hjälper dig att bygga appar som förverkligar dina idéer. Vi tycker att alla ska ha möjlighet att skapa något som kan förändra världen. Därför har Apple utformat ett kursprogram som ger alla möjligheten att lära sig koda, skriva kod och lära ut kod.</li>
	<li><a href="https://www.apple.com/swift/playgrounds/">Swift Playgrounds</a> är en revolutionerande app till iPad som lär dig Swift på ett interaktivt och roligt sätt. <a href="https://apple.ent.box.com/s/ma3mycpc7wrqh25izbkm9qut6ktvtdqp">Guide</a></li>
</ul>

<h2>Barnprogrammering på svenska</h2>
.SE:s barnprogrammeringskurs ”Kom igång med Scratch” på YouTube. I sju delar får du lära dig grunderna i Scratch och göra ett eget spel. Du hittar alla klippen i den inbäddade spellistan här.
<iframe width="560" height="315" src="//www.youtube.com/embed/kf0iuhwb4bw?list=PLtDs7N_g_eibjbJczlVswZ6Dc2tpN7qbm" frameborder="0" allowfullscreen></iframe>


<h2>Barnhack!</h2>
<p>– kom igång med programmering</p>
<img src="{{asset('docs/sweden/barnhack.jpg')}}" alt="Barnhack">

<p>Det här är en Internetguide från .SE för dig som vill genomföra egna programmeringskurser. Eller laborera tillsammans hemma.
Läs eller ladda hem här.
<a href="https://www.iis.se/lar-dig-mer/guider/barnhack/">https://www.iis.se/lar-dig-mer/guider/barnhack/</a>
</p>

<h2>XL-material som hör till guiden</h2>
<p>Till guiden finns ett kursmaterial med utförliga steg-för-steg-instruktioner: <strong>Kom igång med Scratch del 1</strong>. Den är till för dig som är en nyfiken nybörjare när det gäller programmering och Scratch. Dokumentet är även en bra start om vill anordna ett Barnhack.
<a href="https://www.iis.se/docs/Barnhack-del1.pdf">https://www.iis.se/docs/Barnhack-del1.pdf</a></p>

<h2>Code Avengers</h2>
<ul>
	<li><a href="http://www.codeavengers.com/javascript/17?l=sv">Lär dig att bygga ett spel med Code Avengers</a> I den här 40 minuter långa introduktionen använder du JavaScript för att bygga ett spel som du kan dela med dina vänner.</li>
	<li><a href="http://www.codeavengers.com/javascript/9?l=sv">JavaScript</a> Denna tutorial lär dig att göra en JavaScript quiz i 5 korta lektioner.</li>
</ul>


		</div></section>
@endsection