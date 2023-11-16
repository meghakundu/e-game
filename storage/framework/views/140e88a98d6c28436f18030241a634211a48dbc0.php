

<?php $__env->startSection('content'); ?>
    <form method="post" action="<?php echo e(route('register.perform')); ?>">

        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
        <img class="mb-4" src="<?php echo url('images/bootstrap-logo.svg'); ?>" alt="" width="72" height="57">
        
        <h1 class="h3 mb-3 fw-normal">Register</h1>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder="name" required="required" autofocus>
            <label for="floatingEmail">Name</label>
            <?php if($errors->has('name')): ?>
                <span class="text-danger text-left"><?php echo e($errors->first('name')); ?></span>
            <?php endif; ?>
        </div>
        <div class="form-group form-floating mb-3">
            <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="name@example.com" required="required" autofocus>
            <label for="floatingEmail">Email address</label>
            <?php if($errors->has('email')): ?>
                <span class="text-danger text-left"><?php echo e($errors->first('email')); ?></span>
            <?php endif; ?>
        </div>
        
        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="<?php echo e(old('password')); ?>" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            <?php if($errors->has('password')): ?>
                <span class="text-danger text-left"><?php echo e($errors->first('password')); ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password_confirmation" value="<?php echo e(old('password_confirmation')); ?>" placeholder="Confirm Password" required="required">
            <label for="floatingConfirmPassword">Confirm Password</label>
            <?php if($errors->has('password_confirmation')): ?>
                <span class="text-danger text-left"><?php echo e($errors->first('password_confirmation')); ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group form-floating mb-3">
        <label>Role</label>
           <select class="" name="role">
            <option value="student">Student</option>
            <option value="staff">Staff</option>
           </select>
           <?php if($errors->has('role')): ?>
                <span class="text-danger text-left"><?php echo e($errors->first('role')); ?></span>
            <?php endif; ?>
        </div>
        <div class="form-group form-floating mb-3">
        <label>Gender</label>
           <input type="radio" class="" name="gender" value="male">Male</input>
           <input type="radio" class="" name="gender" value="female">Female</input>
           <?php if($errors->has('gender')): ?>
                <span class="text-danger text-left"><?php echo e($errors->first('gender')); ?></span>
            <?php endif; ?>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        
        <p class="mt-5 mb-3 text-muted">&copy; <?php echo e(date('Y')); ?></p>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\e-game\resources\views/auth/register.blade.php ENDPATH**/ ?>