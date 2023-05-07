<script>
    function formModal(title,load_url){
        $("#title").html(title);
        
        //$("#confirm").modal();
        modal = new bootstrap.Modal(document.getElementById("modal"))
        modal.toggle()
    }
</script>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-end">
                    <form id="form" method="post">
                        <div id="msg"></div>
                        @csrf
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <input type="submit" value="Confirmar" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>