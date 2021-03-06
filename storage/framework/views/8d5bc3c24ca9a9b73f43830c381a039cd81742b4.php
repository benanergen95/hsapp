  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('css'); ?>
  	<link href="<?php echo e(asset('/css/extra-physical.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet" type="text/css" >
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?>
  	<?php if(!isset(Auth::user()->email)): ?>
        <script>window.location="Login";</script>
    <?php endif; ?> 		
	<div class="jumbotron bg-white rounded-bottom border border-danger mx-4">
		<form method="post" action="<?php echo e(url('StoreExercise')); ?>">
			<?php echo e(csrf_field()); ?>

			<h2 class="text-center text-danger">Exercise</h2>						
			<hr>
			<?php if(count($errors) > 0): ?>
		        <div class="alert alert-danger">
		          <ul>
		            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		              <li><?php echo e($error); ?></li>
		            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		          </ul>
		        </div>
		    <?php endif; ?>
			<div class="container text-center">
				<div class="row">
					<div class="col align-self-center">
						<div>
							<p class="lead">Over the past <b>7 DAYS</b>, how many minutes of exercise did your child engaged in on a daily basis?</p>
							<p class="lead">This can be accumulated over the entire day, for example
								in bouts of 10 minutes</p>
							<p class="lead">"Moderate to vigorous activity is any activity that
								increases the heart rate and gets you out of breath some of the time.
								Moderate physical activity includes bike riding, skateboarding and dancing."</p>
							
							
							<div class="form-group">
								<p class="lead">Daily number of minutes for exercise:</p>		
								<input type="number" name="minutes" class="text-right input-small form-control col-xs-5 col-lg-3"  style="margin:0 auto; step="1" placeholder="Minutes" min="0" max="1440">
								
							</div>
							<img id="physicalPic" class="img-fluid" src="<?php echo e(asset('/content/Physical-Question.jpg')); ?>?<?php echo e(time()); ?>" alt="Generic placeholder image" >
						</div>
					</div>	
				</div>
				<hr>
				
			</div>
        <!-- /END THE FEATURETTES -->
		    <div class="av1">
				
				<button onclick="location.href = 'PhysicalActivity0'" type="button" class="btn btn-outline-secondary btn-lg mr-5">Back</button>
				 	<input type="submit" value="Next" class="btn btn-primary btn-lg ml-5">
				
			</div>
		</form>	
	</div><!-- /.container -->
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>