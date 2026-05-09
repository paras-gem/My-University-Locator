<?php
$galleryDir = 'img/gallery/'; // folder containing gallery images
$images = array_filter(scandir($galleryDir), function($file) use ($galleryDir) {
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    return in_array($ext, ['jpg','jpeg','png','gif']);
});
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Gallery | Christ University Delhi NCR</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    :root {
      --bg: #f6f9ff; --text: #121a2b; --primary: #0047b3; --accent: #ffd43b; --card: #ffffff;
    }
    body.dark { --bg:#0f172a; --text:#e8eef7; --primary:#8fc7ff; --accent:#ffec83; --card:#1e293b; }
    body { background:var(--bg); color:var(--text); font-family:'Poppins',sans-serif; margin:0; opacity:0; animation:fadeInBody 1.1s forwards; transition:0.4s; }
    header { display:flex; justify-content:space-between; align-items:center; background:var(--card); padding:1em 2em; box-shadow:0 2px 8px rgba(0,0,0,0.05); position:sticky; top:0; z-index:50; }
    header h2 { color:var(--primary); margin:0; font-weight:600; }
    nav { display:flex; align-items:center; gap:1.2em; }
    nav a { color:var(--primary); text-decoration:none; font-weight:500; transition:0.25s; }
    nav a:hover, nav a.active { color:var(--accent); }
    #darkToggle { background:var(--accent); border:none; border-radius:50%; width:36px; height:36px; cursor:pointer; display:flex; align-items:center; justify-content:center; font-size:1rem; transition:0.3s; }
    #darkToggle:hover { background:var(--primary); color:#fff; }
    .gallery-container { max-width:1200px; margin:3em auto 2em; padding:0 1em; }
    .welcome-message { text-align:center; font-size:1.25rem; font-weight:500; margin-bottom:2em; color:var(--primary); letter-spacing:0.5px; animation:fadeInMessage 1.2s 0.1s both; }
    h1 { text-align:center; color:var(--primary); margin-bottom:0.7em; font-size:2rem; animation:fadeInTitle 1.1s; }
    .gallery-grid { display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:1.4em; }
    .gallery-grid img { width:100%; height:230px; border-radius:10px; object-fit:cover; background:#e4e4e4; box-shadow:0 3px 12px rgba(0,0,0,0.08); opacity:0; transform:translateY(50px) scale(.98); animation:galleryFadeIn 0.8s cubic-bezier(.55,.06,.68,.19) forwards; will-change:opacity, transform; }
    .gallery-grid img:hover { transform:scale(1.045) translateY(-6px); box-shadow:0 8px 32px rgba(0,0,0,.13); outline:2.5px solid var(--accent); outline-offset:2px; opacity:1; }
    footer { text-align:center; background:var(--card); padding:1em; font-size:0.9rem; color:#6a7788; border-top:1px solid rgba(0,0,0,0.09); margin-top:2em; }
    @keyframes fadeInBody { from{opacity:0;transform:translateY(16px);} to{opacity:1;transform:translateY(0);} }
    @keyframes fadeInMessage { from{opacity:0;transform:translateY(-18px);} to{opacity:1;transform:translateY(0);} }
    @keyframes fadeInTitle { from{opacity:0;transform:scale(0.98);} to{opacity:1;transform:scale(1);} }
    @keyframes galleryFadeIn { from{opacity:0;transform:translateY(50px) scale(.98);} to{opacity:1;transform:translateY(0) scale(1);} }
  </style>
</head>
<body>
  <header>
    <h2>Christ University Delhi NCR</h2>
    <nav>
      <a href="index.php">Home</a>
      <a href="discover.php">Discover</a>
      <a href="gallery.php" class="active">Gallery</a>
      <a href="contact.php">Contact</a>
      <button id="darkToggle" aria-label="Toggle dark mode">🌙</button>
    </nav>
  </header>

  <div class="gallery-container">
    <h1>Campus Gallery</h1>
    <div class="welcome-message">
      Welcome to our gallery! Experience the vibrant life and beautiful spaces of Christ University Delhi NCR.
    </div>
    <div class="gallery-grid">
      <?php foreach($images as $index => $img): ?>
        <img src="<?= $galleryDir . htmlspecialchars($img) ?>" alt="Campus Image <?= $index+1 ?>" style="animation-delay: <?= 0.15 + $index*0.17 ?>s;" />
      <?php endforeach; ?>
    </div>
  </div>

  <footer>© 2025 Christ University Delhi NCR | Gallery</footer>

  <script>
    const toggle = document.getElementById('darkToggle');
    if(localStorage.getItem('theme')==='dark'){document.body.classList.add('dark'); toggle.textContent='☀️';}
    toggle.onclick = () => {
      document.body.classList.toggle('dark');
      const mode = document.body.classList.contains('dark');
      toggle.textContent = mode?'☀️':'🌙';
      localStorage.setItem('theme', mode?'dark':'light');
    };
  </script>
</body>
</html>
