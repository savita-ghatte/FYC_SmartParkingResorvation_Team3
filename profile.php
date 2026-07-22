<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ParkSmart | Profile</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  :root{
    --sky: #3AA9E0;
    --sky-dark: #1E86C8;
    --sky-light: #EAF6FD;
    --white: #FFFFFF;
    --text: #1C2B36;
    --muted: #6B7C88;
  }

  *{ box-sizing:border-box; margin:0; padding:0; }

  body{
    min-height:100vh;
    background: var(--white);
    font-family: 'Inter', sans-serif;
    color: var(--text);
    display:flex;
    flex-direction:column;
    align-items:center;
  }

  /* ---------- HEADER ---------- */
  header{
    width:100%;
    background: var(--sky);
    padding: 22px 8%;
    display:flex;
    align-items:center;
    justify-content:space-between;
  }

  .brand{
    display:flex;
    align-items:center;
    gap:10px;
  }
  .brand-mark{
    width:38px; height:38px;
    border-radius:10px;
    background: var(--white);
    color: var(--sky-dark);
    font-family:'Poppins', sans-serif;
    font-weight:700;
    font-size: 19px;
    display:flex; align-items:center; justify-content:center;
  }
  .brand-text{
    font-family:'Poppins', sans-serif;
    font-weight:600;
    font-size: 21px;
    color: var(--white);
    letter-spacing:.3px;
  }

  .back-link{
    color: var(--white);
    text-decoration:none;
    font-size: 14px;
    font-weight:500;
    display:flex;
    align-items:center;
    gap:6px;
    opacity:.95;
  }
  .back-link svg{ width:16px; height:16px; }
  .back-link:hover{ opacity:1; text-decoration:underline; }

  /* ---------- NAV ---------- */
  nav.tabs-nav{
    width:100%;
    background: var(--white);
    border-bottom: 1px solid #E4EEF5;
    display:flex;
    justify-content:center;
    gap: 8px;
    padding: 14px 8%;
  }
  .nav-item{
    display:flex;
    align-items:center;
    gap:7px;
    padding: 9px 18px;
    border-radius: 9px;
    text-decoration:none;
    font-size: 14px;
    font-weight:500;
    color: var(--muted);
    cursor:pointer;
  }
  .nav-item svg{ width:17px; height:17px; }
  .nav-item.active{
    background: var(--sky-light);
    color: var(--sky-dark);
    font-weight:600;
  }
  .nav-item.disabled{
    cursor:not-allowed;
    opacity:.6;
  }
  a.nav-item:hover{ background: var(--sky-light); color: var(--sky-dark); }

  /* ---------- MAIN ---------- */
  main{
    width:100%;
    max-width: 520px;
    padding: 60px 8% 80px;
  }

  .profile-card{
    background: var(--white);
    border-radius: 20px;
    box-shadow: 0 10px 34px rgba(30,134,200,0.14);
    padding: 40px 34px;
    text-align:center;
  }

  .avatar-lg{
    width: 92px; height:92px;
    border-radius:50%;
    background: var(--sky);
    color: var(--white);
    font-family:'Poppins', sans-serif;
    font-weight:700;
    font-size: 36px;
    display:flex; align-items:center; justify-content:center;
    margin: 0 auto 18px;
  }

  .profile-card h1{
    font-family:'Poppins', sans-serif;
    font-size: 22px;
    font-weight:700;
    margin-bottom: 4px;
  }
  .profile-card .role{
    color: var(--muted);
    font-size: 13px;
    margin-bottom: 30px;
  }

  .detail-list{
    display:flex;
    flex-direction:column;
    gap: 16px;
    text-align:left;
  }

  .detail-item{
    display:flex;
    align-items:center;
    gap: 14px;
    background: var(--sky-light);
    border-radius: 12px;
    padding: 14px 16px;
  }

  .detail-icon{
    width: 40px; height:40px;
    border-radius:10px;
    background: var(--sky);
    display:flex; align-items:center; justify-content:center;
    flex-shrink:0;
  }
  .detail-icon svg{ width:19px; height:19px; stroke: var(--white); }

  .detail-text{ display:flex; flex-direction:column; line-height:1.3; }
  .detail-text .label{
    font-size: 11.5px;
    text-transform:uppercase;
    letter-spacing:.5px;
    color: var(--muted);
  }
  .detail-text .value{
    font-size: 15px;
    font-weight:600;
    color: var(--text);
  }

  .edit-btn{
    margin-top: 28px;
    width:100%;
    background: var(--sky);
    color: var(--white);
    border:none;
    border-radius: 10px;
    padding: 13px;
    font-family:'Inter', sans-serif;
    font-weight:600;
    font-size: 14px;
    cursor:pointer;
    transition: background .15s ease;
  }
  .edit-btn:hover{ background: var(--sky-dark); }

  .logout-btn{
    margin-top: 12px;
    width:100%;
    background: var(--white);
    color: #D64545;
    border: 1.5px solid #F2C4C4;
    border-radius: 10px;
    padding: 13px;
    font-family:'Inter', sans-serif;
    font-weight:600;
    font-size: 14px;
    cursor:pointer;
    text-decoration:none;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    transition: background .15s ease, border-color .15s ease;
    box-sizing:border-box;
  }
  .logout-btn svg{ width:16px; height:16px; }
  .logout-btn:hover{ background:#FDEEEE; border-color:#D64545; }

  @media (max-width: 560px){
    main{ padding: 40px 6% 60px; }
    .profile-card{ padding: 32px 22px; }
  }
</style>
</head>
<body>

  <header>
    <div class="brand">
      <div class="brand-mark">P</div>
      <div class="brand-text">ParkSmart</div>
    </div>
    <a href="index.html" class="back-link">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
      Back to Home
    </a>
  </header>

  <nav class="tabs-nav">
    <a href="index.html" class="nav-item">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11l9-8 9 8"/><path d="M5 10v10h14V10"/></svg>
      Home
    </a>
    <span class="nav-item disabled">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="6" width="18" height="14" rx="2"/><path d="M3 10h18"/><path d="M8 3v4M16 3v4"/></svg>
      Book Parking
    </span>
    <span class="nav-item disabled">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="17" rx="2"/><path d="M8 2v4M16 2v4M3 10h18"/></svg>
      Booking Detail
    </span>
  </nav>

  <main>
    <div class="profile-card">
      <div class="avatar-lg">R</div>
      <h1>Riya Shah</h1>
      <div class="role">ParkSmart Customer</div>

      <div class="detail-list">

        <div class="detail-item">
          <div class="detail-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 21c1.5-4.5 5-6 8-6s6.5 1.5 8 6"/></svg>
          </div>
          <div class="detail-text">
            <span class="label">Full Name</span>
            <span class="value">Riya Shah</span>
          </div>
        </div>

        <div class="detail-item">
          <div class="detail-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          </div>
          <div class="detail-text">
            <span class="label">Mobile Number</span>
            <span class="value">+91 98765 43210</span>
          </div>
        </div>

        <div class="detail-item">
          <div class="detail-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M22 6l-10 7L2 6"/></svg>
          </div>
          <div class="detail-text">
            <span class="label">Email Address</span>
            <span class="value">riya.shah@example.com</span>
          </div>
        </div>

      </div>

      <button class="edit-btn">Edit Profile</button>
      <a href="index.html" class="logout-btn">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><path d="M16 17l5-5-5-5"/><path d="M21 12H9"/></svg>
        Log Out
      </a>
    </div>
  </main>

</body>
</html>