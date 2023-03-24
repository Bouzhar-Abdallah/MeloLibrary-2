<div>
    @foreach ($messages as $index => $messageData)
        <div class="alert alert-{{ $messageData['type'] }} alert-dismissible fade show" role="alert">
            {{ $messageData['message'] }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" wire:click="removeMessage({{ $index }})"></button>
        </div>
    @endforeach

    <script>
        window.addEventListener('newFlashMessage', () => {
            setTimeout(() => {
                let closeButton = document.querySelector('.alert-dismissible .btn-close');
                closeButton && closeButton.click();
            }, 3000);
        });
    </script>
</div>
