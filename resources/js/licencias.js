document.addEventListener('DOMContentLoaded', function () {
    console.log("Cargando tabla de licencias...");

    // Esperar a que jQuery y jTable estén disponibles
    if (typeof $ === 'undefined' || typeof $.jtable === 'undefined') {
        console.error('jTable no está definido');
        return;
    }

    $('#tablaLicencias').jtable({
        title: 'Listado de Licencias Médicas',
        actions: {
            listAction: '/licencias/listar' // Ajusta según tu ruta real
        },
        fields: {
            id: {
                key: true,
                list: false
            },
            nombre: {
                title: 'Nombre'
            },
            fecha: {
                title: 'Fecha'
            }
        }
    });

    $('#tablaLicencias').jtable('load');
});
