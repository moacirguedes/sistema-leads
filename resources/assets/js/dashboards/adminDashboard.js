$(document).ready(function () {

    new Chart(document.getElementById("line-lead-chart"), {
        type: 'line',
        data: {
            labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
            datasets: [{
                data: Object.values(leadsCount),
                label: "Leads",
                borderColor: "#f21515",
                fill: false,
                lineTension: 0
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Leads por mês'
            }
        }
    });

    new Chart(document.getElementById("line-client-chart"), {
        type: 'line',
        data: {
            labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
            datasets: [{
                data: Object.values(clientsCount),
                label: "Clientes",
                borderColor: "#06ad0e",
                fill: false,
                lineTension: 0
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Clientes por mês'
            }
        }
    });
});