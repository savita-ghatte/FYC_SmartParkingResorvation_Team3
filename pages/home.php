
<?php
session_start();
 
// ---------------------------------------------------------
// STATIC SAMPLE DATA (no database needed for this version)
// Once your DB table is ready, replace this array with a
// mysqli query like: $result = $conn->query("SELECT * FROM parking");
// and loop over $result->fetch_assoc() instead.
// ---------------------------------------------------------
$parkingSpots = [
    [
        'id'              => 1,
        'name'            => 'City Mall Parking',
        'location'        => 'Civil Lines',
        'rating'          => 4.8,
        'price_per_hour'  => 40,
        'slots_available' => 120,
        'image'           => 'https://images.unsplash.com/photo-1470224114660-3f6686c562eb?w=500&h=200&fit=crop',
    ],
    [
        'id'              => 2,
        'name'            => 'Railway Station Parking',
        'location'        => 'Nagpur Station',
        'rating'          => 4.5,
        'price_per_hour'  => 20,
        'slots_available' => 80,
        'image'           => 'https://images.unsplash.com/photo-1573348722427-f1d6819fdf98?w=500&h=200&fit=crop',
    ],
    [
        'id'              => 3,
        'name'            => 'Multi-Level City Parking',
        'location'        => 'Sitabuldi',
        'rating'          => 4.6,
        'price_per_hour'  => 35,
        'slots_available' => 150,
        'image'           => 'https://images.unsplash.com/photo-1590674899484-d5640e854abe?w=500&h=200&fit=crop',
    ],
    [
        'id'              => 4,
        'name'            => 'Hospital Road Parking',
        'location'        => 'Medical Square',
        'rating'          => 4.2,
        'price_per_hour'  => 25,
        'slots_available' => 60,
        'image'           => 'https://images.unsplash.com/photo-1506521781263-d8422e82f27a?w=500&h=200&fit=crop',
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>SmartPark - Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
 
    html, body {
        height: 100vh;
        width: 100%;
        overflow: hidden;              /* No scroll, ever */
        font-family: 'Poppins', sans-serif;
        background: #f4f7fb;
    }
 
    /* ---------------- NAVBAR ---------------- */
    .navbar {
        position: relative;
        z-index: 10;
        height: 70px;
        min-height: 70px;
        background: linear-gradient(135deg, #2563EB, #1E3A8A);
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 30px;
        color: white;
    }
 
    .navbar .logo {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 22px;
        font-weight: 700;
    }
 
    .navbar .logo span {
        background: white;
        color: #2563EB;
        width: 34px;
        height: 34px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
    }
 
    .navbar .nav-links {
        display: flex;
        gap: 25px;
        list-style: none;
    }
 
    .navbar .nav-links a {
        color: white;
        text-decoration: none;
        font-size: 15px;
        font-weight: 500;
        opacity: 0.9;
    }
 
    .navbar .nav-links a:hover {
        opacity: 1;
        text-decoration: underline;
    }
 
    /* ---------------- HERO ---------------- */
    .hero {
        height: 150px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background: linear-gradient(135deg, #2563EB, #1E3A8A);
        color: white;
        text-align: center;
        padding: 10px 20px;
    }
 
    .hero h1 {
        font-size: 26px;
        margin-bottom: 4px;
    }
 
    .hero p {
        font-size: 13px;
        opacity: 0.9;
        margin-bottom: 12px;
    }
 
    .search-box {
        display: flex;
        gap: 10px;
    }
 
    .search-box input {
        width: 300px;
        padding: 9px 14px;
        border-radius: 30px;
        border: none;
        outline: none;
        font-size: 13px;
    }
 
    .search-box button {
        padding: 9px 20px;
        border: none;
        border-radius: 30px;
        background: #FFD54F;
        font-weight: 600;
        font-size: 13px;
        cursor: pointer;
    }
 
    .search-box button:hover {
        background: #ffc93f;
    }
 
    /* ---------------- PARKING SECTION ---------------- */
    .parking-section {
        height: calc(85vh - 100px - 150px);   /* remaining space after navbar + hero */
        width: 95%;
        margin: 0 auto;
        padding: 14px 0;
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }
 
    .parking-section h2 {
        font-size: 18px;
        color: #1E3A8A;
        margin-bottom: 10px;
        text-align: center;
    }
 
    .cards {
        flex: 1;
        min-height: 0;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        grid-auto-rows: 1fr;
        gap: 16px;
        overflow: hidden;
    }
 
    .parking-card {
        background: white;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        display: flex;
        flex-direction: column;
    }
 
    .parking-image {
        height: 90px;
        width: 100%;
        object-fit: cover;
        background: #dbe4f3;         /* fallback color if image missing */
    }
 
    .parking-info {
        padding: 12px 14px;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
 
    .parking-info h3 {
        font-size: 15px;
        color: #1E3A8A;
        margin-bottom: 4px;
    }
 
    .parking-info p {
        font-size: 12px;
        color: #555;
        margin-bottom: 3px;
    }
 
    .parking-meta {
        display: flex;
        justify-content: space-between;
        font-size: 12px;
        color: #333;
        margin: 6px 0;
    }
 
    .book-btn {
        margin-top: 8px;
        padding: 8px;
        background: #2563EB;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        display: block;
    }
 
    .book-btn:hover {
        background: #1E3A8A;
    }
 
    .no-data {
        text-align: center;
        color: #888;
        font-size: 14px;
        margin-top: 20px;
    }
</style>
</head>
<body>
 
    <!-- NAVBAR -->
    <div class="navbar">
        <div class="logo"><span>P</span> SmartPark</div>
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="my-bookings.php">My Bookings</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
 
    <!-- HERO -->
    <div class="hero">
        <h1>Find Your Perfect Parking Space</h1>
        <p>Book your parking slot quickly, securely and easily.</p>
        <form class="search-box" method="GET" action="home.php">
            <input type="text" name="search" placeholder="Search Parking Location">
            <button type="submit">Search</button>
        </form>
    </div>
 
    <!-- PARKING SECTION -->
    <div class="parking-section">
        <h2>Available Parking</h2>
        <div class="cards">
            <?php if (count($parkingSpots) > 0): ?>
                <?php foreach ($parkingSpots as $spot): ?>
                    <div class="parking-card">
                        <img class="parking-image"
                             src="<?php echo htmlspecialchars($spot['image']); ?>"
                             alt="<?php echo htmlspecialchars($spot['name']); ?>"
                             onerror="this.style.background='#dbe4f3'; this.src='';">
                        <div class="parking-info">
                            <div>
                                <h3>🚗 <?php echo htmlspecialchars($spot['name']); ?></h3>
                                <p>📍 <?php echo htmlspecialchars($spot['location']); ?></p>
                                <div class="parking-meta">
                                    <span>⭐ <?php echo htmlspecialchars($spot['rating']); ?></span>
                                    <span>₹<?php echo htmlspecialchars($spot['price_per_hour']); ?> / Hour</span>
                                    <span>🅿 <?php echo htmlspecialchars($spot['slots_available']); ?> Slots</span>
                                </div>
                            </div>
                            <a class="book-btn" href="parking-details.php?id=<?php echo (int)$spot['id']; ?>">Book Parking</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-data">No parking spots available right now.</p>
            <?php endif; ?>
        </div>
    </div>
 
</body>
</html>