<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShonJanta</title>
    <link rel="stylesheet" href="gpt.css">
    <link rel="stylesheet" href="gpt.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: gray;
}

.navbar-toggle {
    display: inline;
    flex-direction: column;
    justify-content: flex-end;
    position: relative; 
    height: 40px;
    cursor: pointer; 
}
#menu{
    width: 100px;

    margin-right: 19px;
    margin-top: 5px;
    background-color: #000000;
}
#menu:hover {
    background: rgb(141, 136, 136);
}
.navbar{
    float: right;
}
.navbar-options {
    display: none;
    flex-direction: column;
    position: absolute;
    top: 40px;
    right: 10px;
    background-color: #ffffff;
    border-radius: 5px;
    padding: 10px;
}

.navbar-options a {
    
    color: #000000;
    text-decoration: none;
    padding: 10px 0;
}

/* Show the options when the navbar-toggle is clicked */
.show {
    display: flex;
}

.container {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    overflow: hidden;
}
.background-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100vw; /* Using viewport units to fit the screen width */
    height: 100vh; /* Using viewport units to fit the screen height */
    z-index: -1;
    pointer-events: none;
}

.background-image img {
    width: 100%;
    height: 100%;
    object-fit: contain; /* Using 'contain' to fit the image within the screen */
}
.chat-box {
    width: 100%; 
    max-width: 600px; 
    background-color: rgba(240, 240, 240, 0.5); /* Set the alpha value as needed */
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    height: 100%; 
}

.chat-header {
    background-color: #007bff;
    color: white;
    padding: 10px;
    font-size: 1.2rem;
    text-align: center;
}


.chat-body {
    padding: 10px;
    flex-grow: 1; /* Allowing the chat body to take up the remaining space */
    display: flex;
    flex-direction: column;
    justify-content: center; 
    overflow-y: auto;
}

.chat-message {
    margin: 10px 0;
}

.user-message {
    background-color: #f9f9f9;
    padding: 8px;
    border-radius: 5px;
}

.bot-message {
    background-color: #e5e5e5;
    padding: 8px;
    border-radius: 5px;
}

.welcome-message {
    text-align: center;
    font-size: 1.2rem;
    margin-bottom: auto;
}

.chat-footer {
    display: flex;
    align-items: center;
    padding: 10px;
    border-top: 1px solid #ccc;
}

input[type="text"] {
    flex: 1;
    padding: 8px;
    border: none;
    border-radius: 5px;
    margin-right: 5px;
}

button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 8px 15px;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

#voiceButton {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 8px;
    border-radius: 50%;
    cursor: pointer;
}

#voiceButton.listening {
    background-color: #ff0000; /* Change the color when listening */
}

#voiceButton:hover {
    background-color: #0056b3;
}

    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div>
        <a href="dev_info.php" target="_blank"></a> <button id="menu">Developer</button>
        </div>
    </nav>

    <div class="container">
        <div class="background-image">
            <img src="bg.jpg" alt="Background">
        </div>
        <div class="chat-box">
            <div class="chat-header">
                <span class="chat-title">ShobJanta An API Based Search Engine</span>
            </div>
            <div class="chat-body" id="chatBody">
                <div class="welcome-message">
                    <span class="bot-message">Ask Me Anything</span>
                </div>
            </div>

            <div class="chat-footer">
                <input type="text" id="userInput" name="query" placeholder="Type your message...">
                <button id="voiceButton" onclick="startVoiceInput()"><i class="fas fa-microphone-alt"
                        onclick="startVoiceInput()" @nbsp;></i></button><br><br>
                <button id="enterBtn" onclick="performSearch()"><i class="fas fa-search"></i></button>
            </div>

        </div>
    </div>
    <!-- <script src="gpt.js"> -->
    <script>
        //voice input function start here
        function startVoiceInput() {
            var recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition || window.mozSpeechRecognition || window.msSpeechRecognition)();
            recognition.lang = 'en-US';
            // Updating the placeholder with "Listening..." message
            document.getElementById("userInput").placeholder = "Listening...";
            recognition.start();

            recognition.onresult = function (event) {
                var query = event.results[0][0].transcript;
                console.log("You said:", query);
                document.getElementById("userInput").value = query; // Set the value of the input field
            };

            recognition.onerror = function (event) {
                console.log("Sorry, I could not understand your speech.");
            };
        }


        function performSearch() {
            var query = document.getElementById("userInput").value;

            // Google search APi : AIzaSyBmlLPwww_zCMoVOhc2JJxYJ5XZ7HO7qwQ

            var apiKey = "AIzaSyBmlLPwww_zCMoVOhc2JJxYJ5XZ7HO7qwQ";
            var cx = "d4c86fe6b96444152";
            var url = `https://www.googleapis.com/customsearch/v1?key=${apiKey}&cx=${cx}&q=${encodeURIComponent(query)}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    // Check if the response contains valid search results
                    if (data && data.items && data.items.length > 0) {
                        var searchResults = data.items;
                        var outputBox = document.getElementById("chatBody");
                        outputBox.innerHTML = "";

                        // Display each search result in the output box
                        searchResults.forEach(result => {
                            var link = document.createElement("a");
                            link.href = result.link;
                            link.textContent = result.title;
                            link.target = "_blank";
                            outputBox.appendChild(link);
                            outputBox.appendChild(document.createElement("br"));
                            outputBox.appendChild(document.createTextNode(result.snippet));
                            outputBox.appendChild(document.createElement("br"));
                            outputBox.appendChild(document.createElement("br"));
                        });
                    } else {
                        console.log("No search results found");
                    }
                })
                .catch(error => {
                    console.log("An error occurred:", error);
                });
        }

        function toggleNavbar() {
            const navbarOptions = document.getElementById("navbarOptions");
            navbarOptions.classList.toggle("show");
        }
        function toggleNavbar() {
    const navbarOptions = document.getElementById("navbarOptions");
    navbarOptions.classList.toggle("show");
}   
</script>
</body>

</html>