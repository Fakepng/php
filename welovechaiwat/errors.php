<?php if (isset($_SESSION["errors"])): ?>
  <?php $errors = $_SESSION["errors"]; ?>
  <section class="error-container">
    <?php foreach($errors as $error): ?>
      <p class="error"><?php echo $error; ?></p><br>
    <?php endforeach; ?>
  </section>
  <?php unset($_SESSION["errors"]); ?>
<?php endif; ?>