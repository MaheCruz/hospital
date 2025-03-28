<div class="settings panel panel-default hidden-xs hidden-sm" id="settings">
    <button ct-toggle="toggle" data-toggle-class="active" data-toggle-target="#settings" class="btn btn-default">
        <i class="fa fa-spin fa-gear"></i>
    </button>
    <div class="panel-heading">
        Selector de Estilos
    </div>
    <div class="panel-body">
        <!-- start: CABECERA FIJA -->
        <div class="setting-box clearfix">
            <span class="setting-title pull-left"> Cabecera Fija</span>
            <span class="setting-switch pull-right">
                <input type="checkbox" class="js-switch" id="fixed-header" />
            </span>
        </div>
        <!-- end: CABECERA FIJA -->
        <!-- start: BARRA LATERAL FIJA -->
        <div class="setting-box clearfix">
            <span class="setting-title pull-left">Barra Lateral Fija</span>
            <span class="setting-switch pull-right">
                <input type="checkbox" class="js-switch" id="fixed-sidebar" />
            </span>
        </div>
        <!-- end: BARRA LATERAL FIJA -->
        <!-- start: BARRA LATERAL CERRADA -->
        <div class="setting-box clearfix">
            <span class="setting-title pull-left">Barra Lateral Cerrada</span>
            <span class="setting-switch pull-right">
                <input type="checkbox" class="js-switch" id="closed-sidebar" />
            </span>
        </div>
        <!-- end: BARRA LATERAL CERRADA -->
        <!-- start: PIE DE PÁGINA FIJO -->
        <div class="setting-box clearfix">
            <span class="setting-title pull-left">Pie de Página Fijo</span>
            <span class="setting-switch pull-right">
                <input type="checkbox" class="js-switch" id="fixed-footer" />
            </span>
        </div>
        <!-- end: PIE DE PÁGINA FIJO -->
        <!-- start: CAMBIADOR DE TEMA -->
        <div class="colors-row setting-box">
            <div class="color-theme theme-1">
                <div class="color-layout">
                    <label>
                        <input type="radio" name="setting-theme" value="theme-1">
                        <span class="ti-check"></span>
                        <span class="split header"> <span class="color th-header"></span> <span class="color th-collapse"></span> </span>
                        <span class="split"> <span class="color th-sidebar"><i class="element"></i></span> <span class="color th-body"></span> </span>
                    </label>
                </div>
            </div>
            <!-- Agrega aquí más opciones de temas si es necesario -->
        </div>
        <!-- end: CAMBIADOR DE TEMA -->
    </div>
</div>
