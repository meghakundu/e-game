

<?php $__env->startSection('content'); ?>
    <div class="bg-light p-5 rounded">  
        <?php if(auth()->guard()->check()): ?>
        <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <h1>You will play as</h1>
        <form method="POST" action="/allot-users/<?php echo e(auth()->user()->id); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
        <select name="actor_id">
            <?php $__currentLoopData = $actors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($actor->id); ?>" id="<?php echo e($actor->id); ?>"><?php echo e($actor->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <input type="submit" value="Choose" name="submit"/>
        </form>
        
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\e-game\resources\views/home/choose-actors.blade.php ENDPATH**/ ?>