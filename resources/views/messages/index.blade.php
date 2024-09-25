<!-- resources/views/messages.blade.php -->

<x-app-layout>

<div class="container">
    <h1>Send a Message</h1>

    <form id="messageForm">
        @csrf

        <div class="mb-3">
            <label for="recipient" class="form-label">Recipient</label>
            <select name="recipient_id" id="recipient" class="form-control" required>
                <!-- Populate with list of users -->
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="text" class="form-label">Message</label>
            <textarea name="text" id="text" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Send</button>
    </form>

    <div id="messageStatus" class="mt-3"></div>
</div>




<script>

document.addEventListener('DOMContentLoaded', () => {
    
    window.Echo.private(`messages.{{ auth()->id() }}`)
    .listen('NewMessageReceived', (event) => {
        console.log(`New message from ${event.sent_by}: ${event.message}`);
    });
  
});

    

    // Send the message via AJAX
    document.getElementById('messageForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const form = new FormData(this);

        fetch("{{ route('messages.store') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: form
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('messageStatus').textContent = "Message sent successfully!";
            }
        })
        .catch(error => console.error('Error:', error));
    });
</script>

</x-app-layout>