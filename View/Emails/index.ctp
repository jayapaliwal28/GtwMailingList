<div class="container navbar-buffer">
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-8"><h3 style='margin-top:0px'>Mailing List</h3></div>
			<div class="col-md-4 text-right"><?php echo $this->Html->link('<i class="fa fa-reply-all"></i> Email All','mailto:?bcc='. implode(',', $email_list), array("class" => "btn btn-primary", "escape" => false)); ?></div>
		</div>
	</div>
	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th>Id</th>
				<th>Email</th>		
				<th>Contact date</th>
				<th class='text-center'>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php if(empty($emails)){?>
				<tr>
					<td colspan='7' class='text-warning'>No record found.</td>
				</tr>
			<?php }else{?>			
				 <?php foreach ($emails as $email): ?>
					<tr>
						<td>
							<?php echo $email['Email']['id']; ?>
						</td>
						<td>
							<?php echo $email['Email']['email']; ?>
						</td>
						<td>
							<?php echo $email['Email']['created']; ?>
						</td>
						<td class="text-center">
							<span class="text-left">
								<?php echo $this->Html->link('<i class="fa fa-envelope"></i>','mailto:'. $email['Email']['email'], array( "escape" => false)); ?>
							</span>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php }?>
		</tbody>
	</table>	
</div>
</div>
