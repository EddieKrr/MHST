<?php
session_start();

if (!isset($_SESSION["name"])) {
    header("Location: signin.html");
    exit();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link rel="stylesheet" href="CSS/body.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="parent">
        <div class="div1">
            <div class="slider-content">
                <img src="Images/logo.jpg" alt="Creative Direction" class="slider-img">
                <div class="div1-text">
                    Creative <em>direction</em><br>grounded in clarity<br><em>and</em> emotion.
                </div>
            </div>
            </div>

        <div class="div2">
            <img src="Images/relaxation.jpg" alt="Relaxation" style="height: 100%;width: 100%; border-radius: 10px;">
        </div>

        <div class="div3">
            <div class="scroll-container">
                <a href="#article1" class="clickable-title">
                    <h4>Anxiety is Anxieting</h4>
                </a>
                <a href="#article2" class="clickable-title">
                    <h4>BPD: The Other Side Of You</h4>
                </a>
                <a href="#article3" class="clickable-title">
                    <h4>Depresssion: Mbona unakaa sura ya kiatu?</h4>
                </a>
                <a href="#article4" class="clickable-title">
                    <h4>Heartbreaks and Hail Marys</h4>
                </a>
                <a href="#article5" class="clickable-title">
                    <h4>Mindful Moments</h4>
                </a>
                <a href="#article6" class="clickable-title">
                    <h4>Quiet Contemplation</h4>
                </a>
            </div>
        </div>

        <div class="div4">
            <div class="fun-fact-icon"><i class='bx bx-bulb'></i></div>
            <p>Did you know? Ignoring intrusive thoughts doesn't make them go away (or make you a bad person). It is best to acknowledge the thought and let it pass</p>
        </div>

        <div class="div5">
            <div class="contact-info">
                <h4>Contact Us</h4>
                <p>support@mhst.com</p>
                <p>Phone: +254 701 258510</p>
                <p>Address: STC, First Floor</p>
            </div>
        </div>

        <div class="div6">
            <div class="social-links">
                <a href="#"><i class="bx bxl-instagram"></i></a>
                <a href="#"><i class="bx bxl-twitter"></i></a>
                <a href="#"><i class="bx bxl-linkedin"></i></a>
                <a href="#"><i class="bx bxl-tiktok"></i></a>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
</body>
</html>