<?php /* C:\xampp\htdocs\acme\resources\view/admin/layout/base.blade.php */ ?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">

	<title>Admin Panel <?php echo $__env->yieldContent('title'); ?> </title>

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.3/css/foundation.css">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

	<link rel="stylesheet" type="text/css" href="css/custom.css">



</head>
<body>


	<?php echo $__env->make('includes.admin-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	  <div class="off-canvas-content" data-off-canvas-content>


	  	<div class="title-bar">
		  <div class="title-bar-left">
		    <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
		    <span class="title-bar-title"><?php echo e(getenv('APP_NAME')); ?></span>
		  </div>

		</div>


	  	<?php echo $__env->yieldContent('content'); ?>

	  </div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.3/js/foundation.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

<script type="text/javascript">

(function() {

	'use strict';

	$(document).foundation();

})();


</script>

</body>
</html>