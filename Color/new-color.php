<?php require("helpers/db/db.php"); ?>
<?php
  function createColor($db_connection) {
    $title = mysqli_real_escape_string($db_connection, $_POST["title"]);
    $code = mysqli_real_escape_string($db_connection, $_POST["code"]);
    $sql = "INSERT INTO color (title, code) VALUES ('$title', '$code');";
    return mysqli_query($db_connection, $sql);
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require("html-components/head.php"); ?>
    <title>New | COLOR</title>
    <link rel="stylesheet" href="./static/style.css">
  </head>
  <body>
    <?php require("html-components/header.php"); ?>
    <section class="section">
      <div class="container">
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
          <?php $result = createColor($db_connection); ?>
          <?php if ($result): ?>
            <h3>Color saved</h3>
            <p>
              <a href="./">Back</a>
            </p>
          <?php else: ?>
            <h3>Error while saving</h3>
            <p>
              <a href="new-color.php">Try again</a>
            </p>
          <?php endif; ?>
        <?php else: ?>
          <form method="post">
            <p>
              <label>Color code</label>
              <input type="color" name="code" require>
            </p>
            <p>
              <label>Color name</label>
              <input type="text" name="title" required>
            </p>
            <p>
              <button type="submit">Save</button>
            </p>
          </form>
        <?php endif; ?>
      </div>
    </section>
  </body>
</html>

<?php mysqli_close($db_connection); ?>