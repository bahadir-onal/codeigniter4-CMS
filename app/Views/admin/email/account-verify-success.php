<?php $this->extend('admin/email/main'); ?>

<?php $this->section('content'); ?>

<table role="presentation" class="main">
    <tr>
        <td class="wrapper">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <p><?= bo_admin_translate('EmailTemplate', 'account_success_hello') ?> <?= $user->getFullName(); ?>,</p>
                        <p><?= bo_admin_translate('EmailTemplate', 'account_success_content') ?></p>
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                            <tbody>
                            <tr>
                                <td align="left">
                                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <a href="#" target="_blank">
                                                    <?= bo_admin_translate('EmailTemplate', 'account_success_button') ?>
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <p><?= bo_admin_translate('EmailTemplate', 'account_success_alt_content') ?></p>
                        <p><?= bo_admin_translate('EmailTemplate', 'account_success_thanks') ?></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<?php $this->endSection(); ?>
