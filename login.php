<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <style>
    body {
      background-color: #e0f2ff;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .login-box {
      background: white;
      padding: 35px;
      border-radius: 12px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.2);
      width: 350px;
    }

    h2 {
      text-align: center;
      color: #007BFF;
      margin-bottom: 25px;
    }

    input {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      border-radius: 6px;
      border: 1px solid #ccc;
      font-size: 14px;
    }

    button {
      width: 100%;
      margin-top: 20px;
      padding: 12px;
      background-color: #007BFF;
      border: none;
      color: white;
      font-size: 16px;
      border-radius: 6px;
      cursor: pointer;
    }

    button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

  <div class="login-box">
    <h2>Login Admin</h2>
    <form action="cek_login.php" method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
  </div>

</body>
</html>
