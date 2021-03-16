@if(!$approved)
    <div class="flex space-x-1 justify-around">
        <button wire:click="approve({{ $id }})" class="p-1 text-green-600 hover:bg-green-600 hover:text-white rounded">
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24" fill="currentColor">
                <path d="M0 0h24v24H0V0z" fill="none"/>
                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
            </svg>
        </button>

        <button onclick="confirm('Are you sure you want to reject this user from the leading teachers group?') || event.stopImmediatePropagation()" wire:click="delete({{ $id }})" class="p-1 text-red-600 hover:bg-red-600 hover:text-white rounded">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="24" viewBox="0 0 24 24" width="24">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8 0-1.85.63-3.55 1.69-4.9L16.9 18.31C15.55 19.37 13.85 20 12 20zm6.31-3.1L7.1 5.69C8.45 4.63 10.15 4 12 4c4.42 0 8 3.58 8 8 0 1.85-.63 3.55-1.69 4.9z"/>
            </svg>
        </button>
    </div>
@else
    <div class="flex space-x-1 justify-around">
        <button onclick="confirm('Are you sure you want to remove this user from the leading teachers group?') || event.stopImmediatePropagation()" wire:click="delete({{ $id }})" class="p-1 text-red-600 hover:bg-red-600 hover:text-white rounded">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                      clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
@endif