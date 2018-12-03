<!-- page content -->
<div class="right_col" role="main">
    <div class="">
    	<div class="clearfix"></div>
    
        <div class="row" style="min-height:577px">
        
            <div class="col-md-12 col-sm-12 col-xs-12">
            	<!------------------------------------------------ Listing Section ------------------------------------------>
                <div class="x_panel">
                    
                    <div class="x_title">
                    	<h2>Manage To Do Tasks</h2>
                        <ul class="nav navbar-right panel_toolbox">
                        	<li>
                            	<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        	
                        	<a href="<?php echo SURL;?>home.php?page=task&act=add" class="btn btn-info" title="Add Task"><i class="fa fa-plus"></i> Add</a>
                            
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="x_content">
                    
                    	<?php 
							if(isset($_REQUEST['okmsg']) || isset($_REQUEST['errmsg']) || isset($_SESSION['infomsg']["error"])) {
								if(isset($_REQUEST['errmsg']))	$msg_class='alert alert-danger alert-dismissible fade in';
									if(isset($_REQUEST['okmsg']))	$msg_class='alert alert-success alert-dismissible fade in';
                    	?>
                   	 			<div class="<?php echo $msg_class;?>" role="alert">
                    			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                       			<?php echo '<ul>'.base64_decode($_REQUEST['okmsg']).base64_decode($_REQUEST['errmsg']).$_SESSION['infomsg']["error"].'</ul>'; ?>
                        
                    			</div>
                    	<?php unset($_SESSION['infomsg']["error"]); } ?>	
                    
                        <form action="" method="post" name="manage_agents" enctype="multipart/form-data" >    
                        
                            <!-- ALL HIDDEN FIELDS AT THE TOP HERE    -->
                            
                            <input type="hidden" name="page" value="agents" />
                            <input type="hidden" name="act" value="list" />
                            <input type="hidden" name="mode" value="applyaction" />
                        
                        	<?php if($total_agents > 0){ ?>                            
                                <table id="datatable-responsive" class="table table-striped jambo_table bulk_action" cellspacing="0" width="100%">
                                   
                                    <thead>
                                        <tr class="headings">
                                            <th width="15%">Title</th>
                                            <th width="15%">Detail</th>
                                            <th width="15%">Date</th>
                                            <th width="15%">Time</th>
                                            <th width="20%">Status</th>
                                            <th width="20%">Actions</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php while(!$rs->EOF){
											if( $rs->fields['status'] == 0 ){
                                                    $span	=	'<span class="label label-info">Pending</span>';
                                                    $icon	=	'<i class="fa fa-check"></i>';
                                                    $iconCls = 'btn btn-success btn-xs';
                                                    $href	=	SURL.'home.php?page=task&act=list&mode=sts&sts=complete&id='.base64_encode($rs->fields['id']);
                                                }else{
                                                    $span	=	'<span class="label label-success">Completed</span>';
                                                    $icon	=	'<i class="fa fa-ban"></i>';
                                                    $iconCls = 'btn btn-danger btn-xs';
                                                    $href	=	SURL.'home.php?page=task&act=list&mode=sts&sts=pending&id='.base64_encode($rs->fields['id']);
                                           }
										 ?>
                                            <tr>
                                            <td><?php echo $rs->fields['title']?></td>
                                            <td><?php echo strip_tags($rs->fields['detail']);?></td>
                                            <td><?php echo $rs->fields['task_date']; ?></td>
                                            <td><?php echo $rs->fields['task_time']; ?></td>
                                            <td><?php echo $span; ?></td>
                                            
                                            <td>
                                            <a href="<?php echo $href ?>" title="Change Status" class="<?php echo $iconCls;?>">
                                                <?php echo $icon;?> 	
                                            </a>
                                            
                                            <a href="<?php echo SURL?>home.php?page=task&act=edit&id=<?php echo base64_encode($rs->fields['id'])?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                            
                                            <a href="<?php echo SURL?>home.php?page=task&act=list&mode=del&id=<?php echo base64_encode($rs->fields['id']);?>" onClick="return confirm('Are you sure you want to Delete?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                            </td>
                                            </tr>
                                        <?php 
                                            $rs->MoveNext();
                                            }
                                        ?> 
                                    
                                    </tbody>
                                    
                                </table>
                        	<?php }else{ ?>
                            	<div class="alert alert-info" role="alert">                    				
                       				<ul>No Record(s) Found.</ul>                        
                    			</div>
                            <?php } ?>
                        </form>
                    
                    </div>
                    
                </div>            
            	<!--------------------------------------------- End Listing Section --------------------------------------->
            
            </div>
            
        </div>
    
    </div>
</div>
        <!-- /page content -->
    