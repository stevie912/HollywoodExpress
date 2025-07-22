<!DOCTYPE html>
<html lang="en">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" href="/favicon.png">
    <title>Lockout</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
</head>
<body>

    <h1 class="display5 text-center">You have been locked out</h1>
    <p class="lead text-center">you will be returned to the login screen after <span id="counter">60</span> seconds</p>

    <script>
        let timeLeft = 60;
        const counter = document.getElementById('counter');
        
        const timer = setInterval(() => {
            timeLeft--;
            counter.textContent = timeLeft;
            if (timeLeft <= 0) {
                clearInterval(timer);
                window.location.href = "/login";
            }
        }, 1000);
        
    </script>
</body>