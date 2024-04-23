<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Torann\GeoIP\Facades\GeoIP;

class AmbassadorTest extends TestCase
{
    use DatabaseMigrations;

    private $ambassador_be;

    private $ambassador_fr;

    private $admin_be;

    private $belgium;

    private $france;

    private $italy;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
        $this->seed('LeadingTeacherRoleSeeder');
        $this->france = create(\App\Country::class, ['iso' => 'FR']);
        $this->belgium = create(\App\Country::class, ['iso' => 'BE', 'facebook' => 'facebook_url']);

        $this->admin_be = create(\App\User::class, ['country_iso' => $this->belgium->iso, 'lastname' => 'foobar_name_1'])->assignRole('super admin');
        $this->ambassador_be = create(\App\User::class, ['country_iso' => $this->belgium->iso, 'lastname' => 'foobar_name_2'])->assignRole('ambassador');
        $this->ambassador_fr = create(\App\User::class, ['country_iso' => $this->france->iso, 'lastname' => 'foobar_name_3'])->assignRole('ambassador');

    }

    //   Does not feel right not to have all countries
    //    /** @test */
    //    public function ambassadors_page_should_only_display_countries_with_ambassadors(){
    //
    //        $italy = create('App\Country',['iso'=>'foobar']);
    //        create('App\Event',['country_iso' => $italy->iso]);
    //        $this->get('/ambassadors?country_iso=BE')->assertDontSee($italy->iso);
    //
    //    }

    /** @test */
    public function ambassadors_without_bio_and_avatars_should_not_be_displayed(): void
    {

        $ambassador_without_bio = create(\App\User::class, ['bio' => null, 'avatar_path' => null, 'country_iso' => $this->france->iso])->assignRole('ambassador');

        create(\App\Event::class, ['country_iso' => $this->france->iso]);
        $this->get('/community?country_iso=FR')->assertDontSee($ambassador_without_bio->lastname);

        $ambassador_without_bio->bio = 'updated bio';
        $ambassador_without_bio->save();
        $this->get('/community?country_iso=FR')->assertDontSee($ambassador_without_bio->lastname);

        $ambassador_without_bio->avatar_path = 'avatar.jpg';
        $ambassador_without_bio->save();
        $this->get('/community?country_iso=FR')->assertSee($ambassador_without_bio->lastname);

    }

    /** @test */
    public function ambassadors_without_picture_should_not_be_displayed(): void
    {

        $ambassador_without_bio = create(\App\User::class, ['avatar_path' => null, 'country_iso' => $this->france->iso, 'lastname' => 'Lastname that will never appear'])->assignRole('ambassador');
        $italy = create(\App\Country::class, ['iso' => 'foobar']);
        create(\App\Event::class, ['country_iso' => $italy->iso]);
        $this->get('/community?country_iso='.$this->france->iso)->assertDontSee($ambassador_without_bio->lastname);

    }

    /** @test */
    public function ambassadors_with_picture_should_be_displayed(): void
    {

        $ambassador_without_bio = create(\App\User::class, ['avatar_path' => 'something.jpg', 'country_iso' => $this->france->iso])->assignRole('ambassador');
        $this->get('/community?country_iso='.$this->france->iso)->assertSee($ambassador_without_bio->lastname);

    }

    /** @test */
    public function get_ambassadors_for_a_country(): void
    {

        $this->withExceptionHandling();

        $this->get('/community?country_iso=BE')->assertSee($this->ambassador_be->lastname);
        $this->get('/community?country_iso=BE')->assertDontSee($this->ambassador_fr->lastname);
        $this->get('/community?country_iso=BE')->assertDontSee($this->admin_be->lastname);

    }

    /** @test */
    public function display_email_should_be_used_if_present(): void
    {

        $ambassador = create(\App\User::class, ['country_iso' => $this->belgium->iso, 'email_display' => 'foo@bar.com'])->assignRole('ambassador');

        $this->withExceptionHandling();

        $this->get('/community?country_iso=BE')->assertSee($ambassador->email_display);

        $this->get('/community?country_iso=BE')->assertDontSee($ambassador->email);

    }

    /** @test */
    public function signedin_users_should_see_their_community_page(): void
    {

        $this->signIn($this->ambassador_be);

        GeoIP::shouldReceive('getClientIP')
            ->never();

        $this->get('/community')->assertRedirect('/community?country_iso='.$this->ambassador_be->country->iso);

    }

    /** @test */
    public function not_logged_users_should_see_their_country_ambassadors_based_on_geoIP(): void
    {
        GeoIP::shouldReceive('getClientIP')
            ->once()
            ->andReturn('text');
        $this->get('/community');
    }

    /** @test */
    public function ambassador_page_for_a_country_should_display_the_facebook_link(): void
    {

        create(\App\Event::class, ['country_iso' => 'BE', 'status' => 'APPROVED']);

        $this->get('/community?country_iso=BE')->assertSee($this->belgium->facebook);

    }

    /** @test */
    public function info_email_should_be_displayed_in_footer_only_on_community_page(): void
    {

        $this->get('/community?country_iso=BE')->assertSee('mailto:info@codeweek.eu');
        $this->get('/ambassadors?country_iso=BE')->assertSee('mailto:info@codeweek.eu');

    }
}
