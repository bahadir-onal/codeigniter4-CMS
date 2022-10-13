<?php $pager->setSurroundCount(1); ?>

<nav class="d-inline-block">
    <ul class="pagination mb-0">
        <?php if ($pager->hasPreviousPage()) { ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getFirst() ?>" tabindex="-1"><i class="fas fa-angle-double-left"></i></a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getPreviousPage() ?>" tabindex="-1"><i class="fas fa-angle-left"></i></a>
            </li>
        <?php } ?>

        <?php foreach ($pager->links() as $link) { ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                <a class="page-link" href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php } ?>

        <?php if ($pager->hasNextPage()) { ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getNextPage() ?>"><i class="fas fa-angle-right"></i></a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getLast() ?>"><i class="fas fa-angle-double-right"></i></a>
            </li>
        <?php } ?>
    </ul>
</nav>