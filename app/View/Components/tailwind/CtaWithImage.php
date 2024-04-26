<?php

namespace App\View\Components\tailwind;

use Illuminate\View\Component;

class CtaWithImage extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $imagePosition,
        public string $title,
        public string $content,

    ) {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tailwind.cta-with-image');
    }
}
