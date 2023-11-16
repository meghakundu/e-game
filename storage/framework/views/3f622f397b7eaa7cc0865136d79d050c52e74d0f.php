

<?php $__env->startSection('content'); ?>
    <div class="bg-light p-5 rounded">  
        <?php if(auth()->guard()->check()): ?>
       <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <h1>Your wish to play with <?php echo e($_POST['house']); ?>'s players:</h1>
       <form method="POST" action="/store-match">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="player_id" value="<?php echo e($player_id); ?>"/>
        <?php $__currentLoopData = $userlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <input type="checkbox" value="<?php echo e($item->id); ?>" id="<?php echo e($item->id); ?>" name="playalong_id[]"><?php echo e($item->name); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <br>
        <label>Choose any curse spell to kill:</label>
        <select name="spell_id">
            <option value="0">--Not Suitable--</option>
        <?php $__currentLoopData = $spellslist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spellItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($spellItem['id']); ?>"><?php echo e($spellItem['name']); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <input type="submit" name="submit" value="Submit"/>
       </form>
       <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\e-game\resources\views/home/show_alongplayers.blade.php ENDPATH**/ ?>