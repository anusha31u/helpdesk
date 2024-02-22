<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Time Chat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="reply.css">
    
</head>
<body>
<div class="container">
    <div class="conversation-list">
        <h2 class="conversation-heading"> <i class="fas fa-align-left align-left-icon"></i>Conversations</h2>
        <ul id="conversation-list">
            <!-- Display list of conversations here -->
            <li>User 1</li>
            <li>User 2</li>
            <li>User 3</li>
        </ul>
    </div>
    <div class="messages">
        <ul id="message-list">
            <!-- Display messages here -->
            <li class="received-message">
                <div class="message-bubble received-bubble">Hello! <span class="message-timestamp">10:00 AM</span></div>
            </li>
            <li class="sent-message">
                <div class="message-bubble sent-bubble">Hi there! <span class="message-timestamp">10:01 AM</span></div>
            </li>
            <li class="received-message">
                <div class="message-bubble received-bubble">How are you? <span class="message-timestamp">10:02 AM</span></div>
            </li>
        </ul>
        <div class="input-area">
            <textarea id="message-input" placeholder="Type your message..."></textarea>
            <button onclick="sendMessage()">Go</button>
        </div>
    </div>

    <div class="profile-section" id="profile-section">
        <!-- First Box: Profile Picture, Status, and Call/Profile Buttons -->
    </div>

</div>

<script>
    // Your JavaScript code here

    // Dummy data for conversations and messages
    const conversations = ["User 1", "User 2", "User 3"];
    const messages = {
        "User 1": ["Hello!", "How are you?"],
        "User 2": ["Hi there!", "I'm doing well, thanks."],
        "User 3": ["Hey!", "What's up?"]
    };

    // Dummy user profile data
    const userProfile = {
        "User 1": {
            name: "John Doe",
            email: "john.doe@example.com",
            firstName: "John",
            lastName: "Doe",
            profilePicture: "download.png"
        },
        "User 2": {
            name: "Jane Smith",
            email: "jane.smith@example.com",
            firstName: "Jane",
            lastName: "Smith",
            profilePicture: "images.jpg"
        },
        "User 3": {
            name: "Alice Johnson",
            email: "alice.johnson@example.com",
            firstName: "Alice",
            lastName: "Johnson",
            profilePicture: "download1.jpg"
        }
    };

    // Function to display conversations
    function displayConversations() {
        const conversationList = document.getElementById("conversation-list");
        conversationList.innerHTML = "";
        conversations.forEach(conversation => {
            const listItem = document.createElement("li");
            listItem.textContent = conversation;
            conversationList.appendChild(listItem);
        });
    }

    // Function to display messages for a selected conversation
    function displayMessages(conversation) {
        const messageList = document.getElementById("message-list");
        messageList.innerHTML = "";
        const conversationMessages = messages[conversation];

        // Determine if a new conversation should be created
        const shouldCreateNewConversation = () => {
            if (conversationMessages.length === 0) {
                return true; 
            } else {
                const lastMessageTimestamp = new Date(conversationMessages[conversationMessages.length - 1].timestamp);
                const currentTime = new Date();
                const timeDifferenceInHours = (currentTime - lastMessageTimestamp) / (1000 * 60 * 60); 
                return timeDifferenceInHours > 24; 
            }
        };

        // Create new conversation if necessary
        if (shouldCreateNewConversation()) {
            // Create new conversation
            conversationMessages.push({
                sender: "system",
                text: "New conversation started",
                timestamp: new Date().toISOString()
            });
        }

        // Display messages
        conversationMessages.forEach(message => {
            const listItem = document.createElement("li");
            if (message.sender === "You") {
                listItem.classList.add("sent-message");
                listItem.innerHTML = `<div class="message-bubble sent-bubble">${message.text} <span class="message-timestamp">${formatTimestamp(message.timestamp)}</span></div>`;
            } else {
                const profileData = userProfile[conversation];
                if (profileData) {
                    listItem.classList.add("received-message");
                    listItem.innerHTML = `<div class="message-bubble received-bubble">${profileData.name}: ${message.text} <span class="message-timestamp">${formatTimestamp(message.timestamp)}</span></div>`;
                }
            }
            messageList.appendChild(listItem);
        });

        // Display user profile for selected conversation
        displayUserProfile(conversation);
    }

    // Function to display user profile for selected conversation
    function displayUserProfile(conversation) {
        const profileSection = document.getElementById("profile-section");
        const profileData = userProfile[conversation];
        if (profileData) {
            profileSection.innerHTML = `
                    <div class="profile-box">
                        <img src="${profileData.profilePicture}" alt="Profile Picture" class="profile-img">
                        <div class="status">Offline</div>
                       
                        <div class="actions">
                            <button class="action-btn"><i class="fas fa-phone"></i> Call</button>
                            <button class="action-btn"><i class="fas fa-user"></i> Profile</button>
                        </div>
                    </div>
                    <div class="customer-details">
                        <h3>Customer Details</h3>
                        <div class="details-item"><label>Email:</label> ${profileData.email}</div>
                        <div class="details-item"><label>First Name:</label> ${profileData.firstName}</div>
                        <div class="details-item"><label>Last Name:</label> ${profileData.lastName}</div>
                        <div class="details-item">
                            <a href="#">View More Details</a>
                        </div>
                    </div>
                `;
        } else {
            profileSection.innerHTML = ""; // Clear profile section if no profile data found
        }
    }

    // Function to send a message
    function sendMessage() {
        const messageInput = document.getElementById("message-input");
        const message = messageInput.value.trim();
        if (message !== "") {
            // Send message to server (not implemented in this example)
            messageInput.value = "";
            // Append message to message list
            const messageList = document.getElementById("message-list");
            const listItem = document.createElement("li");
            listItem.classList.add("sent-message");
            listItem.innerHTML = `<div class="message-bubble sent-bubble">You: ${message} <span class="message-timestamp">${formatTimestamp(new Date().toISOString())}</span></div>`;
            messageList.appendChild(listItem);
        }
    }

    // Function to format timestamp
    function formatTimestamp(timestamp) {
        const date = new Date(timestamp);
        const hours = date.getHours();
        const minutes = date.getMinutes();
        return `${hours}:${minutes < 10 ? '0' : ''}${minutes}`;
    }

    // Initialize the chat application
    function init() {
        // Display initial conversations
        displayConversations();

        // Add click event listeners to conversation list items
        const conversationList = document.getElementById("conversation-list");
        conversationList.addEventListener("click", function (event) {
            const selectedConversation = event.target.textContent;
            displayMessages(selectedConversation);
        });
    }

    // Initialize the chat application when the page is loaded
    document.addEventListener("DOMContentLoaded", init);
</script>
</body>
</html>
