<?php
namespace App\Livewire;
use Livewire\Component;
use App\Podcast;
class SearchContentComponent extends Component
{
    public $searchQuery = '';
    protected $queryString = [
        'searchQuery' => ['except' => ''],
    ];
    public function render()
    {
        $results = collect();  // Initialize an empty collection
        
        if ($this->searchQuery) {
            $results = Podcast::active()
                ->where('title', 'like', '%' . $this->searchQuery . '%')
                ->get();  // get() returns a collection
        }
        return view('livewire.search-content-component', [
            'results' => $results,
        ]);
    }
}