<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>EMG Data Visualization</title>
  

  
  <link href="./public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="./public/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="./public/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="./public/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="./public/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="./public/assets/vendor/simple-datatables/style.css" rel="stylesheet">

 
  <link href="./public/assets/css/style.css" rel="stylesheet">

</head>

<body>
  <!-- ======= Header ======= -->
  <header class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php"  class="logo d-flex align-items-center">
        <img  src="assets/img/logo.png" alt="">
        <span  class="d-none d-lg-block">EMG Data Visualization</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
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
                  <form class="card-title"  method="post">
                    <label  for="dropdown-otot">Pilih Otot:</label>

                    <div  class="form-floating mb-3">
                      <select  class="form-select" aria-label="Floating label select example"
                        name="dropdown-otot" >
                        <?php
                        $option_otot = [
                          "upper-chest" => "Upper Chest",
                          "middle-chest" => "Midlle Chest",
                          "lower-chest" => "Lower Chest",
                          "deltoid" => "Deltoid",
                          "trapezius" => "Trapezius",
                          "biceps" => "Biceps",
                          "triceps" => "Triceps",
                          "fore-arms" => "Forearms",
                          "quadriceps" => "Quadriceps",
                          "hamstring" => "Hamstring",
                          "abdominals" => "Abdominals",
                          "obelique" => "Obelique",
                          "teres-major" => "Teres Major",
                          "latissimus-dorsi" => "Latissimus Dorsi",
                        ];
                        foreach ($option_otot as $key => $value) {
                          echo "<option value='" . $key . "'>" . $value . "</option>";
                        }
                        ?>
                      </select>
                      <label for="floatingSelect">Select</label>
                    </div>
                  </form>
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
                      name="dropdown-exercise" >
                        <?php
                        $option_exercise = [
                          "flat-push-up" => "Flat Push Up",
                          "incline-push-up" => "Incline Push Up",
                          "decline-push-up" => "Decline Push Up",
                          "strict-standard-pull-up" => "Strict Standard Pull Up",
                          "weigthed-pull-up" => "Weighted Pull Up",
                          "standard-sit-up" => "Standard Sit Up",
                          "leg-raises" => "Leg Raises",
                          "tricep-dips" => "Tricep Dips",
                          "standard-dips" => "Standard Dips",
                          "standard-squat" => "Standard Squat",
                          "bulgarian-squat" => "Bulgarian Squat",
                          "pike-push-up" => "Pike Push Up",
                        ];
                        foreach ($option_exercise as $key => $value) {
                          echo "<option value='" . $key . "'>" . $value . "</option>";
                        }
                        ?>
                      </select>
                      <label for="floatingSelect">Select</label>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- End Revenue Card -->

            <!-- Customers Card -->
            <div  class="col-xl-11 d-flex justify-content-center">
              <button type="submit" id="startbtn" class="btn btn-primary row mt-2 ms-5">START</button>
            </div><!-- End Customers Card -->

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
              <h5  class="card-title">Recent Activity <span>| Today</span></h5>

              <div class="activity">

                <div  class="activity-item d-flex">
                  <div class="activite-label">08.00</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div  class="activity-content">
                    <p >Otot:</P>
                    <p i>Exercise:</P>
                    <p >Rata-rata Value:</P>
                    <p >Keefektivitasan:</P>
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">09.00</div>
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activity-content">
                    <p >Otot:</P>
                    <p i>Exercise:</P>
                    <p >Rata-rata Value:</P>
                    <p >Keefektivitasan:</P>
                  </div>
                </div><!-- End activity item-->

              </div>

            </div>
          </div><!-- End Recent Activity -->

        </div><!-- End Right side columns -->

      </div>
    </section>
    <div  class="col-xl-12 d-flex justify-content-end">
              <button type="submit" id="resetbutton" class="btn btn-primary row mt-2 ms-5">RESET HISTORY AKTIFITAS</button>
            </div>


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
  <script src="./public/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="./public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./public/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="./public/assets/vendor/echarts/echarts.min.js"></script>
  <script src="./public/assets/vendor/quill/quill.min.js"></script>
  <script src="./public/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="./public/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="./public/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="./public/assets/js/main.js"></script>
  <script>
    src = "../public/js/main.js"
    // Data dari PHP
    const values = <?php echo json_encode(array_column($result, 'value')); ?>;

    // Membuat label (Misalnya 1, 2, 3, ..., n)
    const labels = values.map((_, index) => index + 1);

    // Data untuk Chart.js
    const data = {
      labels: values,
      datasets: [{
        label: 'EMG Values',
        data: values,
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
      }]
    };

    // Konfigurasi Grafik
    const config = {
      type: 'line',
      data: data,
    };

    // Menginisialisasi Grafik
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );
    document.getElementById('startbtn').addEventListener('click', function (event) {
      event.preventDefault();
      const button = document.getElementById('startbtn');
      if (button.textContent === 'START') {
        button.textContent = 'STOP';
      } else {
        button.textContent = 'START';
      }
    });
  </script>
</body>

</html>