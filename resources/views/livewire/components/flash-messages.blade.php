<div>
    @foreach ($messages as $index => $messageData)
    <div class="fixed inset-x-0 top-0 z-30 flex items-center justify-center mt-4" x-data="{show: true}" x-show="show" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="relative z-40 bg-{{ $messageData['type'] === 'success' ? 'green' : ($messageData['type'] === 'info' ? 'blue' : 'red') }}-500 text-white px-6 py-2 border-0 rounded-lg shadow-lg opacity-95 mb-4 flex items-center justify-between" role="alert">
            <span>{{ $messageData['message'] }}</span>
            <button id="closebutton" type="button" class="ml-4 relative z-50" wire:click="removeMessage({{ $index }})">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    <script>
        window.addEventListener('newFlashMessage', () => {
            const closebutton = document.getElementById('closebutton')
            closebutton.addEventListener("click", console.log('clicked'))
            setTimeout(() => {
                let closeButton = document.getElementById('closebutton');
                if (closeButton) {
                    closeButton.click();
                } else {
                    // Fallback in case the close button is not available
                    @this.call('removeMessage', 0);
                }
            }, 3000);
        });
    </script>
    @endforeach

</div>


<!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
</svg> -->