<div class="modal fade" id="editor-modal" tabindex="-1" role="dialog" aria-labelledby="editor-modal-label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="/pages/update" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="editor-modal-label">WYSIWYG Editor</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="editor-modal-id" />
                    <textarea name="body_markup" id="editor" rows="10"></textarea>
                </div>
                <input type="hidden" name="_updateContent" value="PUT">
                <div class="modal-footer">
                    <button type="button" class="close btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="save" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>