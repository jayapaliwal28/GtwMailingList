<h4>Mailing list</h4>
<form class="form-inline">
    <div class="input-group">
        <input id="mailinglist-email" type="text" class="form-control" placeholder="Your email address...">
        <span class="input-group-btn">
            <button id="mailinglist-btn" class="btn btn-two" type="button">Go!</button>
        </span>
    </div>
</form>

<!-- Modal -->
<div class="modal fade" id="mailinglist-modal" tabindex="-1" role="dialog" aria-labelledby="Registration Success" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Mailing list</h4>
      </div>
      <div class="modal-body">
        Your email address has successfuly been added to our mailing list.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
      </div>
    </div>
  </div>
</div>

<?php echo $this->Require->req('mailinglist/subscribe'); ?>
