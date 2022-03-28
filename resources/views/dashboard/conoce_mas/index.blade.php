@extends('dashboard.master')

@section('content')
    <div class="container mt-4 col-8">

        <div class="accordion" id="accordionExample">

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        {{ __(' ¿Qué es cadena de honor UAM?') }}
                    </button>
                </h2>

                @include('dashboard.conoce_mas.que_es_cadena_honor')

            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        {{ __(' ¿A quiénes va dirigido?') }}
                    </button>
                </h2>
                
                       
                @include('dashboard.conoce_mas.a_quien_va_dirigido')


            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        {{ __(' ¿Objetivos?') }}
                    </button>
                </h2>
               
               
                        @include('dashboard.conoce_mas.objetivo_unico')

            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                        {{ __(' ¿Qué servicios ofrece a las empresas?') }}
                    </button>
                </h2>
                
                       
                        @include('dashboard.conoce_mas.servicios')

                  
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                        {{ __(' ¿Cuales son los beneficios para estudiantes?') }}
                    </button>
                </h2>
                
                        
                        @include('dashboard.conoce_mas.beneficios')

                    
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseThree">
                        {{ __(' ¿Seguridad social?') }}
                    </button>
                </h2>

                @include('dashboard.conoce_mas.seguridad_social')
                
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseThree">
                        {{ __(' ¿Responsabilidades?') }}
                    </button>
                </h2>
                
                @include('dashboard.conoce_mas.responsabilidades')

            </div>

        </div>

    </div>
@endsection
