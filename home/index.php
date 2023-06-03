<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" data-bs-theme="dark">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
  <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body>

<main>
  <header class="p-3 mb-3 border-bottom">
    <div class="">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <h5>Url Shortener</h5>
        </ul>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add New Shortlink
</button>
        <div class="isi" style="padding-right: 12px;"></div>

        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bgs";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, userID, shortUrl, originUrl FROM url";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "  <table class='table'>
    <thead>
      <tr>
      <th scope='col'>Number</th>
        <th scope='col'>Short Url</th>
        <th scope='col'>Long Url</th>
        <th scope='col-2'>Action</th>
        
    </thead>
    <tbody>";
    // Loop through each row of data
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td> 1 </td>";
        echo "<td> <a onclick=\"copyToClipboard('" . $row["shortUrl"] . "')\">". $row["shortUrl"] ."</a> </td>";
        echo "<td> <a onclick=\"copyToClipboard('" . $row["originUrl"] . "')\">". $row["originUrl"] ."</a> </td>";
        echo "<td> <button type='button' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#exampleModal'>Danger</button> 
        <button type='button' class='btn btn-warning btn-sm ' data-bs-toggle='modal' data-bs-target='#exampleModal'>Danger</button></td>";
        
        echo "</tr>";
    }
    
    echo "  </tbody> </table>";
} else {
    echo "No data found in the bgs table.";
}

// Close the database connection
$conn->close();
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Shortlink</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label for="inputPassword5" class="form-label">Shortlink</label>
        <input class="form-control" type="text" placeholder="Default input" aria-label="default input example">
        <div id="passwordHelpBlock" class="form-text">
  <p>Sistem will give you random code combination but you can change it what you want.</p> 
</div>

        <label for="inputPassword5" class="form-label">Original Link</label>
        <input class="form-control" type="text" placeholder="Default input" aria-label="default input example">



      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

</main>

<script>
function copyToClipboard(url) {
    var tempInput = document.createElement("input");
    tempInput.style = "position: absolute; left: -1000px; top: -1000px";
    tempInput.value = url;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);
    alert("URL copied to clipboard: " + url);
}
</script>

    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      
  </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>

