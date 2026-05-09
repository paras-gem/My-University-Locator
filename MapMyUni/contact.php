<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Contact | Christ University Delhi NCR</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    :root {
      --bg: #f6f9ff;
      --text: #121a2b;
      --primary: #0047b3;
      --accent: #ffd43b;
      --card: #ffffff;
    }
    body.dark { --bg:#0f172a; --text:#e8eef7; --primary:#8fc7ff; --accent:#ffec83; --card:#1e293b; }
    body { background:var(--bg); color:var(--text); font-family:'Poppins',sans-serif; margin:0; opacity:0; animation:fadeInBody 1.1s both; transition:0.4s; }
    @keyframes fadeInBody { from{opacity:0; transform:translateY(16px);} to{opacity:1; transform:translateY(0);} }

    header { display:flex; justify-content:space-between; align-items:center; background:var(--card); padding:1em 2em; box-shadow:0 2px 8px rgba(0,0,0,0.05); position:sticky; top:0; z-index:50; }
    header h2 { color:var(--primary); margin:0; font-weight:600; }
    nav { display:flex; align-items:center; gap:1.2em; }
    nav a { color:var(--primary); text-decoration:none; font-weight:500; transition:0.25s; }
    nav a:hover, nav a.active { color:var(--accent); }
    #darkToggle { background:var(--accent); border:none; border-radius:50%; width:36px; height:36px; cursor:pointer; display:flex; align-items:center; justify-content:center; font-size:1rem; transition:0.3s; }
    #darkToggle:hover { background:var(--primary); color:#fff; }

    main { max-width:900px; margin:3em auto; padding:0 1em 3em; }
    h1 { text-align:center; color:var(--primary); font-size:1.7rem; margin-bottom:1.2em; animation:fadeInBlock 1s .03s both; }

    .info { text-align:center; margin-bottom:2em; animation:fadeInBlock 1s .07s both; }
    .info p { line-height:1.6; }

    .contact-container { display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:1.5em; margin-bottom:2em; }
    .contact-card { background:var(--card); padding:1.5em; border-radius:10px; box-shadow:0 2px 12px rgba(0,0,0,0.07); opacity:0; transform:translateY(60px); animation:fadeInCard 0.9s cubic-bezier(.46,.03,.52,.96) forwards; }
    .contact-card:nth-child(1) {animation-delay:0.1s;}
    .contact-card:nth-child(2) {animation-delay:0.22s;}
    .contact-card:nth-child(3) {animation-delay:0.34s;}
    .contact-card h4 { color:var(--primary); margin-bottom:0.8em; }
    .contact-card p, .contact-card a { color:var(--text); font-size:0.95rem; }
    .contact-card a:hover { text-decoration:underline; }

    form { background:var(--card); padding:2em 1.6em; border-radius:10px; box-shadow:0 2px 12px rgba(0,0,0,0.07); max-width:600px; margin:0 auto; display:flex; flex-direction:column; animation:fadeInBlock 1s .15s both; }
    form h4 { text-align:center; color:var(--primary); margin-bottom:1.2em; }
    label { font-weight:600; margin-bottom:0.4em; }
    input, textarea { padding:0.9em; border:1.6px solid var(--primary); border-radius:6px; background:var(--bg); color:var(--text); font-size:0.95rem; margin-bottom:1.2em; font-family:'Poppins',sans-serif; transition:border-color 0.25s, box-shadow 0.25s; resize:none; }
    input:focus, textarea:focus { border-color:var(--accent); box-shadow:0 0 8px var(--accent); outline:none; }
    textarea { height:120px; }
    button { align-self:center; background:var(--accent); border:none; padding:0.9em 2.4em; border-radius:6px; font-weight:600; font-size:1rem; color:#222; cursor:pointer; transition:0.3s; }
    button:hover { background:var(--primary); color:#fff; }

    footer { text-align:center; background:var(--card); padding:1em; color:#6a768a; font-size:0.9rem; border-top:1px solid rgba(0,0,0,0.1); }

    @keyframes fadeInBlock { from{opacity:0; transform:translateY(12px);} to{opacity:1; transform:translateY(0);} }
    @keyframes fadeInCard { from{opacity:0; transform:translateY(60px);} to{opacity:1; transform:translateY(0);} }
  </style>
</head>
<body>
  <header>
    <h2>Christ University Delhi NCR</h2>
    <nav>
      <a href="index.php">Home</a>
      <a href="discover.php">Discover</a>
      <a href="gallery.php">Gallery</a>
      <a href="contact.php" class="active">Contact</a>
      <button id="darkToggle">🌙</button>
    </nav>
  </header>

  <main>
    <h1>Contact Christ University Delhi NCR</h1>

    <div class="info">
      <p>
        For queries regarding admissions, academics, or campus facilities, please use the contact information below, send us a message, or email me directly at
        <a href="mailto:tushar.daga@bcah.christuniversity.in">tushar.daga@bcah.christuniversity.in</a>.
      </p>
    </div>

    <div class="contact-container">
      <div class="contact-card">
        <h4>Campus Address</h4>
        <p>
          Christ University Delhi NCR Campus<br>
          Mariam Nagar, Meerut Road,<br>
          Ghaziabad – 201003
        </p>
      </div>
      <div class="contact-card">
        <h4>Admissions & General Queries</h4>
        <p>
          Email: <a href="mailto:mail.ncr@christuniversity.in">mail.ncr@christuniversity.in</a><br>
          Toll-Free: 1800-123-3212<br>
          Phone: 0120-6666100
        </p>
      </div>
      <div class="contact-card">
        <h4>Administrative Office</h4>
        <p>
          Email: <a href="mailto:office.ncr@christuniversity.in">office.ncr@christuniversity.in</a><br>
          Phone: 0120-2988000
        </p>
      </div>
    </div>

    <form onsubmit="event.preventDefault(); alert('Your message has been sent!');">
      <h4>Send a Message</h4>
      <label for="name">Name</label>
      <input id="name" type="text" placeholder="Your Name" required>
      <label for="email">Email</label>
      <input id="email" type="email" placeholder="Your Email" required>
      <label for="message">Message</label>
      <textarea id="message" placeholder="Your Message" required></textarea>
      <button type="submit">Submit</button>
    </form>
  </main>

  <footer>© 2025 Christ University Delhi NCR | Contact & Support</footer>

  <script>
    const toggle = document.getElementById('darkToggle');
    if(localStorage.getItem('theme')==='dark') { 
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
