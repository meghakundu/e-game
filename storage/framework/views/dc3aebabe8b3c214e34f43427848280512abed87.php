

<?php $__env->startSection('content'); ?>
    <div class="bg-light p-5 rounded">  
        <?php if(auth()->guard()->check()): ?>
        <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <h1>Dashboard</h1>
        <p class="lead">Only players can access this section.</p>
        <p>You are playing as <?php echo e($user_list['actorData']['name']); ?></p>
        <a href="/follow-character"><button class="btn btn-primary" id="my-button">Play as</button></a>
       <a class="btn btn-primary" href="/choose-house" role="button">Play along with house</a>
        <br><br>
        <a href="/play-again"><button id="disable-button" class="btn btn-primary">Play again</button></a>
      <script>
        var disableButton = (e) => {
    console.log("va");
    $('#my-button').prop('disabled', true);
    };
    $(document).on('click', '#disable-button', disableButton);
      </script>
        <?php endif; ?>

        <?php if(auth()->guard()->guest()): ?>
        <div>
            <a href="/login" class="btn btn-primary">Login</a>
            <a href="/register" class="btn btn-info">Register</a>
        </div>
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\e-game\resources\views/home/index.blade.php ENDPATH**/ ?>