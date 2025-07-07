<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MHST Chatroom</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/chat.css">
    <script src="JS/scripts.js"></script>
</head>
<body class="mwili">
    <?php include 'header.php'; ?>
    <div class="vedio-bg-wrapper">
        <video autoplay muted loop playsinline class="bg-vedio">
            <source src="vedios/chat-bg.mp4" type="video/mp4">
            </video>
            
    <div class="chatroom">
        <div class="chatroom-header">
            <h1 class="fadeIn" id="chatroom-title">MHST Chatroom</h1>
            <!-- <p>*put something relatable*</p> -->
            <div class="chatbox">
            <iframe class="chatframe" title="MHST Chatroom" src="https://chitchatter.im/public/e090ec26-8252-40c8-8510-2851902a8096?embed=1" allow="camera;microphone;display-capture;fullscreen"></iframe>
            </div>
        </div>
        </div>

        <?php include 'footer.php'; ?>
    </div>
</body>
</html>