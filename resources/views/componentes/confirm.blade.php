<script>
    function confirmModal(title,url){
        $("#title").html(title);
        $("#form").attr("action",url);

        modal = new bootstrap.Modal(document.getElementById("confirm"))
        modal.toggle()
    }
</script>

<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-end">
                    <form id="form" method="post">
                        <div id="msg"></div>
                        @csrf
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <input type="submit" value="Confirmar" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>