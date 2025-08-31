<script>
    let barChartIncidentChart;

    function barchartIncident(data) {

        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        const months = Array.from({
            length: 12
        }, (_, i) => i + 1);

        // Get all unique incident types
        const types = [...new Set(data.map(x => x.typeincident))];

        // Build series where each type has 12 values (per month)
        const seriesData = types.map(type => {
            return {
                name: type,
                data: months.map(month => {
                    const found = data.find(x => Number(x.month) === month && x.typeincident === type);
                    return found ? Number(found.total) : 0;
                })
            };
        });

        const categories = months.map(m => monthNames[m - 1]);

        console.log("Prepared series:", seriesData);

        let options = {
            series: seriesData,
            chart: {
                type: "bar",
                height: 400,
                stacked: false // 🔹 Inline, not stacked
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "55%",
                    borderRadius: 6,
                    dataLabels: {
                        position: "top"
                    }
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: categories,
                title: {
                    text: `Incident Report - ${new Date().getFullYear()}`
                }
            },
            yaxis: {
                min: 0,
                forceNiceScale: true
            },
            tooltip: {
                shared: true, // show grouped tooltip
                intersect: false
            },
            legend: {
                show: true,
                position: "top"
            }
        };

        let chart = new ApexCharts(document.querySelector("#incidentreportChart"), options);
        chart.render();
    }

    function getIncidentReport() {
        postRequest("{{ route('dashboard.getIncidentReport') }}", {}, (response) => {
            if (response.status == 'success') {
                let countData = response.counts;
                barchartIncident(countData);
            }
        })
    }

    $(document).ready(function() {
        getIncidentReport();
    })
</script>
