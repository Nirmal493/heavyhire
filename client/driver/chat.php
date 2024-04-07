<html>
  <head>
    <title>Chat Box UI Design</title>
    <link rel="stylesheet" href="chat-styles.css" />
    <?php include '../links.php' ?>

    <!-- Import this CDN to use icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
    />
  </head>

  <body>
    <!-- Main container -->
    <div class="container">
      <!-- msg-header section starts -->
      <div class="msg-header">
        <div class="container1">
          <!-- <img src="https://img.freepik.com/premium-vector/male-profile-flat-blue-simple-icon-with-long-shadowxa_159242-10092.jpg?w=740" class="msgimg w-[50px] align-middle rounded-[80%]" /> -->
          <div class="active">
            <p>Abhinav C V</p>
          </div>
        </div>
      </div>
      <!-- msg-header section ends -->

      <!-- Chat inbox  -->
      <div class="chat-page">
        <div class="msg-inbox">
          <div class="chats">
            <!-- Message container -->
            <div class="msg-page" id="chat-box">
              
              
            </div>
          </div>

          <!-- msg-bottom section -->

          <div class="msg-bottom">
            <div class="input-group">
              <input
                id="message-input"
                type="text"
                class="form-control"
                placeholder="Write message..."
              />

              <span onclick="sendMessage()" class="input-group-text send-icon">
                <i class="bi bi-send"></i>
              </span>
            </div>
        </div>
      </div>
    </div>

    <script>
        window.onload = fetchUserList;
        // JavaScript code for handling chat functionality will go here
        const chatBox = document.getElementById('chat-box');
        const messageInput = document.getElementById('message-input');
        let selectedUserId = localStorage.getItem('selected_user_id');

        // Function to add a new message to the chat box
        function addMessage(sender, message, sender_id) {
            console.log(sender_id, localStorage.getItem('name'))
            if(sender_id != localStorage.getItem('name')){

                const messageElement = document.createElement('div');
                messageElement.classList.add('received-chats');
    
                const receivedMsgDiv = document.createElement('div');
                receivedMsgDiv.classList.add('received-msg');
    
                const receivedMsgInboxDiv = document.createElement('div');
                receivedMsgInboxDiv.classList.add('received-msg-inbox');
    
                const messageText = document.createElement('p');
                messageText.textContent = message;
                receivedMsgInboxDiv.appendChild(messageText);
                receivedMsgDiv.appendChild(receivedMsgInboxDiv);
                messageElement.appendChild(receivedMsgDiv);
                chatBox.appendChild(messageElement);
            }else{
                const outgoingChatsDiv = document.createElement('div');
                outgoingChatsDiv.classList.add('outgoing-chats');    

                const outgoingMsgDiv = document.createElement('div');
                outgoingMsgDiv.classList.add('outgoing-msg');

                const outgoingChatsMsgDiv = document.createElement('div');
                outgoingChatsMsgDiv.classList.add('outgoing-chats-msg');

                const messageText = document.createElement('p');
                messageText.classList.add('multi-msg');
                messageText.textContent = message;

                // Append the created elements to construct the desired div structure
                outgoingChatsMsgDiv.appendChild(messageText);
                outgoingMsgDiv.appendChild(outgoingChatsMsgDiv);
                outgoingChatsDiv.appendChild(outgoingMsgDiv);
                chatBox.appendChild(outgoingChatsDiv);
            }

            chatBox.scrollTop = chatBox.scrollHeight;
        }
        
    // ... Your existing JavaScript code ...

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
    // Function to fetch the list of users from the server
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
    setInterval(fetchPreviousMessages, 2000);
    
</script>
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
                        addMessage('You', message, localStorage.getItem('name'));
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

  </body>
</html>