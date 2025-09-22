<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Subhanshu Pardeshi | Software Developer</title>

  <!-- Google Fonts & Material Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>

  <style>
    /* Base Styles */
    * {margin: 0; padding: 0; box-sizing: border-box;}
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f4f6f8;
      color: #333;
      line-height: 1.6;
    }
    a {color: #0077cc; text-decoration: none;}
    a:hover {text-decoration: underline;}
    .container {
      max-width: 1000px;
      margin: 0 auto;
      padding: 30px 20px;
    }

    /* Header */
    header {
      background: #0073e6;
      color: #fff;
      padding: 40px 20px;
      text-align: center;
    }
    header h1 {font-size: 2.5rem;}
    header p {
      font-size: 1.1rem;
      margin-top: 5px;
    }
    .contact-icons {
      margin-top: 15px;
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 15px;
    }
    .contact-icons a {
      color: #ffdd57;
      font-weight: bold;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    /* Section */
    section {
      background: #fff;
      border-radius: 8px;
      padding: 25px;
      margin-bottom: 25px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }
    section h2 {
      font-size: 1.4rem;
      margin-bottom: 10px;
      color: #005bb5;
      border-left: 4px solid #0073e6;
      padding-left: 10px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    section h3 {
      margin-top: 15px;
      font-size: 1.1rem;
      color: #333;
    }
    ul {padding-left: 20px;}
    li {margin-bottom: 8px;}

    /* Skills */
    .skills span {
      display: inline-block;
      background-color: #e3f2fd;
      color: #0073e6;
      padding: 6px 12px;
      border-radius: 16px;
      margin: 5px;
      font-size: 0.9rem;
    }

    /* Footer */
    footer {
      text-align: center;
      background: #222;
      color: #bbb;
      padding: 15px;
    }

    /* Icons */
    .material-icons {
      vertical-align: middle;
      font-size: 20px;
    }

    /* Responsive */
    @media (max-width: 768px) {
      header h1 { font-size: 2rem; }
      .container { padding: 20px 10px; }
    }
  </style>
</head>
<body>

  <header>
    <h1>Subhanshu Pardeshi</h1>
    <p>Software Developer | Pune, Maharashtra</p>
    <div class="contact-icons">
      <a href="tel:+918668646744"><span class="material-icons">call</span> 8668646744</a>
      <a href="mailto:sunhanshup.15@gmail.com"><span class="material-icons">email</span> Email</a>
      <a href="https://www.linkedin.com/in/subhanshu-sabhajit-pardeshi-39b33812b" target="_blank">
        <span class="material-icons">business</span> LinkedIn</a>
      <a href="https://github.com/Subhanshup15" target="_blank"><span class="material-icons">code</span> GitHub</a>
    </div>
  </header>

  <div class="container">

    <section>
      <h2><span class="material-icons">person</span> Summary</h2>
      <p>
        Software Developer with 2+ years experience in full-stack development using PHP (CodeIgniter), React, and MySQL. 
        Strong in building scalable apps, REST APIs, and responsive UIs. Enthusiastic about writing clean code, optimizing 
        databases, and delivering production-ready solutions in Agile environments.
      </p>
    </section>

    <section>
      <h2><span class="material-icons">work</span> Experience</h2>
      <h3>Software Developer | Bright Sea Technology (2023 - Present)</h3>
      <ul>
        <li>Developed enterprise-level applications for hospital and education industries.</li>
        <li>Used CodeIgniter for backend architecture and React for frontend interfaces.</li>
        <li>Enhanced app performance by optimizing complex MySQL queries.</li>
        <li>Maintained and deployed live projects using cPanel.</li>
        <li>Customized modules and deployed real-time updates as per client needs.</li>
      </ul>
    </section>

    <section>
      <h2><span class="material-icons">folder</span> Projects</h2>

      <h3>Hospital Management System</h3>
      <ul>
        <li>Authentication, role-based access, and financial automation.</li>
        <li>Optimized for performance & user-friendliness.</li>
        <li>Live: <a href="https://aayushhm.com" target="_blank">aayushhm.com</a></li>
      </ul>

      <h3>Account Manager Module</h3>
      <ul>
        <li>Automated invoicing and detailed patient billing logic.</li>
        <li>Dynamic module editing for varied user roles.</li>
      </ul>

      <h3>Hotel Reservation & Food Ordering System</h3>
      <ul>
        <li>Mobile-responsive hotel booking and food ordering platform.</li>
        <li>Optimized MySQL structure for faster bookings and orders.</li>
      </ul>

      <h3>Client Sites</h3>
      <ul>
        <li><a href="https://dhaneshwarinursing.org" target="_blank">Dhaneshwari Nursing</a></li>
        <li><a href="https://ojasnirsingjalna.com" target="_blank">Ojas Nursing Jalna</a></li>
        <li><a href="https://tumsarayurved.org" target="_blank">Tumsar Ayurved</a></li>
        <li><a href="https://newlifeayurvedhospital.com" target="_blank">New Life Ayurved Hospital</a></li>
      </ul>
    </section>

    <section>
      <h2><span class="material-icons">build</span> Skills</h2>
      <div class="skills">
        <span>PHP</span>
        <span>CodeIgniter</span>
        <span>React</span>
        <span>Angular</span>
        <span>HTML</span>
        <span>CSS</span>
        <span>JavaScript</span>
        <span>MySQL</span>
        <span>cPanel</span>
        <span>XAMPP</span>
        <span>phpMyAdmin</span>
      </div>
    </section>

    <section>
      <h2><span class="material-icons">school</span> Education</h2>
      <p><b>M.Sc. Computer Science</b> - Savitribai Phule Pune University (2021 - 2023)</p>
      <p><b>B.Sc. Computer Science</b> - Savitribai Phule Pune University (2018 - 2021)</p>
    </section>

    <section>
      <h2><span class="material-icons">language</span> Languages</h2>
      <p>English | Hindi | Marathi</p>
    </section>

  </div>

  <footer>
    <p>© 2025 Subhanshu Pardeshi | Portfolio</p>
  </footer>

</body>
</html>