fetch("chart-data.php")
  .then(response => response.json())
  .then(data => {
    const ctx = document.getElementById("categoryChart");

    // Generate random pastel colors for each category
    const colors = data.labels.map(() => {
      const r = Math.floor(Math.random() * 156 + 100);
      const g = Math.floor(Math.random() * 156 + 100);
      const b = Math.floor(Math.random() * 156 + 100);
      return `rgba(${r}, ${g}, ${b}, 0.7)`;
    });

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: data.labels,
        datasets: [{
          label: "Number of Products",
          data: data.values,
          backgroundColor: colors,
          borderColor: colors.map(c => c.replace("0.7", "1")),
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: true,
            position: 'top'
          },
          tooltip: {
            enabled: true,
            callbacks: {
              label: function(context) {
                return `${context.label}: ${context.raw} products`;
              }
            }
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              stepSize: 1
            }
          }
        },
        animation: {
          duration: 1000,
          easing: 'easeOutBounce'
        }
      }
    });
  });
