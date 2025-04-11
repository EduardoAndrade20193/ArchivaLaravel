import Chart from 'chart.js/auto';

document.addEventListener('DOMContentLoaded', () => {
    // Meses del año
    const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 
                   'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

    // Datos de las licencias por año
    const datos2024 = window._datos2024;
    const datos2025 = window._datos2025;

    // Preparando los datos para las gráficas de barras de 2024 y 2025
    const data2024 = Array(12).fill(0);
    datos2024.forEach(d => data2024[d.Mes - 1] = d.Total);

    const data2025 = Array(12).fill(0);
    datos2025.forEach(d => data2025[d.Mes - 1] = d.Total);

    // Gráfica de barras para el año 2024
    new Chart(document.getElementById('grafica2024'), {
        type: 'bar',
        data: {
            labels: meses,
            datasets: [{
                label: 'Licencias 2024',
                data: data2024,
                backgroundColor: '#483d8b',
            }]
        }
    });

    // Gráfica de barras para el año 2025
    new Chart(document.getElementById('grafica2025'), {
        type: 'bar',
        data: {
            labels: meses,
            datasets: [{
                label: 'Licencias 2025',
                data: data2025,
                backgroundColor: '#a52a2a',
            }]
        }
    });

    // Gráfica comparativa de 2024 vs 2025 (líneas)
    new Chart(document.getElementById('graficaComparativa'), {
        type: 'line',
        data: {
            labels: meses,
            datasets: [{
                label: 'Licencias 2024',
                data: data2024,
                fill: false,
                borderColor: '#483d8b',
                tension: 0.1,
            }, {
                label: 'Licencias 2025',
                data: data2025,
                fill: false,
                borderColor: '#a52a2a',
                tension: 0.1,
            }]
        }
    });
});
