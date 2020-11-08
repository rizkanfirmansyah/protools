<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="<?= base_url('assets/') ?>plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?= base_url('assets/') ?>plugins/bower_components/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url('assets/') ?>bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/') ?>js/app-style-switcher.js"></script>
<script src="<?= base_url('assets/') ?>plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<!--Wave Effects -->
<script src="<?= base_url('assets/') ?>js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?= base_url('assets/') ?>js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?= base_url('assets/') ?>js/custom.js"></script>
<!--This page JavaScript -->
<!--chartis chart-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?= base_url('assets/') ?>js/pages/dashboards/dashboard1.js"></script>
<!-- PLUGINS -->
<!-- <script src="<?= base_url('assets/') ?>plugins/datatables/js/dataTables.bootstrap.js"></script> -->
<script src="<?= base_url('assets/') ?>plugins/datatables/js/jquery.dataTables.js"></script>

<!-- PRIVATE JS INCLUDE -->
<?php if (url(3) != null) : ?>
    <script src="<?= base_url('assets/private/') . url(3) ?>/script.js"></script>
<?php elseif (url(2) != null) : ?>
    <script src=" <?= base_url('assets/private/js/') . url(2) ?>/script.js"> </script>
<?php elseif (url(1) != null) : ?>
    <script src="<?= base_url('assets/private/js/') . url(1) ?>/script.js"></script>
<?php endif; ?>

<script src="<?= base_url('assets/private/js') ?>/script.js"></script>