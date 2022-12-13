<?php require("helpers/db/db.php") ?>
<?php
if (!isset($_SESSION["username"])) {
  $_SESSION["message"] = "You must login first.";
  header("location: login.php");
}
?>

<?php
$query_sql = "SELECT * FROM posts ORDER BY id DESC";
$query = mysqli_query($conn, $query_sql);
$posts = mysqli_fetch_all($query);
?>

<section>
<?php foreach ($posts as $post): ?>
  <?php
  $post_id = $post["0"];
  $query_sql = "SELECT * FROM star WHERE post = '$post_id' ORDER BY id DESC;";
  $query = mysqli_query($conn, $query_sql);
  $stars = mysqli_fetch_all($query);
  $star_total = 0; 
  foreach ($stars as $star):
    $star_total += $star["1"];
  endforeach;
  if (count($stars) != 0) {
    $post["star"] = round($star_total / count($stars), 2);
  } else {
    $post["star"] = 0;
  }
  ?>
  <h3><?php echo $post["1"] ?></h3>
  <p><?php echo $post["2"] ?></p>
  <form action="add_star.php" method="post">
    <label for="star">Star</label>
    <input type="number" name="star" value=5 min=1 max=5>
    <input type="hidden" name="post" value="<?php echo $post_id ?>">
    <button type="submit">Submit</button>
  </form>
  <p>Total: <?php echo $post["star"] ?></p>
  <?php foreach($stars as $star): ?>
    <p><?php echo $star["3"] ?>: <?php echo $star["1"] ?></p>
  <?php endforeach; ?>
  <p><?php echo $post["3"] ?></p>
  <hr>
<?php endforeach; ?>
</section>
