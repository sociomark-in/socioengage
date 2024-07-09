<!-- partial:partials/_footer.html -->
<?php $this->load->view('components/theme/partials/_footer'); ?>
<!-- partial -->

</div>
</div>

<?php $this->load->view('components/theme/partials/_js') ?>

<?php
if ($this->session->userdata('first_user')) :
?>
	
<?php endif ?>

</body>

</html>
