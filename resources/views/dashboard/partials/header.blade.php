  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">

  <!--Menu de Navegacion 1-->
  <nav class="navbar navbar-expand-lg navbar-dark d-none d-sm-none d-md-block" id="menu">
      <div class="container-fluid px-5">
          <a class="navbar-brand mx-2" href="https://www.facebook.com/UAMManizales" target="_blank"> <img
                  src="{{ asset('images/icons/facebook.svg') }}" alt="Facebook"> </a>
          <a class="navbar-brand mx-2" href="https://www.instagram.com/uammanizales" target="_blank"> <img
                  src="{{ asset('images/icons/instagram.svg') }}" alt="Instagram"> </a>
          <a class="navbar-brand mx-2" href="https://twitter.com/UAMManizales" target="_blank"> <img
                  src="{{ asset('images/icons/twitter.svg') }}" alt="Twitter"> </a>

          {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> --}}

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span> </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-3">
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page"
                          href="https://autonoma.edu.co/aspirantes">Aspirantes</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" href="https://autonoma.edu.co/estudiantes">Estudiantes</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" href="https://autonoma.edu.co/graduados">Graduados</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" href="https://autonoma.edu.co/colaboradores">Colaboradores</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" href="https://autonoma.edu.co/empresas">Empresas</a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>

  <!--Menu de Navegacion 2-->
  <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container-fluid px-sm-3">

          <a href="https://autonoma.edu.co/"> <img src="{{ asset('images/logo/logo-uam.png') }}" alt=""
                  class="d-inline-block align-text-start"></a>

          <span class="ms-3 me-auto titulo-inscripciones" id="estilo-texto-uno">
              <a href="https://intrauampruebas.autonoma.edu.co/inscripcion/"
                  class="fw-bold" style="color: #0069A3; text-decoration:none">CADENA DE <br> HONOR</a>
          </span>

          <button id="boton-h" class="navbar-toggler py-2 hamburguesita" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupported" aria-controls="navbarSupported" aria-expanded="false"
              aria-label="Toggle navigation">
              <span> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                      class="bi bi-list" viewBox="0 0 16 16">
                      <path fill-rule="evenodd"
                          d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                  </svg></span>

          </button>

          <div class="collapse navbar-collapse" id="navbarSupported">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-3">
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" style="color: #0069A3; font-weight:bold;"
                          href="/">Inicio</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" style="color: #0069A3; font-weight:bold;"
                          href="{{ route('employer.index') }}">Empresas</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" style="color: #0069A3; font-weight:bold;"
                          href="{{ route('experience.create') }}">Testimonios</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" style="color: #0069A3; font-weight:bold;"
                          href="{{ route('vacancies.index') }}">Vacantes</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" style="color: #0069A3; font-weight:bold;"
                          href="{{ route('contact') }}">Equipo y contacto</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" style="color: #0069A3; font-weight:bold;"
                          href="{{ route('conoce_mas.index') }}">Preguntas frecuentes</a>
                  </li>
              </ul>
          </div>

          <div class="navbar-collapse collapse" id="navbarSupportedContent">
              <div class="navbar-nav navbar-right">
                  @guest
                      @if (Route::has('login'))
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                          </li>
                      @endif

                      @if (Route::has('register'))
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('conoce_mas.info') }}">{{ __('Registrarse') }}</a>
                              {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a> --}}
                          </li>
                      @endif
                  @else
                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                              data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->name }}

                          </a>

                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              @if (auth()->user()->rol->key !== 'admin')
                                  <a class="dropdown-item" href="{{ route('user.show', auth()->user()->id) }}">
                                      {{ __('Ver perfil') }}
                                  </a>
                              @endif
                              <a class="dropdown-item" href="{{ route('home') }}">
                                  {{ __('Inicio') }}
                              </a>
                              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                  {{ __('Cerrar Sesión') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                          </div>
                      </li>
                  @endguest
                  {{-- <a href="{{ route('login') }}" class="nav-item nav-link underline">Log in</a>
          <a href="{{ route('register') }}" class="nav-item nav-link underline">Register</a> --}}
              </div>
          </div>


          <div class="collapse navbar-collapse" id="navbarSupported">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-3">
                  <?php if(isset($menu) && !empty($menu) && $menu != null){
                    foreach($menu as $key => $option){?>
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="<?php echo $key; ?>"><?php echo $option; ?></a>
                  </li>
                  <?php } 
                } ?>
                  <!--Dropdown solo aprece en Movil-->
                  <li class="nav-item dropdown d-block d-sm-block d-md-none">
                      <hr class="dropdown-divider">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                          data-toggle="dropdown" aria-expanded="false">
                          Selecciona tu perfil
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <li><a class="dropdown-item" href="#">Aspirantes</a></li>
                          <li><a class="dropdown-item" href="#">Estudiantes</a></li>
                          <li><a class="dropdown-item" href="#">Graduados</a></li>
                          <li><a class="dropdown-item" href="#">Colaboradores</a></li>
                          <li><a class="dropdown-item" href="#">Empresas</a></li>
                      </ul>
                  </li>
              </ul>
          </div>
      </div>
  </nav>




  <!-- Esto no deja funcionar la hamburguesa -->
  {{-- <script src="{{ asset('js/popper.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" charset="utf-8"></script> --}}
