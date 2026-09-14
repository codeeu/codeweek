@push('extra-css')
    @livewireStyles
@endpush

{{-- Do not push @livewireScripts here. Layouts (new_base/base) already include them.
     Loading Livewire twice breaks wire:model updates (filters appear to do nothing). --}}
