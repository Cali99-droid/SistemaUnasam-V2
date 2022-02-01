<div class="contenedor-grupos">
    <div class="titulo-ana">
        <h3 class="no-margin"><i class="fas fa-chart-pie"></i> Análisis Gráfico</h3>
        <div class="calls">
            <a href="#piechart"> Participantes</a>
            <a href="#piechart1"> Invitaciones </a>
            <a href="#piechart2"> TOP 5 escuelas</a>
            <a href="#piechart3"> Fechas</a>
            <a href="#piechart4"> Beneficios Cumplidos</a>
            <a href="#piechart5"> Beneficios pendientes</a>
            <a href="#piechart6"> Tendencia Participaciones</a>
            <a href="#piechart7"> Regulares</a>
            <a href="#piechart8"> Irregulares</a>
        </div>
    </div>
    <div class="contenido-dashboard">

        <div class="contenido-dash">
            <div class="dash" id="piechart"></div>
            <div class="dash" id="piechart1"></div>
            <div class="dash" id="piechart2"></div>
            <div class="dash" id="piechart3"></div>
            <div class="dash" id="piechart4"></div>
            <div class="dash" id="piechart5"></div>
            <div class="dash" id="piechart6"></div>
            <div class="dash" id="piechart7"></div>
            <div class="dash" id="piechart8"></div>
        </div>
    </div>


</div>

<script type="text/javascript">
    google.charts.load('visualization', {
        'packages': ['corechart']
    });
    google.charts.load('visualization', {
        'packages': ['bar']
    });
    google.charts.load('visualization', {
        'packages': ['bar']
    });
    google.charts.load("visualization", {
        packages: ["corechart"]
    });
    google.charts.load("visualization", {
        packages: ["corechart"]
    });
    google.charts.load("visualization", {
        packages: ["corechart"]
    });
    google.charts.load('visualization', {
        'packages': ['line']
    });
    google.charts.load('visualization', {
        'packages': ['line']
    });
    google.charts.load('visualization', {
        'packages': ['line']
    });

    google.charts.setOnLoadCallback(dibujaBeneficiosPen);
    google.charts.setOnLoadCallback(dibujaEstadoBeneficios);
    google.charts.setOnLoadCallback(dibujaFecha);
    google.charts.setOnLoadCallback(dibujaTop);
    google.charts.setOnLoadCallback(drawStuff);
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(dibujaTendencia);
    google.charts.setOnLoadCallback(dibujaTendenciaRegulares);
    google.charts.setOnLoadCallback(dibujaTendenciaIrregulares);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Facultad', 'Participaciones'],
            <?php
            while ($fila = $participantes->fetch_assoc()) {
                echo "['" . mb_strtoupper($fila["nombre"]) . "'," . $fila["cantidad"] . "],";
            }
            ?>
        ]);





        if (screen.width < 1024) {
            var options = {
                width: 300,
                height: 400,
                titleTextStyle: {color: '#686868'},
                title: 'Participantes por Grupo '
            };
        } else
        if (screen.width < 1280) {
            var options = {
                width: 500,
                height: 600,
                titleTextStyle: {color: '#686868'},
                title: 'Participantes por Grupo '
            };
        } else {
            var options = {
                titleTextStyle: {color: '#686868'},
                title: 'Participantes por Grupo '
            };
        }

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);

    }


    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ['Grupo', 'Cantidad de Invitaciones'],
            <?php
            while ($fila = $invitaciones->fetch_assoc()) {
                echo "['" . mb_strtoupper($fila["nombre_grupo"]) . "'," . $fila["CantidadInvitaciones"] . "],";
            }
            ?>

        ]);
        //
        if (screen.width < 1024) {
            var options = {
                width: 300,
                height: 400,
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
        } else
        if (screen.width < 1280) {
            var options = {
                width: 500,
                height: 600,
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
        } else {
            var options = {
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
        }
        //


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
                echo "['" . mb_strtoupper($fila["nombre_escuela"]) . "'," . $fila["cantidad"] . ",'random_color()'],";
            }
            ?>

        ]);

        //
        if (screen.width < 1024) {
            var options = {
                width: 300,
                height: 400,
                title: 'Chess opening moves',

                legend: {
                    position: 'none'
                },
                chart: {
                    title: 'TOP 5 ESCUELAS',
                    subtitle: 'Mayor de Participación por escuelas'
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
        } else
        if (screen.width < 1280) {
            var options = {
                width: 500,
                height: 600,
                title: 'Chess opening moves',

                legend: {
                    position: 'none'
                },
                chart: {
                    title: 'TOP 5 ESCUELAS',
                    subtitle: 'Mayor de Participación por escuelas'
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
        } else {
            var options = {
                title: 'Chess opening moves',

                legend: {
                    position: 'none'
                },
                chart: {
                    title: 'TOP 5 ESCUELAS',
                    subtitle: 'Mayor de Participación por escuelas'
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
        }
        //


        var chart = new google.charts.Bar(document.getElementById('piechart2'));
        chart.draw(data, options);
    };

    function dibujaFecha() {
        var data = google.visualization.arrayToDataTable([
            ['X', 'Cantidad de Participaciones'],
            <?php
            while ($fila = $particionesFecha->fetch_assoc()) {
                echo "['" . mb_strtoupper($fila["Inicio"]) . "'," . $fila["Cantidad"] . "],";
            }
            ?>

        ]);

        //
        if (screen.width < 1024) {
            var options = {
                width: 300,
                height: 400,
                title: 'CANTIDAD DE PARTICIPACIONES POR MESES',
                legend: 'none',
                titleTextStyle: {color: '#686868'},
                colors: ['#15A0C8'],
                pointSize: 30,
                pointShape: {
                    type: 'circle',
                    rotation: 180
                }
            };
        } else
        if (screen.width < 1280) {
            var options = {
                width: 500,
                height: 600,
                title: 'CANTIDAD DE PARTICIPACIONES POR MESES',
                legend: 'none',
                titleTextStyle: {color: '#686868'},
                colors: ['#15A0C8'],
                pointSize: 30,
                pointShape: {
                    type: 'circle',
                    rotation: 180
                }
            };
        } else {
            var options = {

                title: 'CANTIDAD DE PARTICIPACIONES POR MESES',
                legend: 'none',
                titleTextStyle: {color: '#686868'},
                colors: ['#15A0C8'],
                pointSize: 30,
                pointShape: {
                    type: 'circle',
                    rotation: 180
                }
            };
        }
        //


        var chart = new google.visualization.AreaChart(document.getElementById('piechart3'));
        chart.draw(data, options);
    }

    function dibujaEstadoBeneficios() {
        var data = google.visualization.arrayToDataTable([
            ['Beneficios', 'Catidad de Completados'],
            <?php
            while ($fila = $estadoBeneficios->fetch_assoc()) {
                echo "['" . mb_strtoupper($fila["nombre"]) . "'," . $fila["cantidad"] . "],";
            }
            ?>

        ]);

        //
        if (screen.width < 1024) {
            var options = {
                width: 300,
                height: 400,
                title: 'Beneficios Cumplidos',
                titleTextStyle: {color: '#686868'},
                pieHole: 0.4

            };
        } else
        if (screen.width < 1280) {
            var options = {
                width: 500,
                height: 600,
                title: 'Beneficios Cumplidos',
                titleTextStyle: {color: '#686868'},
                pieHole: 0.4

            };
        } else {
            var options = {
                title: 'Beneficios Cumplidos',
                titleTextStyle: {color: '#686868'},
                pieHole: 0.4

            };
        }
        //


        var chart = new google.visualization.PieChart(document.getElementById('piechart4'));
        chart.draw(data, options);
    }


    function dibujaBeneficiosPen() {
        var data = google.visualization.arrayToDataTable([
            ['Beneficios', 'Catidad de Completados'],
            <?php
            while ($fila = $beneficiosPendientes->fetch_assoc()) {
                echo "['" . mb_strtoupper($fila["nombre"]) . "'," . $fila["cantidad"] . "],";
            }
            ?>

        ]);

        //
        if (screen.width < 1024) {
            var options = {
                width: 300,
                height: 400,
                title: 'Beneficios Pendientes',
                titleTextStyle: {color: '#686868'},
                pieHole: 0.4

            };
        } else
        if (screen.width < 1280) {
            var options = {
                width: 500,
                height: 600,
                title: 'Beneficios Pendientes',
                titleTextStyle: {color: '#686868'},
                pieHole: 0.4

            };
        } else {
            var options = {
                title: 'Beneficios Pendientes',
                titleTextStyle: {color: '#686868'},
                pieHole: 0.4

            };
        }
        //

        var chart = new google.visualization.PieChart(document.getElementById('piechart5'));
        chart.draw(data, options);
    }
    /* INICIO*/

    function dibujaTendencia() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'MESES');
        <?php while ($fila = $escuelas->fetch_assoc()) {
        ?>
            data.addColumn('number',
                <?php
                echo " '" . mb_strtoupper($fila["nombre"]) . "'";
                ?>);
        <?php
        } ?>
        <?php echo $muestraDash; ?>

        //
        if (screen.width < 1024) {
            var options = {
                width: 300,
                height: 400,
                chart: {
                    title: 'Tendencia de participaciones por escuelas',
                    subtitle: 'cantidad de estudiantes'
                },

                axes: {
                    x: {
                        0: {
                            side: 'bot'
                        }
                    }
                }
            };
        } else
        if (screen.width < 1280) {
            var options = {
                width: 500,
                height: 600,
                chart: {
                    title: 'Tendencia de participaciones por escuelas',
                    subtitle: 'cantidad de estudiantes'
                },

                axes: {
                    x: {
                        0: {
                            side: 'bot'
                        }
                    }
                }
            };
        } else {
            var options = {
                chart: {
                    title: 'Tendencia de participaciones por escuelas',
                    subtitle: 'cantidad de estudiantes'
                },

                axes: {
                    x: {
                        0: {
                            side: 'bot'
                        }
                    }
                }
            };
        }
        //

        var chart = new google.charts.Line(document.getElementById('piechart6'));
        chart.draw(data, google.charts.Line.convertOptions(options));

    }

    /* FIN*/

    /* TENDENCIA DE REPORTES POR SEMESTRE DE ALUMNOS REGULARES */
    function dibujaTendenciaRegulares() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Tipo Grupos');
        <?php while ($fila = $getSemestre->fetch_assoc()) {
        ?>
            data.addColumn('number',
                <?php
                echo " '" . mb_strtoupper($fila["nombre"]) . "'";
                ?>);
        <?php
        } ?>
        <?php echo $tendenciaRegulares; ?>

        //
        if (screen.width < 1024) {
            var options = {
                width: 300,
                height: 400,
                chart: {
                    title: 'Tendencia de Cantidad de Regulares por Grupo',
                    subtitle: 'cantidad de estudiantes'
                },

                axes: {
                    x: {
                        0: {
                            side: 'bot'
                        }
                    }
                }
            };
        } else
        if (screen.width < 1280) {
            var options = {
                width: 500,
                height: 600,
                chart: {
                    title: 'Tendencia de Cantidad de Regulares por Grupo',
                    subtitle: 'cantidad de estudiantes'
                },

                axes: {
                    x: {
                        0: {
                            side: 'bot'
                        }
                    }
                }
            };
        } else {
            var options = {
                chart: {
                    title: 'Tendencia de Cantidad de Regulares por Grupo',
                    subtitle: 'cantidad de estudiantes'
                },

                axes: {
                    x: {
                        0: {
                            side: 'bot'
                        }
                    }
                }
            };
        }
        //

        var chart7 = new google.charts.Line(document.getElementById('piechart7'));
        chart7.draw(data, google.charts.Line.convertOptions(options));

    }

    /* FIN */
    /* TENDENCIA DE REPORTES POR SEMESTRE DE ALUMNOS IRREGULARES */
    function dibujaTendenciaIrregulares() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Tipos Grupos');
        <?php while ($fila = $getSemestre2->fetch_assoc()) {
        ?>
            data.addColumn('number',
                <?php
                echo " '" . mb_strtoupper($fila["nombre"]) . "'";
                ?>);
        <?php
        } ?>
        <?php echo $tendenciaIrregulares; ?>

        //
        if (screen.width < 1024) {
            var options = {
                width: 300,
                height: 400,
                chart: {
                    title: 'Tendencia de Cantidad de Irregulares por Grupo',
                    subtitle: 'cantidad de estudiantes'
                },

                axes: {
                    x: {
                        0: {
                            side: 'bot'
                        }
                    }
                }
            };
        } else
        if (screen.width < 1280) {
            var options = {
                width: 500,
                height: 600,
                chart: {
                    title: 'Tendencia de Cantidad de Irregulares por Grupo',
                    subtitle: 'cantidad de estudiantes'
                },

                axes: {
                    x: {
                        0: {
                            side: 'bot'
                        }
                    }
                }
            };
        } else {
            var options = {
                chart: {
                    title: 'Tendencia de Cantidad de Irregulares por Grupo',
                    subtitle: 'cantidad de estudiantes'
                },

                axes: {
                    x: {
                        0: {
                            side: 'bot'
                        }
                    }
                }
            };
        }
        //

        var chart7 = new google.charts.Line(document.getElementById('piechart8'));
        chart7.draw(data, google.charts.Line.convertOptions(options));

    }



    /* FIN */
</script>

<!-- Poner bootstarap -->