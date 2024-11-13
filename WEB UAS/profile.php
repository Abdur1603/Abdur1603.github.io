<!DOCTYPE html>
<html lang="en">
    <?php include('partials/head.php') ?>
<body>
    <?php include('partials/navbar.php') ?>
    <div class="profile-container">
        <div class="profile-header">
            <img src="assets/profile.jpg" alt="Profile Picture" class="profile-picture">
            <div class="profile-info">
                <h2>Imro Atul</h2>
                <p>Fitness Enthusiast</p>
            </div>
        </div>  
        <div class="profile-stats">
            <div class="stat-item">
                <h3>23 (Ideal)</h3>
                <p>BMI</p>
            </div>
            <div class="stat-item">
                <h3>25</h3>
                <p>Workouts</p>
            </div>
            <div class="stat-item">
                <h3>10 KG</h3>
                <p>Weight Loss</p>
            </div>
        </div>
        
        <div class="profile-details">
            <div class="detail-item">
                <h3>Premium</h3>
                <p>Package</p>
            </div>
            <div class="detail-item">
                <h3>18-10-2024 Until 18-12-2024</h3>
                <p>Active membership</p>
            </div>
        </div>
    </div>
    <div class="profile-container">
        <form action="" method="post" class="form">
            <h2>Update Profile</h2>
            <div class="form-row">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="iim" required>
                </div>
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" value="imro atul wahidah" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" value="iim" required>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" id="age" name="age" value="19" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="weight">Weight (kg)</label>
                    <input type="number" id="weight" name="weight" value="59.9" required>
                </div>
                <div class="form-group">
                    <label for="height">Height (cm)</label>
                    <input type="number" id="height" name="height" value="160" required>
                </div>
            </div>
            <div class="form-group">
                <label for="image">Profile Picture</label>
                <input type="file" id="image" name="image" accept=".png,.jpg,.webp" required>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <div class="radio-group">
                    <input type="radio" name="gender" id="men" value="Men">
                    <label for="men">Men</label>
                    <input type="radio" name="gender" id="woman" value="Woman" checked>
                    <label for="woman">Woman</label>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-cta" style="width:100%" >Update Profile</button>
        </form>
    </div>
    <?php include('partials/footer.php') ?>
</body>
</html>