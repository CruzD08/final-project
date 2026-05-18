<?php
// Database connection
$host = "sql302.infinityfree.com";
$user = "if0_41704562";
$pass = "Meiry8702";
$db   = "if0_41704562_guestbook_app";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars($_POST['name']);
    $message = htmlspecialchars($_POST['message']);
    $sql = "INSERT INTO guestbook_entries (name, message) VALUES ('$name', '$message')";
    $conn->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guestbook</title>
  <link rel="stylesheet" href="CSS/styles.css">
</head>
<body>

<nav class="navbar">
  <div class="nav-inner">
    <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation" aria-expanded="false">☰</button>
    <ul class="nav-menu" id="navMenu">
      <li><a href="index.html">Home</a></li>
      <li class="dropdown">
        <a href="bis23.html">BIS 23 ▾</a>
        <ul class="dropdown-menu">
          <li><a href="equipbudget.html">Equipment Budget</a></li>
          <li><a href="Webtechseries.html">Web Tech Series</a></li>
          <li><a href="https://cruzd08.github.io/cruzdelossantos.github.io/index.html" target="_blank">Setting Up Web Server</a></li>
          <li><a href="wsproposal3.html">Requirement Documents</a></li>
          <li><a href="https://cruzd08.github.io/CSS-Nav-Menu/" target="_blank">CSS Navigation</a></li>
          <li><a href="debugging.html">Debugging &amp; Pseudo Code</a></li>
          <li><a href="jspresentation.html">JS Presentation</a></li>
          <li><a href="mpgcalculator.html">MPG Calculator</a></li>
          <li><a href="slider.html">Image Slider</a></li>
          <li><a href="airisen.html">AI RISEN</a></li>
          <li><a href="invoice.html">Invoice Form</a></li>
          <li><a href="mortgage.html">Mortgage Calculator</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="bis31.html">BIS 31 ▾</a>
        <ul class="dropdown-menu">
          <li><a href="researchbusws.html">Research Business Web Sites</a></li>
          <li><a href="https://cruzd08.github.io/cruzdelossantos.github.io/index.html" target="_blank">Setting Up Web Server</a></li>
          <li><a href="wsproposal1.html">Requirement Documents</a></li>
          <li><a href="phpquiz.html">W3Schools PHP Quiz</a></li>
          <li><a href="https://cruzd08.github.io/CSS-Nav-Menu/" target="_blank">CSS Navigation</a></li>
          <li><a href="php_loops.html">PHP Loops</a></li>
          <li><a href="randomValues.php">Random Numbers in PHP</a></li>
          <li><a href="signupform.html">Sign Up Form</a></li>
          <li><a href="webform.html">PHP &amp; MySQL Setup</a></li>
          <li><a href="paycheck.html">Paycheck Calculator</a></li>
          <li><a href="guestbook.php">Guestbook</a></li>
        </ul>
      </li>
  </li>
      <li class="dropdown">
  <a href="bis23projects.html">BIS 23 Projects ▾</a>
  <ul class="dropdown-menu">
    <li><a href="http://bluebloomtravelagency.42web.io/index.php" target="_blank">Final Project</a></li>
  </ul>
</li>
<li class="dropdown">
  <a href="bis31projects.html">BIS 31 Projects ▾</a>
  <ul class="dropdown-menu">
    <li><a href="https://termproject2.42web.io/index.php" target="_blank">Prototype Term Project</a></li>
    <li><a href="guestbook.php" target="_blank">Guestbook</a></li>
    <li><a href="http://bluebloomtravelagency.42web.io/index.php" target="_blank">Final Project</a></li>
  </ul>
</li>
    </ul>
  </div>
</nav>

<div class="container">

  <div class="page-intro fade-up">
    <span class="badge badge-gold">BIS 31</span>
    <h1>Guestbook</h1>
    <p>Sign the guestbook! Your message will be saved to a MySQL database and displayed below.</p>
  </div>

  <!-- FORM -->
  <div class="guestbook-form fade-up delay-1">
    <h2>✍️ Leave a Message</h2>

    <form method="POST" action="guestbook.php">

      <div class="calc-field">
        <label for="name">Your Name</label>
        <input type="text" id="name" name="name"
               placeholder="e.g. Cruz De Los Santos" required>
      </div>

      <div class="calc-field">
        <label for="message">Message</label>
        <textarea id="message" name="message"
                  placeholder="Write your message here..." required></textarea>
      </div>

      <button type="submit" class="calc-btn">Post Message →</button>

    </form>
  </div>

  <!-- ENTRIES -->
  <div class="guestbook-entries fade-up delay-2">
    <h2>💬 Messages</h2>

    <?php
    $result = $conn->query(
        "SELECT * FROM guestbook_entries ORDER BY submitted_at DESC"
    );

    if ($result->num_rows === 0): ?>
      <div class="no-entries">No messages yet. Be the first to sign the guestbook! 😊</div>
    <?php else:
      while ($row = $result->fetch_assoc()): ?>
        <div class="guestbook-entry">
          <p class="entry-name">👤 <?= htmlspecialchars($row['name']) ?></p>
          <p class="entry-message"><?= nl2br(htmlspecialchars($row['message'])) ?></p>
          <p class="entry-date">📅 <?= $row['submitted_at'] ?></p>
        </div>
      <?php endwhile;
    endif;

    $conn->close();
    ?>

  </div>

</div>

<footer>
  <p>© Copyright 2026. All Rights Reserved.</p>
  <p><a href="mailto:cruzmeirycollado@gmail.com">cruzmeirycollado@gmail.com</a></p>
</footer>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="main.js"></script>


</body>
</html>