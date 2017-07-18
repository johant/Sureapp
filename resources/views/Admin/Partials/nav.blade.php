<ul class="sidebar-menu">
  <li class="header">Navegación</li>
  <!-- Optionally, you can add icons to the links -->
  <li {{ request()->is('/') ? 'class=active' : '' }}><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> <span>Inicio</span></a></li>

    <li class="treeview {{ request()->is('admin/brands') || request()->is('admin/segmentations')|| request()->is('admin/variants') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-beer"></i> <span>Licores</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      {{-- <li {{ request()->is('tickets') ? 'class=active' : '' }}><a href="{{ route('tickets.list') }}"><i class="fa fa-eye"></i>Ver todos los Incidentes</a></li> --}}
      <li {{ request()->is('admin/brands') ? 'class=active' : '' }}><a href="{{route('brands.index')}}"><i class="fa fa-drupal"></i>Marcas</a> </li>
      <li {{ request()->is('admin/segmentations') ? 'class=active' : '' }}><a href="{{route('segmentations.index')}}"><i class="fa fa-dot-circle-o"></i>Segmentación</a> </li>
      <li {{ request()->is('admin/variants') ? 'class=active' : '' }}><a href="{{route('variants.index')}}"><i class="fa fa-dot-circle-o"></i>Variantes</a> </li>
      {{-- <li {{ request()->is('tickets/close') ? 'class=active' : '' }}><a href="{{ route('tickets.close')}}"><i class="fa fa-pencil"></i>Cerrar un Incidente</a> </li> --}}
    </ul>
  </li>

  <li class="treeview {{ request()->is('admin/areas') || request()->is('admin/areas/*')|| request()->is('admin/cities') || request()->is('admin/cities/*')|| request()->is('admin/types')|| request()->is('admin/categories')  ? 'active' : '' }}">
    <a href="#"><i class="fa fa-gears"></i> <span>Configuracion</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      {{-- <li {{ request()->is('tickets') ? 'class=active' : '' }}><a href="{{ route('tickets.list') }}"><i class="fa fa-eye"></i>Ver todos los Incidentes</a></li> --}}
      <li {{ request()->is('admin/areas/*') || request()->is('admin/areas') ? 'class=active' : '' }}><a href="{{route('areas.index')}}"><i class="fa fa-flag-o"></i>Zonas</a> </li>
      <li {{ request()->is('admin/cities') || request()->is('admin/cities/*') ? 'class=active' : '' }}><a href="{{route('cities.index')}}"><i class="fa fa-building-o"></i>Departamentos</a> </li>
      <li {{ request()->is('admin/categories') ? 'class=active' : '' }}><a href="{{route('categories.index')}}"><i class="fa fa-dot-circle-o"></i>Categorias</a> </li>
      <li {{ request()->is('admin/types') ? 'class=active' : '' }}><a href="{{route('clients.index')}}"><i class="fa fa-sitemap"></i>Tipo de Clientes</a> </li>
      {{-- <li {{ request()->is('tickets/close') ? 'class=active' : '' }}><a href="{{ route('tickets.close')}}"><i class="fa fa-pencil"></i>Cerrar un Incidente</a> </li> --}}
    </ul>
  </li>
  <li class="treeview {{ request()->is('admin/customers') || request()->is('admin/customer/*') || request()->is('admin/segmentations') || request()->is('admin/coaches') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-users"></i> <span>Clientes</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      {{-- <li {{ request()->is('tickets') ? 'class=active' : '' }}><a href="{{ route('tickets.list') }}"><i class="fa fa-eye"></i>Ver todos los Incidentes</a></li> --}}
      <li {{ request()->is('admin/customer/*') ||  request()->is('admin/customers') ? 'class=active' : '' }}><a href="{{route('customers.index')}}"><i class="fa fa-home"></i>Clientes</a> </li>
      {{-- <li {{ request()->is('admin/segmentations') ? 'class=active' : '' }}><a href="{{route('customers.index')}}"><i class="fa fa-user"></i>Staff</a> </li> --}}
      <li {{ request()->is('admin/coaches') ? 'class=active' : '' }}><a href="{{route('coaches.index')}}"><i class="fa fa-user-md"></i>Entrenadores</a> </li>
      {{-- <li {{ request()->is('tickets/close') ? 'class=active' : '' }}><a href="{{ route('tickets.close')}}"><i class="fa fa-pencil"></i>Cerrar un Incidente</a> </li> --}}
    </ul>
  </li>
    <li class="treeview {{ request()->is('admin/users') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-users"></i> <span>Seguridad</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      {{-- <li {{ request()->is('tickets') ? 'class=active' : '' }}><a href="{{ route('tickets.list') }}"><i class="fa fa-eye"></i>Ver todos los Incidentes</a></li> --}}
      <li {{ request()->is('admin/users/*') ? 'class=active' : '' }}><a href="{{route('users.index')}}"><i class="fa fa-home"></i>Usuarios</a> </li>
      <li {{ request()->is('admin/users/*') ? 'class=active' : '' }}><a href="" data-user="{{ auth()->user()->name }}"
                  data-toggle="modal" data-target="#updatepassword-window" href=""><i class="fa fa-lock"></i>Cambio Contraseña</a> </li>
      {{-- <li {{ request()->is('admin/segmentations') ? 'class=active' : '' }}><a href="{{route('customers.index')}}"><i class="fa fa-user"></i>Staff</a> </li> --}}
    </ul>
  </li>
   <li class="treeview {{ request()->is('admin/surveys') || request()->is('admin/survey/*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-gears"></i> <span>Preguntas</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      {{-- <li {{ request()->is('tickets') ? 'class=active' : '' }}><a href="{{ route('tickets.list') }}"><i class="fa fa-eye"></i>Ver todos los Incidentes</a></li> --}}
      <li {{ request()->is('admin/surveys') || request()->is('admin/survey/*') ? 'class=active' : '' }}><a href="{{route('surveys.index')}}" ><i class="fa fa-drupal"></i>Encuesta</a> </li>
     </ul>
  </li>
</ul>

@push('scripts')

  <script>
    $(function () {

      $('#updatepassword-window').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var title = button.data('user') // Extract info from data-* attributes
        var modal = $(this)
        modal.find('.modal-title-password').text('Cambiar Contraseña: ' + title)
      });
    });
  </script>
@include('Admin.Modals.modal-password')

@endpush
