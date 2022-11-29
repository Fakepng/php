<?php require("helpers/db/db.php"); ?>
<?php
  function getColors($db_connection) {
    $sql = "SELECT * FROM color ";
    if (isset($_GET["search"])) {
      $search = mysqli_real_escape_string($db_connection, $_GET["search"]);
      $sql .= "WHERE title LIKE '%$search%' ";
    }
    $sql .= "ORDER BY id DESC;";
    $result = mysqli_query($db_connection, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
  }


  $searchTitle = "";
  $searchValue = "";
  if (isset($_GET["search"]) && $_GET["search"] != "") {
    $searchTitle = "Search for \"$_GET[search]\" ";
    $searchValue = $_GET["search"];
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require("html-components/head.php"); ?>
    <title><?php echo $searchTitle ?>COLOR</title>
    <link rel="stylesheet" href="./static/style.css">
  </head>
  <body>
    <?php require("html-components/header.php"); ?>
    <section class="section">
      <div class="container">
        <?php $rows = getColors($db_connection); ?>
        <form>
          <p>
            <input type="search" name="search" value="<?php echo $searchValue ?>">
            <button type="submit">Search</button>
          </p>
        </form>
        <h3>There are <?php echo count($rows); ?> colors in database</h3>
        <?php foreach ($rows as $row): ?>
          <div class="color-item" style="border-color: <?php echo $row["code"] ?>">
            <h4><?php echo $row["title"]; ?></h4>
            <p><?php echo $row["code"]; ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </section>
  </body>
</html>

<?php mysqli_close($db_connection); ?>
