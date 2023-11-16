

<?php $__env->startSection('content'); ?>
    <div class="bg-light p-5 rounded">  
        <?php if(auth()->guard()->check()): ?>
        <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <h1>You wish to play with</h1>
        <form method="POST" action="/play-along">
            <?php echo csrf_field(); ?>
             <?php
             $arr_houses = array();
             ?>
            <?php $__currentLoopData = $other_house; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $arr_houses[] = $item['house'];
            ?>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <?php
           $arr_unique = array_unique($arr_houses);
           ?>
           <select id="history" onchange="SubjectChanged(this);">
            <?php $__currentLoopData = $arr_unique; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($item); ?>"><?php echo e($item); ?>

            </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </select>
           <input type="hidden" id="inputBox" name="house"/>
        <input type="submit" value="Choose" name="submit"/>
        </form>
       <?php endif; ?>
    </div>
    <script type="text/javascript">
      function SubjectChanged(Subject){
  console.log(Subject.value);
   $('#inputBox').val(Subject.value);
   }   
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\e-game\resources\views/home/choose-house.blade.php ENDPATH**/ ?>