<?php
/**
 * Gintonic Web
 * @author    Philippe Lafrance
 * @link      http://gintonicweb.com
 */
$this->Helpers->load ( 'GtwRequire.GtwRequire' );
echo $this->GtwRequire->req ( 'mailinglist/wysiwyg' );
?>

<div class="container navbar-buffer">

	<div class="row">
		<div class="col-md-12">
			<h1>Draft Mail</h1>
			<hr />
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?php echo $this->Form->create("Email", array(
                'inputDefaults' => array(
                    'div' => 'form-group',
                    'wrapInput' => false,
                    'class' => 'form-control'
                ),
            ));?>
			<?php
			
			/* echo $this->Form->input('to', array(
					'label' => 'To',
					'placeholder' => 'Email To'
			));
			echo $this->Form->input('cc', array(
					'label' => 'CC',
					'placeholder' => 'CC'
			));
			echo $this->Form->input('bcc', array(
					'label' => 'BCC',
					'placeholder' => 'BCC',
					'value' => implode(',', $email_list)
			)); */
			
			echo $this->Form->input('subject', array(
					'label' => 'Subject',
					'placeholder' => 'Subject'
			));
			
			echo $this->Form->input ( 'body', array (
					'label' => 'Body',
					'rows' => '30',
					'placeholder' => 'Email body' 
			) );
			?>
			
			
	        <?php echo $this->Form->submit('Send', array(
	            'div' => false,
	            'class' => 'btn btn-primary'
	        ));?>
	        <?php echo $this->Html->actionBtn('Cancel', 'index'); ?>
			<?php echo $this->Form->end();?>
			
		</div>
	</div>
</div>