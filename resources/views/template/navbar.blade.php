<header class="mdl-layout__header cb-primario">
   <div class="mdl-layout__header-row">
     <div class="mdl-layout-spacer"></div>
     <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                 mdl-textfield--floating-label mdl-textfield--align-right">
       <label class="mdl-button mdl-js-button mdl-button--icon"
              for="fixed-header-drawer-exp">
         <i class="material-icons">search</i>
       </label>
       <div class="mdl-textfield__expandable-holder">
         <input class="mdl-textfield__input" type="text" name="sample"
                id="fixed-header-drawer-exp">
       </div>
     </div>
   </div>
 </header>
 <div class="mdl-layout__drawer">
   <span class="mdl-layout-title">SenaOnHand</span>
   <nav class="mdl-navigation">
     <a class="mdl-navigation__link" href="{{ route('tipos_denuncias.index') }}">Tipos denuncias</a>
     <a class="mdl-navigation__link" href="{{ route('estados_usuarios.index') }}">Estados usuarios</a>
     <a class="mdl-navigation__link" href="{{ route('estados_comentarios.index') }}">Estados comentarios</a>
     <a class="mdl-navigation__link" href="{{ route('estados_denuncias.index') }}">Estados denuncias</a>
     <a class="mdl-navigation__link" href="{{ route('estados_publicaciones.index') }}">Estados publicaciones</a>
     <a class="mdl-navigation__link" href="{{ route('tipos_anuncios.index') }}">Tipos anuncios</a>
     <a class="mdl-navigation__link" href="{{ route('tipos_docs.index') }}">Tipos documentos</a>
     <a class="mdl-navigation__link" href="{{ route('roles.index') }}">Roles</a>
     <a class="mdl-navigation__link" href="{{ route('regionales.index') }}">Regionales</a>
     <a class="mdl-navigation__link" href="{{ route('centros.index') }}">Centros</a>
     <a class="mdl-navigation__link" href="{{ route('sedes.index') }}">Sedes</a>
     <a class="mdl-navigation__link" href="{{ route('programas.index') }}">Programas</a>
     <a class="mdl-navigation__link" href="{{ route('categorias.index') }}">Categorias</a>
     <a class="mdl-navigation__link" href="{{ route('subcategorias.index') }}">Subcategorias</a>

   </nav>
 </div>
