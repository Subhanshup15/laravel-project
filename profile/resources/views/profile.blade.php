<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Subhanshu Sabhajit Pardeshi | Resume</title>
  <link rel="icon" type="image/png" href="images/sagar.jpg">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap & Font Awesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, rgba(238, 242, 243, 0.8), rgba(217, 228, 245, 0.8)),
        url('images/sagar.jpg') no-repeat center center fixed;
      background-size: cover;
      color: #333;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    h1 {
      font-weight: 700;
      color: #2d4e9d;
      margin: 40px 0;
      text-align: center;
      animation: fadeInDown 1s ease both;
    }

    .resume-card {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
      padding: 25px;
      margin-bottom: 40px;
      transition: all 0.3s ease;
      animation: fadeInUp 0.7s ease both;
    }

    .resume-card:hover {
      transform: translateY(-7px);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
    }

    .profile-thumb {
      width: 200px;
      cursor: pointer;
      border-radius: 6px;
    }

    h2 {
      font-size: 1.8rem;
      font-weight: 600;
      color: #2d4e9d;
      margin-bottom: 15px;
    }

    .section-title {
      margin-top: 20px;
      margin-bottom: 10px;
      font-weight: 600;
      font-size: 1.2rem;
      color: #4facfe;
      display: flex;
      align-items: center;
    }

    .section-title i {
      margin-right: 8px;
    }

    .resume-info p,
    .resume-info li {
      margin: 4px 0;
      font-size: 0.95rem;
    }

    .map-container {
      margin-top: 20px;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }

    .map-container iframe {
      width: 100%;
      height: 300px;
      border: 0;
    }

    .modal-backdrop.show {
      opacity: 0.9;
    }

    /* Animations */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(25px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Gallery thumbnails */
    .gallery img {
      cursor: pointer;
      border-radius: 8px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .gallery img:hover {
      transform: scale(1.05);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }
  </style>
</head>

<body>

  <div class="container">
    <h1>Subhanshu Sabhajit Pardeshi Resume</h1>

    <!-- Resume Card -->
    <div class="resume-card row align-items-center">
      <div class="col-md-3 text-center mb-3 mb-md-0">
        <img src="images/sagar.jpg" alt="Profile" class="profile-thumb img-thumbnail"
          data-bs-toggle="modal" data-bs-target="#imageModal1">
      </div>

      <div class="col-md-9 resume-info">
        <h2>Subhanshu Sabhajit Pardeshi</h2>

        <div>
          <div class="section-title"><i class="fas fa-users"></i> Family Members</div>
          <ul class="list-unstyled">
            <li><strong>👨 Father:</strong> Sabhajit Mohal Pardeshi</li>
            <li><strong>👩 Mother:</strong> Sunita Sabhajit Pardeshi</li>
            <li><strong>👧 Sister:</strong> Sakshi Sabhajit Pardeshi</li>
          </ul>
        </div>

        <div class="section-title"><i class="fas fa-id-card"></i> Personal Info</div>
        <p><i class="fas fa-birthday-cake text-primary"></i> <strong>Birth Date:</strong> 17-07-1999</p>
        <p><i class="fas fa-user-graduate text-success"></i> <strong>Education:</strong> Master’s in Computer Science</p>
        <p><i class="fas fa-briefcase text-warning"></i> <strong>Designation:</strong> Software Developer (2 years exp.)</p>
        <p><i class="fas fa-ruler-vertical text-danger"></i> <strong>Height:</strong> 174 cm (5.7)</p>
        <p><i class="fas fa-map-marker-alt text-danger"></i> <strong>Address:</strong> Pune, Maharashtra</p>
        <p><i class="fas fa-map-marker text-secondary"></i> <strong>Permanent Address:</strong> Ariyar, Madiyahu, Jaunpur</p>
      </div>
    </div>

  

    <!-- Family Gallery -->
    <div class="gallery-section mb-5">
      <h2 class="text-center text-primary mb-4"><i class="fas fa-images"></i> SAGAR </h2>
      <div class="row gallery g-3 justify-content-center">
        <div class="col-3 col-md-2">
          <img src="images/1.jpg" class="img-fluid" alt="Gallery Image 1" data-bs-toggle="modal" data-bs-target="#galleryModal1">
        </div>
        <div class="col-3 col-md-2">
          <img src="images/2.jpg" class="img-fluid" alt="Gallery Image 2" data-bs-toggle="modal" data-bs-target="#galleryModal2">
        </div>
        <div class="col-3 col-md-2">
          <img src="images/3.jpg" class="img-fluid" alt="Gallery Image 3" data-bs-toggle="modal" data-bs-target="#galleryModal3">
        </div>
        <div class="col-3 col-md-2">
          <img src="images/4.jpg" class="img-fluid" alt="Gallery Image 4" data-bs-toggle="modal" data-bs-target="#galleryModal4">
        </div>
        <div class="col-3 col-md-2">
          <img src="images/5.jpg" class="img-fluid" alt="Gallery Image 5" data-bs-toggle="modal" data-bs-target="#galleryModal5">
        </div>
        <div class="col-3 col-md-2">
          <img src="images/6.jpg" class="img-fluid" alt="Gallery Image 6" data-bs-toggle="modal" data-bs-target="#galleryModal7">
        </div>
        <div class="col-3 col-md-2">
          <img src="images/7.jpg" class="img-fluid" alt="Gallery Image 7" data-bs-toggle="modal" data-bs-target="#galleryModal8">
        </div>
      </div>
    </div>
      @foreach($images as $index => $image)
<div class="col-3 col-md-2">
  <img src="{{ $image }}" class="img-fluid" alt="Gallery Image {{ $index + 1 }}"
       data-bs-toggle="modal" data-bs-target="#galleryModal{{ $index + 1 }}">
</div>
@endforeach
@foreach($images as $index => $image)
<div class="modal fade" id="galleryModal{{ $index + 1 }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content bg-transparent border-0 shadow-none">
      <div class="modal-body text-center p-0 position-relative">
        <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                data-bs-dismiss="modal"></button>
        <img src="{{ $image }}" alt="Gallery Full {{ $index + 1 }}" class="img-fluid rounded shadow">
      </div>
    </div>
  </div>
</div>
@endforeach

    <!-- Google Map -->
    <div class="text-center mb-5">
      <div class="map-container">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3424.874147393672!2d82.67881967517168!3d25.433072077559885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398fd9007f9a5847%3A0x985ac353b84e5091!2sSubhanshu%20Pardeshi%20home!5e1!3m2!1sen!2sin!4v1758407150317!5m2!1sen!2sin"
          width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>

  <!-- Profile Image Modal -->
  <div class="modal fade" id="imageModal1" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content bg-transparent border-0 shadow-none">
        <div class="modal-body text-center p-0 position-relative">
          <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
            data-bs-dismiss="modal" aria-label="Close"></button>
          <img src="images/sagar.jpg" alt="Profile Full" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </div>

  <!-- Gallery Modals -->
  <div class="modal fade" id="galleryModal1" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content bg-transparent border-0 shadow-none">
        <div class="modal-body text-center p-0 position-relative">
          <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
            data-bs-dismiss="modal"></button>
          <img src="images/1.jpg" alt="Gallery Full 1" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="galleryModal2" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content bg-transparent border-0 shadow-none">
        <div class="modal-body text-center p-0 position-relative">
          <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
            data-bs-dismiss="modal"></button>
          <img src="images/2.jpg" alt="Gallery Full 2" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="galleryModal3" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content bg-transparent border-0 shadow-none">
        <div class="modal-body text-center p-0 position-relative">
          <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
            data-bs-dismiss="modal"></button>
          <img src="images/3.jpg" alt="Gallery Full 3" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="galleryModal4" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content bg-transparent border-0 shadow-none">
        <div class="modal-body text-center p-0 position-relative">
          <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
            data-bs-dismiss="modal"></button>
          <img src="images/4.jpg" alt="Gallery Full 4" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="galleryModal5" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content bg-transparent border-0 shadow-none">
        <div class="modal-body text-center p-0 position-relative">
          <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
            data-bs-dismiss="modal"></button>
          <img src="images/5.jpg" alt="Gallery Full 5" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </div>



  <div class="modal fade" id="galleryModal7" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content bg-transparent border-0 shadow-none">
        <div class="modal-body text-center p-0 position-relative">
          <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
            data-bs-dismiss="modal"></button>
          <img src="images/6.jpg" alt="Gallery Full 7" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="galleryModal8" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content bg-transparent border-0 shadow-none">
        <div class="modal-body text-center p-0 position-relative">
          <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
            data-bs-dismiss="modal"></button>
          <img src="images/7.jpg" alt="Gallery Full 8" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </div>





  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
