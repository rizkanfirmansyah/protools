<?php if (url(3) != null) : ?>
    <?php $this->load->view('main/' . url(3) . '/index')  ?>
<?php elseif (url(2) != null) : ?>
    <?php $this->load->view('main/' . url(2) . '/index')  ?>
<?php elseif (url(1) != null) : ?>
    <?php $this->load->view('main/' . url(1) . '/index')  ?>
<?php endif; ?>
<!-- <div></div> -->