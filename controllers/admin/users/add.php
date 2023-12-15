<?php

echo "add user controller";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Admin Dashboard</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Admin Dashboard</a>
</nav>

<div class="container mt-4">
  <div class="row">
    <div class="col-md-3">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">Dashboard</a>
        <a href="#" class="list-group-item list-group-item-action">Gérer Rôles</a>
        <a href="#" class="list-group-item list-group-item-action">Gérer Services</a>
        <a href="#" class="list-group-item list-group-item-action">Gérer Catégories</a>
        <a href="#" class="list-group-item list-group-item-action">Gérer Blogs</a>
      </div>
    </div>

    <div class="col-md-9">
      <h2>Dashboard</h2>
      <div class="row">
        <div class="col-md-4">
          <canvas id="userRolesChart"></canvas>
        </div>
        <div class="col-md-4">
          <canvas id="servicesChart"></canvas>
        </div>
        <div class="col-md-4">
          <canvas id="categoriesChart"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  // Exemple de données pour les graphiques
  var userRolesData = {
    labels: ['Visiteur', 'Développeur', 'Admin'],
    datasets: [{
      data: [10, 20, 30],
      backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
    }]
  };

  var servicesData = {
    labels: ['Service A', 'Service B', 'Service C'],
    datasets: [{
      data: [25, 45, 30],
      backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
    }]
  };

  var categoriesData = {
    labels: ['Catégorie X', 'Catégorie Y', 'Catégorie Z'],
    datasets: [{
      data: [15, 30, 20],
      backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
    }]
  };

  // Configurations des graphiques
  var chartOptions = {
    responsive: true,
    maintainAspectRatio: false,
  };

  // Création des graphiques
  var userRolesChart = new Chart(document.getElementById('userRolesChart').getContext('2d'), {
    type: 'doughnut',
    data: userRolesData,
    options: chartOptions
  });

  var servicesChart = new Chart(document.getElementById('servicesChart').getContext('2d'), {
    type: 'doughnut',
    data: servicesData,
    options: chartOptions
  });

  var categoriesChart = new Chart(document.getElementById('categoriesChart').getContext('2d'), {
    type: 'doughnut',
    data: categoriesData,
    options: chartOptions
  });
</script>

</body>
</html>
