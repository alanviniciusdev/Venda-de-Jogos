<?php
session_start();

$duracao = 5;

if (isset($_GET['start']) || !isset($_SESSION['fim'])) {
    $_SESSION['inicio'] = time();
    $_SESSION['fim'] = time() + $duracao;
    $_SESSION['desarmado'] = false;
    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
    exit;
}
if (isset($_GET['desarmar']) && $_GET['desarmar'] == '1') {
    $_SESSION['desarmado'] = true;
}

$fim = $_SESSION['fim'];
$agora = time();
$restante = max(0, $fim - $agora);

if ($restante > 0 && !$_SESSION['desarmado']) {
    header("Refresh: 1");
}
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>💣 Desarme a Bomba</title>
  <style>
    body {
      background: radial-gradient(circle at top, #111, #000);
      color: #fff;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
      text-align: center;
    }

    h1 {
      font-size: 2.5rem;
      color: #ff4444;
      text-transform: uppercase;
      letter-spacing: 2px;
      margin-bottom: 1rem;
      text-shadow: 0 0 20px #ff0000aa;
    }

    .timer {
      font-size: 4rem;
      font-weight: bold;
      background: #000;
      border: 2px solid #ff4444;
      padding: 1rem 2rem;
      border-radius: 12px;
      box-shadow: 0 0 20px #ff000099;
      width: fit-content;
      animation: pulse 1s infinite;
    }

    @keyframes pulse {
      0% { box-shadow: 0 0 20px #ff000099; }
      50% { box-shadow: 0 0 40px #ff0000cc; }
      100% { box-shadow: 0 0 20px #ff000099; }
    }

    .btn {
      display: inline-block;
      background: #ff4444;
      color: white;
      text-decoration: none;
      padding: 10px 20px;
      border-radius: 8px;
      margin: 10px;
      font-weight: bold;
      transition: 0.3s;
      box-shadow: 0 0 10px #ff000088;
    }

    .btn:hover {
      background: #ff2222;
      transform: scale(1.05);
      box-shadow: 0 0 20px #ff0000bb;
    }

    .btn.green {
      background: #2ecc71;
      box-shadow: 0 0 10px #00ff8899;
    }

    .btn.green:hover {
      background: #27ae60;
      box-shadow: 0 0 20px #00ff88bb;
    }

    .boom {
      font-size: 5rem;
      color: #ff0000;
      font-weight: bold;
      text-shadow: 0 0 30px #ff0000cc, 0 0 60px #ff0000aa;
      animation: boom 0.5s infinite alternate;
    }

    @keyframes boom {
      from { transform: scale(1); opacity: 1; }
      to { transform: scale(1.2); opacity: 0.8; }
    }

    p {
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <h1>💣 Desarme a Bomba</h1>

  <?php if (!empty($_SESSION['desarmado'])): ?>
    <p class="timer" style="color:#00ff99; border-color:#00ff99; box-shadow:0 0 20px #00ff99aa;">Bomba Desarmada ✅</p>
    <p><a class="btn green" href="?start=1">Reiniciar</a></p>

  <?php else: ?>
    <?php if ($restante > 0): ?>
      <p class="timer"><?= str_pad($restante, 2, "0", STR_PAD_LEFT) ?> s</p>
      <p>
        <a class="btn" href="?desarmar=1">Desarmar</a>
        <a class="btn green" href="?start=1">Reiniciar</a>
      </p>
    <?php else: ?>
      <div class="boom">💥 BOOM!</div>

      <audio id="explosao" autoplay>
        <source src="explosao.mp3" type="audio/mpeg">
        Seu navegador não suporta áudio.
      </audio>

      <script>
        window.onload = () => {
          const som = document.getElementById('explosao');
          if (som && !sessionStorage.getItem("somTocado")) {
            som.play().catch(() => {});
            sessionStorage.setItem("somTocado", "1");
          }
        };
      </script>

      <p><a class="btn" href="?start=1" onclick="sessionStorage.removeItem('somTocado')">Reiniciar</a></p>
    <?php endif; ?>
  <?php endif; ?>
</body>
</html>
