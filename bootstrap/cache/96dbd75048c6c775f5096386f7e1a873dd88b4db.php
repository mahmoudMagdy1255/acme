<?php /* C:\wamp64\www\acme\resources\view/admin/products/categories.blade.php */ ?>
<?php $__env->startSection('title' , 'Product Categories'); ?>

<?php $__env->startSection('content'); ?>

	<div class="category">

		<div class="row expanded">
			<h1>Product Categories</h1>
		</div>

		<?php echo $__env->make('includes.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


		<div class="row expanded">

			<div class="small-12 medium-6 column">

				<form action="" method="POST">

					<div class="input-group">

						<input type="text" name="" class="input-group-field" placeholder="Search By Name">

						<div class="input-group-button">
							<input type="submit" class="button" value="Search">
						</div>

					</div>

				</form>

			</div>


			<div class="small-12 medium-5 end column">

				<form action="" method="POST">

					<div class="input-group">

						<input type="text" name="name" class="input-group-field" placeholder="Category Name">

						<input type="hidden" name="token" value="<?php echo e(csrf_token()); ?>">

						<div class="input-group-button">
							<input type="submit" class="button" value="Create">
						</div>

					</div>

				</form>

			</div>


		</div>

		<div class="row expanded">

			<div class="small-12 medium-11 column">

				<?php if( count($categories) ): ?>

					<table class="hover">

						<tbody>

							<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

								<tr>

									<td>
										<?php echo e($category['name']); ?>

									</td>

									<td>
										<?php echo e($category['slug']); ?>

									</td>

									<td>
										<?php echo e($category['added']); ?>

									</td>


									<td width="100" class="text-right">


										<a href="#"> <i class="fa fa-edit"></i> </a>
										<a href="#"> <i class="fa fa-times"></i> </a>

									</td>

								</tr>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>

						<?php echo $links; ?>


					</table>

				<?php else: ?>
					<h3>No Categories</h3>
				<?php endif; ?>

			</div>

		</div>


	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>