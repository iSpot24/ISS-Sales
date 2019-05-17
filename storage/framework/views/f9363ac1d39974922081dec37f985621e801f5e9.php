<?php $__env->startSection('content'); ?>
    <div class="card-body">
        <?php if(Auth::guest()): ?>
            <a href="/login" class="btn btn-primary">login</a>
        <?php endif; ?>
        <?php if(Auth::check()): ?>
            <?php if(Auth::user()->role->id == \App\Role::findOrFail(2)->id): ?>
                <a class="btn btn-outline-primary float-right" href="/product"> Add New Product </a>
            <?php endif; ?>
            <form action="/search" method="GET" role="search">
                <?php echo csrf_field(); ?>
                <div class="input-group col-sm-5 noPaddingLeft">
                    <input type="text" class="form-control" name="search"
                           placeholder="Search products">
                    <span class="input-group-btn">
            <button type="submit" class="btn btn-primary">
                <span> Search </span>
            </button>
                        <button class="btn btn-secondary" onclick="$('form').reset();" name="reset">
                            <span> Reset </span>
                        </button>
            </span>
                </div>
            </form>
            <table class="table table-bordered table-striped mb-none topSpace" id="datatable-default">

                <thead>
                <tr>
                    <th> <?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name'));?></th>
                    <th> <?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('price'));?></th>
                    <th> <?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('stock'));?></th>
                    <th style="color:#3490dc">Actions</th>
                </tr>
                </thead>

                <?php if(!empty($products)): ?>
                    <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="gradeX">
                            <td>
                                <a <?php if(Auth::user()->role->id == \App\Role::findOrFail(2)->id): ?>
                                   href="/product/<?php echo e($product->id); ?>" title="Edit"
                                   <?php else: ?>
                                   href="order/product/<?php echo e($product->id); ?>" title="Order"
                                   <?php endif; ?>
                                   data-toggle="tooltip" data-placement="top"> <?php echo e($product->name); ?>

                                </a>
                            </td>
                            <td> <?php echo e($product->price); ?> </td>
                            <td> <?php echo e($product->stock); ?> </td>
                            <td>
                                <?php if($product->stock > 0): ?>
                                    <span>
                                        <a class="fas fa-truck noPaddingLeft"
                                           href="/order/product/<?php echo e($product->id); ?>"
                                           data-toggle="tooltip" data-placement="top" title="Order">
                                        </a>
                                    </span>
                                <?php endif; ?>
                                <?php if(Auth::user()->role->id == \App\Role::findOrFail(2)->id): ?>
                                    <span>
                                        <a class="fas fa-edit" href="/product/<?php echo e($product->id); ?>"
                                           data-toggle="tooltip" data-placement="top" title="Edit">
                                        </a>
                                    </span>
                                    <span>
                                        <?php echo csrf_field(); ?>
                                        <a class="fas fa-trash-alt" id="<?php echo e($product->id); ?>"
                                           onclick="return confirm('Are you sure you want to delete Product: <?php echo e($product->name); ?>?')"
                                           href="<?php echo e(action('HomeController@delete', ['id' => $product->id])); ?>"
                                           data-toggle="tooltip" data-placement="top" title="Delete">
                                        </a>
                                    </span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                <?php else: ?>
                    <tbody>
                    <tr class="gradeX">
                        <td> Unfortunatelly there are no Products to order right now...</td>
                    </tr>
                    </tbody>
                <?php endif; ?>
                <div class="customPagination">
                    <?php echo $products->links(); ?>

                </div>
            </table>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/sales/resources/views/search.blade.php ENDPATH**/ ?>