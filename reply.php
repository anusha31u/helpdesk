<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Time Chat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    display: flex;
    height: 100vh;
}

.conversation-list {
    width: 200px;
    border-right: 1px solid #ccc;
    padding: 20px;
    overflow-y: auto;
}

.messages {
    flex: 0 0 47%; /* Adjusted width */
    padding: 20px;
    overflow-y: auto;
}

.profile-section {
    width: 200px;
    padding: 20px;
    border-left: 1px solid #ccc;
}

ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

li {
    padding: 10px;
    margin-bottom: 5px;
    border-radius: 5px;
    cursor: pointer;
}

li:hover {
    background-color: #e5e5e5;
}

#message-input {
    width: calc(100% - 80px);
    margin-top: 10px;
    margin-right: 10px;
    padding: 5px;
}

button {
    padding: 5px 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

/* Style for messages sent by the user */
.sent-message {
    text-align: right;
}

/* Style for messages received from other users */
.received-message {
    text-align: left;
}

/* Style for the conversations heading */
.conversation-heading {
    color: #000; /* Black color */
    margin-bottom: 10px;
}

/* Style for the align-left icon */
.align-left-icon {
    color: #666; /* Light black color */
}

.profile-img {
    width: 50px; 
    height: 50px; 
    border-radius: 50%; 
    object-fit: cover; 
}
    
    </style>
</head>
<body>
    <div class="container">
        <div class="conversation-list">
            <h2 class="conversation-heading"> <i class="fas fa-align-left align-left-icon"></i>Conversations</h2>
            <ul id="conversation-list">
                <!-- Display list of conversations here -->
                <li>Amit RG</li>
                <ul>
                    <li><p>Facebook DM</p></li>
                </ul>
                <li>Hiten Saxena</li>
                <ul>
                    <li><p>Facebook Post</p></li>
                </ul>
                
            </ul>
        </div>
        <div class="messages">
            <ul id="message-list">
                <!-- Display messages here -->
                <li class="received-message">User 1: Hello!</li>
                <li class="sent-message">You: Hi there!</li>
                <li class="received-message">User 1: How are you?</li>
            </ul>
            <textarea id="message-input" placeholder="Type your message..."></textarea>
            <button onclick="sendMessage()">Send</button>
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
            return true; // No messages yet, create new conversation
        } else {
            const lastMessageTimestamp = new Date(conversationMessages[conversationMessages.length - 1].timestamp);
            const currentTime = new Date();
            const timeDifferenceInHours = (currentTime - lastMessageTimestamp) / (1000 * 60 * 60); // Convert milliseconds to hours
            return timeDifferenceInHours > 24; // Create new conversation if last message is older than 24 hours
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
            listItem.innerHTML = `<img src="pic.jpg" alt="Your Profile Picture" class="profile-img">: ${message.text}`;
        } else {
            const profileData = userProfile[conversation];
            if (profileData) {
                listItem.classList.add("received-message");
                listItem.innerHTML = `<img src="${profileData.profilePicture}" alt="${profileData.name}'s Profile Picture" class="profile-img"> ${profileData.name}: ${message.text}`;
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
                // Add the "sent-message" class to the message
                listItem.classList.add("sent-message");
                listItem.textContent = "You: " + message;
                messageList.appendChild(listItem);
            }
        }

        // Initialize the chat application
        function init() {
            // Display initial conversations
            displayConversations();

            // Add click event listeners to conversation list items
            const conversationList = document.getElementById("conversation-list");
            conversationList.addEventListener("click", function(event) {
                const selectedConversation = event.target.textContent;
                displayMessages(selectedConversation);
            });
        }

        // Initialize the chat application when the page is loaded
        document.addEventListener("DOMContentLoaded", init);
    </script>
</body>
</html>
