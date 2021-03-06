<!-- ###### Head ###### !-->
<?php $this->load->view('admin/_layout_head.php'); ?>
	</head>

	<body class="no-skin">

        <!-- ###### Header ###### !-->
	    <?php $this->load->view('admin/_layout_header.php'); ?>

		<div class="main-container ace-save-state" id="main-container">

            <!-- ###### Sidebar/Navbar ###### !-->
		    <?php $this->load->view('admin/_layout_nav.php'); ?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="page-header">
							<h1>
								Users
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									View
								</small>
								<!-- <a type="button" href="<?= base_url('admin/user/add') ?>" class="btn btn-sm btn-danger">
									<i class="ace-icon fa fa-pencil-square-o align-top bigger-125 icon-on-right"></i>
									Add User	
								</a> -->
								<?php $this->load->view('admin/_layout_alert.php'); ?>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">
										<div class="table-header">
											Results for "Users"
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>Sr. No</th>
														<th>Name</th>
														<th>Email</th>
														<th>Score</th>
														<th>Action</th>
														<th class="hide"></th>
														<th class="hide"></th>
													</tr>
												</thead>
												<tbody>
												<?php 
												$counter=0;   
												foreach ($users as $user){ 
													$counter=$counter+1; ?>				
													<tr>
														<td><?= $counter; ?></td>

														<td>
															<?= $user->name; ?>
														</td>
														<td><?= $user->email; ?></td>
														<td class="hidden-480"><?= $user->correct_cnt; ?></td>

														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																
																<a class="red" onclick='return confirm("Are You Sure?")'href="<?= base_url('admin/user/delete/'.$user->id); ?>">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>
															</div>

															
														</td>
														<td class="hide"></td>
														<td class="hide"></td>
													</tr>
													<?php }	?>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<div id="view_modal" class="modal fade userinfo" tabindex="-1">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header no-padding">
												<div class="table-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
													<span class="white">&times;</span>
													</button>
													<span class="h3">View</span>
												</div>
											</div>
											<div class="modal-body no-padding vertical__scroll">
												<div class="profile-user-info profile-user-info-striped">
													<div class="profile-info-row">
														<div class="profile-info-name"> Title </div>
														<div class="profile-info-value">
															<span class="editable" id="title"></span>
														</div>
													</div>
													<div class="profile-info-row">
														<div class="profile-info-name"> Category </div>
														<div class="profile-info-value">
															<span class="editable" id="category"></span>
														</div>
													</div>
													<div class="profile-info-row">
														<div class="profile-info-name"> Description </div>
														<div class="profile-info-value">
															<span class="editable" id="description"></span>
														</div>
													</div>
													<div class="profile-info-row">
														<div class="profile-info-name"> Image </div>
														<div class="profile-info-value">
															<span class="editable" id="image"></span>
														</div>
													</div>
													<div class="profile-info-row">
														<div class="profile-info-name"> Date </div>
														<div class="profile-info-value">
															<span class="editable" id="date"></span>
														</div>
													</div>
												</div>
												<div class="modal-footer no-margin-top">
													<button class="btn btn-sm btn-danger" data-dismiss="modal">
													<i class="ace-icon fa fa-times"></i>
													Close
													</button>
												</div>
											</div>
											<!-- /.modal-content -->
										</div>
										<!-- /.modal-dialog -->
									</div>
								</div>

								<div id="modal-table" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header no-padding">
												<div class="table-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														<span class="white">&times;</span>
													</button>
													Results for "Latest Registered Domains
												</div>
											</div>

											<div class="modal-body no-padding">
												<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
													<thead>
														<tr>
															<th>Domain</th>
															<th>Price</th>
															<th>Clicks</th>

															<th>
																<i class="ace-icon fa fa-clock-o bigger-110"></i>
																Update
															</th>
														</tr>
													</thead>

													<tbody>
														<tr>
															<td>
																<a href="#">ace.com</a>
															</td>
															<td>$45</td>
															<td>3,330</td>
															<td>Feb 12</td>
														</tr>

														<tr>
															<td>
																<a href="#">base.com</a>
															</td>
															<td>$35</td>
															<td>2,595</td>
															<td>Feb 18</td>
														</tr>

														<tr>
															<td>
																<a href="#">max.com</a>
															</td>
															<td>$60</td>
															<td>4,400</td>
															<td>Mar 11</td>
														</tr>

														<tr>
															<td>
																<a href="#">best.com</a>
															</td>
															<td>$75</td>
															<td>6,500</td>
															<td>Apr 03</td>
														</tr>

														<tr>
															<td>
																<a href="#">pro.com</a>
															</td>
															<td>$55</td>
															<td>4,250</td>
															<td>Jan 21</td>
														</tr>
													</tbody>
												</table>
											</div>

											<div class="modal-footer no-margin-top">
												<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
													<i class="ace-icon fa fa-times"></i>
													Close
												</button>

												<ul class="pagination pull-right no-margin">
													<li class="prev disabled">
														<a href="#">
															<i class="ace-icon fa fa-angle-double-left"></i>
														</a>
													</li>

													<li class="active">
														<a href="#">1</a>
													</li>

													<li>
														<a href="#">2</a>
													</li>

													<li>
														<a href="#">3</a>
													</li>

													<li class="next">
														<a href="#">
															<i class="ace-icon fa fa-angle-double-right"></i>
														</a>
													</li>
												</ul>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<!-- ###### Footer ###### !-->
		    <?php $this->load->view('admin/_layout_footer.php'); ?>

		</div><!-- /.main-container -->

		<!-- ###### Script ###### !-->
		<?php $this->load->view('admin/_layout_script.php'); ?>

		<!-- page specific plugin scripts -->
		<script src="<?= base_url('assets/admin/js/jquery.dataTables.min.js'); ?>"></script>
		<script src="<?= base_url('assets/admin/js/jquery.dataTables.bootstrap.min.js'); ?>"></script>
		<script src="<?= base_url('assets/admin/js/dataTables.buttons.min.js'); ?>"></script>
		<script src="<?= base_url('assets/admin/js/buttons.flash.min.js'); ?>"></script>
		<script src="<?= base_url('assets/admin/js/buttons.html5.min.js'); ?>"></script>
		<script src="<?= base_url('assets/admin/js/buttons.print.min.js'); ?>"></script>
		<script src="<?= base_url('assets/admin/js/buttons.colVis.min.js'); ?>"></script>
		<script src="<?= base_url('assets/admin/js/dataTables.select.min.js'); ?>"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null, null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],
					
					
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			
			
					select: {
						style: 'multi'
					}
			    } );
				
				
				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
				
				new $.fn.dataTable.Buttons( myTable, {
					buttons: [
					  {
						"extend": "colvis",
						"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
						"className": "btn btn-white btn-primary btn-bold",
						columns: ':not(:first):not(:last)'
					  },
					  {
						"extend": "copy",
						"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "csv",
						"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "excel",
						"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "pdf",
						"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "print",
						"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: false,
						message: 'This print was produced using the Print button for DataTables'
					  }		  
					]
				} );
				myTable.buttons().container().appendTo( $('.tableTools-container') );
				
				//style the message box
				var defaultCopyAction = myTable.button(1).action();
				myTable.button(1).action(function (e, dt, button, config) {
					defaultCopyAction(e, dt, button, config);
					$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
				});
				
				
				var defaultColvisAction = myTable.button(0).action();
				myTable.button(0).action(function (e, dt, button, config) {
					
					defaultColvisAction(e, dt, button, config);
					
					
					if($('.dt-button-collection > .dropdown-menu').length == 0) {
						$('.dt-button-collection')
						.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
						.find('a').attr('href', '#').wrap("<li />")
					}
					$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
				});
			
				////
			
				setTimeout(function() {
					$($('.tableTools-container')).find('a.dt-button').each(function() {
						var div = $(this).find(' > div').first();
						if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
						else $(this).tooltip({container: 'body', title: $(this).text()});
					});
				}, 500);
				
				
				
				
				
				myTable.on( 'select', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
					}
				} );
				myTable.on( 'deselect', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
					}
				} );
			
			
			
			
				/////////////////////////////////
				//table checkboxes
				$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
				
				//select/deselect all rows according to table header checkbox
				$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$('#dynamic-table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) myTable.row(row).select();
						else  myTable.row(row).deselect();
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
					var row = $(this).closest('tr').get(0);
					if(this.checked) myTable.row(row).deselect();
					else myTable.row(row).select();
				});
			
			
			
				$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
				});
				
				
				
				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if($row.is('.detail-row ')) return;
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});
			
				
			
				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				
				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
				
				
				
				
				/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});
				/***************/
				
				
				
				
				
				/**
				//add horizontal scrollbars to a simple table
				$('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
				  {
					horizontal: true,
					styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
					size: 2000,
					mouseWheelLock: true
				  }
				).css('padding-top', '12px');
				*/
			
			
			})
		</script>

<!-- <script>
$(document).ready(function(){
    $('#memListTable').DataTable({
        // Processing indicator
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('members/getLists/'); ?>",
            "type": "POST"
        },
        //Set column definition initialisation properties
        "columnDefs": [{ 
            "targets": [0],
            "orderable": false
        }]
    });
});
</script> -->

        <script>
            
			$(document).on('click', '.status_checks', function() {
				  var status = ($(this).hasClass("label-success")) ? '0' : '1';
				  //$(this).attr('rel');
				  var msg = (status == '0') ? 'Deactivate' : 'Activate';
				  var html = (status == '0') ? 'Inactive' : 'Active';
				  var removeClass = (status == '0') ? 'label-success' : 'label-danger';
				  var addClass = (status == '0') ? 'label-danger' : 'label-success';
				  if (confirm("Are you sure to " + msg)) {
						var current_element = $(this);
						url = "blog/changeStatus";
						$.ajax({
							  type: "POST",
							  url: url,
							  data: {
							  id: $(current_element).attr('data'),
							  status: status
							  },
							  success: function(data) {
									$(current_element).html(html);
									$(current_element).removeClass(removeClass).addClass(addClass);

									
							  },error:function(){
							  alert('Error');
							  }
						});
				  }

			});

			$(document).on('click','.view_record',function(){
					var current_element = $(this);
					url = "blog/viewBlog";

					// AJAX request
					$.ajax({
					   headers: {
						  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						  },
					   type:"POST",
					   url: url,
					   dataType: 'json',

					   data: {id:$(current_element).attr('data-id')},
					   success: function(response){ 
						  console.log(response); 
						  $('#title').html(response.title);
						  $('#category').html(response.name);
						  $('#description').html(response.description);
						  $('#date').html(response.added_on);
						  
						  if(response.image != null){
							 $('#image').html("<img src='<?php echo base_url('uploads/blog/') ?>" + response.image + " ' height='75' width='75'> ");
						  }else{
							 $('#image').html("<img src=' {{asset('assets/images/avatars/profile-pic.jpg')}} ' height='50px' width='50px'> ");
						  }
						  
						   // Display Modal
						  $('#view_modal').modal('show'); 
					   }
					}); 
				 });
        </script>

	</body>
</html>
