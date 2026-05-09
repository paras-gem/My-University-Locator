<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Christ University Delhi NCR | Campus Locator</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    :root {
      --bg: #f6f9ff;
      --text: #121a2b;
      --primary: #0047b3;
      --accent: #ffd43b;
      --card: #ffffff;
    }
    body.dark { 
      --bg: #0f172a; 
      --text: #e8eef7; 
      --primary: #8fc7ff; 
      --accent: #ffec83; 
      --card: #1e293b; 
    }
    body {
      background: var(--bg);
      color: var(--text);
      font-family: 'Poppins', sans-serif;
      margin: 0;
      opacity: 0;
      animation: fadeInBody 1.1s both;
      transition: background 0.4s, color 0.4s;
    }
    @keyframes fadeInBody { from { opacity:0; transform:translateY(16px);} to { opacity:1; transform:translateY(0);} }

    /* ================= HERO VIDEO ================= */
  .hero-video {
  width: 100%;
  max-height: 65vh; /* 60% of screen height */
  object-fit: cover;
  display: block;
}

    .hero-text {
      text-align: center;
      margin-top: 1.5em;
      color: var(--primary);
    }

    .hero-text h1 {
      font-size: 2rem;
      margin-bottom: 0.3em;
    }

    .hero-text p {
      font-size: 1.1rem;
      color: var(--text);
      opacity: 0.85; /* subtle transparency */
    }

    .video-credit {
      text-align: center;
      font-size: 0.9rem;
      color: #6a7788;
      margin-top: 0.8em;
      opacity: 0.7;
    }

    /* ================= NAVBAR ================= */
    header {
      display: flex; 
      justify-content: space-between; 
      align-items: center;
      background: var(--card); 
      padding: 1em 2em;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05); 
      position: sticky; 
      top: 0; 
      z-index: 50;
    }
    header h2 { color: var(--primary); margin:0; font-weight:600; }
    nav { display:flex; align-items:center; gap:1.2em; }
    nav a { color: var(--primary); text-decoration:none; font-weight:500; transition: color 0.25s; }
    nav a:hover, nav a.active { color: var(--accent); }
    #darkToggle {
      background: var(--accent); 
      border:none; 
      border-radius:50%; 
      width:36px; 
      height:36px;
      cursor:pointer; 
      font-size:1rem; 
      display:flex; 
      align-items:center; 
      justify-content:center;
      transition:background 0.3s,color 0.3s;
    }
    #darkToggle:hover { background: var(--primary); color:#fff; }

    /* ================= CONTENT ================= */
    .about {
      max-width:850px; 
      margin:3.5em auto; 
      padding:2em;
      text-align:center; 
      background:var(--card); 
      border-radius:10px;
      box-shadow:0 2px 8px rgba(0,0,0,0.06); 
      animation: fadeInBlock 0.9s 0.1s both;
    }
    .about h3 { color:var(--primary); font-size:1.5rem; margin-bottom:0.6em; }
    .about p { color:var(--text); line-height:1.7; }

    .discover-section { 
      padding:2.5em 1em 3.5em; 
      max-width:950px; 
      margin:0 auto; 
      animation: fadeInBlock 0.9s 0.2s both; 
    }
    .discover-title { 
      text-align:center; 
      font-size:1.6rem; 
      color:var(--primary); 
      margin-bottom:1.2em; 
      animation: fadeInBlock 1s 0.28s both; 
    }
    .discover-cards {
      display: flex; 
      flex-wrap: wrap; 
      gap:1.2em; 
      justify-content: center;
    }
    .card {
      background: var(--card);
      border-radius: 12px;
      box-shadow: 0 3px 10px rgba(0,0,0,0.06);
      padding: 1.6em;
      transition: transform 0.25s, box-shadow 0.25s;
      cursor: pointer;
      flex: 1 1 250px;
      max-width: 300px;
      opacity: 0;
      transform: translateY(60px);
      animation: fadeInCard 0.85s cubic-bezier(.46,.03,.52,.96) forwards;
    }
    .card:nth-child(1) { animation-delay: 0.34s;}
    .card:nth-child(2) { animation-delay: 0.48s;}
    .card:nth-child(3) { animation-delay: 0.62s;}
    .card:hover {
      transform: scale(1.035) translateY(-5px);
      box-shadow: 0 8px 32px rgba(0,0,0,.11);
      border: 1px solid var(--accent);
      opacity: 1;
    }
    .card h4 { color: var(--primary); margin-bottom:0.4em; }
    .card p { color: var(--text); font-size:0.95rem; }

    @keyframes fadeInBlock { from { opacity:0; transform:translateY(12px);} to { opacity:1; transform:translateY(0);} }
    @keyframes fadeInCard { from { opacity:0; transform:translateY(60px);} to { opacity:1; transform:translateY(0);} }

    footer { 
      text-align:center; 
      background: var(--card); 
      padding:1em; 
      font-size:0.9rem; 
      color:#6a7788; 
      margin-top:2em;
    }
  </style>
</head>

<body>
  <!-- NAVIGATION BAR -->
  <header>
    <h2>Christ University Delhi NCR</h2>
    <nav>
      <a href="index.php" class="active">Home</a>
      <a href="discover.php">Discover</a>
      <a href="gallery.php">Gallery</a>
      <a href="contact.php">Contact</a>
      <button id="darkToggle">🌙</button>
    </nav>
  </header>

  <!-- HERO VIDEO SECTION (Below Navbar) -->
  <section class="hero">
  <video autoplay muted loop playsinline class="hero-video">
    <source src="img/campus_banner.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>
</section>

<!-- Credits below everything -->
<div class="video-credit">
  <p>🎥 Video Credits: Christ University, Delhi NCR</p>
</div>


  <!-- ABOUT SECTION -->
  <section class="about">
    <h3>Welcome to Christ University Delhi NCR</h3>
    <p>
      Located in Mariam Nagar, Ghaziabad, this campus fosters innovation, research, and holistic development.
      Explore academics, student life, and faculty details through the Campus Locator system.
    </p>
  </section>

  <!-- DISCOVER SECTION -->
  <section class="discover-section">
    <h2 class="discover-title">Explore Highlights</h2>
    <div class="discover-cards">
      <div class="card" onclick="location.href='discover.php?section=faculty'">
        <h4>Faculty & Departments</h4>
        <p>Find professors, offices, and labs across different blocks.</p>
      </div>
      <div class="card" onclick="location.href='discover.php?section=campus'">
        <h4>Campus Facilities</h4>
        <p>Locate auditoriums, cafeterias, gym, and other amenities.</p>
      </div>
      <div class="card" onclick="location.href='contact.php'">
        <h4>Administrative Office</h4>
        <p>Get contact details, address, and location of the main office.</p>
      </div>
    </div>
  </section>

  <!-- FACULTY PREVIEW SECTION -->
  <section class="discover-section">
    <h2 class="discover-title">Faculty Directory Preview</h2>
    <div class="discover-cards">
      <?php
        $sql = "SELECT Name, Department, Location FROM faculty LIMIT 6";
        $result = $conn->query($sql);
        if($result && $result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo "<div class='card'>
                    <h4>".htmlspecialchars($row['Name'])."</h4>
                    <p><strong>Department:</strong> ".htmlspecialchars($row['Department'])."</p>
                    <p><strong>Location:</strong> ".htmlspecialchars($row['Location'])."</p>
                  </div>";
          }
        } else {
          echo "<p style='text-align:center;'>No faculty data found.</p>";
        }
        $conn->close();
      ?>
    </div>
  </section>

  <footer>© 2025 Christ University Delhi NCR | Campus Locator Project</footer>

  <script>
    const toggle = document.getElementById('darkToggle');
    if(localStorage.getItem('theme') === 'dark') { 
      document.body.classList.add('dark'); 
      toggle.textContent='☀️'; 
    }
    toggle.onclick = () => {
      document.body.classList.toggle('dark');
      const mode = document.body.classList.contains('dark');
      toggle.textContent = mode ? '☀️' : '🌙';
      localStorage.setItem('theme', mode ? 'dark' : 'light');
    };
  </script>
</body>
</html>
