<div>

    <div class="moderate-event">
        <!-- HELLO !!! -->

        <div class="actions" @if($refresh) style="display: block;" @else style="display: none;" @endif>
            <strong>Moderation:</strong>
            <button wire:click="approve" class="codeweek-action-button green">Approve</button>
            <button wire:click="toggleModal" class="codeweek-action-button">Reject</button>
            <button wire:click="toggleDeleteModal" class="codeweek-action-button red">Delete</button>
        </div>

        <div class="h-8 w-full grid grid-cols-3 gap-4 items-center" @if(!$refresh) style="display: grid;"
             @else style="display: none;" @endif>
            <div class="flex-none">Pending Activities: <a href="/pending">{{ $pendingCounter }}</a></div>
            <div class="flex justify-center">
                <div>{{ __('event.current_status') }}: <strong>{{ __('myevents.status.' . $event['status']) }}</strong>
{{--                    @if(!is_null($event->latestModeration))--}}
{{--                        <span>{{ $event->latestModeration->message }}</span>--}}
{{--                    @endif--}}

                </div>
            </div>
            <div class="actions flex justify-items-end justify-end gap-2">
                <button wire:click="approve" class="codeweek-action-button green">Approve</button>
                <button wire:click="toggleModal" class="codeweek-action-button">Reject</button>
                <button wire:click="toggleDeleteModal" class="codeweek-action-button red">Delete</button>
            </div>
        </div>

        <!-- Modal for rejection -->
        @if($showModal)
            <div class="modal-overlay">
                <div class="modal-container">
                    <div class="modal-header">
                        <h3 class="text-2xl font-semibold">Please provide a reason for rejection</h3>
                        <button wire:click="toggleModal" class="close-button">×</button>
                    </div>
                    <div class="modal-body">
                        <p class="text-gray-800 text-lg leading-relaxed">This will help the activity organizer to
                            improve their submission.</p>
                        <select wire:model="rejectionOption" wire:change="prefillRejectionText">
                            <option value="" disabled>Select a rejection reason</option>
                            @foreach($rejectionOptions as $option)
                                <option value="{{$option['text']}}">{{ $option['title'] }}</option>
                            @endforeach
                        </select>
                        <textarea wire:model="rejectionText" class="reason-textarea" rows="4" cols="40"
                                  placeholder="Reason for rejection"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button wire:click="toggleModal" class="cancel-button">Cancel</button>
                        <button wire:click="reject" class="reject-button">Reject</button>
                    </div>
                </div>
            </div>
        @endif

        <!-- Modal for delete confirmation -->
        @if($showDeleteModal)
            <div class="modal-overlay">
                <div class="modal-container">
                    <div class="modal-header">
                        <h3 class="text-2xl font-semibold">Delete Event</h3>
                        <button wire:click="toggleDeleteModal" class="close-button">×</button>
                    </div>
                    <div class="modal-body">
                        <p>This event will be permanently deleted from the website. Are you sure you want to delete this
                            event?</p>
                    </div>
                    <div class="modal-footer">
                        <button wire:click="toggleDeleteModal" class="cancel-button">Cancel</button>
                        <button wire:click="deleteEvent" class="delete-button">Delete</button>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <style>
        /* Add your modal styles here */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            padding: 20px;
            max-width: 80%;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-header h3 {
            margin: 0;
        }

        .close-button {
            border: none;
            background: none;
            font-size: 24px;
            cursor: pointer;
        }

        .modal-body {
            margin-bottom: 20px;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
        }

        .cancel-button {
            border: none;
            background: none;
            color: #333;
            cursor: pointer;
            margin-right: 10px;
        }

        .reject-button {
            border: none;
            background-color: #ff0000;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-button {
            border: none;
            background-color: #ff0000;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</div>