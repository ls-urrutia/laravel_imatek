<div>
   <div class="card">
       <div class="card-header">
           <input wire:model="search" class="form-control" placeholder="ingrese el nombre o correo">
       </div>
       <div class="card-body">
           <table class="table table-striped" id="usuarios">
               <thead>
                   <tr>
                       <th>ID</th>
                       <th>Nombre</th>
                       <th>Email</th>
                       <th></th>
                   </tr>
               </thead>
               <tbody>
                   @foreach ($users as $user)
                       <tr>
                           <td>{{$user->id}}</td>
                           <td>{{$user->name}}</td>
                           <td>{{$user->email}}</td>
                           <td width="10px">
                               <a class="btn btn-primary" href="{{route('users.edit',$user)}}">Editar</a>
                           </td>
                       </tr>
                       
                   @endforeach
               </tbody>
           </table>
       </div>
   </div>
</div>


<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js">  </script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js">  </script>
<script>
    $(document).ready(function() {
        $('#usuarios').DataTable({
            "lengthMenu": [[5,10, 50, -1],[5, 10, 50,"All"]],
            "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "Ningun registro encontrado",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "Sin registros",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            'search':'Buscar:'
        }
            
        });
    } );
    </script>
