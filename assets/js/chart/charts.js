new Chart(document.getElementById("myBarChart"), {
  type: "bar",
  data: {
    labels: ["TI", "KA", "MI", "SI", "RPL"],
    datasets: [
      {
        label: "Angkatan 2020",
        backgroundColor: "#4e73df",
        borderColor: "#4e73df",
        hoverBackgroundColor: "#4e73df",
        hoverBorderColor: "#4e73df",
        data: [78, 75, 70, 86, 89],
        barPercentage: 0.75,
        categoryPercentage: 0.5,
      },
      {
        label: "Angkatan 2021",
        backgroundColor: "#1cc88a",
        borderColor: "#1cc88a",
        hoverBackgroundColor: "#1cc88a",
        hoverBorderColor: "#1cc88a",
        data: [75, 78, 77, 85, 80],
        barPercentage: 0.75,
        categoryPercentage: 0.5,
      },
      {
        label: "Angkatan 2022",
        backgroundColor: "#36b9cc",
        borderColor: "#36b9cc",
        hoverBackgroundColor: "#36b9cc",
        hoverBorderColor: "#36b9cc",
        data: [78, 80, 80, 88, 90],
        barPercentage: 0.75,
        categoryPercentage: 0.5,
      },
    ],
  },
  options: {
    scales: {
      yAxes: [
        {
          gridLines: {
            display: false,
          },
          stacked: false,
        },
      ],
      xAxes: [
        {
          stacked: false,
          gridLines: {
            color: "transparent",
          },
        },
      ],
    },
  },
});
