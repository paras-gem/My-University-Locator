<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Discover | Christ University Delhi NCR</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
<style>
:root {
  --bg: #f6f9ff;
  --text: #121a2b;
  --primary: #0047b3;
  --accent: #ffd43b;
  --card: #fff;
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
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}
header {
  display: flex; justify-content: space-between; align-items: center;
  background: var(--card); padding: 1em 2em;
  box-shadow: 0 2px 8px rgba(0,0,0,0.05); position: sticky; top: 0; z-index: 50;
}
header h2 { color: var(--primary); margin: 0; font-weight: 600; }
nav { display:flex; align-items:center; gap:1.2em; }
nav a { color: var(--primary); text-decoration:none; font-weight:500; transition: color 0.25s; }
nav a:hover, nav a.active { color: var(--accent); }
#darkToggle {
  background: var(--accent); border:none; border-radius:50%; width:36px; height:36px;
  cursor:pointer; font-size:1rem; display:flex; align-items:center; justify-content:center;
  transition:background 0.3s,color 0.3s;
}
#darkToggle:hover { background: var(--primary); color:#fff; }

main { max-width:960px; margin:3em auto 2em; padding:0 1.2em; flex:1; }
.discover-options, .search-section { display: flex; flex-wrap: wrap; gap:1em; justify-content: center; margin-bottom:2em; }
.card {
  background: var(--card);
  border-radius: 12px;
  box-shadow: 0 3px 10px rgba(0,0,0,0.06);
  padding: 1.5em;
  transition: transform 0.25s, box-shadow 0.25s;
  cursor: pointer;
  flex: 1 1 250px;
  max-width: 300px;
}
.card:hover {
  transform: scale(1.035) translateY(-5px);
  box-shadow: 0 8px 32px rgba(0,0,0,.11);
  border: 1px solid var(--accent);
}
h1.title, h2.sub-title { text-align:center; color: var(--primary); }
h2.sub-title { margin-bottom:1em; }
#facultyList, #campusList { display:flex; flex-wrap: wrap; gap:1em; justify-content:flex-start; width:100%; max-width:960px; }
.card-result { flex: 1 1 280px; min-width:280px; max-width:100%; display:flex; flex-direction:column; justify-content:space-between; }
.card-result h4 { color: var(--primary); margin-bottom:0.4em; }
.card-result p { color: var(--text); font-size:0.95rem; margin:0; }

.search-wrap { display:flex; justify-content:center; position:relative; gap:0.5em; margin-bottom:1em; width:100%; max-width:400px; flex-direction:row; }
.search-wrap input {
  flex:1;
  padding:0.9em 1.2em; border-radius:50px; border:1.8px solid var(--primary);
  font-size:1rem; background: var(--card); color: var(--text); outline:none; transition:0.3s;
}
.search-wrap input:hover, .search-wrap input:focus { border-color:var(--accent); box-shadow:0 4px 18px rgba(0,0,0,0.08); }
.search-wrap button {
  padding:0.9em 1.2em; border-radius:50px; border:none; background: var(--primary);
  color:#fff; cursor:pointer; font-weight:600; transition:0.3s;
}
.search-wrap button:hover { background: var(--accent); color: var(--text); }
#facultySuggestions, #campusSuggestions {
  position:absolute; top:55px; width:100%; background: var(--card);
  border:1px solid var(--primary); border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.1);
  display:none; z-index:100; max-height:220px; overflow-y:auto;
}
.suggest-item { padding:8px 12px; cursor:pointer; border-bottom:1px solid rgba(0,0,0,0.05); transition:background 0.2s; }
.suggest-item:hover { background: var(--accent); color: var(--text); }

.go-back-btn {
  padding:0.7em 1.2em; border:none; border-radius:8px; background:var(--primary); color:#fff;
  font-weight:600; cursor:pointer; margin-top:2em; transition:0.3s; display:block; margin-left:auto; margin-right:auto;
}
.go-back-btn:hover { background: var(--accent); color: var(--text); }

footer { text-align:center; background: var(--card); padding:1em; font-size:0.9rem; color:#6a7788; margin-top:2em;}
</style>
</head>
<body>
<header>
  <h2>Christ University Delhi NCR</h2>
  <nav>
    <a href="index.php">Home</a>
    <a href="discover.php" class="active">Discover</a>
    <a href="gallery.php">Gallery</a>
    <a href="contact.php">Contact</a>
    <button id="darkToggle">🌙</button>
  </nav>
</header>

<main>
  <h1 class="title">Discover Campus & Faculty</h1>

  <div class="discover-options" id="mainOptions">
    <div class="card" onclick="showFaculty()">
      <h4>Navigate Faculty</h4>
      <p>Search and explore faculty members across departments.</p>
    </div>
    <div class="card" onclick="showCampus()">
      <h4>Navigate Campus</h4>
      <p>Search and explore rooms, labs, and other campus facilities.</p>
    </div>
  </div>

  <!-- Faculty Section -->
  <div class="search-section" id="facultySection" style="display:none; flex-direction:column; align-items:center;">
    <h2 class="sub-title">Faculty Directory</h2>
    <div class="search-wrap">
      <input type="search" id="facultyInput" placeholder="Search faculty or department..." autocomplete="off" />
      <button id="facultyBtn">Search</button>
      <div id="facultySuggestions"></div>
    </div>
    <div id="facultyList"></div>
    <button class="go-back-btn" onclick="goBack()">Go Back</button>
  </div>

  <!-- Campus Section -->
  <div class="search-section" id="campusSection" style="display:none; flex-direction:column; align-items:center;">
    <h2 class="sub-title">Campus Facilities / Rooms</h2>
    <div class="search-wrap">
      <input type="search" id="campusInput" placeholder="Search room, block or venue..." autocomplete="off" />
      <button id="campusBtn">Search</button>
      <div id="campusSuggestions"></div>
    </div>
    <div id="campusList"></div>
    <button class="go-back-btn" onclick="goBack()">Go Back</button>
  </div>
</main>

<footer>© 2025 Christ University Delhi NCR | Campus Locator</footer>

<script>
// Theme toggle
const toggle = document.getElementById('darkToggle');
if(localStorage.getItem('theme')==='dark'){document.body.classList.add('dark'); toggle.textContent='☀️';}
toggle.onclick = () => {
  document.body.classList.toggle('dark');
  const mode = document.body.classList.contains('dark');
  toggle.textContent = mode ? '☀️' : '🌙';
  localStorage.setItem('theme', mode ? 'dark' : 'light');
};

// Navigation toggles
function showFaculty() {
  document.getElementById('mainOptions').style.display='none';
  document.getElementById('facultySection').style.display='flex';
}
function showCampus() {
  document.getElementById('mainOptions').style.display='none';
  document.getElementById('campusSection').style.display='flex';
}
function goBack() {
  document.getElementById('facultySection').style.display='none';
  document.getElementById('campusSection').style.display='none';
  document.getElementById('mainOptions').style.display='flex';
  window.scrollTo({top:0, behavior:'smooth'});
}

/* -------- Faculty Search -------- */
const facultyInput = document.getElementById('facultyInput');
const facultySuggestions = document.getElementById('facultySuggestions');
const facultyList = document.getElementById('facultyList');
let facultyTimer;

facultyInput.addEventListener('input', () => {
  clearTimeout(facultyTimer);
  facultyTimer = setTimeout(fetchFacultySuggestions, 250);
});

async function fetchFacultySuggestions() {
  const query = facultyInput.value.trim();
  if(query.length < 1) { facultySuggestions.style.display = 'none'; return; }

  const res = await fetch(`search.php?q=${encodeURIComponent(query)}`);
  const data = await res.json();
  const departments = data.filter(d => d.type==='department' && d.Department.toLowerCase().includes(query.toLowerCase()));
  const faculty = data.filter(f => f.type==='faculty');

  facultySuggestions.innerHTML = '';
  [...departments, ...faculty].forEach(item => {
    if(item.type==='department') {
      facultySuggestions.innerHTML += `<div class="suggest-item" data-type="department" data-name="${item.Department}">${item.Department}</div>`;
    } else {
      facultySuggestions.innerHTML += `<div class="suggest-item" data-type="faculty" data-name="${item.Name}">${item.Name} <small>(${item.Department})</small></div>`;
    }
  });

  facultySuggestions.style.display = 'block';
  document.querySelectorAll('#facultySuggestions .suggest-item').forEach(el => {
    el.addEventListener('click', () => {
      facultyInput.value = el.dataset.name;
      facultySuggestions.style.display = 'none';
      renderFacultyResults();
    });
  });
}

document.getElementById('facultyBtn').addEventListener('click', renderFacultyResults);

async function renderFacultyResults() {
  const query = facultyInput.value.trim();
  if(query === '') { facultyList.innerHTML = '<p style="color:gray;">Please enter a search term.</p>'; return; }

  const res = await fetch(`search.php?q=${encodeURIComponent(query)}`);
  const data = await res.json();
  const results = data.filter(f => f.type==='faculty' && (
    f.Name.toLowerCase().includes(query.toLowerCase()) ||
    f.Department.toLowerCase().includes(query.toLowerCase())
  ));

  if(results.length === 0) { facultyList.innerHTML = '<p style="color:gray;">No results found.</p>'; return; }

  facultyList.innerHTML = results.map(f => `
  <div class="card-result">
    <h4>${f.Name}</h4>
    <p><strong>Email:</strong> ${f.Email}</p>  <!-- ✅ add this line -->
    <p><strong>Department:</strong> ${f.Department}</p>
    <p><strong>Location:</strong> ${f.Location}</p>
  </div>
`).join('')

}

/* -------- Campus Search -------- */
const campusInput = document.getElementById('campusInput');
const campusSuggestions = document.getElementById('campusSuggestions');
const campusList = document.getElementById('campusList');
let campusTimer;

campusInput.addEventListener('input', () => {
  clearTimeout(campusTimer);
  campusTimer = setTimeout(fetchCampusSuggestions, 250);
});

async function fetchCampusSuggestions() {
  const query = campusInput.value.trim();
  if(query.length < 1) { campusSuggestions.style.display = 'none'; return; }

  const res = await fetch(`search_rooms.php?q=${encodeURIComponent(query)}`);
  const data = await res.json();

  campusSuggestions.innerHTML = '';
  data.forEach(item => {
    campusSuggestions.innerHTML += `<div class="suggest-item" data-type="room" data-name="${item.RoomName}">${item.RoomName} <small>(${item.Block})</small></div>`;
  });

  campusSuggestions.style.display = 'block';
  document.querySelectorAll('#campusSuggestions .suggest-item').forEach(el => {
    el.addEventListener('click', () => {
      campusInput.value = el.dataset.name;
      campusSuggestions.style.display = 'none';
      renderCampusResults();
    });
  });
}

document.getElementById('campusBtn').addEventListener('click', renderCampusResults);

async function renderCampusResults() {
  const query = campusInput.value.trim();
  if(query === '') { campusList.innerHTML = '<p style="color:gray;">Please enter a search term.</p>'; return; }

  const res = await fetch(`search_rooms.php?q=${encodeURIComponent(query)}`);
  const data = await res.json();

  const results = data.filter(r =>
    r.RoomName.toLowerCase().includes(query.toLowerCase()) ||
    r.Block.toLowerCase().includes(query.toLowerCase()) ||
    (r.Venue && r.Venue.toLowerCase().includes(query.toLowerCase()))
  );

  if(results.length === 0) { campusList.innerHTML = '<p style="color:gray;">No results found.</p>'; return; }

  campusList.innerHTML = results.map(r => `
    <div class="card-result">
      <h4>${r.RoomName}</h4>
      <p><strong>Block:</strong> ${r.Block}</p>
      <p><strong>Venue:</strong> ${r.Floor}</p>
      <p><strong>Room Code:</strong> ${r.Type}</p>
    </div>
  `).join('');
}
</script>
</body>
</html>
