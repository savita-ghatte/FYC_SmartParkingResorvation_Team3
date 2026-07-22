<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ParkSmart | Home</title>
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

  .greeting{
    color: var(--white);
    font-size: 14px;
    font-weight:500;
    opacity:.95;
  }

  /* ---------- MAIN ---------- */
  main{
    width:100%;
    max-width: 980px;
    padding: 60px 8% 80px;
    text-align:center;
  }

  main h1{
    font-family:'Poppins', sans-serif;
    font-size: 30px;
    font-weight:700;
    color: var(--text);
    margin-bottom: 10px;
  }
  main > p{
    color: var(--muted);
    font-size: 15px;
    margin-bottom: 48px;
  }

  .tabs{
    display:grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 26px;
  }

  .tab{
    background: var(--sky);
    border: none;
    border-radius: 18px;
    padding: 40px 20px 32px;
    text-decoration:none;
    color: var(--white);
    display:flex;
    flex-direction:column;
    align-items:center;
    gap: 16px;
    transition: transform .18s ease, box-shadow .18s ease, background .18s ease;
  }

  .tab:hover{
    background: var(--sky-dark);
    transform: translateY(-6px);
    box-shadow: 0 14px 30px rgba(58,169,224,0.32);
  }

  .icon-circle{
    width: 68px; height:68px;
    border-radius:50%;
    background: var(--white);
    display:flex; align-items:center; justify-content:center;
  }
  .icon-circle svg{ width:30px; height:30px; stroke: var(--sky-dark); }

  .tab-label{
    font-family:'Poppins', sans-serif;
    font-weight:600;
    font-size: 17px;
  }
  .tab-desc{
    color: var(--sky-light);
    font-size: 13px;
  }

  @media (max-width: 700px){
    .tabs{ grid-template-columns: 1fr; }
    header{ padding: 18px 6%; }
    main{ padding: 44px 6% 60px; }
  }
</style>
</head>
<body>

  <header>
    <div class="brand">
      <div class="brand-mark">P</div>
      <div class="brand-text">ParkSmart</div>
    </div>
    <div class="greeting">Hi, Riya 👋</div>
  </header>

  <main>
    <h1>Welcome to ParkSmart</h1>
    <p>Choose an option below to get started</p>

    <div class="tabs">

      <!-- Book Parking Slot -->
      <a href="book-parking-slot.html" class="tab">
        <div class="icon-circle">
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="6" width="18" height="14" rx="2"/><path d="M3 10h18"/><path d="M8 3v4M16 3v4"/></svg>
        </div>
        <div class="tab-label">Book Parking Slot</div>
        <div class="tab-desc">Reserve a parking spot near you</div>
      </a>

      <!-- Profile -->
      <a href="profile.html" class="tab">
        <div class="icon-circle">
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 21c1.5-4.5 5-6 8-6s6.5 1.5 8 6"/></svg>
        </div>
        <div class="tab-label">Profile</div>
        <div class="tab-desc">View and edit your account</div>
      </a>

      <!-- Booking Details -->
      <a href="booking-details.html" class="tab">
        <div class="icon-circle">
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="17" rx="2"/><path d="M8 2v4M16 2v4M3 10h18"/></svg>
        </div>
        <div class="tab-label">Booking Details</div>
        <div class="tab-desc">Check your current & past bookings</div>
      </a>

    </div>
  </main>

</body>
</html>