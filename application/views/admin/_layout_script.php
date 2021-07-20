<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?= base_url('assets/admin/js/jquery-2.1.4.min.js'); ?>"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="<?= base_url('assets/admin/js/jquery-1.11.3.min.js'); ?>"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?= base_url('assets/admin/js/jquery.mobile.custom.min.js'); ?>'>"+"<"+"/script>");
		</script>
		<script src="<?= base_url('assets/admin/js/bootstrap.min.js'); ?>"></script>

		<!-- ace scripts -->
		<script src="<?= base_url('assets/admin/js/ace-elements.min.js'); ?>"></script>
		<script src="<?= base_url('assets/admin/js/ace.min.js'); ?>"></script>
		
		<script src="https://cdn.ckeditor.com/4.7.2/standard-all/ckeditor.js"></script>
        <script>
            CKEDITOR.disableAutoInline = true;
            CKEDITOR.replace('text_editor');
        </script>
		<script>
		function previewMultiple(event){
			var saida = document.getElementById("img_file");
			var quantos = saida.files.length;
			for(i = 0; i < quantos; i++){
				var urls = URL.createObjectURL(event.target.files[i]);
				document.getElementById("galeria").innerHTML += '<img src="'+urls+'">';
			}
		}
		</script>