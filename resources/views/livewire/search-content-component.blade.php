<div>
    <input
        type="text"
        wire:model.debounce.500ms="searchQuery"
        placeholder="Search Podcasts..."
    />
    @if($results->isNotEmpty())  <!-- This will now work since $results is a Collection -->
        <ul>
            @foreach($results as $result)
                <li>{{ $result->title }}</li>
            @endforeach
        </ul>
    @else
        <p>No results found.</p>
    @endif
</div>