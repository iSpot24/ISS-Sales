<?php $__env->startSection('content'); ?>
    <div class="card-body">

        <h2>Product Details</h2>

        <form method="post" class="topSpace" action="/product" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input id="name" type="text" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name"
                           value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>
                    <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-sm-3 col-form-label">Price</label>
                <div class="col-sm-9">
                    <input id="price" type="text" class="form-control <?php if ($errors->has('price')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('price'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="price"
                           value="<?php echo e(old('price')); ?>" required autocomplete="price" autofocus>
                    <?php if ($errors->has('price')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('price'); ?>
                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="stock" class="col-sm-3 col-form-label">Stock</label>
                <div class="col-sm-9">
                    <input id="stock" type="text" class="form-control <?php if ($errors->has('stock')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('stock'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="stock"
                           value="<?php echo e(old('stock')); ?>" required autocomplete="stock" autofocus>
                    <?php if ($errors->has('stock')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('stock'); ?>
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
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
                <a class="btn float-right btn-outline-primary" href="/home"> Back </a>
            </div>
        </form>
    </div>
    <?php echo $__env->make('messages.flashMessage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/sales/resources/views/product_create.blade.php ENDPATH**/ ?>