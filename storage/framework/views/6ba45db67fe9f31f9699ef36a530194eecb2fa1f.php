<?php $__env->startSection('content'); ?>
<div class="card-body">

    <h2>Order Details</h2>

    <form method="post" class="topSpace" action="/order/product/<?php echo e(Route::input('product.id')); ?>" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <div class="form-group row">
            <label for="client_name" class="col-sm-3 col-form-label">Client Name</label>
            <div class="col-sm-9">
                <input id="clien_name" type="text" class="form-control <?php if ($errors->has('clien_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('clien_name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="client_name"
                       value="<?php echo e(old('client_name')); ?>" placeholder="Client Name" required autocomplete="client_name" autofocus>
                <?php if ($errors->has('client_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('client_name'); ?>
                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="client_address" class="col-sm-3 col-form-label">Client Address</label>
            <div class="col-sm-9">
                <input id="client_address" type="text" class="form-control <?php if ($errors->has('client_address')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('client_address'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="client_address"
                       value="<?php echo e(old('client_address')); ?>" placeholder="Client Address" required autocomplete="client_address" autofocus>
                <?php if ($errors->has('client_address')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('client_address'); ?>
                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="quantity" class="col-sm-3 col-form-label">Quantity</label>
            <div class="col-sm-9">
                <input id="quantity" type="number" class="form-control <?php if ($errors->has('quantity')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('quantity'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="quantity"
                       value="<?php echo e(Route::input('product.stock')); ?>" placeholder="Desired Quantity" required autocomplete="quantity" autofocus>
                <?php if ($errors->has('quantity')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('quantity'); ?>
                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-3 col-sm-8">
                <button type="submit" class="btn btn-primary">Place Order</button>
            </div>
            <a class="btn float-right btn-outline-primary back-btn" href="/home"> Back </a>
        </div>
    </form>
</div>
    <?php echo $__env->make('messages.flashMessage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/sales/resources/views/order.blade.php ENDPATH**/ ?>