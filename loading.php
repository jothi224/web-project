<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loading and Redirect</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      background-color: #f0f0f0;
      font-family: Arial, sans-serif;
    }

    .loader {
      display: flex;
      justify-content: space-around;
      align-items: center;
      width: 80px;
      height: 80px;
    }

    .loader div {
      width: 16px;
      height: 16px;
      margin: 4px;
      background-color: #3498db;
      border-radius: 50%;
      animation: bounce 1.5s infinite ease-in-out;
    }

    .loader div:nth-child(2) {
      animation-delay: 0.3s;
    }

    .loader div:nth-child(3) {
      animation-delay: 0.6s;
    }

    @keyframes bounce {
      0%, 80%, 100% {
        transform: scale(0);
      }
      40% {
        transform: scale(1);
      }
    }
  </style>
</head>
<body>
  <div class="loader">
    <div></div>
    <div></div>
    <div></div>
  </div>

  <script>
    // Redirect after 3 seconds
    setTimeout(() => {
      window.location.href = "login.php"; // Replace with your desired URL
    }, 3000); // 3000ms = 3 seconds
  </script>
</body>
</html>

