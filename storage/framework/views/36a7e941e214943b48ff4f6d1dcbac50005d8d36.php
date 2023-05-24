<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <?php
                            $appends = [
                                      'model'        => request()->get('model'),
                                      'page_id'      => request()->get('page_id'),
                                      'type'         => request()->get('type'),
                                      'category'     => request()->get('category'),
                                      'on_iframe'    => request()->get('on_iframe'),
                                      'uniq_id'      =>   session('uniq_id') ?? request()->get('uniq_id'),
                                ]
                        ?>
                        <h1>
                            <?php if(request()->route()->getName() == $routeName .'.create' || request()->route()->getName() == $routeName .'.edit'  ): ?>
                            <a href="<?php echo e(route($routeName.'.index',$appends)); ?>">  <i class="fas fa-arrow-circle-left btn color-red  btn-md"></i> </a>
                            <?php endif; ?>

                            <?php if(\Route::is('simple-item*') || \Route::is('article*')): ?>
                               <?php echo e(__('backend.'.request()->get('type'))); ?></h1>
                            <?php else: ?>
                               <?php echo e(__('backend.'.$routeName)); ?></h1>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">

                            <?php if(request()->route()->getName() !== $routeName .'.create' &&  \Helper::roleChecker($routeName . '.create')): ?>
                                <a href="<?php echo e(route($routeName .'.create',$appends)); ?>" class="mr-2 btn btn-success btn-sm"><i class="fa fa-plus"></i> Əlavə et</a>
                            <?php endif; ?>

                            <a href="<?php echo e(route($routeName .'.index',$appends)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-list"></i> Hamısı</a>

                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<?php if($errors->any()): ?>
    <div class="breadcrumbs">
    <div>
        <div class="row m-0">
            <div class="col-12 p-0">
                    <div class="alert alert-danger">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="alert-danger p-0 m-0"><?php echo e($error); ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<?php if(session('success')): ?>
    <div class="breadcrumbs">
        <div>
            <div class="row m-0">
                <div class="col-12 p-0">
                    <div class="alert alert-success">
                            <p class="alert-success p-0 m-0"><?php echo e(session('success')); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>



<div class="ajax-success" style="display: none">

</div>
<?php /**PATH /Applications/MAMP/htdocs/commersiyaback/resources/views/backend/includes/breadcrumb.blade.php ENDPATH**/ ?>