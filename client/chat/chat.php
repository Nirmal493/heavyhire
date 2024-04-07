<?php 
   include '../db/db.php';
   session_start();

   // Query to get the list of users from the accounts table
   $sql = "SELECT * FROM accounts WHERE type_id=1";
   $result = $con->query($sql);

   // Close the database connection
   $con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
        }
        .user-list {
            list-style: none;
            padding: 0;
        }
        .user-list-item {
            cursor: pointer;
            padding: 10px;
            border: 1px solid #ccc;
            margin-bottom: 5px;
        }
        .user-list-item:hover {
            background-color: #f1f1f1;
        }
        .chat-box {
            border: 1px solid #ccc;
            padding: 10px;
            max-height: 300px;
            overflow-y: scroll;
        }
        .message {
            padding: 5px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <h1>Messenger</h1>
    <div>
    <h2>Chat Box</h2>
        <h3>List of drivers to which user has chatted with</h3>
        <ul class="user-list" id="user-list">
            <!-- User list will be dynamically populated here -->
        </ul>
        <div class="chat-box" id="chat-box">
            <!-- Chat messages will be displayed here -->
        </div>
        <input type="text" id="message-input" placeholder="Type your message...">
        <button type="button" onclick="sendMessage()">Send</button>
    </div>

    <script>
        //window.onload = fetchPreviousMessages;
        window.onload = fetchUserList;
        // JavaScript code for handling chat functionality will go here
        const chatBox = document.getElementById('chat-box');
        const messageInput = document.getElementById('message-input');
        let selectedUserId = localStorage.getItem('selected_user_id');

        // Function to add a new message to the chat box
        function addMessage(sender, message, sender_id) {
            const messageElement = document.createElement('div');
            messageElement.classList.add('message');
            messageElement.textContent = `${sender}: ${message}`;
            chatBox.appendChild(messageElement);
            chatBox.scrollTop = chatBox.scrollHeight; // Auto-scroll to the bottom
        }
        // Function to show the list of users
        function showUserList(users) {
            const userList = document.getElementById('user-list');
            userList.innerHTML = ''; // Clear existing user list

            users.forEach((user) => {
                const userListItem = document.createElement('li');
                userListItem.classList.add('user-list-item');
                userListItem.textContent = user.name;
                userListItem.addEventListener('click', () => {
                    selectedUserId = user.id;
                    localStorage.setItem('selected_user_id', selectedUserId);
                    fetchPreviousMessages(); // Load previous messages for the selected user
                });
                userList.appendChild(userListItem);
            });
        }
       
        function fetchUserList() {
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        const users = JSON.parse(xhr.responseText);
                        showUserList(users); // Display the list of users
                    } else {
                        console.log('Failed to fetch user list.');
                    }
                }
            };

            xhr.open('GET', 'get_users_list.php', true);
            xhr.send();
        }
        function fetchPreviousMessages() {
            const receiverId =localStorage.getItem('selected_user_id')
            const senderId = localStorage.getItem('acc_id');
            const name=localStorage.getItem('name');
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        const messages = JSON.parse(xhr.responseText);
                        // Display the received messages in the chat box
                        chatBox.innerHTML = ''
                        messages.forEach((message) => {
                            //const sender = message.sender_acc_id === parseInt(senderId) ? 'You' : message.sender_name;
                            var sender;
                            if (message.sender_acc_id==parseInt(senderId)){
                                sender='You';
                            }else{
                                sender=message.sender_name;
                            }
                            addMessage(sender, message.message, message.sender_name);
                        });
                    } else {
                        console.log('Failed to fetch previous messages.');
                    }
                }
            };

            xhr.open('GET', `get_previous_messages.php?sender_id=${senderId}&receiver_id=${receiverId}`, true);
            xhr.send();
        }
        setInterval(fetchPreviousMessages, 2000);

        
        
    </script>
    <!-- ... Your previous HTML code ... -->

<!-- ... Your previous HTML code ... -->

<script>
    // Function to send a message using AJAX
    function sendMessage() {
        const message = messageInput.value.trim();
        if (message !== '' && selectedUserId !== null) {
            const senderId = localStorage.getItem('acc_id'); // Get the acc_id from localStorage
            const sendername=localStorage.getItem('name');
            console.log(senderId);
            // Send the message, senderId, and selectedUserId to the server using AJAX
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // If the message was successfully sent, add it to the chat box
                        addMessage('You', message);
                        messageInput.value = ''; // Clear the input field
                    } else {
                        console.log('Failed to send the message.');
                    }
                }
            };

            xhr.open('POST', 'handlechat.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('message=' + encodeURIComponent(message) + '&receiver_id=' + selectedUserId + '&sender_id=' + senderId +'&sender_name='+sendername);
        } else {
            console.log('Please select a user and type a message.');
        }
    }
</script>

<!-- ... Your previous HTML code ... -->

<!-- ... Your previous HTML code ... -->

</body>
</html>

