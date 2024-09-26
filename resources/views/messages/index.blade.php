<!-- resources/views/messages.blade.php -->

<x-app-layout>

<style>

body {
  background-color: #3498db;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-rendering: optimizeLegibility;
}

.container {
  margin: 60px auto;
  background: #fff;
  padding: 0;
  border-radius: 7px;

}

.profile-image {
  width: 50px;
  height: 50px;
  border-radius: 40px;
  object-fit: cover; /* ou 'contain', dependendo do efeito desejado */
}

.settings-tray {
  background: #eee;
  padding: 10px 15px;
  border-radius: 7px;
  display: flex;
  align-items: center; /* Alinha verticalmente */
  justify-content: space-between; /* Espaça a imagem e os ícones */
}

.settings-tray .no-gutters {
  padding: 0;
}

.settings-tray--right {
  float: right;
}

.settings-tray--right i {
  margin-top: 10px;
  font-size: 25px;
  color: grey;
  margin-left: 14px;
  transition: 0.3s;
}

.settings-tray--right i:hover {
  color: #74b9ff;
  cursor: pointer;
}

.search-box {
  background: #fafafa;
  padding: 10px 13px;
}

.search-box .input-wrapper {
  background: #fff;
  border-radius: 40px;
}

.search-box .input-wrapper i {
  color: grey;
  margin-left: 7px;
  vertical-align: middle;
}

input {
  border: none;
  border-radius: 30px;
  width: 80%;
}

input::placeholder {
  color: #e3e3e3;
  font-weight: 300;
  margin-left: 20px;
}

input:focus {
  outline: none;
}

.friend-drawer {
  padding: 10px 15px;
  display: flex;
  vertical-align: baseline;
  background: #fff;
  transition: 0.3s ease;
}

.friend-drawer--grey {
  background: #eee;
}

.friend-drawer .text {
  margin-left: 12px;
  width: 70%;
}

.friend-drawer .text h6 {
  margin-top: 6px;
  margin-bottom: 0;
}

.friend-drawer .text p {
  margin: 0;
}

.friend-drawer .time {
  color: grey;
}

.friend-drawer--onhover:hover {
  background: #74b9ff;
  cursor: pointer;
}

.friend-drawer--onhover:hover p,
.friend-drawer--onhover:hover h6,
.friend-drawer--onhover:hover .time {
  color: #fff !important;
}

hr {
  margin: 5px auto;
  width: 60%;
}



.chat-bubble {
  padding: 10px 14px;
  background: #eee;
  margin: 10px 30px;
  border-radius: 9px;
  position: relative;
  animation: fadeIn 1s ease-in;
}

.chat-bubble:after {
  content: '';
  position: absolute;
  top: 50%;
  width: 0;
  height: 0;
  border: 20px solid transparent;
  border-bottom: 0;
  margin-top: -10px;
}

.chat-bubble--left:after {
  left: 0;
  border-right-color: #eee;
  border-left: 0;
  margin-left: -20px;
}

.chat-bubble--right:after {
  right: 0;
  border-left-color: #74b9ff;
  border-right: 0;
  margin-right: -20px;
}

@keyframes fadeIn {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

.offset-md-9 .chat-bubble {
  background: #74b9ff;
  color: #fff;
}

.chat-box-tray {
  background: #eee;
  display: flex;
  align-items: baseline;
  padding: 10px 15px;
  align-items: center;
  margin-top: 19px;
  bottom: 0;
}

.chat-box-tray input {
  margin: 0 10px;
  padding: 6px 2px;
}

.chat-box-tray i {
  color: grey;
  font-size: 30px;
  vertical-align: middle;
}

.chat-box-tray i:last-of-type {
  margin-left: 25px;
}

#chat-container-messages{
    overflow-y: scroll;
    height: 500px;
}

.placeholder-container-messages{
    height: 550px;
}


.notification {

        position: fixed; /* Fixo na tela */
        top: 20px; /* Distância do topo */
        right: 20px; /* Distância da direita */
        z-index: 1000; /* Para ficar acima de outros elementos */
    }



.model-bubble {
	height: 100px;
	width: 100px;
	background-color: #00a7e1;
	display: flex;
	align-items: flex-end;
	justify-content: space-between;
	flex-direction: column;
	border-radius: 50%;
	background-image: url('https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png');
	background-size: cover;
	border: 5px solid #00a7e1;
	box-shadow: 0px 3px 3px rgba(105, 105, 105, 0.15);
    position: fixed; /* Fixo na tela */
    top: 20px; /* Distância do topo */
    right: 200px; /* Distância da direita */
    z-index: 1000; /* Para ficar acima de outros elementos */
    animation: bounce 0.5s; /* Animação de bounce */
}



@keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0); /* Posição original */
            }
            40% {
                transform: translateY(-20px); /* Salto para cima */
            }
            60% {
                transform: translateY(-10px); /* Um pouco menos */
            }
        }


.model-bubble .chat-notification {
	background-color: #e54b17;
	font-size: 16px;
	margin-top: -10px;
	width: 30px;
	height: 30px;
	display: flex;
	align-items: center;
	justify-content: center;
	color: #fff;
	border-radius: 50%;
	font-weight: bold;
	box-shadow: 0px 3px 3px rgba(105, 105, 105, 0.15);
}

.model-bubble .close-chat-bubble {
	background-color: #ffffff;
	font-size: 15px;
	width: 15px;
	height: 15px;
	border: 3px solid #74b9ff;
	display: flex;
	align-items: center;
	justify-content: center;
	color: #74b9ff;
	border-radius: 50%;
	font-weight: bold;
	box-shadow: 0px 3px 3px rgba(105, 105, 105, 0.15);
	margin-right: 5px;

}



 .text-balloon {
    background-color: #74b9ff; /* Cor de fundo azul */
    color: white; /* Cor do texto */
    padding: 5px 10px; /* Espaçamento interno */
    border-radius: 15px; /* Bordas arredondadas */
    position: absolute; /* Permite posicionar o balão de texto */
    top: 10px; /* Distância do topo da bolha */
    left: 100%; /* Alinha à direita da bolha */
    margin-left: 10px; /* Espaço entre a bolha e o balão de texto */
    white-space: nowrap; /* Impede que o texto quebre em várias linhas */
    z-index: 10; /* Garante que fique acima de outros elementos */
}


</style>

<div class="container">
    <div class="row no-gutters">
        <!-- Left column: friends list -->
        <div class="col-md-4 border-right">
            <div class="settings-tray">
                <!-- User profile image -->
                <img class="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/filip.jpg" alt="Profile img">
                <span class="settings-tray--right">
                    <!-- Settings icons -->
                    <i class="fas fa-sync-alt"></i> <!-- replaces "cached" -->
                    <i class="fas fa-envelope"></i> <!-- replaces "message" -->
                    <i class="fas fa-bars"></i>
                </span>
            </div>

            <!-- Search box -->
            <div class="search-box">
                <div class="input-wrapper">
                    <i class="material-icons">search</i>
                    <input placeholder="Search here" type="text">
                </div>
            </div>

            <!-- Form for selecting recipients -->
            <form action="{{ route('messages.show') }}" method="POST" id="recipientForm">
                @csrf
                
                <!-- Iterate over available users -->
                @foreach($users as $user)
                    @if ($user->id !== auth()->id())
                        <div class="friend-drawer friend-drawer--onhover" onclick="selectRecipient('{{ $user->id }}')">
                            <i class="fa fa-user fa-3x"></i>
                            <input type="hidden" name="recipient_id" id="chatRecipientId">
                            <div class="text">
                                <h6>{{ $user->name }}</h6>
                                <p class="text-muted">Hey, you're arrested!</p>
                            </div>
                            <span class="time text-muted small">13:21</span>
                        </div>
                        <hr>
                    @endif
                @endforeach
            </form>
        </div>

        <!-- Right column: chat area -->
        <div class="col-md-8">
            <div id="placeholder">
                <div class="settings-tray">
                    <div style="display: flex; align-items: center;">
                        <i class="fa fa-user fa-3x"></i>
                        <h6 style="margin-left: 10px;">User</h6> <!-- Display user's name -->
                    </div>
                    <span class="settings-tray--right">
                        <!-- Settings icons -->
                        <i class="fas fa-sync-alt"></i> <!-- replaces "cached" -->
                        <i class="fas fa-envelope"></i> <!-- replaces "message" -->
                        <i class="fas fa-bars"></i>
                    </span>
                </div>

                <!-- Messages panel -->
                <div class="chat-panel">
                    <div class="placeholder-container-messages">
                        <!-- Messages will appear here -->
                    </div>      
                </div>
            </div>

            <!-- Chat div -->
            <div id="chat" style="display:none;">
                <div class="settings-tray">
                    <div style="display: flex; align-items: center;">
                        <i class="fa fa-user fa-3x"></i>
                        <h6 style="margin-left: 10px;" id="recipient_name"></h6> <!-- Display recipient's name -->
                    </div>
                    <span class="settings-tray--right">
                        <!-- Settings icons -->
                        <i class="fas fa-sync-alt"></i> <!-- replaces "cached" -->
                        <i class="fas fa-envelope"></i> <!-- replaces "message" -->
                        <i class="fas fa-bars"></i>
                    </span>
                </div>

                <!-- Chat messages panel -->
                <div class="chat-panel">
                    <div id="chat-container-messages">
                        <!-- Chat messages will appear here -->
                    </div>       
                    <form id="messageForm">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="chat-box-tray">
                                    <i class="fas fa-smile"></i> <!-- emoji icon -->
                                    <input type="text" name="text" placeholder="Type your message here...">
                                    <i class="fas fa-microphone"></i> <!-- microphone icon -->
                                    <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                        <i class="fas fa-paper-plane"></i> <!-- send icon -->
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

document.addEventListener('DOMContentLoaded', () => {
    // Get the notification element
    const notification = document.getElementById('notification');

    // Listen for new messages on the private channel
    window.Echo.private(`messages.{{ auth()->id() }}`)
        .listen('NewMessageReceived', (event) => {
            // Create a chat notification for the new message
            createChatNotification(event);

            // Remove the chat notification after 2 seconds
            setTimeout(() => {
                removeChatNotification();
            }, 2000);
        });
});

// Function to create the chat notification
function createChatNotification(event) {
    // Create the container for the notification bubble
    const bubble = document.createElement('div');
    bubble.className = 'model-bubble';

    // Create the notification element
    const notification = document.createElement('div');
    notification.className = 'chat-notification';
    notification.innerText = '1'; // Display a notification count

    // Create the close button for the notification bubble
    const closeButton = document.createElement('div');
    closeButton.className = 'close-chat-bubble';
    closeButton.innerText = 'x';
    closeButton.onclick = () => {
        removeChatNotification(); // Remove the bubble when clicked
    };

    // Create the blue text balloon for the message
    const textBalloon = document.createElement('div');
    textBalloon.className = 'text-balloon';
    textBalloon.innerText = `New message: ${event.message}`; // Display the new message text

    // Append the notification, close button, and text balloon to the bubble
    bubble.appendChild(notification);
    bubble.appendChild(closeButton);
    bubble.appendChild(textBalloon); // Append the text balloon

    // Append the bubble to the document body
    document.body.appendChild(bubble);
}

// Function to remove the chat notification
function removeChatNotification() {
    const bubble = document.querySelector('.model-bubble'); // Select the bubble by class
    if (bubble) {
        bubble.remove(); // Remove the bubble from the DOM if it exists
    }
}

// Function to build messages in the chat container
function buildMessages(data) {
    const chatContainer = document.getElementById('chat-container-messages');
    chatContainer.innerHTML = ''; // Clear the current messages

    if (data.messages.length > 0) {
        const fragment = document.createDocumentFragment(); // Create a document fragment for performance

        data.messages.forEach(message => {
            // Create message elements and append to the fragment
            const rowElement = createMessageElement(message.text, message.sender_id === parseInt(`{{ auth()->id() }}`));
            fragment.appendChild(rowElement);
        });

        chatContainer.appendChild(fragment); // Append the fragment to the chat container
    } else {
        chatContainer.innerHTML = '<p>No messages yet.</p>'; // Display a message if no messages exist
    }
}

// Function to build a single message in the chat container
function buildMessage(data) {
    const chatContainer = document.getElementById('chat-container-messages');
    const rowElement = createMessageElement(data.message.text, true); // Create a message element

    chatContainer.appendChild(rowElement); // Append the message element to the chat container
}

// Helper function to create message elements
function createMessageElement(messageText, isSender) {
    const rowElement = document.createElement('div');
    rowElement.classList.add('row', 'no-gutters'); // Create a row for the message

    const colElement = document.createElement('div');
    const chatBubbleElement = document.createElement('div');

    colElement.classList.add('col-md-3'); // Column styling
    chatBubbleElement.classList.add('chat-bubble');
    chatBubbleElement.innerHTML = messageText; // Set the message text

    // Adjust styling based on whether the message is sent or received
    if (isSender) {
        colElement.classList.add('offset-md-9');
        chatBubbleElement.classList.add('chat-bubble--right'); // Right-aligned for sender
    } else {
        chatBubbleElement.classList.add('chat-bubble--left'); // Left-aligned for receiver
    }

    colElement.appendChild(chatBubbleElement); // Append the chat bubble to the column
    rowElement.appendChild(colElement); // Append the column to the row

    return rowElement; // Return the constructed message row element
}

// Function to select a recipient for chat
function selectRecipient(recipient_id) {
    const form = document.getElementById('recipientForm');
    const placeholder = document.getElementById('placeholder');
    const chat = document.getElementById('chat');
    const url = "{{ route('messages.show') }}"; // URL for fetching chat messages

    // AJAX request to fetch the chat for the selected recipient
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}', // CSRF token for security
        },
        body: JSON.stringify({
            recipient_id: recipient_id // Send the recipient ID
        })
    })
    .then(response => response.json())
    .then(data => {
        buildMessages(data); // Build messages from the received data

        placeholder.style.display = 'none'; // Hide placeholder
        chat.style.display = 'block'; // Show chat container

        // Update recipient details in the UI
        document.getElementById('recipient_name').innerHTML = data.recipient_name;
        document.getElementById('chatRecipientId').value = recipient_id;
    })
    .catch(error => console.error('Error:', error)); // Handle errors
}

// Event listener for message form submission
document.getElementById('messageForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent default form submission
    
    var recipientId = document.getElementById('chatRecipientId').value; // Get recipient ID
    var messageText = this.text.value; // Get message text

    // AJAX request to store the message
    fetch("{{ route('messages.store') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}', // CSRF token for security
        },
        body: JSON.stringify({
            recipient_id: recipientId, // Send recipient ID
            text: messageText // Send message text
        })
    })
    .then(response => response.json())
    .then(data => {
        buildMessage(data); // Build and display the new message
        document.getElementById('messageForm').reset(); // Reset the form
    })
    .catch(error => console.error('Error:', error)); // Handle errors
});

</script>

</x-app-layout>