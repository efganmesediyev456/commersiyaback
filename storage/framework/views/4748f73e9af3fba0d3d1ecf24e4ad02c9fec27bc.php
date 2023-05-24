<?php $__env->startSection('content'); ?>
<?php echo $__env->make('backend.includes.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Başlıq</th>
                                    <th>Şəkil</th>
                                    <th>Sıralama</th>
                                    <th>İdarə</th>

                                </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr <?php if($item->status==0): ?> style="background:#f3c3c3;" <?php endif; ?>>
                                             <td>
                                                 <?php echo e($item->id); ?>

                                             </td>
                                            <td>
                                                <?php echo e($item->title); ?>

                                            </td>
                                            <td>
                                                <?php if($item->image): ?>
                                                <img class="table-image" src="<?php echo e($item->image); ?>" alt="<?php echo e($item->title); ?>">
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <?php echo e($item->date_with_hour); ?>

                                            </td>

                                            <td>

                                                <?php
                                                    $appends = [
                                                                           $item->id,
                                                         'type'         => request()->get('type'),
                                                         'category'     => request()->get('category')

                                                    ];


                                                ?>

                                                <?php if(\Helper::roleChecker($routeName . '.edit')): ?>
                                                    <a class="badge btn mr-2 badge-complete p-0" href="<?php echo e(route($routeName . '.edit',$appends)); ?>"><i class="far fa-pencil-alt size32"></i></a>
                                                <?php endif; ?>

                                                <?php if(\Helper::roleChecker($routeName . '.destroy')): ?>
                                                    <form class="d-inline" action="<?php echo e(route($routeName . '.destroy',$appends)); ?>" method="POST">
                                                        <?php echo e(method_field('DELETE')); ?> <?php echo csrf_field(); ?>
                                                        <button class="badge btn badge-danger p-0" onclick="if (!confirm('Silmək istədiyinizdən əminsiniz?')) { return false }"><i class="far fa-trash-alt size32"></i> </button>
                                                    </form>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                    <?php echo e($items->withQueryString()->links('vendor.pagination.default')); ?>

                </div>
            </div>


        </div>
        <!-- .animated -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/commersiyaback/resources/views/backend/atom/articles/index.blade.php ENDPATH**/ ?>