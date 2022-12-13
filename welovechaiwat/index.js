include("fs");

const navbar_li = document.getElementsByTagName("li");
console.log(navbar_li[0].classList);
navbar_li[0].classList.add("active");
/*
<nav>
  <label class="logo">Chaiwat</label>
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="register.php">Register</a></li>
    <li><a href="login.php">Login</a></li>
  </ul>
</nav>
*/
