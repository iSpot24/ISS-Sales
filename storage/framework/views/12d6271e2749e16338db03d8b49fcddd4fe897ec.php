
<?php if(\Illuminate\Support\Facades\Session::has('success')): ?>
    <div class="alert badge-success" style="background-color: #2a9055">
        <?php echo e(\Illuminate\Support\Facades\Session::get('success')); ?>

    </div>
<?php endif; ?><?php /**PATH /home/vagrant/code/sales/resources/views/messages/flashMessage.blade.php ENDPATH**/ ?>