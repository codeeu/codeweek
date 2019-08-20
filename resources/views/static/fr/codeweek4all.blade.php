@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>D&eacute;fi Code Week 4 All</h1><span></span></div>

                    <hr>

                    <p>Le d&eacute;fi Code Week 4 All vous encourage &agrave; lier vos activit&eacute;s &agrave; celles organis&eacute;es par des amis, des coll&egrave;gues et des connaissances pour obtenir ensemble le certificat d&rsquo;excellence Code Week.</p>


                    <simple-question :visible="true">
                        <template slot="title">De quoi s&rsquo;agit-il?</template>
                        <template slot="content">
                            <p>En plus de soumettre votre activit&eacute; &agrave; la carte de la Semaine europ&eacute;enne du code, vous pouvez inciter des personnes de votre r&eacute;seau &agrave; en faire autant. Si vous et votre alliance atteignez l&rsquo;un des seuils suivants, chacun obtiendra le certificat d&rsquo;excellence Code Week!</p>
                            <p>Crit&egrave;res pour d&eacute;crocher le Certificat d&rsquo;excellence:</p>
                            <ul>
                                <li><strong>500 &eacute;tudiants participants</strong></li>et/ou<li><strong>10 activit&eacute;s li&eacute;es</strong></li>et/ou<li><strong>3 pays impliqu&eacute;s</strong></li>
                            </ul>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Comment participer?</template>
                        <template slot="content">
                            <ol>
                                <li>Rendez-vous sur la page <a href="/add">Ajouter une activit&eacute;</a> et renseignez les d&eacute;tails requis de votre activit&eacute; de codage.</li>
                            </ol><i>Si vous &ecirc;tre le premier repr&eacute;sentant de votre alliance:</i><ol start="2">
                                <li>Cliquez sur Soumettre</li>
                                <li>Une fois votre activit&eacute; accept&eacute;e, vous recevrez un email de confirmation avec votre code unique Code Week 4 All.</li>
                                <li>Copiez le code et partagez-le avec vos coll&egrave;gues et les autres membres de votre r&eacute;seau qui organisent &eacute;galement une activit&eacute; de codage. Faites passer le mot pour encourager les autres &agrave; participer!</li>
                                <li>&Agrave; la fin de la campagne, tous les organisateurs d&rsquo;activit&eacute;s seront invit&eacute;s &agrave; indiquer le nombre de participants qu&rsquo;ils ont r&eacute;ussi &agrave; f&eacute;d&eacute;rer. Si vous r&eacute;ussissez &agrave; atteindre le seuil, vous et les coll&egrave;gues de votre r&eacute;seau obtiendrez le Certificat d&rsquo;excellence!</li>
                            </ol><i>Si vous rejoignez une alliance existante:</i><ol start="2">
                                <li>Collez le code que vous avez re&ccedil;u de l&rsquo;initiateur, le premier &agrave; avoir cr&eacute;&eacute; l&rsquo;alliance, dans la cellule de champ CODE CODE WEEK 4 ALL.</li>
                                <li>Cliquez sur Soumettre.</li>
                                <li>Faites passer le mot (et le code!) pour que davantage d&rsquo;organisateurs rejoignent votre alliance</li>
                                <li>&Agrave; la fin de la campagne, tous les organisateurs d&rsquo;activit&eacute;s seront invit&eacute;s &agrave; indiquer le nombre de participants qu&rsquo;ils ont r&eacute;ussi &agrave; f&eacute;d&eacute;rer. Si vous r&eacute;ussissez &agrave; atteindre le seuil, vous et les coll&egrave;gues de votre r&eacute;seau obtiendrez le Certificat d&rsquo;excellence!</li>

                            </ol>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Pourquoi rejoindre le d&eacute;fi?</template>
                        <template slot="content">
                            <ul>
                                <li>Pour diffuser le message sur l&rsquo;importance du codage.</li>
                                <li>Pour qu&rsquo;un grand nombre d&rsquo;&eacute;tudiants s&rsquo;implique.</li>
                                <li>Pour &eacute;tablir des liens avec des organisations et/ou des &eacute;coles de votre communaut&eacute; ou &agrave; l&rsquo;international.</li>
                                <li>Pour trouver un soutien aupr&egrave;s d&rsquo;autres organisateurs et enseignants.</li>
                                <li>Pour obtenir un <strong>Certificat d&rsquo;excellence.</strong></li>
                            </ul>
                        </template>
                    </simple-question>


                </div>
            </div>
        </div>

    </section>@endsection @section("extra-css")<style> .tab{ position: relative; margin-bottom: 1px; width: 100%; color: #232323; overflow: hidden; } .answer { padding: 20px; background-color: #f1f1f1; } .question{ position: relative; display: block; width: 100%; padding: 0 0 0 1em; background: #2980b9; font-weight: bold; line-height: 3; cursor: pointer; color: #fff; text-align: center; font-size: 2rem; } .chevron{ display: block; margin-top: -23px; padding: 10px; } ul, ol{ margin-left: 1em; } </style>@endsection