<table class="table table-success table-striped table-responsive" id="tabla_doc"> 
    <tr>
        <th colspan="2" class="text-center">Documentos</th>
    </tr>
    <tr>
        <th>Nombre</th>
        <th>Url</th>
    </tr>
    @forelse ($model as $item)
    <tr>
        <td>{{$item->nombre}}</td>
        <td>
            <a target="_blank" href="{{asset($item->url)}}" class="bi bi-file-earmark-pdf btn btn btn-outline-danger ">Pdf</a>
            @if (auth()->user()->rol_id == 1)
                <div onclick="confirmModal('Seguro que desea borrar esta lista?','{{url('home/delete/'.$item->id)}}')" class="btn btn-danger" >Borrar</div>
            @endif
        </td>
    </tr>
@empty
    <tr>
        <td colspan="3">No hay registros</td>
    </tr>
@endforelse
</table>