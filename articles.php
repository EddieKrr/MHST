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
    <title>Home</title>
    <link rel="stylesheet" href="CSS/body.css">
    <link rel="icon" type="image/x-icon" href="images/logo.jpg">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <?php include 'header.php'; ?>  
    <?php include 'db.php'; ?>
    <div class="aBody">
        <div class="a1 article" id="a1">
            <h1>Anxiety</h1>
            <p>Anxiety is a common mental health condition characterized by excessive worry, fear, or nervousness. It can manifest in various forms, including generalized anxiety disorder (GAD), panic disorder, and social anxiety disorder. Symptoms may include restlessness, fatigue, difficulty concentrating, and physical symptoms like increased heart rate.</p>
        </div>
        <div class="a2 article" id="a2">
            <h1>Bipolar Disorder</h1>
            <p>Bipolar disorder is characterized by extreme mood swings, including emotional highs (mania or hypomania) and lows (depression). These mood changes can affect sleep, energy, activity, judgment, behavior, and the ability to think clearly. Symptoms may vary in severity and duration.</p>
        </div>
        <div class="a3 article" id="a3">
            <h1>Depression</h1>
            <p>Depression is a mood disorder that causes persistent feelings of sadness and loss of interest. It can affect how you feel, think, and handle daily activities. Symptoms include fatigue, changes in appetite, sleep disturbances, and feelings of worthlessness or guilt.</p>
        </div>
        <div class="a4 article" id="a4">
            <h1>Schizophrenia</h1>
            <p>Schizophrenia is a severe mental disorder that affects how a person thinks, feels, and behaves. It may include symptoms such as delusions, hallucinations, disorganized thinking, and impaired functioning. Early diagnosis and treatment are crucial for managing the condition effectively.</p>
        </div>
        <div class="a5 article" id="a5">
            <h1>Obsessive-Compulsive Disorder (OCD)</h1>
            <p>Obsessive-Compulsive Disorder (OCD) is a mental health condition characterized by persistent, unwanted thoughts (obsessions) and repetitive behaviors or mental acts (compulsions). Individuals with OCD may feel driven to perform certain rituals to alleviate anxiety associated with their obsessions. Treatment often includes therapy and medication.</p>
        </div>
        <div class="a6 article" id="a6">
            <h1>ADHD</h1>
            <p>Attention-Deficit/Hyperactivity Disorder (ADHD) is a neurodevelopmental disorder characterized by persistent patterns of inattention, hyperactivity, and impulsivity. Symptoms may include difficulty focusing, forgetfulness, fidgeting, and interrupting others. ADHD can impact various aspects of life, including academic performance and relationships.</p>
        </div>
        
        <!-- Modals -->
        <div class="a1Modal" id="aModal">
            <div class="a1ModalContent">
            <h2>Anxiety</h2>
            <p>
                Anxiety disorders are a group of mental health conditions characterized by excessive and persistent feelings of worry, fear, or apprehension that are difficult to control and interfere with daily activities. Common types include generalized anxiety disorder (GAD), panic disorder, and social anxiety disorder. Symptoms can manifest both psychologically and physically, such as restlessness, irritability, muscle tension, rapid heartbeat, sweating, and difficulty concentrating. Anxiety disorders may be triggered by stressful life events, genetics, brain chemistry, or personality factors. Treatment often involves cognitive-behavioral therapy (CBT), medication such as selective serotonin reuptake inhibitors (SSRIs), lifestyle changes, and stress management techniques. Early intervention and support can significantly improve outcomes and quality of life for individuals experiencing anxiety.
            </p>
            </div>
        </div>
        <div class="a2Modal">
            <div class="a2ModalContent">
            <h2>Bipolar Disorder</h2>
            <p>
                Bipolar disorder is a chronic mental health condition marked by extreme mood swings that include emotional highs (mania or hypomania) and lows (depression). During manic episodes, individuals may feel euphoric, energetic, or unusually irritable, often engaging in risky behaviors, experiencing rapid thoughts, and having decreased need for sleep. Depressive episodes are characterized by feelings of sadness, hopelessness, fatigue, and loss of interest in activities. The disorder is classified into several types, including Bipolar I, Bipolar II, and Cyclothymic Disorder, depending on the severity and pattern of mood episodes. The exact cause is unknown but involves a combination of genetic, biological, and environmental factors. Treatment typically includes mood stabilizers, antipsychotic medications, psychotherapy, and lifestyle adjustments. Ongoing management is crucial to reduce the frequency and severity of episodes and to support overall functioning.
            </p>
            </div>
        </div>
        <div class="a3Modal">
            <div class="a3ModalContent">
            <h2>Depression</h2>
            <p>
                Depression, or major depressive disorder, is a common and serious mood disorder that negatively affects how a person feels, thinks, and acts. It is characterized by persistent feelings of sadness, emptiness, or hopelessness, and a loss of interest or pleasure in most activities. Other symptoms may include changes in appetite or weight, sleep disturbances, fatigue, difficulty concentrating, feelings of worthlessness or excessive guilt, and thoughts of death or suicide. Depression can result from a complex interplay of genetic, biological, environmental, and psychological factors. It can affect anyone, regardless of age or background. Effective treatments include psychotherapy (such as cognitive-behavioral therapy), antidepressant medications, lifestyle changes, and support from family and friends. Early recognition and intervention are important for recovery and to prevent complications.
            </p>
            </div>
        </div>
        <div class="a4Modal">
            <div class="a4ModalContent">
            <h2>Schizophrenia</h2>
            <p>
                Schizophrenia is a severe and chronic mental disorder that affects a person's ability to think clearly, manage emotions, make decisions, and relate to others. It is characterized by episodes of psychosis, including hallucinations (seeing or hearing things that are not present), delusions (false beliefs), disorganized thinking and speech, and impaired functioning. Negative symptoms, such as reduced emotional expression, lack of motivation, and social withdrawal, are also common. The exact cause is not fully understood but involves a combination of genetic predisposition, brain chemistry, and environmental factors. Schizophrenia typically emerges in late adolescence or early adulthood. Treatment usually involves antipsychotic medications, psychosocial interventions, rehabilitation, and support services. Early diagnosis and comprehensive care are essential for improving long-term outcomes and quality of life.
            </p>
            </div>
        </div>
        <div class="a5Modal">
            <div class="a5ModalContent">
            <h2>Obsessive-Compulsive Disorder (OCD)</h2>
            <p>
                Obsessive-Compulsive Disorder (OCD) is a mental health condition characterized by intrusive, unwanted thoughts (obsessions) and repetitive behaviors or mental acts (compulsions) that an individual feels driven to perform. Obsessions often involve fears of contamination, harm, or the need for symmetry, while compulsions may include excessive cleaning, checking, counting, or arranging objects. These rituals are intended to reduce anxiety but often provide only temporary relief and can significantly interfere with daily life. The exact cause of OCD is not fully understood, but it is believed to involve genetic, neurological, and environmental factors. Treatment commonly includes cognitive-behavioral therapy, particularly exposure and response prevention (ERP), and medications such as selective serotonin reuptake inhibitors (SSRIs). Early intervention and ongoing support can help manage symptoms and improve functioning.
            </p>
            </div>
        </div>
        <div class="a6Modal">
            <div class="a6ModalContent">
            <h2>ADHD</h2>
            <p>
                Attention-Deficit/Hyperactivity Disorder (ADHD) is a neurodevelopmental disorder that affects both children and adults. It is characterized by persistent patterns of inattention (such as difficulty sustaining focus, following instructions, or organizing tasks), hyperactivity (excessive movement, fidgeting, or talking), and impulsivity (acting without thinking, interrupting others, or difficulty waiting). ADHD can impact academic performance, work, relationships, and daily functioning. The exact cause is not fully understood but involves genetic, neurological, and environmental factors. Diagnosis is based on clinical assessment and behavioral observations. Treatment often includes behavioral therapy, educational support, and medications such as stimulants or non-stimulant alternatives. Early identification and a comprehensive, individualized approach can help individuals with ADHD reach their full potential and manage symptoms effectively.
            </p>
            </div>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>
    
    <script>
        const articleElements = document.querySelectorAll(".article");
        const closeButtons = document.querySelectorAll(".close");

        console.log("Found articles:", articleElements.length);
        console.log("Found close buttons:", closeButtons.length);

        articleElements.forEach(article => {
            article.addEventListener("click", () => {
                const id = article.id; 
                console.log("Article clicked:", id);
                const modal = document.querySelector(`.${id}Modal`);
                console.log("Modal found:", modal);
                if (modal) {
                    modal.style.display = "block";
                }
            });
        });

        closeButtons.forEach(button => {
            button.addEventListener("click", () => {
                console.log("Close button clicked");
                const modal = button.closest("[class*='Modal']");
                if (modal) {
                    modal.style.display = "none";
                }
            });
        });

        window.addEventListener("click", (event) => {
            const modals = document.querySelectorAll("[class*='Modal']");
            modals.forEach(modal => {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            });
        });
    </script>
</body>
</html>