<?php

namespace Tests\Browser;


use App;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {


        $this->browse(function (Browser $browser) {

            $browser->visit('/ambassadors?country_iso=FR')

                ->visit('/setlocale?locale=al')
                ->assertSee('Ambasadorët')
                ->visit('/setlocale?locale=ba')
                ->assertSee('Ambasadori')
                ->visit('/setlocale?locale=bg')
                ->assertSee('Посланици')
                ->visit('/setlocale?locale=cs')
                ->assertSee('Ambasadoři')
                ->visit('/setlocale?locale=da')
                ->assertSee('Ambassadører')
                ->visit('/setlocale?locale=de')
                ->assertSee('Botschafter*innen')
                ->visit('/setlocale?locale=el')
                ->assertSee('Πρέσβεις')
                ->visit('/setlocale?locale=en')
                ->assertSee('Ambassadors')
                ->visit('/setlocale?locale=es')
                ->assertSee('Embajadores')
                ->visit('/setlocale?locale=et')
                ->assertSee('Saadikud')
                ->visit('/setlocale?locale=fi')
                ->assertSee('Lähettiläät')
                ->visit('/setlocale?locale=fr')
                ->assertSee('Consultez la')
                ->visit('/setlocale?locale=hr')
                ->assertSee('Ambasadori')
                ->visit('/setlocale?locale=hu')
                ->assertSee('Nagykövetek')
                ->visit('/setlocale?locale=it')
                ->assertSee('Ambasciatori')
                ->visit('/setlocale?locale=lt')
                ->assertSee('Ambasadoriai')
                ->visit('/setlocale?locale=lv')
                ->assertSee('Vēstnieki')
                ->visit('/setlocale?locale=me')
                ->assertSee('Ambasadori')
                ->visit('/setlocale?locale=mk')
                ->assertSee('Амбасадори')
                ->visit('/setlocale?locale=nl')
                ->assertSee('Ambassadeurs')
                ->visit('/setlocale?locale=pl')
                ->assertSee('Ambasadorzy')
                ->visit('/setlocale?locale=pt')
                ->assertSee('Embaixadores')
                ->visit('/setlocale?locale=ro')
                ->assertSee('Ambasadori')
                ->visit('/setlocale?locale=rs')
                ->assertSee('Ambasadori')
                ->visit('/setlocale?locale=sk')
                ->assertSee('Veľvyslanci')
                ->visit('/setlocale?locale=sl')
                ->assertSee('Ambasadorji')
                ->visit('/setlocale?locale=sv')
                ->assertSee('Ambassadörer');







        });
    }
}
