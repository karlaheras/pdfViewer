<table class="table table-success table-striped table-responsive"> 
    <tr>
        <th colspan="3" class="text-center">Documentos</th>
    </tr>
    <tr>
        <th>Nombre</th>
        <th>Url</th>
        <th></th>
    </tr>
    @forelse ($model as $item)
    <tr>
        <td>{{$item->nombre}}</td>
        <td>{{$item->url}}</td>
        <td>
            <a href="{{url('home/edit/'.$item->id)}}" class="btn btn-warning">Editar</a>
            <div onclick="confirmModal('Seguro que desea borrar esta lista?','{{url('home/delete/'.$item->id)}}')" class="btn btn-danger" >Borrar</div>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="3">No hay registros</td>
    </tr>
@endforelse
</table>