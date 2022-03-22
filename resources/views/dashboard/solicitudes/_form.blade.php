@csrf
@include('dashboard.partials.validation-error')
<div class="container py-4">
    <div class="p-5 mb-3 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h4>
                <p style="color: #0069A3;; text-align: center;">
                    Crear una cuenta de empleador
                </p>
            </h4>
            <div class="form-group">
                <div class="row center">
                    <div class="col mb-1">
                        <label for="" >Nombres y apellidos del empleador<span class="required">*</span></label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Nombre y apellido del empleador">

                        <br>
                        <label for="" >Número de documento<span class="required">*</span></label>
                        <input type="number" class="form-control" name="document" id="document"
                            placeholder="Número de Documento">
                        <br>

                        <label for="" >Correo electrónico<span class="required">*</span></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        <br>

                        <label for="" >Número de contacto<span class="required">*</span></label>
                        <input type="number" class="form-control" name="phone" id="phone"
                            placeholder="Teléfono">
                        <br>


                        <label for="" >Nombre de la empresa<span class="required">*</span></label>
                        <input type="text" class="form-control" name="company" id="company"
                            placeholder="Nombre de la empresa">
                        <p style="color: #0069A3;;">(En caso de no ser una empresa poner el nombre del empleador)</p>


                        <label for="" >Dirección<span class="required">*</span></label>

                        <input type="text" class="form-control" name="location" id="location"
                            placeholder="Dirección">
                        <br>

                        <label for="" >Descripcion de la empresa<span class="required">*</span></label>
                        <textarea name="description" id="description" class="form-control" rows="3"
                            placeholder="Descipción de la empresa"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                <a href="{{ URL::previous() }}" class="btn btn-success btn-block" >Cancelar</a>              
            </div>
        </div>
    </div>

</div>