<?php if(auth()->guard()->check()): ?>
<div>
        <?php
        $name= auth()->user()->name;
        ?>
        <a href="/"><?php echo e($name); ?></a>
            <a href="/logout" class="btn btn-primary">Logout</a>
</div>
<?php endif; ?><?php /**PATH E:\xampp\htdocs\e-game\resources\views/layouts/header.blade.php ENDPATH**/ ?>