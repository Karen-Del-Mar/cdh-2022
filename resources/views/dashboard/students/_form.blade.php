<div class="container">
    <div class="row">
        <div class="col-6">
            <h3>Datos personales</h3>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }} <span
                        class="required">*</span> </label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>



            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }} <span
                        class="required">*</span></label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row center">
                <div class="col">
                    <label for="document_type" class="form-label">Tipo de
                        documento </label>
                        <select class="form-control" name="gender" id="gender">
                            <option value=""></option>
                            @include('dashboard/partials/options_document', [
                                'val' => 'C.C',
                            ])
                        </select>
                </div>
                <div class="col">
                    <label for="name" class="form-label">Numero documento</label>
                    <input  type="number" name="document" id="document" class="form-control"
                        value="" />
                </div>
            </div>

            <div class="row center">
                <div class="col">
                    <label for="contact" class="form-label">Telefono <span
                            class="required">*</span></label>
                    <input type="number" name="contact" id="contact" class="form-control"
                        value="" />
                </div>
            </div>

            <div class="row">
                <div class="form-group row">
                    <input id="rol_id" class="form-control" value="3" name="rol_id" type="hidden">
                </div>
            </div>



            <div class="row">
                <div class="col">
                    <label>Género <span class="required">*</span></label>
                </div>
                <div class="col">
                    <select class="form-control" name="gender" id="gender">
                        <option value=""></option>
                        @include('dashboard/partials/option-gender', [
                            'val' => 'mujer',
                        ])
                    </select>
                </div>
            </div>


            <div class="row center">
                <div class="row">
                    <div class="col">
                        <label for="eps" class="form-label">EPS <span class="required">*</span></label>
                        <input type="text" name="eps" id="eps" class="form-control"
                            value="" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Tipo de sangre <span class="required">*</span></label>
                    </div>
                    <div class="col">
                        <select class="form-control" name="blood_type" id="blood_type">
                            <option value=""></option>
                            @include('dashboard.partials.blood-type', [
                                'val' => 'O+',
                            ])
                        </select>
                    </div>
                </div>
            </div>



            <div class="row center">
                <div class="col">
                    <label for="birthday" class="form-label">Fecha de nacimiento <span
                            class="required">*</span></label>
                    <input type="date" name="birthday" id="birthday" class="form-control"
                        value="" />
                </div>

            </div>
        </div>

        <div class="col-6">
            <h3>Perfil laboral</h3>
            <div class="form-group">
                <div class="row center">

                    <div class="row">
                        <div class="col">
                            <label>Carrera <span class="required">*</span></label>
                        </div>
                        <div class="col">
                            <select class="form-control" name="career" id="career">
                                <option value=""></option>
                                @include('dashboard.partials.careers', [
                                    'val' => 'Ing. Sistemas',
                                ])
                            </select>
                        </div>
                    </div> 

                    <div class="col">
                        <label for="name" class="form-label">Promedio <span
                                class="required">*</span></label>
                        <input type="number" name="average" id="average" class="form-control"
                            value="" />
                    </div>
                    <div class="col">
                        <label for="name" class="form-label">Semestre actual <span
                                class="required">*</span></label>
                        <input type="number" name="semester" id="semester" class="form-control"
                            value="" />
                    </div>
                </div>
                <div class="row center">
                    <div class="col">
                        <label for="job_skills" class="form-label">Habilidades <span
                                class="required">*</span></label>
                        <textarea class="form-control" name="job_skills" id="job_skills" cols="30" rows="4"
                            placeholder="Antecedentes"></textarea>
                    </div>
                </div>
                <div class="row center">
                    <div class="col">
                        <label for="work_experience" class="form-label">Experiencia laboral <span
                                class="required">*</span></label>
                        <textarea class="form-control" name="work_experience" id="work_experience" cols="30" rows="4"
                            placeholder="Antecedentes"></textarea>
                    </div>
                </div>

                <div class="row center">
                    <div class="col">
                        <label for="office_tools" class="form-label">Manejo de herramientas
                            ofimaticas <span class="required">*</span></label>
                        <textarea class="form-control" name="office_tools" id="office_tools" cols="30" rows="3"
                            placeholder="Antecedentes"></textarea>
                    </div>
                </div>

                <div class="row center">
                    <div class="col">
                        <label for="languages" class="form-label">Idiomas <span
                                class="required">*</span></label>
                        <textarea class="form-control" name="languages" id="languages" cols="30" rows="2"
                            placeholder="Antecedentes"></textarea>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="row">
        <div class="mb-3">
            <div class="form-group">
                <a href="{{ URL::previous() }}" class="btn btn-danger btn-sm">Cancelar</a>
                <button type="submit" class="btn btn-success btn-sm">Registrar</button>
            </div>
        </div>
    </div>
</div>