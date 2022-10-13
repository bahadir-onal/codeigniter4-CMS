<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?= bo_admin_translate('Dashboard', 'page_title'); ?></h1>
            </div>

            <?= $this->include('admin/layout/partials/errors'); ?>

            <div class="section-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="far fa-newspaper"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4><?= bo_admin_translate('Dashboard', 'blog_content'); ?></h4>
                                </div>
                                <div class="card-body">
                                    <?= $count['blog']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                                <i class="far fa-comment"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4><?= bo_admin_translate('Dashboard', 'comments'); ?></h4>
                                </div>
                                <div class="card-body">
                                    <?= $count['comment']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4><?= bo_admin_translate('Dashboard', 'users'); ?></h4>
                                </div>
                                <div class="card-body">
                                    <?= $count['user']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="fas fa-circle"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Online</h4>
                                </div>
                                <div class="card-body">
                                    132
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4><?= bo_admin_translate('Dashboard', 'last_register_user') ?></h4>
                                <div class="card-header-action">
                                    <a href="<?= base_url(route_to('admin_users_listing', '')); ?>" class="btn btn-primary">Hepsini Görüntüle</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row pb-2">
                                    <?php foreach ($users as $user): ?>
                                        <div class="col-6 col-sm-1 col-lg-1 mb-4 mb-md-0">
                                            <div class="avatar-item mb-0">
                                                <img alt="image" src="<?= base_url('public/admin/img/avatar/avatar-3.png') ?>"
                                                     class="img-fluid"
                                                     data-toggle="tooltip"
                                                     title="<?= $user->getFullName(); ?>">
                                                <div class="avatar-badge" title=" <?= $user->withGroup()->getTitle(); ?>" data-toggle="tooltip"><i class="fas fa-layer-group"></i></div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4><?= bo_admin_translate('Dashboard', 'last_blog_content'); ?></h4>
                                <div class="card-header-action">
                                    <a href="<?= base_url(route_to('admin_blog_listing', '')); ?>" class="btn btn-primary">Hepsini Görüntüle</a>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th>Başlık</th>
                                            <th>Yazar</th>
                                            <th>Oluşturulma Tarihi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($blogs as $blog): ?>
                                            <tr>
                                                <td>
                                                    <?= $blog->getTitle(); ?>
                                                    <div class="table-links">
                                                        <a href="<?= base_url(route_to('admin_blog_edit', $blog->id)); ?>">Düzenle</a>
                                                        <div class="bullet"></div>
                                                        <a href="#">Görüntüle</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?= $blog->withUser()->getFullName(); ?>
                                                </td>
                                                <td>
                                                    <?= $blog->getCreatedAt(true); ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4><?= bo_admin_translate('Dashboard', 'recent_activities') ?></h4>
                                <div class="card-header-action">
                                    <a href="#" class="btn btn-primary">Hepsini Görüntüle</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled list-unstyled-border">
                                    <li class="media">
                                        <img class="mr-3 rounded-circle" width="50" src="<?= base_url('public/admin/img/avatar/avatar-1.png'); ?>" alt="avatar">
                                        <div class="media-body">
                                            <div class="float-right text-primary">Şimdi</div>
                                            <div class="media-title">Bahadır Önal</div>
                                            <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="mr-3 rounded-circle" width="50" src="<?= base_url('public/admin/img/avatar/avatar-2.png'); ?>" alt="avatar">
                                        <div class="media-body">
                                            <div class="float-right">12dk önce</div>
                                            <div class="media-title">Bahadır Önal</div>
                                            <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="mr-3 rounded-circle" width="50" src="<?= base_url('public/admin/img/avatar/avatar-3.png'); ?>" alt="avatar">
                                        <div class="media-body">
                                            <div class="float-right">21dk önce</div>
                                            <div class="media-title">Bahadır Önal</div>
                                            <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="mr-3 rounded-circle" width="50" src="<?= base_url('public/admin/img/avatar/avatar-4.png'); ?>" alt="avatar">
                                        <div class="media-body">
                                            <div class="float-right">34dk önce</div>
                                            <div class="media-title">Bahadır Önal</div>
                                            <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4><?= bo_admin_translate('Dashboard', 'statistics'); ?></h4>
                                <div class="card-header-action">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-primary"><?= bo_admin_translate('Dashboard', 'weekly'); ?></a>
                                        <a href="#" class="btn"><?= bo_admin_translate('Dashboard', 'monthly'); ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart" height="182"></canvas>
                                <div class="statistic-details mt-sm-4">
                                    <div class="statistic-details-item">
                                        <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
                                        <div class="detail-value">985.147</div>
                                        <div class="detail-name"><?= bo_admin_translate('Dashboard', 'page_views'); ?></div>
                                    </div>
                                    <div class="statistic-details-item">
                                        <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
                                        <div class="detail-value">2dk</div>
                                        <div class="detail-name"><?= bo_admin_translate('Dashboard', 'session_duration'); ?></div>
                                    </div>
                                    <div class="statistic-details-item">
                                        <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>
                                        <div class="detail-value">123.567</div>
                                        <div class="detail-name"><?= bo_admin_translate('Dashboard', 'number_of_sessions'); ?></div>
                                    </div>
                                    <div class="statistic-details-item">
                                        <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
                                        <div class="detail-value">54.254</div>
                                        <div class="detail-name"><?= bo_admin_translate('Dashboard', 'unique_sessions'); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4><?= bo_admin_translate('Dashboard', 'reference_url'); ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="text-small float-right font-weight-bold text-muted">2,100</div>
                                    <div class="font-weight-bold mb-1">Google</div>
                                    <div class="progress" data-height="3">
                                        <div class="progress-bar" role="progressbar" data-width="80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <div class="text-small float-right font-weight-bold text-muted">1,880</div>
                                    <div class="font-weight-bold mb-1">Facebook</div>
                                    <div class="progress" data-height="3">
                                        <div class="progress-bar" role="progressbar" data-width="67%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <div class="text-small float-right font-weight-bold text-muted">1,521</div>
                                    <div class="font-weight-bold mb-1">Bing</div>
                                    <div class="progress" data-height="3">
                                        <div class="progress-bar" role="progressbar" data-width="58%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <div class="text-small float-right font-weight-bold text-muted">884</div>
                                    <div class="font-weight-bold mb-1">Yahoo</div>
                                    <div class="progress" data-height="3">
                                        <div class="progress-bar" role="progressbar" data-width="36%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <div class="text-small float-right font-weight-bold text-muted">473</div>
                                    <div class="font-weight-bold mb-1">Yandex</div>
                                    <div class="progress" data-height="3">
                                        <div class="progress-bar" role="progressbar" data-width="28%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <div class="text-small float-right font-weight-bold text-muted">418</div>
                                    <div class="font-weight-bold mb-1">Twitter</div>
                                    <div class="progress" data-height="3">
                                        <div class="progress-bar" role="progressbar" data-width="20%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4><?= bo_admin_translate('Dashboard', 'popular_browsers'); ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col text-center">
                                        <div class="browser browser-chrome"></div>
                                        <div class="mt-2 font-weight-bold">Chrome</div>
                                        <div class="text-muted text-small"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 48%</div>
                                    </div>
                                    <div class="col text-center">
                                        <div class="browser browser-firefox"></div>
                                        <div class="mt-2 font-weight-bold">Firefox</div>
                                        <div class="text-muted text-small"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 26%</div>
                                    </div>
                                    <div class="col text-center">
                                        <div class="browser browser-safari"></div>
                                        <div class="mt-2 font-weight-bold">Safari</div>
                                        <div class="text-muted text-small"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 14%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $this->endSection(); ?>

<?php $this->section('script'); ?>

<?= script_tag('public/admin/js/chart.min.js') ?>

    <script>
        var statistics_chart = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(statistics_chart, {
            type: 'line',
            data: {
                labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                datasets: [{
                    label: 'Statistics',
                    data: [640, 387, 530, 302, 430, 270, 488],
                    borderWidth: 5,
                    borderColor: '#6777ef',
                    backgroundColor: 'transparent',
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#6777ef',
                    pointRadius: 4
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        },
                        ticks: {
                            stepSize: 150
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            color: '#fbfbfb',
                            lineWidth: 2
                        }
                    }]
                },
            }
        });
    </script>

<?php $this->endSection(); ?>