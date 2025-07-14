<?php
session_start();
if (!isset($_SESSION["name"])) {
    header("Location: signin.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Room - MHST</title>
    <link rel="stylesheet" href="CSS/chat.css">
    <?php include 'header.php'; ?>
</head>
<body>
    <!-- Video Background -->
    <div class="video-bg-wrapper">
        <video class="bg-video" autoplay muted loop>
            <source src="videos/chat-bg.mp4" type="video/mp4">
        </video>
    </div>

    <div class="page-container">

        <!-- Chat Room Content -->
        <main class="chatroom">
            <div class="chatroom-header">
                <h1>Mental Health Support Chat</h1>
                <p>You're not special, lets talk about it</p>
            </div>
            
            <div class="chatbox">
                <iframe 
                    src="https://chitchatter.im/public/e090ec26-8252-40c8-8510-2851902a8096?embed=1" 
                    title="Mental Health Support Chat"
                    allow="microphone; camera">
                    Your browser does not support iframes. Please change your browser to access the chat.
                </iframe>
            </div>
        </main>

        <?php include 'footer.php'; ?>
    </div>
</body>
</html>