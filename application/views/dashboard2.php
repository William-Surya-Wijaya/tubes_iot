<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>EMG Data Visualization</title>
  

  
  <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

 
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

</head>

<body>
  <!-- ======= Header ======= -->
  <header class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a  class="logo d-flex align-items-center">
        <img  src="assets/img/logo.png" alt="">
        <span  class="d-none d-lg-block">EMG Data Visualization</span>
      </a>
      <div class="user-info ml-auto d-flex align-items-center">
          <i class="bi-person-circle"></i>
          <span class="ps-2"><?php echo $this->session->userdata('username'); ?></span>
      </div>
      
    </div><!-- End Logo -->

    

  </header>
 

  <main  class="main px-3 py-2">

    <div class="pagetitle">
      <h1 >Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li  class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section  class="section dashboard">
      <div class="row" >

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div  class="col-xxl-6 col-md-6">
              <div  class="card info-card sales-card">

                
                <div  class="card-body">
                  <form class="card-title" action=<?php echo base_url('Dashboard/inputDataLatihan');?>  method="post">
                    <label  for="dropdown-otot">Pilih Otot:</label>

                    <div  class="form-floating mb-3">
                      <select  class="form-select" aria-label="Floating label select example"
                        name="muscle" >
                        <?php
                        $option_otot = [
                          1 => "Upper Chest",
                          2 => "Midlle Chest",
                          3 => "Lower Chest",
                          4 => "Deltoid",
                          5 => "Trapezius",
                          6 => "Biceps",
                          7 => "Triceps",
                          8 => "Forearms",
                          8 => "Quadriceps",
                          10 => "Hamstring",
                          11 => "Abdominals",
                          12 => "Obelique",
                          13 => "Teres Major",
                          14 => "Latissimus Dorsi",
                        ];
                        foreach ($option_otot as $key => $value) {
                          echo "<option value='" . $key . "'>" . $value . "</option>";
                        }
                        ?>
                      </select>
                      <label for="floatingSelect">Select</label>
                    </div>
                  
                  <div class="d-flex align-items-center">
 
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div  class="col-xxl-6 col-md-6">
              <div class="card info-card revenue-card">
                <div  class="card-body">
                  <form  class="card-title"  method="post">
                    <label  for="dropdown-exercise">Pilih Exercise:</label>

                    <div  class="form-floating mb-3">
                      <select  class="form-select"  aria-label="Floating label select example"
                      name="exercise" >
                        <?php
                        $option_exercise = [
                          1 => "Flat Push Up",
                          2 => "Incline Push Up",
                          3 => "Decline Push Up",
                          4 => "Strict Standard Pull Up",
                          5 => "Weighted Pull Up",
                          6 => "Standard Sit Up",
                          7 => "Leg Raises",
                          8 => "Tricep Dips",
                          9 => "Standard Dips",
                          10 => "Standard Squat",
                          11 => "Bulgarian Squat",
                          12 => "Pike Push Up",
                        ];
                        foreach ($option_exercise as $key => $value) {
                          echo "<option value='" . $key . "'>" . $value . "</option>";
                        }
                        ?>
                      </select>
                      <label for="floatingSelect">Select</label>
                    </div>
                </div>
              </div>
            </div>
            <!-- End Revenue Card -->

            <!-- Customers Card -->
            <div  class="col-xl-11 d-flex justify-content-center">
              <a href = <?php echo base_url('dashboard/selesai');?> class="btn btn-danger row mt-2 ms-5">STOP</a>

            </div><!-- End Customers Card -->
          </form>
            <!-- Reports -->
            <div  class="col-12 mt-4">
              <div  class="card">

                

                <div  class="card-body">
                  <h5 class="card-title">GRAFIK <span>/Sensor Emg</span></h5>


                  <!-- Canvas untuk Grafik -->
                  <canvas id="myChart" width="400" height="100"></canvas>
                </div>

              </div>
            </div><!-- End Reports -->



          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div  class="col-lg-4">

          <!-- Recent Activity -->
          <div  class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Week</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5  class="card-title">Recent Activity for <?php echo $this->session->userdata('username') ;?> <span>| Today</span></h5>

              <div class="activity">
                
                <?php
                foreach ($dataListLengkap as $key => $value) {
                  echo "<div  class='activity-item d-flex'>";
                  echo "<div class='activite-label'>" . $value['timestamp'] . "</div>";
                  echo "<i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>";
                  echo "<div  class='activity-content'>";
                  echo "<p >Otot: " . $value['muscle'] . "</P>";
                  echo "<p i>Exercise: " . $value['exercise'] . "</P>";
                  echo "<p >Rata-rata Value: " . $value['rata_rata'] . "</P>";
                  //jika keefektivan > 150
                    if ($value['rata_rata'] > 150) {
                        echo "<p >Keefektivitasan: <span class='text-success'>" . "Efektif" . "</span></P>";
                    } else {
                        echo "<p >Keefektivitasan: <span class='text-danger'>" . "Tidak Efektif". "</span></P>";
                    }
                  echo "</div>";
                  echo "</div>";
                }

                ?>
                
                

              </div>

            </div>
          </div><!-- End Recent Activity -->
          
          <div  class="col-xl-12 d-flex justify-content-center">
            <a href='<?php echo base_url("auth/logout");?>'  class="btn btn-danger row mt-2 ms-5">Logout</a>

                  </div>
        </div><!-- End Right side columns -->

      </div>
    </section>


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer class="footer">
    <div  class="copyright">
      &copy; Copyright <strong><span>IoT HealthCare WilBabs</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
                        
      Made by <a >Kelompok William</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url();?>assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/chart.js/chart.umd.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/quill/quill.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
<!-- Template Main JS File -->
<script src="<?php echo base_url();?>assets/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> <!-- Include jQuery -->
<script>
  // Fungsi untuk mengambil data real-time
  function updateChartData() {
    $.ajax({
      url: "<?php echo base_url('Dashboard/getEmgData');?>", // Ganti controller_name dengan nama controller Anda
    
      method: "GET",
      dataType: "json",
      success: function(response) {
        console.log("Real-time data:", response);
        // Mengupdate data dan label
        const values = response.map(item => item.emg_value);
        const labels = response.map(item => item.emg_time);

        // Mengupdate data Chart.js
        myChart.data.labels = labels;
        myChart.data.datasets[0].data = values;

        // Memanggil update untuk merender grafik
        myChart.update();
      },
      error: function(error) {
        console.error("Error fetching real-time data:", error);
      }
    });
  }


  const fetchTimer = setTimeout(function() {
  stopFetchAndRedirect();
}, 40000);

// function to stop fetch data after 60 seconds and redirect
function stopFetchAndRedirect() {
  // Call your server-side function to update the fetch flag
  updateFetchFlag();
  
  // Redirect to a new URL
  window.location.href = "<?php echo base_url('dashboard');?>";
}

// function to update fetch flag
function updateFetchFlag() {
  // Assuming this is a synchronous call (no AJAX)
  // You can use Fetch API or any other method if needed
  // For simplicity, let's assume a simple URL hit
  const url = "<?php echo base_url('dashboard/selesai');?>";
  const xhr = new XMLHttpRequest();
  xhr.open("GET", url, false);  // Synchronous request
  xhr.send();
  
  // You may want to handle errors or check the response if needed
  if (xhr.status === 200) {
    console.log("Fetch flag updated");
  } else {
    console.error("Error updating fetch flag. Status:", xhr.status);
  }
}





  // Data dari PHP
  const initialData = <?php echo json_encode(array_column($dataList, 'value')); ?>;

  // Membuat label (Misalnya 1, 2, 3, ..., n)
  const initialLabels = initialData.map((_, index) => index + 1);

  // Data untuk Chart.js
  const initialChartData = {
    labels: initialLabels,
    datasets: [{
      label: 'EMG Values',
      data: initialData,
      fill: false,
      borderColor: 'rgb(75, 192, 192)',
      tension: 0.1
    }]
  };

  // Konfigurasi Grafik
  const config = {
    type: 'line',
    data: initialChartData,
  };

  // Menginisialisasi Grafik
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );

  // Mengatur interval untuk memperbarui data setiap 5 detik (sesuaikan sesuai kebutuhan Anda)
  setInterval(updateChartData, 500);
</script>

</body>

</html>