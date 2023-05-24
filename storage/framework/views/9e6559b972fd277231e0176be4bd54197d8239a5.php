<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                    <?php if(\Helper::roleChecker('translate.index')): ?>  <li><a target="_blank" href="/admin/translations"> <i class="menu-icon fa fa-font"></i>Tərcümələr </a></li>   <?php endif; ?>
                        <li ><a href="<?php echo e(route('dashboard')); ?>"><i class="menu-icon fa fa-laptop"></i>Panel </a></li>

                <li class="menu-title">ƏSAS</li><!-- /.menu-title -->

                <?php if(\Helper::roleChecker('page.index')): ?>  <li><a href="<?php echo e(route('page.index')); ?>"> <i class="menu-icon fa fa-file"></i>Səhifələr </a></li>   <?php endif; ?>
                <?php if(\Helper::roleChecker('page.index')): ?>  <li><a href="<?php echo e(route('contact.index')); ?>"> <i class="menu-icon fa fa-file"></i> Əlaqə məlumatları
                            </a></li>   <?php endif; ?>
                <?php if(\Helper::roleChecker('menu.index')): ?>  <li><a href="<?php echo e(route('menu.index')); ?>"> <i class="menu-icon fa fa-list"></i>Menu </a></li>   <?php endif; ?>

                <li><a href="<?php echo e(route('vacancy-apply.index')); ?>"> <i class="menu-icon fa fa-list"></i> Vakansiyaya Müraciət Edənlər </a></li>




                <?php if(\Helper::roleChecker('article.index')): ?>
                    <li class="menu-item-has-children dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-newspaper"></i>Paylaşımlar</a>
                        <ul class="sub-menu children dropdown-menu">
                            <?php $__currentLoopData = config_json('article-types.articles'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(route('article.index',['type' => $type, 'category' => 'articles'])); ?>"><?php echo e(__('backend.'.$type)); ?></a></li>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </ul>
                    </li>
                            <li class="menu-item-has-children dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-newspaper"></i>Video Format</a>
                        <ul class="sub-menu children dropdown-menu">
                            <?php $__currentLoopData = config_json('article-types.video'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(route('article.index',['type' => $type, 'category' => 'video'])); ?>"><?php echo e(__('backend.'.$type)); ?></a></li>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </ul>
                    </li>

                            <li class="menu-item-has-children dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-newspaper"></i>Brifinqlər</a>
                                <ul class="sub-menu children dropdown-menu">


                                    <?php $__currentLoopData = config_json('article-types.brifing'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e(route('article.index',['type' => $type, 'category' => 'brifing'])); ?>"><?php echo e(__('backend.'.$type)); ?></a></li>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                </ul>
                            </li>



                <?php endif; ?>








                        <li class="menu-item-has-children dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-newspaper"></i>Karyera</a>
                            <ul class="sub-menu children dropdown-menu">
                                <?php if(\Helper::roleChecker('vacancy.index')): ?>  <li><a href="<?php echo e(route('vacancy.index')); ?>">Təcrübə Proqramı</a></li><?php endif; ?>


                            </ul>
                        </li>




                <li class="menu-item-has-children dropdown">

                </li>



                <li class="menu-title">Developer Settings</li><!-- /.menu-title -->
                <li><a href="<?php echo e(route('cache.clear')); ?>"><i class="menu-icon fa fa-broom"></i> Keşi Təmizlə</a></li>
                <li><a href="<?php echo e(route('settings-app.index')); ?>"><i class="menu-icon fa fa-sliders-h"></i> Ayarlar</a></li>

                <?php if(\Helper::roleChecker('role.index') || \Helper::roleChecker('rolpermissione.index')): ?>
                <li class="menu-item-has-children dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users-cog"></i>Rollar & Səlahiyyətlər</a>
                    <ul class="sub-menu children dropdown-menu">

                        <?php if(\Helper::roleChecker('admin-users.index')): ?>  <li><a href="<?php echo e(route('admin-users.index')); ?>">İstifadəçilər</a></li><?php endif; ?>
                        <?php if(\Helper::roleChecker('role.index')): ?> <li><a href="<?php echo e(route('role.index')); ?>">Rollar</a></li><?php endif; ?>
                        <?php if(\Helper::roleChecker('permission.index')): ?> <li><a href="<?php echo e(route('permission.index')); ?>">Səlahiyyətlər</a></li><?php endif; ?>

                    </ul>
                </li>
                <?php endif; ?>

                <?php if(\Helper::roleChecker('template.index')): ?>
                <li class="menu-item-has-children dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Şablon & Sadə elementlər</a>
                    <ul class="sub-menu children dropdown-menu">
                        <?php if(\Helper::roleChecker('template.index')): ?>  <li><a href="<?php echo e(route('template.index')); ?>">Şablonlar</a></li><?php endif; ?>
                        <?php if(\Helper::roleChecker('simple-json.index')): ?>  <li><a href="<?php echo e(route('simple-json.index')); ?>">Sadə Elementlər</a></li><?php endif; ?>
                        <?php if(\Helper::roleChecker('article-types.index')): ?>  <li><a href="<?php echo e(route('article-types.index')); ?>">Paylaşım Kateqoriyaları</a></li><?php endif; ?>


                    </ul>
                </li>
                <?php endif; ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
    <div class="bottom-logo">
        <svg width="190" height="32" viewBox="0 0 190 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M63.0469 31.5118L63.8391 31.8941L64.5835 30.2856H66.9679L67.7201 31.8941L68.5112 31.5118L65.7718 25.6455L63.0469 31.5118ZM65.7718 27.7303L66.5495 29.3897H65.004L65.7718 27.7303Z" fill="#242730"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M77.5158 31.8395C77.1241 31.8395 76.7403 31.7581 76.3686 31.5997C76.0081 31.4459 75.6921 31.2321 75.4251 30.9527C75.1469 30.6733 74.9333 30.352 74.7864 29.9946C74.6284 29.6156 74.5527 29.2254 74.5527 28.8159C74.5527 28.4075 74.6284 28.0139 74.7864 27.6417C74.8598 27.4585 74.95 27.2922 75.0579 27.1338C75.1647 26.9766 75.2882 26.8216 75.4251 26.678C75.6921 26.4076 76.0081 26.1916 76.3686 26.0309C76.7269 25.8782 77.1141 25.8047 77.5158 25.8047C78.0365 25.8047 78.5127 25.9246 78.96 26.1712C79.1737 26.2967 79.3717 26.4348 79.5475 26.6067C79.7278 26.7752 79.8813 26.9641 80.0115 27.1723L79.2738 27.6632C79.0769 27.3555 78.8265 27.1169 78.5194 26.9483C78.2134 26.7832 77.8785 26.6983 77.5158 26.6983C77.2321 26.6983 76.9561 26.7549 76.7046 26.8612C76.4521 26.9743 76.2306 27.1259 76.0426 27.3182C75.8534 27.5071 75.7055 27.7356 75.5931 27.9901C75.4863 28.2503 75.4306 28.5252 75.4306 28.8159C75.4306 29.1123 75.4863 29.3849 75.5931 29.6439C75.7055 29.9018 75.8534 30.1258 76.0426 30.3226C76.2306 30.5138 76.4521 30.6699 76.7046 30.7773C76.9561 30.8893 77.2321 30.9482 77.5158 30.9482C77.7283 30.9482 77.9319 30.9142 78.1255 30.8577C78.3214 30.7966 78.5027 30.7129 78.6685 30.6031C78.8354 30.4866 78.9778 30.3554 79.1102 30.2072C79.2404 30.0545 79.345 29.8837 79.4318 29.6971H77.3366V28.8023H80.4977C80.4977 28.8464 80.4977 28.9007 80.4933 28.9595C80.49 29.0161 80.4844 29.0749 80.4744 29.1292C80.4666 29.1948 80.4588 29.2548 80.4443 29.3215C80.392 29.6699 80.2774 29.9968 80.1039 30.3056C79.9347 30.6145 79.7155 30.8859 79.4496 31.1156C79.1781 31.352 78.8744 31.5296 78.5461 31.654C78.2157 31.7762 77.873 31.8395 77.5158 31.8395Z" fill="#242730"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M88.3026 26.833V28.2503H90.7338V29.1428H88.3026V30.8045H90.8139V31.697H87.4258V25.9438H90.8139V26.833H88.3026Z" fill="#242730"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M98.9198 27.7874V31.6967H98.043V25.6777L102.287 29.8801V25.9436H103.168V31.9999L98.9198 27.7874Z" fill="#242730"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M113.13 31.8085C112.734 31.8085 112.352 31.7304 111.986 31.572C111.633 31.4205 111.322 31.2112 111.048 30.9307C110.777 30.6547 110.567 30.3357 110.418 29.9782C110.263 29.6083 110.186 29.2181 110.186 28.8154C110.186 28.4161 110.263 28.0235 110.418 27.6469C110.567 27.2894 110.777 26.9727 111.048 26.7001C111.315 26.4331 111.629 26.2148 111.986 26.0564C112.167 25.975 112.352 25.9162 112.544 25.8788C112.734 25.8426 112.926 25.8223 113.13 25.8223C113.535 25.8223 113.917 25.9014 114.276 26.0564C114.447 26.1356 114.612 26.2261 114.77 26.3279C114.926 26.4342 115.074 26.5553 115.206 26.6978L114.591 27.3279C114.391 27.1254 114.17 26.9783 113.917 26.8743C113.669 26.7679 113.408 26.7159 113.13 26.7159C112.844 26.7159 112.579 26.7725 112.326 26.8799C112.074 26.9908 111.858 27.1401 111.671 27.3324C111.486 27.5202 111.339 27.7453 111.23 28.0032C111.12 28.2588 111.065 28.5326 111.065 28.8154C111.065 29.1038 111.12 29.3776 111.23 29.6343C111.339 29.8888 111.486 30.114 111.671 30.2983C111.858 30.4861 112.074 30.6366 112.326 30.7485C112.579 30.8594 112.844 30.9137 113.13 30.9137C113.408 30.9137 113.669 30.8651 113.917 30.761C114.17 30.6547 114.391 30.5053 114.591 30.3051L115.206 30.9307C114.936 31.2112 114.624 31.4205 114.276 31.572C113.909 31.7304 113.524 31.8085 113.13 31.8085Z" fill="#242730"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M124.567 29.4821V31.697H123.685V29.4821L121.305 26.2492L122.01 25.7119L124.125 28.5874L126.248 25.7119L126.953 26.2492L124.567 29.4821Z" fill="#242730"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.18676 17.9768H6.87632C6.21873 17.9598 5.54111 17.8761 4.84458 17.7178C4.15027 17.5662 3.50047 17.3535 2.90185 17.0843C2.24315 16.7732 1.66233 16.4079 1.16497 15.9905C0.667604 15.5765 0.281506 15.1195 0 14.6274L3.18781 12.7553C3.29018 12.9272 3.46375 13.1094 3.70409 13.2892C3.94443 13.4668 4.23261 13.6274 4.56419 13.7801C4.88909 13.9306 5.25404 14.046 5.64904 14.1365C6.04293 14.2281 6.44794 14.2722 6.85629 14.2722H6.89858H6.96422C7.30359 14.3028 7.71194 14.2722 8.18594 14.1817C8.65771 14.0912 9.13394 13.9362 9.60237 13.7123C10.4091 13.3379 10.8463 12.8424 10.9187 12.2123C10.9342 12.0393 10.9187 11.8979 10.8786 11.8006C10.8297 11.7022 10.7751 11.6207 10.7028 11.5438C10.4369 11.2508 10.0363 11.0235 9.49111 10.8764C8.80459 10.6671 8.01236 10.5631 7.11777 10.5631C6.87076 10.5631 6.51582 10.5484 6.05628 10.5167C5.59341 10.4896 5.09271 10.4149 4.54972 10.2973C3.18781 9.96582 2.11742 9.41154 1.343 8.61971C0.489576 7.72495 0.11238 6.62545 0.201394 5.31781V5.29292C0.243676 4.66851 0.386098 4.0803 0.628661 3.52602C0.872336 2.97401 1.21838 2.49326 1.67012 2.07811C2.42006 1.34737 3.37696 0.830424 4.54972 0.536318C5.29744 0.339493 6.08632 0.245605 6.91304 0.245605C7.73642 0.245605 8.54867 0.350805 9.33756 0.558942C10.2477 0.779521 11.0344 1.10869 11.7009 1.53515C12.3651 1.97404 12.8892 2.4695 13.2731 3.03735L10.1543 5.04972C10.063 4.91284 9.88054 4.75787 9.60237 4.57802C9.32532 4.39929 8.93588 4.25224 8.43852 4.1312C7.95562 4.01356 7.44824 3.95134 6.92417 3.94343C6.39676 3.93211 5.92054 3.99093 5.49104 4.10858C5.11273 4.19794 4.81788 4.30993 4.60202 4.44227C4.39061 4.57802 4.23261 4.71715 4.12023 4.85855C4.0123 4.99995 3.93998 5.13342 3.91105 5.26125C3.88212 5.38681 3.86877 5.47843 3.86877 5.54065C3.86877 5.70014 3.88879 5.82797 3.92551 5.90941C3.96223 5.98859 3.99895 6.0542 4.04457 6.09832C4.26376 6.32003 4.65988 6.50102 5.22845 6.64355C5.80259 6.78721 6.43125 6.85508 7.11777 6.85508C8.52642 6.85508 9.76482 7.04625 10.8441 7.42745C11.9178 7.80866 12.7868 8.35276 13.4455 9.06653C13.8695 9.54389 14.1821 10.0755 14.3913 10.666C14.5961 11.2531 14.6617 11.8786 14.5905 12.554C14.5015 13.52 14.171 14.3876 13.598 15.1523C13.0294 15.9215 12.2472 16.5493 11.2491 17.0379C10.6383 17.3411 9.97178 17.5696 9.26078 17.7313C8.55312 17.8954 7.85881 17.9768 7.18676 17.9768Z" fill="#242730"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M32.8438 5.49319L30.8021 10.2747H34.9078L32.8438 5.49319ZM29.1976 14.0686L27.6176 17.754H23.5508L30.9111 0.48999H34.7966L42.1814 17.754H38.0968L36.5346 14.0686H29.1976Z" fill="#242730"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M57.0313 4.28897V7.59314H64.2114V11.3837H57.0313V17.7534H53.2949V0.490479H64.5007V4.28897H57.0313Z" fill="#242730"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M83.8314 5.49319L81.7874 10.2747H85.8954L83.8314 5.49319ZM80.1839 14.0686L78.6006 17.754H74.5371L81.8974 0.48999H85.784L93.1644 17.754H89.0798L87.522 14.0686H80.1839Z" fill="#242730"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M107.995 9.4225H110.522H110.543C111.583 9.45417 112.387 9.1793 112.957 8.59787C113.454 8.0911 113.703 7.4305 113.703 6.60926C113.703 5.06294 112.643 4.28922 110.522 4.28922H107.995V9.4225ZM117.617 17.7536H115.992H113.045L109.927 13.2233H107.995V17.7536H104.258V0.490723H110.522C111.486 0.490723 112.369 0.611759 113.166 0.858355C113.966 1.10382 114.672 1.46919 115.288 1.94315C115.624 2.22821 115.93 2.53476 116.199 2.8662C116.469 3.20555 116.695 3.56413 116.868 3.95326C117.249 4.77223 117.442 5.65794 117.442 6.60926C117.442 7.5176 117.277 8.38182 116.958 9.20192C116.647 9.98809 116.187 10.6906 115.573 11.3014C115.087 11.7923 114.554 12.1769 113.969 12.4608L117.617 17.7536Z" fill="#242730"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M136.178 3.79849C135.459 3.79849 134.787 3.9365 134.145 4.22042C133.511 4.50095 132.957 4.88216 132.488 5.35952C132.017 5.83687 131.645 6.39681 131.367 7.0461C131.088 7.69201 130.95 8.38202 130.95 9.10937C130.95 9.84011 131.088 10.5301 131.367 11.176C131.645 11.8253 132.017 12.3853 132.488 12.8638C132.957 13.3388 133.511 13.7189 134.145 14.0017C134.787 14.2856 135.459 14.4259 136.178 14.4259C136.894 14.4259 137.571 14.2856 138.21 14.0017C138.845 13.7189 139.4 13.3388 139.865 12.8638C140.337 12.3853 140.71 11.8253 140.988 11.176C141.266 10.5301 141.407 9.84011 141.407 9.10937C141.407 8.38202 141.266 7.69201 140.988 7.0461C140.71 6.39681 140.337 5.83687 139.865 5.35952C139.4 4.88216 138.845 4.50095 138.21 4.22042C137.571 3.9365 136.894 3.79849 136.178 3.79849ZM136.178 18.2244C134.962 18.2244 133.799 17.9857 132.684 17.5084C131.602 17.0355 130.65 16.3862 129.831 15.5627C129.022 14.7302 128.386 13.7676 127.916 12.6635C127.449 11.5335 127.213 10.3458 127.213 9.10938C127.213 7.90467 127.449 6.72259 127.916 5.56426C128.152 5.02356 128.428 4.51679 128.742 4.03039C129.054 3.54737 129.418 3.09716 129.831 2.68089C130.254 2.24652 130.706 1.87323 131.18 1.55311C131.658 1.23072 132.156 0.95132 132.684 0.714904C133.799 0.23981 134.962 0 136.178 0C137.365 0 138.53 0.23981 139.669 0.714904C140.2 0.95132 140.698 1.23072 141.175 1.55311C141.651 1.87323 142.095 2.24652 142.503 2.68089C142.928 3.09716 143.298 3.54737 143.614 4.03039C143.927 4.51679 144.202 5.02356 144.438 5.56426C144.907 6.72259 145.143 7.90467 145.143 9.10938C145.143 10.3458 144.907 11.5335 144.438 12.6635C144.202 13.1986 143.927 13.7099 143.614 14.1906C143.298 14.6759 142.928 15.1352 142.503 15.5627C142.095 15.9801 141.651 16.3523 141.175 16.6713C140.698 16.9937 140.2 17.2708 139.669 17.5084C138.53 17.9857 137.365 18.2244 136.178 18.2244Z" fill="#242730"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M159.529 4.28897V7.59314H166.714V11.3837H159.529V17.7534H155.795V0.490479H166.998V4.28897H159.529Z" fill="#242730"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M182.532 4.28897V7.59314H189.711V11.3837H182.532V17.7534H178.795V0.490479H190.001V4.28897H182.532Z" fill="#242730"/>
        </svg>
    </div>
</aside>
<!-- /#left-panel -->
<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header" style="background: #54545e">
        <div class="top-left">
            <div class="navbar-header" style="background: #54545e">
                <a class="navbar-brand" href="/" >


                    <img style="width: 50px" src="/frontend/images/logo.svg" alt="">


                </a>
                <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
            </div>
        </div>
        <div class="top-right">
            <div class="header-menu">


                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <p class="m-0 d-flex align-items-center p-3"><?php echo e(auth('admin')->user()->name); ?></p>
                        <i class="pe-7s-user"></i>
                    </a>

                    <div class="user-menu dropdown-menu">


                            <a class="nav-link" href="<?php echo e(route('logout')); ?>"  onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-power -off"></i> Sistemdən çıxış</a>

                        <form  id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none" >
                          <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </header>
    <!-- /#header -->

<?php /**PATH /Applications/MAMP/htdocs/commersiyaback/resources/views/backend/includes/sidebar.blade.php ENDPATH**/ ?>