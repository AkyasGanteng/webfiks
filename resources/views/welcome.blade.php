<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Web Gudang</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      overflow: hidden;
      font-family: Arial, sans-serif;
      color: white;
    }

    #bg-video {
      position: fixed;
      top: 50%;
      left: 50%;
      min-width: 100%;
      min-height: 100%;
      transform: translate(-50%, -50%);
      object-fit: cover;
      z-index: -1;
      filter: brightness(0.5);
    }

    #toggle-sound-button {
      position: absolute;
      top: 20px;
      right: 20px;
      z-index: 10;
      padding: 10px 15px;
      font-size: 16px;
      background-color: rgba(0, 0, 0, 0.6);
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    #toggle-sound-button:hover {
      background-color: rgba(255, 255, 255, 0.2);
    }

    .content {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      z-index: 2;
      padding: 20px;
    }

    /* Efek masuk */
    .content h1, .content p {
      opacity: 0;
      transform: scale(0.8) translateY(20px);
      animation: fadeInZoom 1.5s ease-out forwards;
    }

    .content p {
      animation-delay: 1s;
    }

    @keyframes fadeInZoom {
      to {
        opacity: 1;
        transform: scale(1) translateY(0);
      }
    }

    /* Efek laser kilau */
    .laser-text {
      position: relative;
      display: inline-block;
      color: yellow;
      text-shadow: 2px 2px 0 #000, 4px 4px 0 #000;
      overflow: hidden;
    }

    .laser-text::after {
      content: '';
      position: absolute;
      top: 0;
      left: -50%;
      width: 200%;
      height: 100%;
      background: linear-gradient(120deg, transparent 0%, rgba(255,255,255,0.5) 50%, transparent 100%);
      animation: shine 2.5s infinite linear;
      pointer-events: none;
    }

    @keyframes shine {
      0% {
        left: -100%;
      }
      100% {
        left: 100%;
      }
    }

    .auth-links {
      margin-top: 40px;
    }

    .auth-links a {
      display: inline-block;
      margin: 0 12px;
      padding: 10px 25px;
      background: rgba(255, 255, 255, 0.15);
      color: white;
      text-decoration: none;
      font-weight: bold;
      border-radius: 6px;
      transition: background-color 0.3s, transform 0.2s;
    }

    .auth-links a:hover {
      background: rgba(255, 255, 255, 0.4);
      transform: scale(1.05);
    }
  </style>
</head>
<body>

  <!-- Video Background -->
  <video autoplay muted loop id="bg-video" playsinline>
    <source src="{{ asset('darthvader.mp4') }}" type="video/mp4" />
    Browser kamu tidak support video.
  </video>

  <!-- Tombol Suara -->
  <button id="toggle-sound-button">🔇 Suara Mati</button>

  <!-- Konten Utama -->
  <div class="content">
    <h1 class="laser-text">Selamat Datang di Gudang Kantin</h1>
    <p class="laser-text">Login dan regis dulu yuk</p>

    <div class="auth-links">
      <a href="{{ route('login') }}">Login</a>
      <a href="{{ route('register') }}">Register</a>
    </div>
  </div>

  <!-- Script Toggle Suara -->
  <script>
    const video = document.getElementById('bg-video');
    const button = document.getElementById('toggle-sound-button');

    button.addEventListener('click', () => {
      if (video.muted) {
        video.muted = false;
        video.play();
        button.textContent = '🔊 Suara Nyala';
      } else {
        video.muted = true;
        button.textContent = '🔇 Suara Mati';
      }
    });
  </script>
</body>
</html>
