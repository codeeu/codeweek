<?php

namespace App\Http\View\Composers;

use App\GirlsInDigitalButton;
use App\GirlsInDigitalPage;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class GirlsInDigitalComposer
{
    public function compose(View $view): void
    {
        $buttons = collect();
        if (Schema::hasTable('girls_in_digital_buttons')) {
            $buttons = GirlsInDigitalButton::enabled()->ordered()->get();
        }
        $page = Schema::hasTable('girls_in_digital_page') ? GirlsInDigitalPage::config() : null;
        $view->with(compact('buttons', 'page'));
    }
}
