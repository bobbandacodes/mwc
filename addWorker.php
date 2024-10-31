<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Worker</title>
    <link rel="stylesheet" href="css/addWorker.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Maroon White</h2>
        <ul>
            <li><a href="dashboard-hr.html"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="#"><i class="fas fa-user-plus"></i> Add New Worker</a></li>
            <li><a href="search-worker.html"><i class="fas fa-search"></i> Search for Worker</a></li>
            <li><a href="request-reports.html"><i class="fas fa-file-alt"></i> Request Reports</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="form-container">
            <form action="submit-worker.php" method="POST" class="worker-form">
            <!-- Worker Information Fields -->
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" id="firstname" name="firstname" required>
            </div>
            <div class="form-group">
                <label for="surname">Surname</label>
                <input type="text" id="surname" name="surname" required>
            </div>
            <div class="form-group">
                <label for="nrc">NRC Number</label>
                <input type="text" id="nrc" name="nrc" required>
            </div>

            <!-- Address Fields -->
            <div class="form-group">
                <label for="place">Place</label>
                <input type="text" id="place" name="place" required>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" required>
            </div>

            <!-- Next of Kin Fields -->
            <div class="form-group">
                <label for="nextofkin">Next of Kin</label>
                <input type="text" id="nextofkin" name="nextofkin" required>
            </div>
            <div class="form-group">
                <label for="nextofkin_phone">Next of Kin Phone Number</label>
                <input type="text" id="nextofkin_phone" name="nextofkin_phone" required>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" required>
            </div>

            <!-- New Fields -->
            <div class="form-group">
                <label for="department">Department</label>
                <select id="department" name="department" required>
                    <option value="landscaping">Landscaping</option>
                    <option value="window_cleaning">Window Cleaning</option>
                </select>
            </div>
            <div class="form-group">
                <label for="health">Health Condition</label>
                <select id="health" name="health" required>
                    <option value="able_bodied">Able-bodied</option>
                    <option value="challenged">Challenged</option>
                </select>
            </div>
            <div class="form-group">
                <label for="academic_level">Academic Level</label>
                <select id="academic_level" name="academic_level" required>
                    <option value="primary">Primary</option>
                    <option value="secondary">Secondary</option>
                    <option value="tertiary">Tertiary</option>
                </select>
            </div>
            
            <!-- Licenses Section -->
            <div class="form-group">
                <label>Licenses</label>
                <div class="checkbox-group">
                    <label><input type="checkbox" id="drivers_license" name="licenses[]" value="drivers_license"> Driver's License</label>
                    <label><input type="checkbox" id="vocational_training" name="licenses[]" value="vocational_training"> Vocational Training</label>
                    <label><input type="checkbox" id="first_aid" name="licenses[]" value="first_aid"> First Aid</label>
                </div>
            </div>
            
            <button type="submit" class="submit-btn">Add Worker</button>
        </form>

        </div>
    </div>
</body>
</html>
