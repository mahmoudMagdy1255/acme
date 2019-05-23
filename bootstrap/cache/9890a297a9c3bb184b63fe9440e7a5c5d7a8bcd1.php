<?php /* C:\wamp64\www\acme\resources\view/admin/dashboard.blade.php */ ?>
<?php $__env->startSection('title' , 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>

	<div class="dashboard">

		<div class="row expanded">
			<h1>Dashboard</h1>


			<form method="POST" enctype="multipart/form-data">
				<input name="product" value="testing">
				<input type="file" name="image">
				<input type="submit" name="submit" value="GO">
			</form>

		</div>

	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>