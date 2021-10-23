<div class="header">
  <div class="logo">
    <a href="<?php echo BASE_URL .'Pusers/booking.php' ?>">
      <h1>Nanny Management System-Parent</h1>
    </a>
  </div>
  <div class="user-info">
  <link rel="stylesheet" href="../static/css/admin_styling.css">
    <span><?php echo $_SESSION['user']['username'];?></span> &nbsp; &nbsp; <a href="<?php echo '../logout.php'; ?>" class="logout-btn">logout</a>
  </div>
</div>
