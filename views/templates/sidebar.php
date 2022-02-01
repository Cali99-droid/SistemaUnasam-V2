<aside class="sidebar mostrar-barra">
    <div class="contenedor-sidebar">
        <h2>UpTask</h2>
        <div class="menu">
            <img src="build/img/menu.svg" alt="imagen-menu" id="mobile-menu">
        </div>
    </div>
    <div class="items ">
        <div class="cerrar-menu">
            <img id="cerrar-menu" src="build/img/cerrar.svg" alt="imagen-cerrar" id="mobile-menu">
        </div>

        <a href="/inicio" title="Inicio" class=' <?php echo ($titulo === 'Inicio') ? 'activo' : ''; ?>'>
            <i class='bx bxs-chart'></i>Análisis
        </a>
        <a href="/grupos" title="Grupos" class=' <?php echo ($titulo === 'Organizaciones') ? 'activo' : ''; ?>'><i class='bx bx-group'></i>Organizaciones</a>
        <a href="/beneficios" title="Beneficios" class=' <?php echo ($titulo === 'Beneficios') ? 'activo' : ''; ?>'><i class='bx bx-medal'></i>Beneficios</a>
        <a href="/eventos" title="Eventos" class=' <?php echo ($titulo === 'Eventos') ? 'activo' : ''; ?>'><i class='bx bxs-calendar'></i>Eventos</a>
        <a href="/reporte" title="Reportes" class=' <?php echo ($titulo === 'Reportes') ? 'activo' : ''; ?>'><i class="bx bxs-file"></i>Reportes</a>
        <a href="/desercion" title="Deserción" class=' <?php echo ($titulo === 'Desercion') ? 'activo' : ''; ?>'><i class="fas fa-user-graduate"></i>Deserción</a>
        <div class="item">
            <a href="javascript:void(0)" class=' <?php echo ($titulo === 'Administrador') ? 'activo' : ''; ?>' class="administrador" onclick="mostrarAdmin()"><i class="fas fa-user-tie" title="Administrador"></i>Administrador</a>
            <div class="sub-item " id="sub-item">
                <a href="/tipos">Tipos de Organización</a>
                <a href="/usuarios">Usuarios</a>
                <a href="/roles">Roles</a>
                <a href="/semestres">Semestres</a>
            </div>
        </div>

        <div class="cerrar-sesion-mobile">
            <a href="/perfil" class="cerrar-sesion">Perfil</a>
            <a href="/logout" class="cerrar-sesion">Cerrar Session</a>
        </div>

    </div>

</aside>