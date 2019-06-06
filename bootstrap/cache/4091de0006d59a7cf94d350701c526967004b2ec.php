<?php /* C:\wamp64\www\acme\resources\view/includes/messages.blade.php */ ?>
<div class="row expanded">

	<?php if(isset($errors)): ?>

		<div class="callout alert" data-closable>

			<?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


				<?php $__currentLoopData = $error; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

					<?php echo e($item); ?> <br />

				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			<button class="close-button" data-close>

				<span arial-hidden="true">&times;</span>

			</button>

		</div>

	<?php endif; ?>


	<?php if(isset($success)): ?>

		<div class="callout success" data-closable>


			<?php echo e($success); ?> <br/>


			<button class="close-button" data-close>

				<span arial-hidden="true">&times;</span>

			</button>

		</div>

	<?php endif; ?>

</div>