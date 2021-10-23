<?php include('../config.php'); ?>
<div class="header">
	<div class="logo">
		<a href="<?php echo BASE_URL . 'nanny/nanny.php' ?>">
			<h1>Nanny Management System-Nanny </h1>
		</a>
	</div>
	<link rel="stylesheet" href="../static/css/admin_styling.css">
	<?php if (isset($_SESSION['user_nanny'])) : ?>
		<div class="user-info">
			<span><?php echo $_SESSION['user_nanny']['username']; ?></span> &nbsp; &nbsp;
			<a href="<?php echo '../logout.php'; ?>" class="logout-btn">logout</a>
		</div>
	<?php endif ?>
</div>