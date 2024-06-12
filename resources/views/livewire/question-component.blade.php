<div class="codeweek-question-container" x-data="{ isOpen: @entangle('isOpen') }">
    <div class="expander-always-visible">
        <div class="expansion">
            <button @click="isOpen = !isOpen" class="codeweek-expander-button">
                <div x-text="isOpen ? '-' : '+'"></div>
            </button>
        </div>
        <div class="content">
            <h1>{{ $question['title1'] }}</h1>
        </div>
    </div>
    <div :class="isOpen ? 'expanded' : 'collapsed'" class="container-expansible">
        <div class="expansion">
            <div class="expansion-path"></div>
        </div>
        <div class="content">
            <h2>{{ $question['title2'] }}</h2>
            @foreach ($question['content'] as $content)
                <p>{{ $content }}</p>
            @endforeach

            @if($question['map'])
                <div class="maps">
                    <iframe class="map" src="/map" scrolling="no"></iframe>
                </div>
            @endif

            @if($question['button']['show'])
                <div class="button">
                    <a href="{{ $question['button']['link'] }}" class="codeweek-button">
                        <input type="submit" value="{{ $question['button']['label'] }}">
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
