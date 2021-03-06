  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('/css/extra-sedentary.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet" type="text/css" >
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?>
  	<?php if(!isset(Auth::user()->email)): ?>
        <script>window.location="Login";</script>
    <?php endif; ?> 						
		<div class="jumbotron bg-white rounded-bottom border border-info mx-4">
				<div>
				<h2 class="text-center text-info">Screen Time</h2>
				</div>
				
			<hr>

			<div class="container text-center">
				<div class="row">
					<div class="col align-self-center">
						<p class="lead">Children are exposed to more screens than ever</p>
						<img id="sedentaryPic" class="img-fluid pb-3" 
							src="<?php echo e(asset('/content/Screen-Introduction.jpg')); ?>?<?php echo e(time()); ?>" 
							alt="Generic placeholder image" width="800px">
						<p class="lead">It is a problem because too much screen time increases
							child's risk of</p>
						<ul class="list-unstyled lead">
							<li>Becoming overweight</li>
							<li>Achieving less at school </li>
							<li>Being less able to self-regulate emotions</li>
					</div>	
				</div>
				<hr>
			</div>
        <!-- Back and Next button Section -->
			<div class="av1">
				<form>
					<button onclick="location.href = 'Tests'" type="button" class="btn btn-outline-secondary btn-lg mr-5">Back</button>
   				 	<button class="btn btn-primary btn-lg ml-5" type="button" onclick="location.href = 'ScreenTime1'" >
	                  Next
	              	</button>
				</form>
			</div>		
		</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>