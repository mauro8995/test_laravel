<div>
    {{-- The whole world belongs to you. --}}

    <div class="container">
        <div class="row">

                @error('name')
                    <div class="alert alert-danger">
                        <span class="error">{{ $message }}</span>
                    </div>
                @enderror

                @error('email')
                    <div class="alert alert-danger">
                        <span class="error">{{ $message }}</span>
                    </div>
                @enderror

        </div>
        <div class="row">

                <div class="col align-self-start">
                    <label>
                        Buscar usuarios
                        <input wire:model="search" type="search" />
                    </label>
                </div>
              <div class="col align-self-center">

              </div>
              <div class="col align-self-end">

                <button type="button" wire:click="limpiar()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    crear
                  </button>
                <!-- inicio Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>

                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">CREAR USUARIO</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="mb-3">
                                                    <label for="disabledTextInput" class="form-label">Nombres</label>
                                                    <input type="text" wire:model="name" name="name" id="name" class="form-control" placeholder="Nombres">

                                                </div>
                                                <div class="mb-3">
                                                    <label for="disabledTextInput" class="form-label">correo</label>
                                                    <input type="text" wire:model="email" name="email" id="email" class="form-control" placeholder="correo">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="disabledTextInput" class="form-label">contraseña</label>
                                                    <input type="password" wire:model="password" name="password" id="password" class="form-control" placeholder="contraseña">
                                                </div>

                                                <button   wire:click="crear()" data-bs-dismiss="modal" class="btn btn-success">Crear</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <!-- fin Modal -->

                  <!-- inicio Modal -->
                  <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModal" aria-hidden="true" wire:ignore.self>

                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="editar">EDITAR USUARIO</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form >
                                    <div class="mb-3">
                                        <label for="disabledTextInput" class="form-label">Nombres</label>
                                        <input type="text" wire:model="name" name="name" id="name" class="form-control" placeholder="Nombres">
                                    </div>
                                    <div class="mb-3">
                                        <label for="disabledTextInput" class="form-label">correo</label>
                                        <input type="text" wire:model="email" name="email" id="email" class="form-control" placeholder="correo">
                                    </div>

                                    <div class="mb-3">
                                        <label for="disabledTextInput" class="form-label">contraseña</label>
                                        <input type="password" wire:model="password" name="password" id="password" class="form-control" placeholder="contraseña">
                                    </div>

                                    <button type="submit"  wire:click="actualizar()" class="btn btn-success">Editar</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- fin Modal -->

              </div>
        </div>
    </div>


    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">NOMBRES</th>
            <th scope="col">EMAIL</th>
            <th scope="col">ACCIÓN</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $item)
          <tr>

            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>
                <button wire:click="eliminar({{$item->id}})" class="btn btn-danger">Eliminar</button>
                <button wire:click="get_user({{$item->id}})" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarModal">Editar</button>
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>




</div>
