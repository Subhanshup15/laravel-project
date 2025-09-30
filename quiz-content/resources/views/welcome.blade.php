<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Welcome — Quiz — Contacts</title>
  <style>
    :root{--accent:#2563eb;--bg:#f7f9fc;--card:#ffffff;--muted:#6b7280}
    *{box-sizing:border-box}
    body{margin:0;font-family:Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;background:var(--bg);color:#111}
    header{background:white;box-shadow:0 1px 6px rgba(16,24,40,.06);position:sticky;top:0;z-index:40}
    .container{max-width:1100px;margin:0 auto;padding:20px}
    .nav{display:flex;align-items:center;justify-content:space-between;gap:12px}
    .brand{display:flex;align-items:center;gap:12px}
    .logo{width:44px;height:44px;border-radius:10px;background:linear-gradient(135deg,var(--accent),#7c3aed);display:flex;align-items:center;justify-content:center;color:white;font-weight:700}
    nav a{margin-left:12px;text-decoration:none;color:var(--muted);font-weight:600}
    .hero{padding:48px 0;display:grid;grid-template-columns:1fr 360px;gap:28px;align-items:center}
    .welcome{background:linear-gradient(180deg,rgba(37,99,235,.06),transparent);padding:28px;border-radius:12px}
    h1{margin:0 0 8px;font-size:28px}
    p.lead{margin:0;color:var(--muted);line-height:1.5}
    .actions{margin-top:18px;display:flex;gap:12px}
    .btn{display:inline-block;padding:10px 14px;border-radius:10px;text-decoration:none;font-weight:700}
    .btn-primary{background:var(--accent);color:white}
    .btn-outline{background:white;border:1px solid #e6edf8;color:var(--accent)}
    .card{background:var(--card);padding:18px;border-radius:12px;box-shadow:0 6px 18px rgba(16,24,40,.06)}
    .grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:16px;margin-top:20px}
    .card h3{margin:0 0 6px}
    .muted{color:var(--muted)}
    /* quiz section */
    #quiz{padding:40px 0}
    .quiz-list{list-style:none;padding:0;margin:0;display:grid;gap:12px}
    .quiz-item{display:flex;justify-content:space-between;align-items:center;padding:12px;border-radius:10px;border:1px solid #eef4ff}
    .contact-form{display:grid;gap:10px}
    input,textarea{padding:10px;border:1px solid #e6eef8;border-radius:8px;font-size:14px}
    footer{padding:28px 0;color:var(--muted)}
    @media (max-width:880px){.hero{grid-template-columns:1fr;}.brand{gap:8px}}
  </style>
</head>
<body>
  <header>
    <div class="container nav">
      <div class="brand">
        <div class="logo">SB</div>
        <div>
          <div style="font-weight:800">Your App</div>
          <div style="font-size:12px;color:var(--muted)">Dashboard</div>
        </div>
      </div>
      <nav>
        <a href="#welcome">Welcome</a>
        <a href="#quiz">Quiz</a>
        <a href="#contacts">Contacts</a>
      </nav>
    </div>
  </header>

  <main class="container">
    <section id="welcome" class="hero">
      <div class="welcome card">
        <h1>Welcome back, Subhanshu 👋</h1>
        <p class="lead">This is your dashboard. From here you can start a quiz, view your progress, or contact support. Quick links below get you where you need to go fast.</p>
        <div class="actions">
          <a class="btn btn-primary" href="#quiz" id="goQuiz">Go to Quiz</a>
          <a class="btn btn-outline" href="#contacts">Contact Us</a>
        </div>

        <div class="grid" style="margin-top:18px">
          <div class="card">
            <h3>Quick Quiz</h3>
            <div class="muted">Take short timed quizzes to track progress.</div>
          </div>
          <div class="card">
            <h3>Progress</h3>
            <div class="muted">View completed quizzes and certificates.</div>
          </div>
          <div class="card">
            <h3>Settings</h3>
            <div class="muted">Manage profile, notifications and preferences.</div>
          </div>
        </div>
      </div>

      <aside class="card">
        <h3>Today</h3>
        <p class="muted">No active quizzes. Try a practice quiz.</p>
        <div style="margin-top:12px"><strong>Next suggestion:</strong> JavaScript fundamentals — 10 questions</div>
        <div style="margin-top:18px" class="actions">
          <a class="btn btn-primary" href="#quiz">Start Practice</a>
        </div>
      </aside>
    </section>

    <section id="quiz">
      <h2>Quizzes</h2>
      <p class="muted">Choose a quiz below. Click any "Start" to begin (this demo anchors to a sample question set).</p>

      <ul class="quiz-list" style="margin-top:12px">
        <li class="quiz-item">
          <div>
            <strong>JavaScript Basics</strong>
            <div class="muted">10 questions — 10 minutes</div>
          </div>
          <div>
            <a class="btn btn-primary" href="#quiz-sample" onclick="startDemo('JavaScript Basics')">Start</a>
          </div>
        </li>
        <li class="quiz-item">
          <div>
            <strong>Laravel Essentials</strong>
            <div class="muted">8 questions — 8 minutes</div>
          </div>
          <div>
            <a class="btn btn-primary" href="#quiz-sample" onclick="startDemo('Laravel Essentials')">Start</a>
          </div>
        </li>
        <li class="quiz-item">
          <div>
            <strong>Database Design</strong>
            <div class="muted">12 questions — 12 minutes</div>
          </div>
          <div>
            <a class="btn btn-primary" href="#quiz-sample" onclick="startDemo('Database Design')">Start</a>
          </div>
        </li>
      </ul>

      <div id="quiz-sample" class="card" style="margin-top:18px;display:none">
        <h3 id="quizTitle">Sample Quiz</h3>
        <p class="muted">(Demo)</p>
        <div style="margin-top:12px">
          <p><strong>Q1.</strong> What does HTML stand for?</p>
          <ol>
            <li>Hyper Text Markup Language</li>
            <li>Home Tool Markup Language</li>
            <li>Hyperlinks and Text Markup Language</li>
          </ol>
          <div style="margin-top:8px"><button class="btn btn-primary" onclick="alert('Answer recorded (demo)')">Submit Answer</button></div>
        </div>
      </div>
    </section>

    <section id="contacts" style="margin-top:28px">
      <h2>Contacts</h2>
      <p class="muted">Reach out if you need help or want to report an issue.</p>
      <div class="grid" style="margin-top:12px">
        <div class="card">
          <h3>Support</h3>
          <p class="muted">support@yourapp.example</p>
          <p class="muted">Response time: 24–48 hours</p>
        </div>
        <div class="card">
          <h3>Contact Form</h3>
          <form class="contact-form" onsubmit="handleContact(event)">
            <input type="text" name="name" placeholder="Your name" required />
            <input type="email" name="email" placeholder="Your email" required />
            <textarea name="message" rows="4" placeholder="Message" required></textarea>
            <div style="display:flex;justify-content:flex-end"><button class="btn btn-primary" type="submit">Send</button></div>
          </form>
        </div>
      </div>
    </section>
  </main>

  <footer class="container">
    <div style="border-top:1px solid #eef4ff;padding-top:16px;display:flex;justify-content:space-between;align-items:center">
      <div class="muted">© Your App — Built for demos</div>
      <div class="muted">Version 1.0</div>
    </div>
  </footer>

  <script>
    function startDemo(title){
      document.getElementById('quizTitle').textContent = title + ' (Demo)';
      document.getElementById('quiz-sample').style.display = 'block';
      window.location.hash = 'quiz-sample';
    }

    function handleContact(e){
      e.preventDefault();
      const f = e.target;
      const data = {name:f.name.value,email:f.email.value,message:f.message.value};
      // Demo behaviour — replace with real POST in your app
      alert('Thanks, ' + data.name + '! Your message was sent (demo).');
      f.reset();
    }

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(a=>{
      a.addEventListener('click', function(e){
        const target = document.querySelector(this.getAttribute('href'));
        if(target){e.preventDefault();target.scrollIntoView({behavior:'smooth',block:'start'});}
      });
    });
  </script>
</body>
</html>