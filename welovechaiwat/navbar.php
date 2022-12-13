<!-- 
<nav>
  <label class="logo">Chaiwat</label>
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="register.php">Register</a></li>
    <li><a href="login.php">Login</a></li>
  </ul>
</nav> 
-->
<nav>
  <label class="logo">Chaiwat</label>
  <?php if (isset($_SESSION["username"])): ?>
    <label class="username"><?php echo $_SESSION["username"] ?></label>
  <?php endif; ?>
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="register.php">Register</a></li>
    <li><a href="login.php">Login</a></li>
  </ul>
</nav>
