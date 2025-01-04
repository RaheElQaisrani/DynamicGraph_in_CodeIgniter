

<!DOCTYPE html>
<html>
<head>
    <title>Sales Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Ensure the chart container has enough height */
        #chartContainer {
            height: 400px;
        }
        /* Add this style section to your existing `<style>` tags in the `<head>` section */



    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sales Dashboard</a>
        </div>
    </nav>

    <div class="container mt-5">
        <!-- Chart Section -->
        <div class="card mb-4">
        <div class="d-flex justify-content-between align-items-center">
    <h4 class="mb-0">Sales Chart</h4>
    <div>
        <!-- Button for Line Chart -->
        <button class="btn btn-outline-primary btn-lg mx-2" id="lineChartBtn">
            <i class="fas fa-chart-line"></i> Line Chart
        </button>
        <!-- Button for Bar Chart -->
        <button class="btn btn-outline-success btn-lg mx-2" id="barChartBtn">
            <i class="fas fa-chart-bar"></i> Bar Chart
        </button>
    </div>
</div>

            <div class="card-body">
                <div id="chartContainer">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <h4 class="mb-0">Sales Records</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Sales Amount</th>
                                <th>Sales Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sales as $sale): ?>
                                <tr>
                                    <td><?= esc($sale['id']) ?></td>
                                    <td><?= esc($sale['product_name']) ?></td>
                                    <td><?= esc($sale['sales_amount']) ?></td>
                                    <td><?= esc(date('d', strtotime($sale['sales_date']))) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-4 py-3 bg-light">
        <p>&copy; 2025 Raheel's Sales Dashboard</p>
    </footer>

    <!-- Chart.js Script -->
    <script>
        // Prepare data for Line Chart
        const salesData = <?php echo json_encode($sales); ?>;
        const lineLabels = salesData.map(sale => {
            const dateParts = sale.sales_date.split('-');
            return dateParts[2]; // Day of the month
        });
        const lineData = salesData.map(sale => parseFloat(sale.sales_amount));

        // Prepare data for Bar Chart
        const productSales = {};
        salesData.forEach(sale => {
            if (!productSales[sale.product_name]) {
                productSales[sale.product_name] = 0;
            }
            productSales[sale.product_name] += parseFloat(sale.sales_amount);
        });
        const barLabels = Object.keys(productSales);
        const barData = Object.values(productSales);

        // Initialize Chart.js
        const ctx = document.getElementById('salesChart').getContext('2d');
        let currentChart;

        // Create Chart Function
        function createChart(type, labels, data) {
            if (currentChart) {
                currentChart.destroy(); // Destroy existing chart
            }
            currentChart = new Chart(ctx, {
                type: type,
                data: {
                    labels: labels,
                    datasets: [{
                        label: type === 'line' ? 'Sales Amount by Day' : 'Total Sales by Product',
                        data: data,
                        backgroundColor: type === 'line' ? 'rgba(0, 0, 139, 0.2)' : 'rgba(0, 0, 139, 0.7)',
                        borderColor: 'rgba(0, 0, 139, 1)',
                        borderWidth: 2,
                        tension: 0.4 // For Line Chart Smooth Curves
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top'
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: type === 'line' ? 'Day of the Month' : 'Product Name'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Sales Amount ($)'
                            }
                        }
                    }
                }
            });
        }

       // Default Chart (Bar Chart)
        createChart('bar', barLabels, barData);

        // Button Event Listeners
        document.getElementById('lineChartBtn').addEventListener('click', () => {
            createChart('line', lineLabels, lineData);
        });
        document.getElementById('barChartBtn').addEventListener('click', () => {
            createChart('bar', barLabels, barData);
        });
    </script>
</body>
</html>
