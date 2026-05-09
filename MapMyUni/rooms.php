<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Campus Rooms | Christ University Delhi NCR</title>
  <style>
    body {
      font-family: "Poppins", sans-serif;
      background-color: #f6f8ff;
      text-align: center;
      padding: 40px;
    }
    h1 {
      color: #003399;
      margin-bottom: 20px;
    }
    .search-box {
      position: relative;
      display: inline-block;
      margin-top: 10px;
    }
    input[type="text"] {
      width: 350px;
      padding: 12px;
      border: 2px solid #f1c232;
      border-radius: 25px;
      font-size: 16px;
      outline: none;
    }
    button {
      background-color: #003399;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      font-weight: 500;
      margin-left: 5px;
    }
    .suggestions {
      position: absolute;
      top: 45px;
      left: 0;
      width: 100%;
      background: white;
      border: 1px solid #ddd;
      border-radius: 10px;
      max-height: 200px;
      overflow-y: auto;
      z-index: 10;
    }
    .suggestions div {
      padding: 10px;
      cursor: pointer;
      text-align: left;
      border-bottom: 1px solid #eee;
    }
    .suggestions div:hover {
      background-color: #f1f1f1;
    }
    .results {
      list-style-type: none;
      padding: 0;
      width: 400px;
      margin: 25px auto;
    }
    .results li {
      background: white;
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 10px;
      margin-top: 10px;
      text-align: left;
    }
    .go-back {
      display: block;
      width: 120px;
      margin: 40px auto;
      background-color: #003399;
      color: white;
      border: none;
      border-radius: 8px;
      padding: 10px;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <h1>Campus Rooms & Facilities</h1>

  <div class="search-box">
    <input type="text" id="searchInput" placeholder="Search rooms by name or code..." onkeyup="showSuggestions(this.value)">
    <button onclick="searchRooms()">Search</button>
    <div class="suggestions" id="suggestionsBox"></div>
  </div>

  <ul class="results" id="results"></ul>

  <button class="go-back" onclick="window.location.href='discover.php?section=campus'">Go Back</button>

  <script>
    // Fetch live suggestions
    function showSuggestions(query) {
      const box = document.getElementById("suggestionsBox");
      if (query.length < 2) {
        box.innerHTML = "";
        return;
      }

      fetch(`search_rooms.php?q=${encodeURIComponent(query)}`)
        .then(res => res.json())
        .then(data => {
          box.innerHTML = "";
          if (data.length === 0) {
            box.innerHTML = "<div>No match found</div>";
            return;
          }

          data.forEach(room => {
            const div = document.createElement("div");
            div.textContent = `${room.name} (${room.room_code})`;
            div.onclick = () => {
              document.getElementById("searchInput").value = room.name;
              box.innerHTML = "";
              searchRooms();
            };
            box.appendChild(div);
          });
        })
        .catch(err => console.error("Error fetching suggestions:", err));
    }

    // Search rooms and show results
    function searchRooms() {
      const query = document.getElementById("searchInput").value.trim();
      if (query.length === 0) return;

      fetch(`search_rooms.php?q=${encodeURIComponent(query)}`)
        .then(response => response.json())
        .then(data => {
          const resultsList = document.getElementById("results");
          resultsList.innerHTML = "";

          if (data.length === 0) {
            resultsList.innerHTML = "<li>No rooms found.</li>";
            return;
          }

          data.forEach(room => {
            const li = document.createElement("li");
            li.innerHTML = `
              <strong>${room.name}</strong> (${room.room_code})<br>
              Block: ${room.block || 'N/A'}<br>
              Venue: ${room.venue || 'N/A'}
            `;
            resultsList.appendChild(li);
          });
        })
        .catch(err => console.error("Error searching rooms:", err));
    }
  </script>

</body>
</html>
