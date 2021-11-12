<br>
<br>
<a href= "/?c=brand&a=form" class="btn btn-sm btn-success" title="Nueva Marca"><i class="fas fa-plus-circle fa-3x" ></i></a>
<br>
<br>
<div class="container text-center">
<table class="table-bordered">
    <thead>
        <tr>
            <td><strong>ID</strong></td>
            <td><strong>Nombre de la Marca</strong></td>
            <td><strong>Descripción</strong></td> 
            <td><strong>Editar Marca</strong></td> 
            <td><strong>Eliminar Marca</strong></td> 
            
        </tr>
    </thead>
    <tbody>
        <?php foreach($brands as $brand): ?>
            <tr>
                <td><?=$brand->getId() ?></td>
                <td><?=$brand->getName() ?></td>
                <td><?=$brand->getDescription() ?></td>                
                <td>
                    <a href="?c=brand&a=form&id=<?= $brand->getId() ?>" class="btn btn-warning" title="Editar Marca"><i class="fas fa-edit fa-2x"></i></a>
                </td>
                <td>
                    <a href="?c=brand&a=delete&id=<?= $brand->getId() ?>" class="btn btn-danger" tittle="Eliminar Marca"><i class="fas fa-trash-alt fa-2x"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
    </tbody>
</table>
</div>