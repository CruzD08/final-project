<?php
$fullname = $_POST['fullname'];
$email    = $_POST['email'];
$password = $_POST['password'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Successful</title>
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
          <li><a href="webtechseries2.html">Web Tech Series</a></li>
          <li><a href="https://cruzd08.github.io/cruzdelossantos.github.io/index.html" target="_blank">Setting Up Web Server</a></li>
          <li><a href="wsproposal3.html">Requirement Documents</a></li>
          <li><a href="https://cruzd08.github.io/CSS-Nav-Menu/" target="_blank">CSS Navigation</a></li>
          <li><a href="debugging.html">Debugging &amp; Pseudo Code</a></li>
          <li><a href="jspresentation.html">JS Presentation</a></li>
          <li><a href="mpgcalculator.html">MPG Calculator</a></li>
          <li><a href="slider.html">Image Slider</a></li>
          <li><a href="airisen.html">AI RISEN</a></li>
          <li><a href="invoiceform.html">Invoice Form</a></li>
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
    <h1>PHP Sign Up Form</h1>
  </div>

  <div class="wf-card fade-up delay-1">
    <div class="wf-icon">✅</div>
    <h2 class="wf-title">Signup Successful!</h2>
    <p class="wf-desc">Your information has been received.</p>

    <div class="calc-divider">submitted data</div>

    <div class="wf-result">
      <div class="wf-result-row">
        <span class="wf-result-label">Name</span>
        <span class="wf-result-value"><?php echo htmlspecialchars($fullname); ?></span>
      </div>
      <div class="wf-result-row">
        <span class="wf-result-label">Email</span>
        <span class="wf-result-value"><?php echo htmlspecialchars($email); ?></span>
      </div>
      <div class="wf-result-row">
        <span class="wf-result-label">Password</span>
        <span class="wf-result-value">••••••••</span>
      </div>
    </div>

    <a href="signupform.html" class="calc-btn"
       style="display:block; text-align:center; text-decoration:none; margin-top:24px;">
      ← Go Back
    </a>

  </div>

</div>

<footer>
  <p>© Copyright 2026. All Rights Reserved.</p>
  <p><a href="mailto:cruzmeirycollado@gmail.com">cruzmeirycollado@gmail.com</a></p>
</footer>

<script src="main.js"></script>
</body>
</html>