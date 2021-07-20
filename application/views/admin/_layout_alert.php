<?php if($this->session->flashdata('success')){ ?>
    <div class="alert alert-success alert-dismissible" style="padding: 5px 30px 5px 10px!important;float:right;">
		<button class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong>Success! </strong><?= $this->session->flashdata('success'); ?>
	</div>
<?php }else if($this->session->flashdata('error')){  ?>
    <div class="alert alert-danger alert-dismissible" style="padding: 5px 30px 5px 10px!important;float:right;">
		<button class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong>Unsuccess! </strong> <?= $this->session->flashdata('error'); ?>
	</div>
<?php } ?>
