<div class="contenedor-grupos">
    <div class="contenido-dashboard">
        <div class=" tit-dash">
            <div>
                <h2 class="no-margin">Analisis Gráfico</h2>
            </div>
            <div>
                <p>Filtros</p>
            </div>
        </div>
        <div class="tabs tabs__grafico">
            <button id="defaultOpen" class="tablink" onclick="openPage('piechart', this, ' #005b82','dash')">Participaciones</button>
            <button id="participaciones" class="tablink" onclick="openPage('piechart1', this, ' #005b82','dash')">Invitaciones</button>
            <button class="tablink" id="benDer" onclick="openPage('piechart2', this, '#008896', 'dash')">Participacion Escuela</button>
            <button id="ben" class="tablink" onclick="openPage('piechart3', this, '#008896','dash')">Participacion por fecha</button>
            <button id="" class="tablink" onclick="openPage('beneficioG', this, '#008896','dash')">Beneficios</button>
            <button id="" class="tablink" onclick="openPage('falsta', this, '#008896','dash')">Add</button>
        </div>
        <div class="contenido-dash">
            <div class="dash" id="piechart"></div>
            <div class="dash" id="piechart1"></div>
            <div class="dash" id="piechart2"></div>
            <div class="dash" id="piechart3"></div>
            <div class="dash " id="beneficioG">
                <div class="" id="piechart4"></div>
                <div class="" id="piechart5"></div>
            </div>

        </div>
    </div>


</div>

<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.load("current", {
        packages: ["corechart"]
    });

    google.charts.setOnLoadCallback(dibujaBeneficiosPen);
    google.charts.setOnLoadCallback(dibujaEstadoBeneficios);
    google.charts.setOnLoadCallback(dibujaFecha);
    google.charts.setOnLoadCallback(dibujaTop);
    google.charts.setOnLoadCallback(drawStuff);
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Facultad', 'Participaciones'],
            <?php
            while ($fila = $participantes->fetch_assoc()) {
                echo "['" . $fila["nombre"] . "'," . $fila["cantidad"] . "],";
            }
            ?>
        ]);

        var options = {
            width: 1000,
            heigth: 800,
            title: 'Participantes por Grupo'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);

    }


    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ['Grupo', 'Cantidad de Invitaciones'],
            <?php
            while ($fila = $invitaciones->fetch_assoc()) {
                echo "['" . $fila["nombre_grupo"] . "'," . $fila["CantidadInvitaciones"] . "],";
            }
            ?>

        ]);

        var options = {
            width: 350,
            legend: {
                position: 'none'
            },
            chart: {
                title: 'Invitaciones por Grupo',
                subtitle: 'Cantidad de Invitaciones'
            },
            axes: {
                x: {
                    0: {

                    } // Top x-axis.
                }
            },
            bar: {
                groupWidth: "90%"
            }
        };

        var chart2 = new google.charts.Bar(document.getElementById('piechart1'));
        // Convert the Classic options to Material options.
        chart2.draw(data, google.charts.Bar.convertOptions(options));
    };

    function dibujaTop() {
        var data = new google.visualization.arrayToDataTable([
            ['Escuelas', 'Cantidad de Participaciones', {
                role: 'style'
            }],
            <?php
            while ($fila = $top->fetch_assoc()) {
                echo "['" . $fila["nombre_escuela"] . "'," . $fila["cantidad"] . ",'random_color()'],";
            }
            ?>

        ]);

        var options = {
            title: 'Chess opening moves',
            width: 600,
            height: 400,
            legend: {
                position: 'none'
            },
            chart: {
                title: 'Participaciones',
                subtitle: 'Cantidad de Participación por escuelas'
            },
            bars: 'horizontal', // Required for Material Bar Charts.
            axes: {
                x: {
                    0: {
                        side: 'top',
                        label: 'Porcentaje'
                    } // Top x-axis.
                }
            },
            bar: {
                groupWidth: "90%"
            }
        };

        var chart = new google.charts.Bar(document.getElementById('piechart2'));
        chart.draw(data, options);
    };

    function dibujaFecha() {
        var data = google.visualization.arrayToDataTable([
            ['X', 'Cantidad de Participaciones'],
            <?php
            while ($fila = $particionesFecha->fetch_assoc()) {
                echo "['" . $fila["Inicio"] . "'," . $fila["Cantidad"] . "],";
            }
            ?>

        ]);

        var options = {

            legend: 'none',
            colors: ['#15A0C8'],
            pointSize: 30,
            pointShape: {
                type: 'circle',
                rotation: 180
            }
        };

        var chart = new google.visualization.AreaChart(document.getElementById('piechart3'));
        chart.draw(data, options);
    }

    function dibujaEstadoBeneficios() {
        var data = google.visualization.arrayToDataTable([
            ['Beneficios', 'Catidad de Completados'],
            <?php
            while ($fila = $estadoBeneficios->fetch_assoc()) {
                echo "['" . $fila["nombre"] . "'," . $fila["cantidad"] . "],";
            }
            ?>

        ]);

        var options = {
            title: 'Beneficios Cumplidos',
            pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart4'));
        chart.draw(data, options);
    }


    function dibujaBeneficiosPen() {
        var data = google.visualization.arrayToDataTable([
            ['Beneficios', 'Catidad de Completados'],
            <?php
            while ($fila = $beneficiosPendientes->fetch_assoc()) {
                echo "['" . $fila["nombre"] . "'," . $fila["cantidad"] . "],";
            }
            ?>

        ]);

        var options = {
            title: 'Beneficios Pendientes',
            pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart5'));
        chart.draw(data, options);
    }
</script>