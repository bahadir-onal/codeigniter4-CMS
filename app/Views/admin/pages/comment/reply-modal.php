<div class="modal-header">
    <h5 class="modal-title"><?= $comment->getName(); ?> Yoruma Cevap Ver</h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<div class="modal-body comment-modal">
    <input type="hidden" value="<?= $comment->id; ?>" name="comment_id">
    <div class="form-group">
        <label>Yorumunuz</label>
        <textarea name="reply" class="form-control" style="height: 150px;"></textarea>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-primary comment-reply-send">Gönder</button>
</div>