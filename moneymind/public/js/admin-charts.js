/**
 * Admin dashboard charts for MoneyMind
 * Creates interactive charts using Chart.js
 */
document.addEventListener('DOMContentLoaded', function() {
    // Chart.js global defaults
    Chart.defaults.font.family = "'Poppins', sans-serif";
    Chart.defaults.color = '#555';
    Chart.defaults.responsive = true;
    Chart.defaults.maintainAspectRatio = false;

    // Get stats data from the page
    const statsData = window.adminStats || {};

    // Initialize New Registrations Chart
    initNewRegistrationsChart(statsData.newUsersPerMonth || []);

    // Initialize Category Distribution Chart
    initCategoryDistributionChart(statsData.categoryDistribution || []);

    // Initialize User Growth Chart
    initUserGrowthChart(statsData.userGrowth || []);

    // Initialize Daily Active Users Chart
    initDailyActiveUsersChart(statsData.dailyActiveUsers || []);
});

/**
 * Initialize New Registrations Chart
 * @param {Array} data - Array of monthly registration data
 */
function initNewRegistrationsChart(data) {
    const ctx = document.getElementById('newRegistrationsChart');
    if (!ctx) return;

    const months = data.map(item => item.month);
    const counts = data.map(item => item.count);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'New Users',
                data: counts,
                backgroundColor: function(context) {
                    const index = context.dataIndex;
                    return index === counts.length - 1 ? '#00bbf0' : '#180e5b';
                },
                borderRadius: 4,
                borderWidth: 0,
                barPercentage: 0.6,
                categoryPercentage: 0.7
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.7)',
                    padding: 10,
                    titleFont: {
                        size: 14,
                        weight: 'bold'
                    },
                    bodyFont: {
                        size: 13
                    },
                    displayColors: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    },
                    ticks: {
                        precision: 0
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
}

/**
 * Initialize Category Distribution Chart
 * @param {Array} data - Array of category distribution data
 */
function initCategoryDistributionChart(data) {
    const ctx = document.getElementById('categoryDistributionChart');
    if (!ctx) return;

    // If no data, show a message
    if (data.length === 0) {
        data = [{ name: 'No Data', count: 1 }];
    }

    // Create labels with percentages
    const labels = data.map(item => `${item.name} (${item.percentage}%)`);
    const counts = data.map(item => item.count);

    // Generate colors
    const colors = [
        '#180e5b', // Primary blue
        '#00bbf0', // Secondary blue
        '#1dbd1d', // Green
        '#ff5252', // Red
        '#ffbb33', // Yellow
        '#9c27b0', // Purple
        '#3f51b5', // Indigo
        '#009688', // Teal
        '#795548', // Brown
        '#607d8b'  // Blue Grey
    ];

    // Ensure we have enough colors
    while (colors.length < data.length) {
        colors.push(...colors);
    }

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: counts,
                backgroundColor: colors.slice(0, data.length),
                borderWidth: 0,
                hoverOffset: 5
            }]
        },
        options: {
            cutout: '60%',
            plugins: {
                legend: {
                    position: 'right',
                    labels: {
                        boxWidth: 12,
                        padding: 15,
                        font: {
                            size: 11
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.7)',
                    padding: 10,
                    titleFont: {
                        size: 14,
                        weight: 'bold'
                    },
                    bodyFont: {
                        size: 13
                    },
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.raw || 0;
                            const percentage = data[context.dataIndex]?.percentage || 0;
                            return `${label.split(' (')[0]}: ${value} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });
}

/**
 * Initialize User Growth Chart
 * @param {Array} data - Array of user growth data
 */
function initUserGrowthChart(data) {
    const ctx = document.getElementById('userGrowthChart');
    if (!ctx) return;

    const months = data.map(item => item.month);
    const counts = data.map(item => item.count);

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: months,
            datasets: [{
                label: 'Total Users',
                data: counts,
                borderColor: '#180e5b',
                backgroundColor: 'rgba(24, 14, 91, 0.1)',
                borderWidth: 2,
                pointBackgroundColor: '#180e5b',
                pointRadius: 3,
                pointHoverRadius: 5,
                tension: 0.3,
                fill: true
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.7)',
                    padding: 10,
                    titleFont: {
                        size: 14,
                        weight: 'bold'
                    },
                    bodyFont: {
                        size: 13
                    },
                    displayColors: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    },
                    ticks: {
                        precision: 0
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        maxRotation: 45,
                        minRotation: 45
                    }
                }
            }
        }
    });
}

/**
 * Initialize Daily Active Users Chart
 * @param {Array} data - Array of daily active users data
 */
function initDailyActiveUsersChart(data) {
    const ctx = document.getElementById('dailyActiveUsersChart');
    if (!ctx) return;

    const dates = data.map(item => item.date);
    const counts = data.map(item => item.count);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: dates,
            datasets: [{
                label: 'Active Users',
                data: counts,
                backgroundColor: '#00bbf0',
                borderRadius: 4,
                borderWidth: 0,
                barPercentage: 0.6,
                categoryPercentage: 0.7
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.7)',
                    padding: 10,
                    titleFont: {
                        size: 14,
                        weight: 'bold'
                    },
                    bodyFont: {
                        size: 13
                    },
                    displayColors: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    },
                    ticks: {
                        precision: 0
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        maxRotation: 45,
                        minRotation: 45
                    }
                }
            }
        }
    });
}
