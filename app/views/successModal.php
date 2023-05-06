<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-white" role="document">
        <div class="modal-content bg-primary-a border border-white">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= $_SESSION['success_message'] ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary fs-5" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>