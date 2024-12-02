<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>General Dashboard &mdash; WRI Education</title>
  
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <!-- Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-94034622-3');
  </script>

  @yield('styles')

  <style>
    .sidebar-link {
      transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .sidebar-link:hover {
      background-color: #f3f4f6; 
      transform: scale(1.02);
    }
    .sidebar-link.active {
      background-color: #ef4444; 
      color: white;
    }
    .card {
      border-radius: 0.5rem;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
      transform: translateY(-0.5rem);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .nav-profile-actions {
      display: flex;
      align-items: center;
      gap: 1rem;
    }
    .nav-profile-actions a,
    .nav-profile-actions button {
      display: flex;
      align-items: center;
      color: #4a5568; 
      text-decoration: none;
    }
    .nav-profile-actions button {
      border: none;
      background: none;
      cursor: pointer;
    }
    .nav-profile-actions button:hover {
      color: #ef4444; 
    }
    footer {
      background-color: #2d3748;
      color: #edf2f7; 
    }
    .footer-link {
      color: #e2e8f0; 
    }
    .footer-link:hover {
      color: #ffffff; 
    }
    /* Sidebar Dropdown Centered */
    .centered-dropdown {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
    }
    /* Align Logout Button to Left */
    .logout-btn-container {
      display: flex;
      align-items: flex-start;
      padding-top: 2rem; /* Add some space from the top */
    }
    .logout-btn-container button {
      width: auto;
      padding: 0.75rem 1.5rem;
      color: #fff;
      background-color: #008000; /* Red background for logout */
      border-radius: 0.375rem;
      display: flex;
      align-items: center;
      transition: all 0.3s ease;
    }
    .logout-btn-container button:hover {
      background-color: #00CF00; /* Darker red on hover */
    }
  </style>
</head>
<body class="bg-gray-100">
  <div id="app" class="flex flex-col h-screen">
    <!-- Navigation Bar -->
    <nav class="bg-white shadow-md">
      <!-- Add navigation content here -->
    </nav>

    <!-- Main content area -->
    <div class="flex flex-1">
      <!-- Sidebar -->
      <aside class="w-64 bg-white shadow-md border-r border-gray-200">
        <ul class="mt-4 space-y-4">
          <!-- Sidebar items here -->

          <li class="p-4 border-b">
              <a href="{{ route('backend.form.index') }}" class="flex items-center space-x-2 text-gray-600 sidebar-link">
                <i class="fa-solid fa-registered"></i>
                <span>Registration</span>
              </a>
            </li>
          
          <!-- Logout Button -->
          <li class="p-4 border-b logout-btn-container">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="flex items-center w-full">
              @csrf
              <button type="submit" class="w-full text-gray-700 hover:bg-red-100 flex items-center p-2 rounded-md">
                <i class="fas fa-sign-out-alt mr-2"></i> Logout
              </button>
            </form>
          </li>
        </ul>
      </aside>

      <!-- Main content -->
      <main class="flex-1 p-6">
        <div class="card p-6 ">


  <!--super user start here-->

  @if ($showSuperview)

  <h2 class="super-admin-header">Super Admin Controller</h2>
  <style>
    /* Super Admin Header */
.super-admin-header {
  font-size: 2.5rem; 
  font-weight: 700; 
  color: #2c3e50; 
  letter-spacing: 1px; 
  margin-bottom: 1.5rem; 
  padding-left: 20px; 
  border-left: 5px solid #3498db; 
  text-transform: uppercase; 
  display: inline-block; 
}

.super-admin-header::after {
  content: ''; 
  display: block;
  width: 50px;
  height: 2px;
  background-color: #3498db; 
  margin-top: 10px;
}
  </style>

<!--student handled here-->

<section class="student-section">
    <div class="container">
        <h2 class="section-title">Student Handled</h2>
        
        <!-- Form for adding a university -->
        <form method="POST" action="{{ route('handled.store') }}">
            @csrf
            <div class="form-card">
                <!-- Input field for adding new [processing] -->
                <div class="form-group">
                    <label for="newHandled" class="label">Add Student Handled:</label>
                    <input type="text" id="newHandled" name="newHandled" placeholder="Enter Handled name" class="form-control" required>
                </div>

                <!-- Dropdown for selecting an existing university -->
                <div class="form-group">
            <label for="deleteHandledDropdown" class="label">Delete Student Handled:</label>
            <select class="form-control" name="deleteStudentHandled" id="deleteStudentHandledDropdown">
                <option value="" disabled selected>Select a Student Handled to Delete</option>
                @foreach($handleds as $handled)
                    <option value="{{ $handled->id }}">{{ $handled->newHandled }}</option>
                @endforeach
            </select>
        </div>
            </div>

            <!-- Submit button for adding university -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Add Student Handled</button>
            </div>
        </form>

        <!-- Dropdown list for deleting a university -->
        <div class="form-group">
        <!-- Delete university form (hidden by default) -->
        <form action="{{ route('handled.destroy', 'deleteId') }}" method="POST" id="deleteStudentHandledForm" style="display:none;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Student Handled</button>
        </form>

    </div>
</section>

<!-- CSS for Styling -->
<!-- CSS for Styling -->
<style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Main container */
    .university-section {
        background-color: #f4f7fa;
        padding: 15px 0; /* Reduced padding */
        font-family: 'Arial', sans-serif;
    }

    /* Section title */
    .section-title {
        text-align: center;
        font-size: 1.5rem; /* Smaller font size */
        color: #333;
        margin-bottom: 15px; /* Reduced margin */
    }

    /* Form container */
    .form-card {
        background-color: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 15px; /* Reduced padding */
        border-radius: 8px;
        margin-bottom: 25px; /* Reduced margin */
        display: flex;
        gap: 15px; /* Reduced gap */
        justify-content: space-between;
        flex-wrap: wrap;
    }

    /* Form group */
    .form-group {
        flex: 1;
        min-width: 180px; /* Reduced min-width */
        margin-bottom: 12px; /* Reduced margin */
    }

    /* Label styling */
    .label {
        font-size: 0.9rem; /* Smaller font size */
        color: #555;
        margin-bottom: 6px;
        display: block;
    }

    /* Input field */
    .form-control {
        width: 100%;
        padding: 8px; /* Reduced padding */
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        color: #333;
        transition: border-color 0.3s;
    }

    /* Input focus state */
    .form-control:focus {
        border-color: #4c92fc;
        outline: none;
    }

    /* Button styling */
    .btn {
        padding: 8px 15px; /* Reduced padding */
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        cursor: pointer;
        transition: background-color 0.3s;
    }

    /* Primary Button */
    .btn-primary {
        background-color: #4c92fc;
        color: #fff;
        border: none;
    }

    /* Hover effect on primary button */
    .btn-primary:hover {
        background-color: #3978d1;
    }

    /* Danger Button (Delete) */
    .btn-danger {
        background-color: #e74c3c;
        color: #fff;
        border: none;
    }

    /* Hover effect on delete button */
    .btn-danger:hover {
        background-color: #c0392b;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .university-section {
            padding: 10px; /* Reduced padding */
        }

        .form-card {
            padding: 10px; /* Reduced padding */
            flex-direction: column;
        }

        .section-title {
            font-size: 1.3rem; /* Smaller font size */
        }

        .form-control, .btn {
            font-size: 0.85rem; /* Smaller font size */
        }

        .form-group {
            min-width: unset;
        }
    }
</style>


<!-- JavaScript for handling dropdown and form submission -->
<script>
    document.getElementById('deleteStudentHandledDropdown').addEventListener('change', function() {
        var universityId = this.value;
        if (universityId) {
            // Update the action of the delete form with the correct university ID
            var deleteForm = document.getElementById('deleteStudentHandledForm');
            deleteForm.action = deleteForm.action.replace('deleteId', universityId);
            deleteForm.style.display = 'block'; // Show the delete button
        } else {
            // Hide the delete button if no university is selected
            document.getElementById('deleteStudentHandledForm').style.display = 'none';
        }
    });
</script>


<!--student handled end here-->

<!--b to b start-->

<section class="b to b-section">
    <div class="container">
        <h2 class="section-title">B To B</h2>
        
        <!-- Form for adding a university -->
        <form method="POST" action="{{ route('value.store') }}">
            @csrf
            <div class="form-card">
                <!-- Input field for adding new [processing] -->
                <div class="form-group">
                    <label for="newBToB" class="label">Add Student Handled:</label>
                    <input type="text" id="newBToB" name="newBToB" placeholder="Enter B To B name" class="form-control" required>
                </div>

                <!-- Dropdown for selecting an existing university -->
                <div class="form-group">
            <label for="deleteBToBDropdown" class="label">Delete B To B:</label>
            <select class="form-control" name="deleteBToB" id="deleteBToBDropdown">
                <option value="" disabled selected>Select a B To B to Delete</option>
                @foreach($bvalues as $bvalue)
                    <option value="{{ $bvalue->id }}">{{ $bvalue->newBToB }}</option>
                @endforeach
            </select>
        </div>
            </div>

            <!-- Submit button for adding university -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Add B To B</button>
            </div>
        </form>

        <!-- Dropdown list for deleting a university -->
        <div class="form-group">
        <!-- Delete university form (hidden by default) -->
        <form action="{{ route('bvalue.destroy', 'deleteId') }}" method="POST" id="deleteBToBForm" style="display:none;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete B To B</button>
        </form>

    </div>
</section>

<!-- CSS for Styling -->
<!-- CSS for Styling -->
<style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Main container */
    .university-section {
        background-color: #f4f7fa;
        padding: 15px 0; /* Reduced padding */
        font-family: 'Arial', sans-serif;
    }

    /* Section title */
    .section-title {
        text-align: center;
        font-size: 1.5rem; /* Smaller font size */
        color: #333;
        margin-bottom: 15px; /* Reduced margin */
    }

    /* Form container */
    .form-card {
        background-color: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 15px; /* Reduced padding */
        border-radius: 8px;
        margin-bottom: 25px; /* Reduced margin */
        display: flex;
        gap: 15px; /* Reduced gap */
        justify-content: space-between;
        flex-wrap: wrap;
    }

    /* Form group */
    .form-group {
        flex: 1;
        min-width: 180px; /* Reduced min-width */
        margin-bottom: 12px; /* Reduced margin */
    }

    /* Label styling */
    .label {
        font-size: 0.9rem; /* Smaller font size */
        color: #555;
        margin-bottom: 6px;
        display: block;
    }

    /* Input field */
    .form-control {
        width: 100%;
        padding: 8px; /* Reduced padding */
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        color: #333;
        transition: border-color 0.3s;
    }

    /* Input focus state */
    .form-control:focus {
        border-color: #4c92fc;
        outline: none;
    }

    /* Button styling */
    .btn {
        padding: 8px 15px; /* Reduced padding */
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        cursor: pointer;
        transition: background-color 0.3s;
    }

    /* Primary Button */
    .btn-primary {
        background-color: #4c92fc;
        color: #fff;
        border: none;
    }

    /* Hover effect on primary button */
    .btn-primary:hover {
        background-color: #3978d1;
    }

    /* Danger Button (Delete) */
    .btn-danger {
        background-color: #e74c3c;
        color: #fff;
        border: none;
    }

    /* Hover effect on delete button */
    .btn-danger:hover {
        background-color: #c0392b;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .university-section {
            padding: 10px; /* Reduced padding */
        }

        .form-card {
            padding: 10px; /* Reduced padding */
            flex-direction: column;
        }

        .section-title {
            font-size: 1.3rem; /* Smaller font size */
        }

        .form-control, .btn {
            font-size: 0.85rem; /* Smaller font size */
        }

        .form-group {
            min-width: unset;
        }
    }
</style>


<!-- JavaScript for handling dropdown and form submission -->
<script>
    document.getElementById('deleteBToBDropdown').addEventListener('change', function() {
        var universityId = this.value;
        if (universityId) {
            // Update the action of the delete form with the correct university ID
            var deleteForm = document.getElementById('deleteBToBForm');
            deleteForm.action = deleteForm.action.replace('deleteId', universityId);
            deleteForm.style.display = 'block'; // Show the delete button
        } else {
            // Hide the delete button if no university is selected
            document.getElementById('deleteBToBForm').style.display = 'none';
        }
    });
</script>


<!--b to b end-->

<!--b to c section start-->

<section class="btoc-section">
    <div class="container">
        <h2 class="section-title">B To C</h2>
        
        <!-- Form for adding a university -->
        <form method="POST" action="{{ route('bcvalue.store') }}">
            @csrf
            <div class="form-card">
                <!-- Input field for adding new [processing] -->
                <div class="form-group">
                    <label for="newBtoC" class="label">Add B To C:</label>
                    <input type="text" id="newBtoC" name="newBtoC" placeholder="Enter B To C name" class="form-control" required>
                </div>

                <!-- Dropdown for selecting an existing university -->
                <div class="form-group">
            <label for="deleteBToCDropdown" class="label">Delete B To C:</label>
            <select class="form-control" name="deleteBToC" id="deleteBToCDropdown">
                <option value="" disabled selected>Select a B To C to Delete</option>
                @foreach($bcvalues as $bcvalue)
                    <option value="{{ $bcvalue->id }}">{{ $bcvalue->newBtoC }}</option>
                @endforeach
            </select>
        </div>
            </div>

            <!-- Submit button for adding university -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Add B To C</button>
            </div>
        </form>

        <!-- Dropdown list for deleting a university -->
        <div class="form-group">
        <!-- Delete university form (hidden by default) -->
        <form action="{{ route('bcvalue.destroy', 'deleteId') }}" method="POST" id="deleteBToCForm" style="display:none;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete B To C</button>
        </form>

    </div>
</section>

<!-- CSS for Styling -->
<!-- CSS for Styling -->
<style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Main container */
    .university-section {
        background-color: #f4f7fa;
        padding: 15px 0; /* Reduced padding */
        font-family: 'Arial', sans-serif;
    }

    /* Section title */
    .section-title {
        text-align: center;
        font-size: 1.5rem; /* Smaller font size */
        color: #333;
        margin-bottom: 15px; /* Reduced margin */
    }

    /* Form container */
    .form-card {
        background-color: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 15px; /* Reduced padding */
        border-radius: 8px;
        margin-bottom: 25px; /* Reduced margin */
        display: flex;
        gap: 15px; /* Reduced gap */
        justify-content: space-between;
        flex-wrap: wrap;
    }

    /* Form group */
    .form-group {
        flex: 1;
        min-width: 180px; /* Reduced min-width */
        margin-bottom: 12px; /* Reduced margin */
    }

    /* Label styling */
    .label {
        font-size: 0.9rem; /* Smaller font size */
        color: #555;
        margin-bottom: 6px;
        display: block;
    }

    /* Input field */
    .form-control {
        width: 100%;
        padding: 8px; /* Reduced padding */
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        color: #333;
        transition: border-color 0.3s;
    }

    /* Input focus state */
    .form-control:focus {
        border-color: #4c92fc;
        outline: none;
    }

    /* Button styling */
    .btn {
        padding: 8px 15px; /* Reduced padding */
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        cursor: pointer;
        transition: background-color 0.3s;
    }

    /* Primary Button */
    .btn-primary {
        background-color: #4c92fc;
        color: #fff;
        border: none;
    }

    /* Hover effect on primary button */
    .btn-primary:hover {
        background-color: #3978d1;
    }

    /* Danger Button (Delete) */
    .btn-danger {
        background-color: #e74c3c;
        color: #fff;
        border: none;
    }

    /* Hover effect on delete button */
    .btn-danger:hover {
        background-color: #c0392b;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .university-section {
            padding: 10px; /* Reduced padding */
        }

        .form-card {
            padding: 10px; /* Reduced padding */
            flex-direction: column;
        }

        .section-title {
            font-size: 1.3rem; /* Smaller font size */
        }

        .form-control, .btn {
            font-size: 0.85rem; /* Smaller font size */
        }

        .form-group {
            min-width: unset;
        }
    }
</style>


<!-- JavaScript for handling dropdown and form submission -->
<script>
    document.getElementById('deleteBToCDropdown').addEventListener('change', function() {
        var universityId = this.value;
        if (universityId) {
            // Update the action of the delete form with the correct university ID
            var deleteForm = document.getElementById('deleteBToCForm');
            deleteForm.action = deleteForm.action.replace('deleteId', universityId);
            deleteForm.style.display = 'block'; // Show the delete button
        } else {
            // Hide the delete button if no university is selected
            document.getElementById('deleteBToCForm').style.display = 'none';
        }
    });
</script>



<!--b to c section end-->

<!--initiated section start-->

<section class="initiated-section">
    <div class="container">
        <h2 class="section-title">Initiated</h2>
        
        <!-- Form for adding a university -->
        <form method="POST" action="{{ route('initiat.store') }}">
            @csrf
            <div class="form-card">
                <!-- Input field for adding new [processing] -->
                <div class="form-group">
                    <label for="newInitiated" class="label">Add Initiated:</label>
                    <input type="text" id="newInitiated" name="newInitiated" placeholder="Enter initiated name" class="form-control" required>
                </div>

                <!-- Dropdown for selecting an existing university -->
                <div class="form-group">
            <label for="deleteInitiatedDropdown" class="label">Delete Initiated:</label>
            <select class="form-control" name="deleteInitiated" id="deleteInitiatedDropdown">
                <option value="" disabled selected>Select a Initiated to Delete</option>
                @foreach($initiateds as $initiated)
                    <option value="{{ $initiated->id }}">{{ $initiated->newInitiated }}</option>
                @endforeach
            </select>
        </div>
            </div>

            <!-- Submit button for adding university -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Add Initiated</button>
            </div>
        </form>

        <!-- Dropdown list for deleting a university -->
        <div class="form-group">
        <!-- Delete university form (hidden by default) -->
        <form action="{{ route('initiated.destroy', 'deleteId') }}" method="POST" id="deleteInitiatedForm" style="display:none;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Initiated</button>
        </form>

    </div>
</section>

<!-- CSS for Styling -->
<!-- CSS for Styling -->
<style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Main container */
    .university-section {
        background-color: #f4f7fa;
        padding: 15px 0; /* Reduced padding */
        font-family: 'Arial', sans-serif;
    }

    /* Section title */
    .section-title {
        text-align: center;
        font-size: 1.5rem; /* Smaller font size */
        color: #333;
        margin-bottom: 15px; /* Reduced margin */
    }

    /* Form container */
    .form-card {
        background-color: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 15px; /* Reduced padding */
        border-radius: 8px;
        margin-bottom: 25px; /* Reduced margin */
        display: flex;
        gap: 15px; /* Reduced gap */
        justify-content: space-between;
        flex-wrap: wrap;
    }

    /* Form group */
    .form-group {
        flex: 1;
        min-width: 180px; /* Reduced min-width */
        margin-bottom: 12px; /* Reduced margin */
    }

    /* Label styling */
    .label {
        font-size: 0.9rem; /* Smaller font size */
        color: #555;
        margin-bottom: 6px;
        display: block;
    }

    /* Input field */
    .form-control {
        width: 100%;
        padding: 8px; /* Reduced padding */
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        color: #333;
        transition: border-color 0.3s;
    }

    /* Input focus state */
    .form-control:focus {
        border-color: #4c92fc;
        outline: none;
    }

    /* Button styling */
    .btn {
        padding: 8px 15px; /* Reduced padding */
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        cursor: pointer;
        transition: background-color 0.3s;
    }

    /* Primary Button */
    .btn-primary {
        background-color: #4c92fc;
        color: #fff;
        border: none;
    }

    /* Hover effect on primary button */
    .btn-primary:hover {
        background-color: #3978d1;
    }

    /* Danger Button (Delete) */
    .btn-danger {
        background-color: #e74c3c;
        color: #fff;
        border: none;
    }

    /* Hover effect on delete button */
    .btn-danger:hover {
        background-color: #c0392b;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .university-section {
            padding: 10px; /* Reduced padding */
        }

        .form-card {
            padding: 10px; /* Reduced padding */
            flex-direction: column;
        }

        .section-title {
            font-size: 1.3rem; /* Smaller font size */
        }

        .form-control, .btn {
            font-size: 0.85rem; /* Smaller font size */
        }

        .form-group {
            min-width: unset;
        }
    }
</style>


<!-- JavaScript for handling dropdown and form submission -->
<script>
    document.getElementById('deleteInitiatedDropdown').addEventListener('change', function() {
        var universityId = this.value;
        if (universityId) {
            // Update the action of the delete form with the correct university ID
            var deleteForm = document.getElementById('deleteInitiatedForm');
            deleteForm.action = deleteForm.action.replace('deleteId', universityId);
            deleteForm.style.display = 'block'; // Show the delete button
        } else {
            // Hide the delete button if no university is selected
            document.getElementById('deleteInitiatedForm').style.display = 'none';
        }
    });
</script>


<!--initiated section start-->


<!--section processing start-->
<section class="processing-section">
    <div class="container">
        <h2 class="section-title">Processing</h2>
        
        <!-- Form for adding a university -->
        <form method="POST" action="{{ route('process.store') }}">
            @csrf
            <div class="form-card">
                <!-- Input field for adding new [processing] -->
                <div class="form-group">
                    <label for="newProcessing" class="label">Add Processing:</label>
                    <input type="text" id="newProcessing" name="newProcessing" placeholder="Enter processing name" class="form-control" required>
                </div>

                <!-- Dropdown for selecting an existing university -->
                <div class="form-group">
            <label for="deleteProcessingDropdown" class="label">Delete Processing:</label>
            <select class="form-control" name="deleteProcessing" id="deleteProcessingDropdown">
                <option value="" disabled selected>Select a Processing to Delete</option>
                @foreach($processings as $processing)
                    <option value="{{ $processing->id }}">{{ $processing->newProcessing }}</option>
                @endforeach
            </select>
        </div>
            </div>

            <!-- Submit button for adding university -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Add Processing</button>
            </div>
        </form>

        <!-- Dropdown list for deleting a university -->
        <div class="form-group">
        <!-- Delete university form (hidden by default) -->
        <form action="{{ route('processing.destroy', 'deleteId') }}" method="POST" id="deleteProcessingForm" style="display:none;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Processing</button>
        </form>

    </div>
</section>

<!-- CSS for Styling -->
<!-- CSS for Styling -->
<style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Main container */
    .university-section {
        background-color: #f4f7fa;
        padding: 15px 0; /* Reduced padding */
        font-family: 'Arial', sans-serif;
    }

    /* Section title */
    .section-title {
        text-align: center;
        font-size: 1.5rem; /* Smaller font size */
        color: #333;
        margin-bottom: 15px; /* Reduced margin */
    }

    /* Form container */
    .form-card {
        background-color: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 15px; /* Reduced padding */
        border-radius: 8px;
        margin-bottom: 25px; /* Reduced margin */
        display: flex;
        gap: 15px; /* Reduced gap */
        justify-content: space-between;
        flex-wrap: wrap;
    }

    /* Form group */
    .form-group {
        flex: 1;
        min-width: 180px; /* Reduced min-width */
        margin-bottom: 12px; /* Reduced margin */
    }

    /* Label styling */
    .label {
        font-size: 0.9rem; /* Smaller font size */
        color: #555;
        margin-bottom: 6px;
        display: block;
    }

    /* Input field */
    .form-control {
        width: 100%;
        padding: 8px; /* Reduced padding */
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        color: #333;
        transition: border-color 0.3s;
    }

    /* Input focus state */
    .form-control:focus {
        border-color: #4c92fc;
        outline: none;
    }

    /* Button styling */
    .btn {
        padding: 8px 15px; /* Reduced padding */
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        cursor: pointer;
        transition: background-color 0.3s;
    }

    /* Primary Button */
    .btn-primary {
        background-color: #4c92fc;
        color: #fff;
        border: none;
    }

    /* Hover effect on primary button */
    .btn-primary:hover {
        background-color: #3978d1;
    }

    /* Danger Button (Delete) */
    .btn-danger {
        background-color: #e74c3c;
        color: #fff;
        border: none;
    }

    /* Hover effect on delete button */
    .btn-danger:hover {
        background-color: #c0392b;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .university-section {
            padding: 10px; /* Reduced padding */
        }

        .form-card {
            padding: 10px; /* Reduced padding */
            flex-direction: column;
        }

        .section-title {
            font-size: 1.3rem; /* Smaller font size */
        }

        .form-control, .btn {
            font-size: 0.85rem; /* Smaller font size */
        }

        .form-group {
            min-width: unset;
        }
    }
</style>


<!-- JavaScript for handling dropdown and form submission -->
<script>
    document.getElementById('deleteProcessingDropdown').addEventListener('change', function() {
        var universityId = this.value;
        if (universityId) {
            // Update the action of the delete form with the correct university ID
            var deleteForm = document.getElementById('deleteProcessingForm');
            deleteForm.action = deleteForm.action.replace('deleteId', universityId);
            deleteForm.style.display = 'block'; // Show the delete button
        } else {
            // Hide the delete button if no university is selected
            document.getElementById('deleteProcessingForm').style.display = 'none';
        }
    });
</script>



<!--section processing end-->
@endif


  <!--super user end here-->



       <!--Admin start here-->
       @if ($showAdmin)

       <form action="{{ route('store.employee') }}" method="POST">
       @csrf
       @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Display validation errors -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

       <div class="flex-1">
  <label for="handled" class="text-gray-700 font-semibold"> Student Handled:</label><br/>
    <select id="handled" name="handled" class="mt-2 p-2 border border-gray-300 rounded-md w-full" style="width:780px;" required>
      <option value="" disabled selected>Select your Student Handled</option>
      <option value="Gaurav">Gaurav</option>
      <option value="Roshan">Roshan</option>
      <option value="Ram">Ram</option>
      <option value="Samiksha">Samiksha</option>
      <option value="Bikalp">Bikalp</option>
    </select>
  </div>

  <div class="p-4 border-b">
    <div class="flex space-x-4"> <!-- Added flex and space-x-4 for spacing -->

   
      
      <!-- Source Dropdown -->
      <div class="flex-1">
        <label for="source" class="text-gray-700 font-semibold">Source:</label>
        <select id="source" name="source" class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
          <option value="" disabled selected>Select your Source</option>
          <option value="Edulink,Ananta Sir">Edulink,Ananta Sir</option>
          <option value="Crystal Education">Crystal Education</option>
          <option value="Crystal Education Butwal">Crystal Education Butwal</option>
          <option value="Boston">Boston</option>
                <option value="Brighton">Brighton</option>
                <option value="Dream Unique">Dream Unique</option>
                <option value="Evani Education">Evani Education</option>
                <option value="Fortune Education">Fortune Education</option>
                <option value="Lead Ahead">Lead Ahead</option>
                <option value="Manohar Sir">Manohar Sir</option>
                <option value="Merit Itahari">Merit Itahari</option>
                <option value="Merit Putalisadak">Merit Putalisadak</option>
                <option value="Merit Britamod">Merit Britamod</option>
                <option value="Merit Butwal">Merit Butwal</option>
                <option value="Mirai Global">Mirai Global</option>
                <option value="Prashant Sir">Prashant Sir</option>
                <option value="Achivers Sujan">Achivers Sujan</option>
                <option value="Swift/Skyway Education Banepa">Swift/Skyway Education Banepa</option>
                <option value="Tesla">Tesla</option>
                <option value="VXL">VXL</option>
                <option value="Pro Visa(Professional Visa & Education Services)">Pro Visa(Professional Visa & Education Services)</option>
                <option value="Achievers Putalisadak">Achievers Putalisadak</option>
                <option value="Jay Prakash SEC Nepal">Jay Prakash SEC Nepal</option>
                <option value="Rohini">Rohini</option>
                <option value="Rajesh Rightpath">Rajesh Rightpath</option>
                <option value="Rounak Janakpur">Rounak Janakpur</option>
                <option value="Carl Duisburg">Carl Duisburg</option>
                <option value="Study Connect">Study Connect</option>
                <option value="Ved International">Ved International</option>
                <option value="Big Education">Big Education</option>
                <option value="Read and Fly">Read and Fly</option>
                <option value="Eduport">Eduport</option>
                <option value="Goodlife Career(No Contact)">Goodlife Career(No Contact)</option>
                <option value="WRI">WRI</option>
                <option value="Frequency Eduhub">Frequency Eduhub</option>
                <option value="Metro">Metro</option>
                <option value="Highlight">Highlight</option>
                <option value="Career Guidance(CG)">Career Guidance(CG)</option>
                <option value="Vira Education">Vira Education</option>
                <option value="Goals Education(My Journey Franchise)">Goals Education(My Journey Franchise)</option>
                <option value="Mile Stone Services, Madhu Dai">Mile Stone Services, Madhu Dai</option>
                <option value="Lernovate, Pokhara">Lernovate, Pokhara</option>
                <option value="Titan Education Service, Bagbazar">Titan Education Service, Bagbazar</option>
                <option value="Scholarchoice">Scholarchoice</option>
                <option value="Peak Education">Peak Education</option>
                <option value="ANZ Education Services">ANZ Education Services</option>
                <option value="Migration Mithila">Migration Mithila</option>
                <option value="Elite Apprentice Education Consultancy">Elite Apprentice Education Consultancy</option>
                <option value="Apply Abroad">Apply Abroad</option>
                <option value="White House & WRI Partnership">White House & WRI Partnership</option>
                <option value="Tesla">Tesla</option>
                <option value="Study Hub">Study Hub</option>
                <option value="Elite Movers Education consultancy Pvt. Ltd">Elite Movers Education consultancy Pvt. Ltd</option>
                <option value="ICAN Eduction Services">ICAN Eduction Services</option>
                <option value="Real World">Real World</option>
                <option value="Paragraph">Paragraph</option>
                <option value="Edurise">Edurise</option>
        </select>
      </div>
      
      <!-- Name of Students Input -->
      <div class="flex-1">
        <label for="name" class="text-gray-700 font-semibold">Name of Students:</label>
        <input type="text" id="name" name="name" class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
      </div>
    </div>
  </div>

  <div class="flex space-x-4">
  <!-- Email Field -->
  <div class="flex-1">
    <label for="email" class="text-gray-700 font-semibold">Email ID:</label>
    <input type="email" id="email" name="email" class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
  </div>
  
  <!-- Phone Field -->
  <div class="flex-1">
    <label for="phone" class="text-gray-700 font-semibold">Phone:</label>
    <input type="tel" id="phone" name="phone" placeholder="+977" class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
  </div>
</div>

<div class="flex space-x-4">
  <!-- University Field -->
  <div class="flex-1">
  <label for="country" class="text-gray-700 font-semibold">Interested Country:</label>
    <select id="country" name="country" class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
      <option value="" disabled selected>Select your country</option>
      <option value="UK">UK</option>
      <option value="Australia">Australia</option>
      <option value="USA">USA</option>
      <option value="Canada">Canada</option>
    </select>
  </div>
  
  
  <div class="flex-1">
    <!-- Location Field -->
<label for="location" class="text-gray-700 font-semibold mt-4">Location:</label>
<input type="text" id="location" name="location" class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
  </div>
</div>

<div class="flex space-x-4">
  <!-- Country Field -->
  <div class="flex-1">
  <label for="english" class="text-gray-700 font-semibold">English Language Test:</label>
    <select id="english" name="english" class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
      <option value="" disabled selected>Select your English</option>
      <option value="IELTS">IELTS</option>
      <option value="PTE">PTE</option>
      <option value="ELLT">ELLT</option>
      <option value="No Test">No Test</option>
      <option value="MOI">MOI</option>
    </select>
  </div>

  <!-- Level Field -->
  <div class="flex-1">
  <label for="passed" class="text-gray-700 font-semibold">Passed Year:</label>
    <select id="passed" name="passed" class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
      <option value="" disabled selected>Select your Passed year</option>
      <option value="2015">2015</option>
      <option value="2016">2016</option>
      <option value="2017">2017</option>
      <option value="2018">2018</option>
      <option value="2019">2019</option>
      <option value="2020">2020</option>
      <option value="2021">2021</option>
      <option value="2022">2022</option>
      <option value="2023">2023</option>
      <option value="2024">2024</option>
      <option value="2025">2025</option>
    </select>
  </div>
</div>



<div class="flex space-x-4">
  
  <div class="flex-1">
  <label for="gpa" class="text-gray-700 font-semibold">GPA:</label>
  <input type="gpa" id="gpa" name="gpa" step="0.01" class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
  </div>

  <!-- processing Field -->
  <div class="flex-1">
  <label for="level" class="text-gray-700 font-semibold">Level:</label>
    <select id="level" name="level" class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
      <option value="" disabled selected>Select your level</option>
      <option value="Bachelor">Bachelor</option>
      <option value="Masters">Masters</option>
      <option value="PHD">PHD</option>
    </select>

  </div>
</div>


<div class="flex space-x-4">
  <!-- english Field -->
  <div class="flex-1">
  <label for="university" class="text-gray-700 font-semibold">University:</label>
    <input type="text" id="university" name="university" class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>

  </div>

  <!-- gpa Field -->
  <div class="flex-1">
  <label for="course" class="text-gray-700 font-semibold">Course:</label>
    <select id="course" name="course" class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
      <option value="" disabled selected>Select your course</option>
      <option value="IELTS">IELTS</option>
      <option value="PTE">PTE</option>
      <option value="Dulingo">Dulingo</option>
      <option value="ELLT">ELLT</option>
      <option value="No Test">No Test</option>
    </select>
  </div>
</div>


<div class="flex space-x-4">
  <!-- passed Field -->
  <div class="flex-1">
  <label for="intake" class="text-gray-700 font-semibold">Intake:</label>
    <select id="intake" name="intake" class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
      <option value="" disabled selected>Select your Intake</option>
      <option value="Jan">Jan</option>
      <option value="Feb">Feb</option>
      <option value="Mar">Mar</option>
      <option value="Apr">Apr</option>
      <option value="May">May</option>
      <option value="Jun">Jun</option>
      <option value="Jul">Jul</option>
      <option value="Aug">Aug</option>
      <option value="Sep">Sep</option>
      <option value="Oct">Oct</option>
      <option value="Nov">Nov</option>
      <option value="Dec">Dec</option>
    </select>
  </div>

  <!-- gpa Field -->
  <div class="flex-1">
  <label for="processing" class="text-gray-700 font-semibold">Processing:</label>
    <select id="processing" name="processing" class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
    <option value="" disabled selected>Select your Processing</option>
    <option value="Oxford Group">Oxford Group</option>
        <option value="Study Group">Study Group</option>
        <option value="UWE">UWE</option>
    </select>
  </div>
</div>


<div class="flex space-x-4">
  <!-- passed Field -->
  <div class="flex-1">
  <label for="document" class="text-gray-700 font-semibold">Document Status:</label>
    <select id="document" name="document" class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
      <option value="" disabled selected>Select your Document Status</option>
      <option value="Partially Received">Partially Received</option>
      <option value="Fully Received">Fully Received</option>
      <option value="Initiated For Offer">Initiated For Offer</option>

    </select>
  </div>

  <!-- gpa Field -->
  <div class="flex-1">
  <label for="initiated" class="text-gray-700 font-semibold">Offer Initiated by:</label>
    <select id="initiated" name="initiated" class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
    <option value="" disabled selected>Select your Initiated</option>
    <option value="Gaurav">Gaurav</option>
    <option value="Rabin">Study Group</option>
    <option value="Samiksha">Samiksha</option>
    <option value="Ram">Ram</option>
    <option value="Roshan">Roshan</option>
    </select>
  </div>
</div>

<div class="flex justify-center mt-10">
  <div class="flex-1 max-w-xs">
    <button type="submit" class="bg-blue-500 text-white p-2 rounded-md w-full">Submit</button>
  </div>
</div>
</form>


@endif

       <!--Admin end here--> 


  <!--Data entry start here-->

  @if ($showDataEntry)
  <!-- Course Section -->
   <h1>Data entry</h1>
   <style>
   h1 {
    font-size: 36px;
    font-weight: 700;  /* Bolder weight for a more professional look */
    color: #2D6A4F;  /* A refined, deep green color */
    text-align: center;
    letter-spacing: 1px;
    text-transform: capitalize;
    background: linear-gradient(to right, #2D6A4F, #1B9E77);  /* A gradient for depth */
    -webkit-background-clip: text;
    color: transparent;
    margin: 20px 0;
    padding: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    transition: transform 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
}

/* Hover effect */
h1:hover {
    transform: translateY(-4px);
    color: #0f4d0f;
}

   </style>

<!--university section start here-->
<section class="university-section">
    <div class="container">
        <h2 class="section-title">University Management</h2>
        
        <!-- Form for adding a university -->
        <form method="POST" action="{{ route('university.store') }}">
            @csrf
            <div class="form-card">
                <!-- Input field for adding new university -->
                <div class="form-group">
                    <label for="newUniversity" class="label">Add University:</label>
                    <input type="text" id="newUniversity" name="newUniversity" placeholder="Enter university name" class="form-control" required>
                </div>

                <!-- Dropdown for selecting an existing university -->
                <div class="form-group">
            <label for="deleteUniversityDropdown" class="label">Delete University:</label>
            <select class="form-control" name="deleteUniversity" id="deleteUniversityDropdown">
                <option value="" disabled selected>Select a University to Delete</option>
                @foreach($universities as $university)
                    <option value="{{ $university->id }}">{{ $university->newUniversity }}</option>
                @endforeach
            </select>
        </div>
            </div>

            <!-- Submit button for adding university -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Add University</button>
            </div>
        </form>

        <!-- Dropdown list for deleting a university -->
        <div class="form-group">
        <!-- Delete university form (hidden by default) -->
        <form action="{{ route('university.destroy', 'deleteId') }}" method="POST" id="deleteUniversityForm" style="display:none;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete University</button>
        </form>

    </div>
</section>

<!-- CSS for Styling -->
<!-- CSS for Styling -->
<style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Main container */
    .university-section {
        background-color: #f4f7fa;
        padding: 15px 0; /* Reduced padding */
        font-family: 'Arial', sans-serif;
    }

    /* Section title */
    .section-title {
        text-align: center;
        font-size: 1.5rem; /* Smaller font size */
        color: #333;
        margin-bottom: 15px; /* Reduced margin */
    }

    /* Form container */
    .form-card {
        background-color: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 15px; /* Reduced padding */
        border-radius: 8px;
        margin-bottom: 25px; /* Reduced margin */
        display: flex;
        gap: 15px; /* Reduced gap */
        justify-content: space-between;
        flex-wrap: wrap;
    }

    /* Form group */
    .form-group {
        flex: 1;
        min-width: 180px; /* Reduced min-width */
        margin-bottom: 12px; /* Reduced margin */
    }

    /* Label styling */
    .label {
        font-size: 0.9rem; /* Smaller font size */
        color: #555;
        margin-bottom: 6px;
        display: block;
    }

    /* Input field */
    .form-control {
        width: 100%;
        padding: 8px; /* Reduced padding */
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        color: #333;
        transition: border-color 0.3s;
    }

    /* Input focus state */
    .form-control:focus {
        border-color: #4c92fc;
        outline: none;
    }

    /* Button styling */
    .btn {
        padding: 8px 15px; /* Reduced padding */
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        cursor: pointer;
        transition: background-color 0.3s;
    }

    /* Primary Button */
    .btn-primary {
        background-color: #4c92fc;
        color: #fff;
        border: none;
    }

    /* Hover effect on primary button */
    .btn-primary:hover {
        background-color: #3978d1;
    }

    /* Danger Button (Delete) */
    .btn-danger {
        background-color: #e74c3c;
        color: #fff;
        border: none;
    }

    /* Hover effect on delete button */
    .btn-danger:hover {
        background-color: #c0392b;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .university-section {
            padding: 10px; /* Reduced padding */
        }

        .form-card {
            padding: 10px; /* Reduced padding */
            flex-direction: column;
        }

        .section-title {
            font-size: 1.3rem; /* Smaller font size */
        }

        .form-control, .btn {
            font-size: 0.85rem; /* Smaller font size */
        }

        .form-group {
            min-width: unset;
        }
    }
</style>


<!-- JavaScript for handling dropdown and form submission -->
<script>
    document.getElementById('deleteUniversityDropdown').addEventListener('change', function() {
        var universityId = this.value;
        if (universityId) {
            // Update the action of the delete form with the correct university ID
            var deleteForm = document.getElementById('deleteUniversityForm');
            deleteForm.action = deleteForm.action.replace('deleteId', universityId);
            deleteForm.style.display = 'block'; // Show the delete button
        } else {
            // Hide the delete button if no university is selected
            document.getElementById('deleteUniversityForm').style.display = 'none';
        }
    });
</script>

<!--section university end here-->


  <!--section location start here-->

  <section class="location-section">
    <div class="container">
        <h2 class="section-title">Location Management</h2>
        
        <!-- Form for adding a location -->
        <form method="POST" action="{{ route('location.store') }}">
            @csrf
            <div class="form-card">
                <!-- Input field for adding new university -->
                <div class="form-group">
                    <label for="newLocation" class="label">Add Location:</label>
                    <input type="text" id="newLocation" name="newLocation" placeholder="Enter location name" class="form-control" required>
                </div>

                <!-- Dropdown for selecting an existing university -->
                <div class="form-group">
            <label for="deleteLocationDropdown" class="label">Delete Location:</label>
            <select class="form-control" name="deleteLocation" id="deleteLocationDropdown">
                <option value="" disabled selected>Select a Location to Delete</option>
                @foreach($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->newLocation }}</option>
                @endforeach
            </select>
        </div>
            </div>

            <!-- Submit button for adding location -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Add Location</button>
            </div>
        </form>

        <!-- Dropdown list for deleting a location -->
        <div class="form-group">
        <!-- Delete university form (hidden by default) -->
        <form action="{{ route('location.destroy', 'deleteId') }}" method="POST" id="deleteLocationForm" style="display:none;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Location</button>
        </form>

    </div>
</section>

<!-- CSS for Styling -->
<style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Main container */
    .location-section {
        background-color: #f4f7fa;
        padding: 15px 0; /* Reduced padding */
        font-family: 'Arial', sans-serif;
    }

    /* Section title */
    .section-title {
        text-align: center;
        font-size: 1.5rem; /* Reduced font size */
        color: #333;
        margin-bottom: 15px; /* Reduced margin */
    }

    /* Form container */
    .form-card {
        background-color: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 15px; /* Reduced padding */
        border-radius: 8px;
        margin-bottom: 25px; /* Reduced margin */
        display: flex;
        gap: 15px; /* Reduced gap */
        justify-content: space-between;
        flex-wrap: wrap;
    }

    /* Form group */
    .form-group {
        flex: 1;
        min-width: 180px; /* Reduced min-width */
        margin-bottom: 12px; /* Reduced margin */
    }

    /* Label styling */
    .label {
        font-size: 0.9rem; /* Smaller font size */
        color: #555;
        margin-bottom: 6px;
        display: block;
    }

    /* Input field */
    .form-control {
        width: 100%;
        padding: 8px; /* Reduced padding */
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        color: #333;
        transition: border-color 0.3s;
    }

    /* Input focus state */
    .form-control:focus {
        border-color: #4c92fc;
        outline: none;
    }

    /* Button styling */
    .btn {
        padding: 8px 15px; /* Reduced padding */
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        cursor: pointer;
        transition: background-color 0.3s;
    }

    /* Primary Button */
    .btn-primary {
        background-color: #4c92fc;
        color: #fff;
        border: none;
    }

    /* Hover effect on primary button */
    .btn-primary:hover {
        background-color: #3978d1;
    }

    /* Danger Button (Delete) */
    .btn-danger {
        background-color: #e74c3c;
        color: #fff;
        border: none;
    }

    /* Hover effect on delete button */
    .btn-danger:hover {
        background-color: #c0392b;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .location-section {
            padding: 10px; /* Reduced padding */
        }

        .form-card {
            padding: 10px; /* Reduced padding */
            flex-direction: column;
        }

        .section-title {
            font-size: 1.3rem; /* Smaller font size */
        }

        .form-control, .btn {
            font-size: 0.85rem; /* Smaller font size */
        }

        .form-group {
            min-width: unset;
        }
    }
</style>

<!-- JavaScript for handling dropdown and form submission -->
<script>
    document.getElementById('deleteLocationDropdown').addEventListener('change', function() {
        var universityId = this.value;
        if (universityId) {
            // Update the action of the delete form with the correct university ID
            var deleteForm = document.getElementById('deleteLocationForm');
            deleteForm.action = deleteForm.action.replace('deleteId', universityId);
            deleteForm.style.display = 'block'; // Show the delete button
        } else {
            // Hide the delete button if no university is selected
            document.getElementById('deleteLocationForm').style.display = 'none';
        }
    });
</script>
  <!--section location end here-->



<!--course section start here-->


<section class="course-section">
    <div class="container">
        <h2 class="section-title">Course Management</h2>
        
        <!-- Form for adding a location -->
        <form method="POST" action="{{ route('course.store') }}">
            @csrf
            <div class="form-card">
                <!-- Input field for adding new university -->
                <div class="form-group">
                    <label for="newCourse" class="label">Add Course:</label>
                    <input type="text" id="newCourse" name="newCourse" placeholder="Enter Course name" class="form-control" required>
                </div>

                <!-- Dropdown for selecting an existing university -->
                <div class="form-group">
            <label for="deleteCourseDropdown" class="label">Delete Course:</label>
            <select class="form-control" name="deleteCourse" id="deleteCourseDropdown">
                <option value="" disabled selected>Select a Location to Course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->newCourse }}</option>
                @endforeach
            </select>
        </div>
            </div>

            <!-- Submit button for adding location -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Add Course</button>
            </div>
        </form>

        <!-- Dropdown list for deleting a location -->
        <div class="form-group">
        <!-- Delete university form (hidden by default) -->
        <form action="{{ route('course.destroy', 'deleteId') }}" method="POST" id="deleteCourseForm" style="display:none;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Course</button>
        </form>

    </div>
</section>

<!-- CSS for Styling -->
<!-- CSS for Styling -->
<style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Main container */
    .course-section {
        background-color: #f4f7fa;
        padding: 15px 0; /* Reduced padding */
        font-family: 'Arial', sans-serif;
    }

    /* Section title */
    .section-title {
        text-align: center;
        font-size: 1.5rem; /* Smaller font size */
        color: #333;
        margin-bottom: 15px; /* Reduced margin */
    }

    /* Form container */
    .form-card {
        background-color: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 15px; /* Reduced padding */
        border-radius: 8px;
        margin-bottom: 25px; /* Reduced margin */
        display: flex;
        gap: 15px; /* Reduced gap */
        justify-content: space-between;
        flex-wrap: wrap;
    }

    /* Form group */
    .form-group {
        flex: 1;
        min-width: 180px; /* Reduced min-width */
        margin-bottom: 12px; /* Reduced margin */
    }

    /* Label styling */
    .label {
        font-size: 0.9rem; /* Smaller font size */
        color: #555;
        margin-bottom: 6px;
        display: block;
    }

    /* Input field */
    .form-control {
        width: 100%;
        padding: 8px; /* Reduced padding */
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        color: #333;
        transition: border-color 0.3s;
    }

    /* Input focus state */
    .form-control:focus {
        border-color: #4c92fc;
        outline: none;
    }

    /* Button styling */
    .btn {
        padding: 8px 15px; /* Reduced padding */
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        cursor: pointer;
        transition: background-color 0.3s;
    }

    /* Primary Button */
    .btn-primary {
        background-color: #4c92fc;
        color: #fff;
        border: none;
    }

    /* Hover effect on primary button */
    .btn-primary:hover {
        background-color: #3978d1;
    }

    /* Danger Button (Delete) */
    .btn-danger {
        background-color: #e74c3c;
        color: #fff;
        border: none;
    }

    /* Hover effect on delete button */
    .btn-danger:hover {
        background-color: #c0392b;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .course-section {
            padding: 10px; /* Reduced padding */
        }

        .form-card {
            padding: 10px; /* Reduced padding */
            flex-direction: column;
        }

        .section-title {
            font-size: 1.3rem; /* Smaller font size */
        }

        .form-control, .btn {
            font-size: 0.85rem; /* Smaller font size */
        }

        .form-group {
            min-width: unset;
        }
    }
</style>


<!-- JavaScript for handling dropdown and form submission -->
<script>
    document.getElementById('deleteCourseDropdown').addEventListener('change', function() {
        var universityId = this.value;
        if (universityId) {
            // Update the action of the delete form with the correct university ID
            var deleteForm = document.getElementById('deleteCourseForm');
            deleteForm.action = deleteForm.action.replace('deleteId', universityId);
            deleteForm.style.display = 'block'; // Show the delete button
        } else {
            // Hide the delete button if no university is selected
            document.getElementById('deleteCourseForm').style.display = 'none';
        }
    });
</script>


<!--course section end here-->


  <!--Intake section start here-->

  <section class="intake-section">
    <div class="container">
        <h2 class="section-title">Intake Management</h2>
        
        <!-- Form for adding a location -->
        <form method="POST" action="{{ route('intake.store') }}">
            @csrf
            <div class="form-card">
                <!-- Input field for adding new university -->
                <div class="form-group">
                    <label for="newIntake" class="label">Add Intake:</label>
                    <input type="text" id="newIntake" name="newIntake" placeholder="Enter Intake name" class="form-control" required>
                </div>

                <!-- Dropdown for selecting an existing university -->
                <div class="form-group">
            <label for="deleteIntakeDropdown" class="label">Delete Intake:</label>
            <select class="form-control" name="deleteCourse" id="deleteIntakeDropdown">
                <option value="" disabled selected>Select a Location to Intake</option>
                @foreach($intakes as $intake)
                    <option value="{{ $intake->id }}">{{ $intake->newIntake }}</option>
                @endforeach
            </select>
        </div>
            </div>

            <!-- Submit button for adding location -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Add Intake</button>
            </div>
        </form>

        <!-- Dropdown list for deleting a location -->
        <div class="form-group">
        <!-- Delete university form (hidden by default) -->
        <form action="{{ route('intake.destroy', 'deleteId') }}" method="POST" id="deleteIntakeForm" style="display:none;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Intake</button>
        </form>

    </div>
</section>

<!-- CSS for Styling -->
<!-- CSS for Styling -->
<style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Main container */
    .course-section {
        background-color: #f4f7fa;
        padding: 15px 0; /* Reduced padding */
        font-family: 'Arial', sans-serif;
    }

    /* Section title */
    .section-title {
        text-align: center;
        font-size: 1.5rem; /* Smaller font size */
        color: #333;
        margin-bottom: 15px; /* Reduced margin */
    }

    /* Form container */
    .form-card {
        background-color: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 15px; /* Reduced padding */
        border-radius: 8px;
        margin-bottom: 25px; /* Reduced margin */
        display: flex;
        gap: 15px; /* Reduced gap */
        justify-content: space-between;
        flex-wrap: wrap;
    }

    /* Form group */
    .form-group {
        flex: 1;
        min-width: 180px; /* Reduced min-width */
        margin-bottom: 12px; /* Reduced margin */
    }

    /* Label styling */
    .label {
        font-size: 0.9rem; /* Smaller font size */
        color: #555;
        margin-bottom: 6px;
        display: block;
    }

    /* Input field */
    .form-control {
        width: 100%;
        padding: 8px; /* Reduced padding */
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        color: #333;
        transition: border-color 0.3s;
    }

    /* Input focus state */
    .form-control:focus {
        border-color: #4c92fc;
        outline: none;
    }

    /* Button styling */
    .btn {
        padding: 8px 15px; /* Reduced padding */
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        cursor: pointer;
        transition: background-color 0.3s;
    }

    /* Primary Button */
    .btn-primary {
        background-color: #4c92fc;
        color: #fff;
        border: none;
    }

    /* Hover effect on primary button */
    .btn-primary:hover {
        background-color: #3978d1;
    }

    /* Danger Button (Delete) */
    .btn-danger {
        background-color: #e74c3c;
        color: #fff;
        border: none;
    }

    /* Hover effect on delete button */
    .btn-danger:hover {
        background-color: #c0392b;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .course-section {
            padding: 10px; /* Reduced padding */
        }

        .form-card {
            padding: 10px; /* Reduced padding */
            flex-direction: column;
        }

        .section-title {
            font-size: 1.3rem; /* Smaller font size */
        }

        .form-control, .btn {
            font-size: 0.85rem; /* Smaller font size */
        }

        .form-group {
            min-width: unset;
        }
    }
</style>


<!-- JavaScript for handling dropdown and form submission -->
<script>
    document.getElementById('deleteIntakeDropdown').addEventListener('change', function() {
        var universityId = this.value;
        if (universityId) {
            // Update the action of the delete form with the correct university ID
            var deleteForm = document.getElementById('deleteIntakeForm');
            deleteForm.action = deleteForm.action.replace('deleteId', universityId);
            deleteForm.style.display = 'block'; // Show the delete button
        } else {
            // Hide the delete button if no university is selected
            document.getElementById('deleteIntakeForm').style.display = 'none';
        }
    });
</script>

  <!--Intake section end here-->

  <!--scholarship start here-->

  <section class="scholarship-section">
    <div class="container">
        <h2 class="section-title">Scholarship Management</h2>
        
        <!-- Form for adding a location -->
        <form method="POST" action="{{ route('scholarship.store') }}">
            @csrf
            <div class="form-card">
                <!-- Input field for adding new university -->
                <div class="form-group">
                    <label for="newScholarship" class="label">Add Scholarship:</label>
                    <input type="text" id="newScholarship" name="newScholarship" placeholder="Enter Scholarship name" class="form-control" required>
                </div>

                <!-- Dropdown for selecting an existing university -->
                <div class="form-group">
            <label for="deleteScholarshipDropdown" class="label">Delete Intake:</label>
            <select class="form-control" name="deleteScholarship" id="deleteScholarshipDropdown">
                <option value="" disabled selected>Select a Location to Scholarship</option>
                @foreach($scholarships as $scholarship)
                    <option value="{{ $scholarship->id }}">{{ $scholarship->newScholarship }}</option>
                @endforeach
            </select>
        </div>
            </div>

            <!-- Submit button for adding location -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Add Scholarship</button>
            </div>
        </form>

        <!-- Dropdown list for deleting a location -->
        <div class="form-group">
        <!-- Delete university form (hidden by default) -->
        <form action="{{ route('scholarship.destroy', 'deleteId') }}" method="POST" id="deleteScholarshipForm" style="display:none;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Scholarship</button>
        </form>

    </div>
</section>

<!-- CSS for Styling -->
<!-- CSS for Styling -->
<style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Main container */
    .course-section {
        background-color: #f4f7fa;
        padding: 15px 0; /* Reduced padding */
        font-family: 'Arial', sans-serif;
    }

    /* Section title */
    .section-title {
        text-align: center;
        font-size: 1.5rem; /* Smaller font size */
        color: #333;
        margin-bottom: 15px; /* Reduced margin */
    }

    /* Form container */
    .form-card {
        background-color: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 15px; /* Reduced padding */
        border-radius: 8px;
        margin-bottom: 25px; /* Reduced margin */
        display: flex;
        gap: 15px; /* Reduced gap */
        justify-content: space-between;
        flex-wrap: wrap;
    }

    /* Form group */
    .form-group {
        flex: 1;
        min-width: 180px; /* Reduced min-width */
        margin-bottom: 12px; /* Reduced margin */
    }

    /* Label styling */
    .label {
        font-size: 0.9rem; /* Smaller font size */
        color: #555;
        margin-bottom: 6px;
        display: block;
    }

    /* Input field */
    .form-control {
        width: 100%;
        padding: 8px; /* Reduced padding */
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        color: #333;
        transition: border-color 0.3s;
    }

    /* Input focus state */
    .form-control:focus {
        border-color: #4c92fc;
        outline: none;
    }

    /* Button styling */
    .btn {
        padding: 8px 15px; /* Reduced padding */
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        cursor: pointer;
        transition: background-color 0.3s;
    }

    /* Primary Button */
    .btn-primary {
        background-color: #4c92fc;
        color: #fff;
        border: none;
    }

    /* Hover effect on primary button */
    .btn-primary:hover {
        background-color: #3978d1;
    }

    /* Danger Button (Delete) */
    .btn-danger {
        background-color: #e74c3c;
        color: #fff;
        border: none;
    }

    /* Hover effect on delete button */
    .btn-danger:hover {
        background-color: #c0392b;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .course-section {
            padding: 10px; /* Reduced padding */
        }

        .form-card {
            padding: 10px; /* Reduced padding */
            flex-direction: column;
        }

        .section-title {
            font-size: 1.3rem; /* Smaller font size */
        }

        .form-control, .btn {
            font-size: 0.85rem; /* Smaller font size */
        }

        .form-group {
            min-width: unset;
        }
    }
</style>


<!-- JavaScript for handling dropdown and form submission -->
<script>
    document.getElementById('deleteScholarshipDropdown').addEventListener('change', function() {
        var universityId = this.value;
        if (universityId) {
            // Update the action of the delete form with the correct university ID
            var deleteForm = document.getElementById('deleteScholarshipForm');
            deleteForm.action = deleteForm.action.replace('deleteId', universityId);
            deleteForm.style.display = 'block'; // Show the delete button
        } else {
            // Hide the delete button if no university is selected
            document.getElementById('deleteScholarshipForm').style.display = 'none';
        }
    });
</script>

  <!--scholarship end here-->

  <!--tuition start here-->

  <section class="amount-section">
    <div class="container">
        <h2 class="section-title">Tuition Management</h2>
        
        <!-- Form for adding a location -->
        <form method="POST" action="{{ route('amount.store') }}">
            @csrf
            <div class="form-card">
                <!-- Input field for adding new university -->
                <div class="form-group">
                    <label for="newAmount" class="label">Add Scholarship:</label>
                    <input type="number" id="newAmount" name="newAmount" placeholder="Enter Amount name" class="form-control" required>
                </div>

                <!-- Dropdown for selecting an existing university -->
                <div class="form-group">
            <label for="deleteAmountDropdown" class="label">Delete Amount:</label>
            <select class="form-control" name="deleteAmount" id="deleteAmountDropdown">
                <option value="" disabled selected>Select a Amount</option>
                @foreach($amounts as $amount)
                    <option value="{{ $amount->id }}">{{ $amount->newAmount }}</option>
                @endforeach
            </select>
        </div>
            </div>

            <!-- Submit button for adding location -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Add Amount</button>
            </div>
        </form>

        <!-- Dropdown list for deleting a location -->
        <div class="form-group">
        <!-- Delete university form (hidden by default) -->
        <form action="{{ route('amount.destroy', 'deleteId') }}" method="POST" id="deleteAmountForm" style="display:none;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Amount</button>
        </form>

    </div>
</section>

<!-- CSS for Styling -->
<!-- CSS for Styling -->
<style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Main container */
    .course-section {
        background-color: #f4f7fa;
        padding: 15px 0; /* Reduced padding */
        font-family: 'Arial', sans-serif;
    }

    /* Section title */
    .section-title {
        text-align: center;
        font-size: 1.5rem; /* Smaller font size */
        color: #333;
        margin-bottom: 15px; /* Reduced margin */
    }

    /* Form container */
    .form-card {
        background-color: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 15px; /* Reduced padding */
        border-radius: 8px;
        margin-bottom: 25px; /* Reduced margin */
        display: flex;
        gap: 15px; /* Reduced gap */
        justify-content: space-between;
        flex-wrap: wrap;
    }

    /* Form group */
    .form-group {
        flex: 1;
        min-width: 180px; /* Reduced min-width */
        margin-bottom: 12px; /* Reduced margin */
    }

    /* Label styling */
    .label {
        font-size: 0.9rem; /* Smaller font size */
        color: #555;
        margin-bottom: 6px;
        display: block;
    }

    /* Input field */
    .form-control {
        width: 100%;
        padding: 8px; /* Reduced padding */
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        color: #333;
        transition: border-color 0.3s;
    }

    /* Input focus state */
    .form-control:focus {
        border-color: #4c92fc;
        outline: none;
    }

    /* Button styling */
    .btn {
        padding: 8px 15px; /* Reduced padding */
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        cursor: pointer;
        transition: background-color 0.3s;
    }

    /* Primary Button */
    .btn-primary {
        background-color: #4c92fc;
        color: #fff;
        border: none;
    }

    /* Hover effect on primary button */
    .btn-primary:hover {
        background-color: #3978d1;
    }

    /* Danger Button (Delete) */
    .btn-danger {
        background-color: #e74c3c;
        color: #fff;
        border: none;
    }

    /* Hover effect on delete button */
    .btn-danger:hover {
        background-color: #c0392b;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .course-section {
            padding: 10px; /* Reduced padding */
        }

        .form-card {
            padding: 10px; /* Reduced padding */
            flex-direction: column;
        }

        .section-title {
            font-size: 1.3rem; /* Smaller font size */
        }

        .form-control, .btn {
            font-size: 0.85rem; /* Smaller font size */
        }

        .form-group {
            min-width: unset;
        }
    }
</style>


<!-- JavaScript for handling dropdown and form submission -->
<script>
    document.getElementById('deleteAmountDropdown').addEventListener('change', function() {
        var universityId = this.value;
        if (universityId) {
            // Update the action of the delete form with the correct university ID
            var deleteForm = document.getElementById('deleteAmountForm');
            deleteForm.action = deleteForm.action.replace('deleteId', universityId);
            deleteForm.style.display = 'block'; // Show the delete button
        } else {
            // Hide the delete button if no university is selected
            document.getElementById('deleteAmountForm').style.display = 'none';
        }
    });
</script>

  <!--tuition end here-->

  <!--ug section start-->

  <section class="english-section">
    <div class="container">
        <h2 class="section-title">UG Management</h2>

        <!-- Form for adding a location -->
        <form method="POST" action="{{ route('ug.store') }}">
            @csrf
            <div class="form-card">
                <!-- Input field for adding new IELTS -->
                <div class="form-group">
                    <label for="newIelts" class="label">Add Ielts:</label>
                    <input type="text" id="newIelts" name="newIelts" placeholder="Enter Ielts score" class="form-control" required>
                </div>

                <!-- Dropdown for selecting an existing IELTS to delete -->
                <div class="form-group">
                    <label for="deleteIeltsDropdown" class="label">Delete Ielts:</label>
                    <select class="form-control" name="deleteIelts" id="deleteIeltsDropdown" aria-label="Select an IELTS to delete">
                        <option value="" disabled selected>Select an IELTS</option>
                        @foreach($ietls as $ietl)
                            <option value="{{ $ietl->id }}">{{ $ietl->newIelts }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Submit button for adding IELTS -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Add Ielts</button>
            </div>
        </form>

        <!-- Delete IELTS form (hidden by default) -->
        <div class="form-group">
            <form action="{{ route('ietl.destroy', 'deleteId') }}" method="POST" id="deleteIeltsForm" style="display:none;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Ielts</button>
            </form>
        </div>
    </div>
</section>

<!-- CSS for Styling -->
<style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Main container */
    .course-section {
        background-color: #f4f7fa;
        padding: 15px 0; /* Reduced padding */
        font-family: 'Arial', sans-serif;
    }

    /* Section title */
    .section-title {
        text-align: center;
        font-size: 1.5rem; /* Smaller font size */
        color: #333;
        margin-bottom: 15px; /* Reduced margin */
    }

    /* Form container */
    .form-card {
        background-color: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 15px; /* Reduced padding */
        border-radius: 8px;
        margin-bottom: 25px; /* Reduced margin */
        display: flex;
        gap: 15px; /* Reduced gap */
        justify-content: space-between;
        flex-wrap: wrap;
    }

    /* Form group */
    .form-group {
        flex: 1;
        min-width: 180px; /* Reduced min-width */
        margin-bottom: 12px; /* Reduced margin */
    }

    /* Label styling */
    .label {
        font-size: 0.9rem; /* Smaller font size */
        color: #555;
        margin-bottom: 6px;
        display: block;
    }

    /* Input field */
    .form-control {
        width: 100%;
        padding: 8px; /* Reduced padding */
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        color: #333;
        transition: border-color 0.3s;
    }

    /* Input focus state */
    .form-control:focus {
        border-color: #4c92fc;
        outline: none;
    }

    /* Button styling */
    .btn {
        padding: 8px 15px; /* Reduced padding */
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        cursor: pointer;
        transition: background-color 0.3s;
    }

    /* Primary Button */
    .btn-primary {
        background-color: #4c92fc;
        color: #fff;
        border: none;
    }

    /* Hover effect on primary button */
    .btn-primary:hover {
        background-color: #3978d1;
    }

    /* Danger Button (Delete) */
    .btn-danger {
        background-color: #e74c3c;
        color: #fff;
        border: none;
    }

    /* Hover effect on delete button */
    .btn-danger:hover {
        background-color: #c0392b;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .course-section {
            padding: 10px; /* Reduced padding */
        }

        .form-card {
            padding: 10px; /* Reduced padding */
            flex-direction: column;
        }

        .section-title {
            font-size: 1.3rem; /* Smaller font size */
        }

        .form-control, .btn {
            font-size: 0.85rem; /* Smaller font size */
        }

        .form-group {
            min-width: unset;
        }
    }
</style>

<!-- JavaScript for handling dropdown and form submission -->
<script>
    document.getElementById('deleteIeltsDropdown').addEventListener('change', function() {
        var ieltsId = this.value;
        var deleteForm = document.getElementById('deleteIeltsForm');
        if (ieltsId) {
            // Update the action of the delete form with the correct IELTS ID
            deleteForm.action = deleteForm.action.replace('deleteId', ieltsId);
            deleteForm.style.display = 'block'; // Show the delete button
        } else {
            // Hide the delete button if no IELTS is selected
            deleteForm.style.display = 'none';
        }
    });
</script>
  <!--ug section end-->

  <!--ug section pte start-->


  <section class="pte-section">
    <div class="container">
        <h2 class="section-title">UG Management</h2>

        <!-- Form for adding a location -->
        <form method="POST" action="{{ route('pte.store') }}">
            @csrf
            <div class="form-card">
                <!-- Input field for adding new IELTS -->
                <div class="form-group">
                    <label for="newpte" class="label">Add Pte:</label>
                    <input type="text" id="newpte" name="newpte" placeholder="Enter Pte score" class="form-control" required>
                </div>

                <!-- Dropdown for selecting an existing IELTS to delete -->
                <div class="form-group">
                    <label for="deletePteDropdown" class="label">Delete Pte:</label>
                    <select class="form-control" name="deletePte" id="deletePteDropdown" aria-label="Select an PTE to delete">
                        <option value="" disabled selected>Select an PTE</option>
                        @foreach($ptes as $pte)
                            <option value="{{ $pte->id }}">{{ $pte->newpte }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Submit button for adding IELTS -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Add Pte</button>
            </div>
        </form>

        <!-- Delete IELTS form (hidden by default) -->
        <div class="form-group">
            <form action="{{ route('pte.destroy', 'deleteId') }}" method="POST" id="deletePteForm" style="display:none;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Pte</button>
            </form>
        </div>
    </div>
</section>

<!-- CSS for Styling -->
<style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Main container */
    .course-section {
        background-color: #f4f7fa;
        padding: 15px 0; /* Reduced padding */
        font-family: 'Arial', sans-serif;
    }

    /* Section title */
    .section-title {
        text-align: center;
        font-size: 1.5rem; /* Smaller font size */
        color: #333;
        margin-bottom: 15px; /* Reduced margin */
    }

    /* Form container */
    .form-card {
        background-color: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 15px; /* Reduced padding */
        border-radius: 8px;
        margin-bottom: 25px; /* Reduced margin */
        display: flex;
        gap: 15px; /* Reduced gap */
        justify-content: space-between;
        flex-wrap: wrap;
    }

    /* Form group */
    .form-group {
        flex: 1;
        min-width: 180px; /* Reduced min-width */
        margin-bottom: 12px; /* Reduced margin */
    }

    /* Label styling */
    .label {
        font-size: 0.9rem; /* Smaller font size */
        color: #555;
        margin-bottom: 6px;
        display: block;
    }

    /* Input field */
    .form-control {
        width: 100%;
        padding: 8px; /* Reduced padding */
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        color: #333;
        transition: border-color 0.3s;
    }

    /* Input focus state */
    .form-control:focus {
        border-color: #4c92fc;
        outline: none;
    }

    /* Button styling */
    .btn {
        padding: 8px 15px; /* Reduced padding */
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        cursor: pointer;
        transition: background-color 0.3s;
    }

    /* Primary Button */
    .btn-primary {
        background-color: #4c92fc;
        color: #fff;
        border: none;
    }

    /* Hover effect on primary button */
    .btn-primary:hover {
        background-color: #3978d1;
    }

    /* Danger Button (Delete) */
    .btn-danger {
        background-color: #e74c3c;
        color: #fff;
        border: none;
    }

    /* Hover effect on delete button */
    .btn-danger:hover {
        background-color: #c0392b;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .course-section {
            padding: 10px; /* Reduced padding */
        }

        .form-card {
            padding: 10px; /* Reduced padding */
            flex-direction: column;
        }

        .section-title {
            font-size: 1.3rem; /* Smaller font size */
        }

        .form-control, .btn {
            font-size: 0.85rem; /* Smaller font size */
        }

        .form-group {
            min-width: unset;
        }
    }
</style>

<!-- JavaScript for handling dropdown and form submission -->
<script>
    document.getElementById('deletePteDropdown').addEventListener('change', function() {
        var ieltsId = this.value;
        var deleteForm = document.getElementById('deletePteForm');
        if (ieltsId) {
            // Update the action of the delete form with the correct IELTS ID
            deleteForm.action = deleteForm.action.replace('deleteId', ieltsId);
            deleteForm.style.display = 'block'; // Show the delete button
        } else {
            // Hide the delete button if no IELTS is selected
            deleteForm.style.display = 'none';
        }
    });
</script>

  <!--ug section pte end-->

<!--pg section ietls section start-->

<section class="pgietls-section">
    <div class="container">
        <h2 class="section-title">PG Management</h2>

        <!-- Form for adding a location -->
        <form method="POST" action="{{ route('pg.store') }}">
            @csrf
            <div class="form-card">
                <!-- Input field for adding new IELTS -->
                <div class="form-group">
                    <label for="newPgIelts" class="label">Add Ielts:</label>
                    <input type="text" id="newPgIelts" name="newPgIelts" placeholder="Enter PgIelts score" class="form-control" required>
                </div>

                <!-- Dropdown for selecting an existing IELTS to delete -->
                <div class="form-group">
                    <label for="deletePgIeltsDropdown" class="label">Delete Pg Ielts:</label>
                    <select class="form-control" name="deletePgIelts" id="deletePgIeltsDropdown" aria-label="Select an Pg IELTS to delete">
                        <option value="" disabled selected>Select an IELTS</option>
                        @foreach($pg_ietels as $pg_ietel)
                            <option value="{{ $pg_ietel->id }}">{{ $pg_ietel->newPgIelts }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Submit button for adding IELTS -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Add PgIelts</button>
            </div>
        </form>

        <!-- Delete IELTS form (hidden by default) -->
        <div class="form-group">
            <form action="{{ route('pg_ietel.destroy', 'deleteId') }}" method="POST" id="deletePgIeltsForm" style="display:none;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Pg Ielts</button>
            </form>
        </div>
    </div>
</section>

<!-- CSS for Styling -->
<style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Main container */
    .course-section {
        background-color: #f4f7fa;
        padding: 15px 0; /* Reduced padding */
        font-family: 'Arial', sans-serif;
    }

    /* Section title */
    .section-title {
        text-align: center;
        font-size: 1.5rem; /* Smaller font size */
        color: #333;
        margin-bottom: 15px; /* Reduced margin */
    }

    /* Form container */
    .form-card {
        background-color: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 15px; /* Reduced padding */
        border-radius: 8px;
        margin-bottom: 25px; /* Reduced margin */
        display: flex;
        gap: 15px; /* Reduced gap */
        justify-content: space-between;
        flex-wrap: wrap;
    }

    /* Form group */
    .form-group {
        flex: 1;
        min-width: 180px; /* Reduced min-width */
        margin-bottom: 12px; /* Reduced margin */
    }

    /* Label styling */
    .label {
        font-size: 0.9rem; /* Smaller font size */
        color: #555;
        margin-bottom: 6px;
        display: block;
    }

    /* Input field */
    .form-control {
        width: 100%;
        padding: 8px; /* Reduced padding */
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        color: #333;
        transition: border-color 0.3s;
    }

    /* Input focus state */
    .form-control:focus {
        border-color: #4c92fc;
        outline: none;
    }

    /* Button styling */
    .btn {
        padding: 8px 15px; /* Reduced padding */
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        cursor: pointer;
        transition: background-color 0.3s;
    }

    /* Primary Button */
    .btn-primary {
        background-color: #4c92fc;
        color: #fff;
        border: none;
    }

    /* Hover effect on primary button */
    .btn-primary:hover {
        background-color: #3978d1;
    }

    /* Danger Button (Delete) */
    .btn-danger {
        background-color: #e74c3c;
        color: #fff;
        border: none;
    }

    /* Hover effect on delete button */
    .btn-danger:hover {
        background-color: #c0392b;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .course-section {
            padding: 10px; /* Reduced padding */
        }

        .form-card {
            padding: 10px; /* Reduced padding */
            flex-direction: column;
        }

        .section-title {
            font-size: 1.3rem; /* Smaller font size */
        }

        .form-control, .btn {
            font-size: 0.85rem; /* Smaller font size */
        }

        .form-group {
            min-width: unset;
        }
    }
</style>

<!-- JavaScript for handling dropdown and form submission -->
<script>
    document.getElementById('deletePgIeltsDropdown').addEventListener('change', function() {
        var ieltsId = this.value;
        var deleteForm = document.getElementById('deletePgIeltsForm');
        if (ieltsId) {
            // Update the action of the delete form with the correct IELTS ID
            deleteForm.action = deleteForm.action.replace('deleteId', ieltsId);
            deleteForm.style.display = 'block'; // Show the delete button
        } else {
            // Hide the delete button if no IELTS is selected
            deleteForm.style.display = 'none';
        }
    });
</script>

<!--pg section ietls section end-->

<!--pg pte section start-->

<section class="pgpte-section">
    <div class="container">
        <h2 class="section-title">PG Management</h2>

        <!-- Form for adding a location -->
        <form method="POST" action="{{ route('pgpte.store') }}">
            @csrf
            <div class="form-card">
                <!-- Input field for adding new IELTS -->
                <div class="form-group">
                    <label for="newPgPte" class="label">Add Pte:</label>
                    <input type="text" id="newPgPte" name="newPgPte" placeholder="Enter PgPte score" class="form-control" required>
                </div>

                <!-- Dropdown for selecting an existing IELTS to delete -->
                <div class="form-group">
                    <label for="deletePgPteDropdown" class="label">Delete Pg Pte:</label>
                    <select class="form-control" name="deletePgPte" id="deletePgPteDropdown" aria-label="Select an Pg Pte to delete">
                        <option value="" disabled selected>Select an IELTS</option>
                        @foreach($pg_ptes as $pg_pte)
                            <option value="{{ $pg_pte->id }}">{{ $pg_pte->newPgPte }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Submit button for adding IELTS -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Add Pg Pte</button>
            </div>
        </form>

        <!-- Delete IELTS form (hidden by default) -->
        <div class="form-group">
            <form action="{{ route('pg_pte.destroy', 'deleteId') }}" method="POST" id="deletePgPteForm" style="display:none;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Pg Pte</button>
            </form>
        </div>
    </div>
</section>

<!-- CSS for Styling -->
<style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Main container */
    .course-section {
        background-color: #f4f7fa;
        padding: 15px 0; /* Reduced padding */
        font-family: 'Arial', sans-serif;
    }

    /* Section title */
    .section-title {
        text-align: center;
        font-size: 1.5rem; /* Smaller font size */
        color: #333;
        margin-bottom: 15px; /* Reduced margin */
    }

    /* Form container */
    .form-card {
        background-color: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 15px; /* Reduced padding */
        border-radius: 8px;
        margin-bottom: 25px; /* Reduced margin */
        display: flex;
        gap: 15px; /* Reduced gap */
        justify-content: space-between;
        flex-wrap: wrap;
    }

    /* Form group */
    .form-group {
        flex: 1;
        min-width: 180px; /* Reduced min-width */
        margin-bottom: 12px; /* Reduced margin */
    }

    /* Label styling */
    .label {
        font-size: 0.9rem; /* Smaller font size */
        color: #555;
        margin-bottom: 6px;
        display: block;
    }

    /* Input field */
    .form-control {
        width: 100%;
        padding: 8px; /* Reduced padding */
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        color: #333;
        transition: border-color 0.3s;
    }

    /* Input focus state */
    .form-control:focus {
        border-color: #4c92fc;
        outline: none;
    }

    /* Button styling */
    .btn {
        padding: 8px 15px; /* Reduced padding */
        border-radius: 4px;
        font-size: 0.9rem; /* Smaller font size */
        cursor: pointer;
        transition: background-color 0.3s;
    }

    /* Primary Button */
    .btn-primary {
        background-color: #4c92fc;
        color: #fff;
        border: none;
    }

    /* Hover effect on primary button */
    .btn-primary:hover {
        background-color: #3978d1;
    }

    /* Danger Button (Delete) */
    .btn-danger {
        background-color: #e74c3c;
        color: #fff;
        border: none;
    }

    /* Hover effect on delete button */
    .btn-danger:hover {
        background-color: #c0392b;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .course-section {
            padding: 10px; /* Reduced padding */
        }

        .form-card {
            padding: 10px; /* Reduced padding */
            flex-direction: column;
        }

        .section-title {
            font-size: 1.3rem; /* Smaller font size */
        }

        .form-control, .btn {
            font-size: 0.85rem; /* Smaller font size */
        }

        .form-group {
            min-width: unset;
        }
    }
</style>

<!-- JavaScript for handling dropdown and form submission -->
<script>
    document.getElementById('deletePgPteDropdown').addEventListener('change', function() {
        var ieltsId = this.value;
        var deleteForm = document.getElementById('deletePgPteForm');
        if (ieltsId) {
            // Update the action of the delete form with the correct IELTS ID
            deleteForm.action = deleteForm.action.replace('deleteId', ieltsId);
            deleteForm.style.display = 'block'; // Show the delete button
        } else {
            // Hide the delete button if no IELTS is selected
            deleteForm.style.display = 'none';
        }
    });
</script>


<button type="button" class="btn btn-download" onclick="downloadAllData()">Download All Data Excel</button>
<style>
    /* Base styles for the button */
.btn {
  display: inline-block;
  padding: 12px 25px;
  font-size: 16px;
  font-weight: 600;
  text-align: center;
  text-decoration: none;
  border-radius: 8px;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
  border: 2px solid transparent; /* To handle border color transition */
}

/* Default button color */
.btn-download {
  background-color: #007bff; /* Blue background */
  color: white;
  border-color: #007bff; /* Matching border color */
}

.btn-download:hover {
  background-color: #0056b3; /* Darker blue when hovered */
  border-color: #0056b3; /* Darker border on hover */
}

.btn-download:active {
  background-color: #004085; /* Even darker blue when clicked */
  border-color: #004085;
}

.btn-download:focus {
  outline: none; /* Remove outline */
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5); /* Add glow effect on focus */
}

/* Optional: Add a subtle animation effect when hovering */
.btn-download:hover {
  transform: scale(1.05); /* Slightly enlarge the button */
}

</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.2/xlsx.full.min.js"></script>


<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mapping of section names to their specific input field names
    const sectionInputMap = {
        'university': 'newUniversity',
        'location': 'newLocation',
        'course': 'newCourse',
        'intake': 'newIntake',
        'scholarship': 'newScholarship',
        'amount': 'newAmount',
        'Ielts': 'newIelts',
        'pte': 'newpte',
        'pgietls': 'newPgIelts',
        'pgpte': 'newPgPte'
    };

    // Function to save data to localStorage when an item is added
    function saveToLocalStorage(sectionName, data) {
        // If no data is entered, use 'N/A'
        data = data.trim() === '' ? 'N/A' : data;

        // Get the full section name if it's abbreviated
        const fullSectionName = Object.keys(sectionInputMap).find(key => 
            sectionName.includes(key)
        ) || sectionName;

        // Retrieve existing data
        let existingData = JSON.parse(localStorage.getItem(fullSectionName) || '[]');
        
        // Add new data if it's not already present
        if (!existingData.includes(data)) {
            existingData.push(data);
        }

        // Save updated data
        localStorage.setItem(fullSectionName, JSON.stringify(existingData));
    }

    // Attach event listeners to all forms to save data when submitted
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function(e) {
            // Get the section name
            const sectionName = this.closest('section').className;
            
            // Find the corresponding input field based on the section
            const matchedInputName = Object.entries(sectionInputMap).find(([key]) => 
                sectionName.includes(key)
            );

            if (matchedInputName) {
                const inputField = this.querySelector(`[name="${matchedInputName[1]}"]`);
                
                if (inputField) {
                    const data = inputField.value;
                    saveToLocalStorage(sectionName, data);
                }
            }
        });
    });

    // Download All Data function
    window.downloadAllData = function() {
        // Define sections to download (matching localStorage keys)
        const sections = [
            'university', 'location', 'course', 'intake', 
            'scholarship', 'amount', 'Ielts', 'pte', 
            'pgietls', 'pgpte'
        ];

        // Initialize workbook
        const wb = XLSX.utils.book_new();

        // Create a comprehensive worksheet with headers
        let comprehensiveData = [
            ['University', 'Location', 'Course', 'Intake', 
             'Scholarship', 'Tuition Amount', 'UG IELTS', 'UG PTE', 
             'PG IELTS', 'PG PTE']
        ];

        // Check if any data exists in localStorage
        const isDataEmpty = sections.every(section => {
            const data = JSON.parse(localStorage.getItem(section) || '[]');
            return data.length === 0;
        });

        // If no data exists, fill with empty rows
        const maxLength = isDataEmpty ? 1 : Math.max(...sections.map(section => {
            const data = JSON.parse(localStorage.getItem(section) || '[]');
            return data.length > 0 ? data.length : 1;
        }));

        // Populate comprehensive data, ensuring each section has equal rows
        for (let i = 0; i < maxLength; i++) {
            comprehensiveData.push(
                sections.map(section => {
                    const data = JSON.parse(localStorage.getItem(section) || '[]');
                    return (data[i] && data[i] !== '') ? data[i] : 'N/A';
                })
            );
        }

        // Create worksheet from comprehensive data
        const ws = XLSX.utils.aoa_to_sheet(comprehensiveData);

        // Add worksheet to workbook
        XLSX.utils.book_append_sheet(wb, ws, 'All University Data');

        // Create individual section worksheets
        sections.forEach(section => {
            const data = JSON.parse(localStorage.getItem(section) || '[]');
            
            // If there is less data than the max length, fill with 'N/A'
            const paddedData = [...data, ...Array(maxLength - data.length).fill('N/A')];
            
            // Convert data to worksheet format
            const sectionWs = XLSX.utils.aoa_to_sheet([ 
                [`${section.toUpperCase()} Data`], 
                ['Value'], 
                ...paddedData.map(item => [item || 'N/A'])
            ]);

            // Add worksheet to workbook
            XLSX.utils.book_append_sheet(wb, sectionWs, section);
        });

        // Generate a dynamic filename with a timestamp and "Dataentry"
        const fileName = `Dataentry_Universities_Management_Data_${new Date().toISOString().slice(0, 19).replace(/[-:]/g, '').replace('T', '_')}.xlsx`;

        // Write workbook to file with the new dynamic name
        XLSX.writeFile(wb, fileName);
    };

    // Optional: Function to clear all stored data
    window.clearAllData = function() {
        const sections = [
            'university', 'location', 'course', 'intake', 
            'scholarship', 'amount', 'Ielts', 'pte', 
            'pgietls', 'pgpte'
        ];
        
        sections.forEach(section => {
            localStorage.removeItem(section);
        });
        
        alert('All data has been cleared from local storage.');
    };
});
</script>

<!--pg pte section end-->

<!--data excell start download here-->



<!--data excell end download here-->

 @endif

  <!--Data entry end here-->


  <!--Team start here-->

  @if ($showTeam)

  <form id="student-form" method="POST" action="{{ route('student.store') }}">
    @csrf
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Display validation errors -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <div class="container">
    <!-- Student Name Selection -->
    <div class="form-group">
        <label for="name" class="label">Name of Students:</label>
        <select id="name" name="name" class="select" required onchange="updateSourceField()">
            <option value="">Select a student</option>
        </select>
    </div>

    <!-- Add/Remove Student Name -->
    <div class="form-group">
        <label for="newName" class="label">Fetch Name:</label>
        <input type="text" id="newName" name="newName" placeholder="Enter name" class="input-text">
        <div class="button-group">
            <button type="button" class="btn btn-add" onclick="addName()">Add</button>
            <button type="button" class="btn btn-remove" onclick="removeName()">Remove</button>
        </div>
    </div>
</div>

<!-- Source Field (Read-Only) -->
<div class="source-container">
    <div class="form-group">
        <label for="source" class="label">Source Of Student:</label>
        <input type="text" name="source" id="source" value="{{ old('source', $form->source ?? '') }}" class="input-text" readonly />
    </div>
</div>

<div class="source-container">
  <div class="form-group">
    <label for="initiated" class="text-lg font-medium">Offer Initiated by:</label>
    <input type="text" name="initiated" id="initiated" value="{{ old('initiated', $form->initiated ?? '') }}" class="input-text" readonly />
  </div>
</div>

<!-- JavaScript Logic -->
<script>
    // Function to add a new name to the dropdown and store it in localStorage
    function addName() {
        var newName = document.getElementById("newName").value.trim();
        var select = document.getElementById("name");

        if (newName) {
            // Get the stored names from localStorage (or an empty array if not present)
            var storedNames = JSON.parse(localStorage.getItem("Names")) || [];

            // Check if the new name already exists in the list
            if (storedNames.includes(newName)) {
                alert("This name has already been added.");
                return; // Exit the function if the name exists
            }

            // Create a new option element and add it to the select dropdown
            var newOption = document.createElement("option");
            newOption.value = newName;
            newOption.textContent = newName;
            select.appendChild(newOption);

            // Add the new name to the list and update localStorage
            storedNames.push(newName);
            localStorage.setItem("Names", JSON.stringify(storedNames));

            // Clear the input field after adding
            document.getElementById("newName").value = "";
        } else {
            alert("Please enter a name.");
        }
    }

    // Function to remove the selected name from the dropdown and update localStorage
    function removeName() {
        var select = document.getElementById("name");
        var selectedOption = select.options[select.selectedIndex];

        // Check if an option is selected and it's not the placeholder
        if (selectedOption && selectedOption.value !== "") {
            // Remove the selected option from the dropdown
            select.removeChild(selectedOption);

            // Get the stored names from localStorage
            var storedNames = JSON.parse(localStorage.getItem("Names")) || [];

            // Remove the name from the stored array
            var index = storedNames.indexOf(selectedOption.value);
            if (index > -1) {
                storedNames.splice(index, 1);
            }

            // Update localStorage with the modified list
            localStorage.setItem("Names", JSON.stringify(storedNames));
        } else {
            alert("Please select a name to remove.");
        }
    }

    // Function to load the stored names from localStorage
    function loadNames() {
        var storedNames = JSON.parse(localStorage.getItem("Names"));

        if (storedNames) {
            var select = document.getElementById("name");

            // Add the stored options back to the dropdown
            storedNames.forEach(function(name) {
                var newOption = document.createElement("option");
                newOption.value = name;
                newOption.textContent = name;
                select.appendChild(newOption);
            });
        }
    }

    // Function to update the source and initiated fields based on the selected name
function updateSourceField() {
    var selectedName = document.getElementById("name").value;
    var sourceField = document.getElementById("source");
    var initiatedField = document.getElementById("initiated");

    // If a valid name is selected, populate the source and initiated fields
    if (selectedName) {
        // For source field, we can set a custom message like "Source for [selected name]"
        sourceField.value = "Source for " + selectedName;

        // For initiated field, we can set a default message or logic based on the name
        // In this example, I'm assuming we set a default initiated value like "Initiated by [name]"
        initiatedField.value = "Initiated by " + selectedName;
    } else {
        // Clear the fields if no name is selected
        sourceField.value = "";
        initiatedField.value = "";
    }
}

// Load the saved names when the page loads
window.onload = function() {
    loadNames();

    // Trigger the updateSourceField function on page load to ensure fields are correct
    updateSourceField();
};


    // Load the saved names when the page loads
    window.onload = function() {
        loadNames();
    };
</script>

<!-- Add CSS Styling -->
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f9fafb;
        margin: 0;
        padding: 0;
    }

    .container {
        display: flex;
        gap: 2rem;
        padding: 20px;
        max-width: 1000px;
        margin: 20px auto;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 10px;
        width: 100%;
    }

    .label {
        font-size: 14px;
        font-weight: bold;
        color: #333;
    }

    .select,
    .input-text {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
        outline: none;
        transition: border-color 0.3s ease;
    }

    .select:focus,
    .input-text:focus {
        border-color: #007bff;
    }

    .button-group {
        display: flex;
        gap: 10px;
    }

    .btn {
        padding: 8px 15px;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-add {
        background-color: #28a745;
        color: white;
        border: none;
    }

    .btn-add:hover {
        background-color: #218838;
    }

    .btn-remove {
        background-color: #dc3545;
        color: white;
        border: none;
    }

    .btn-remove:hover {
        background-color: #c82333;
    }

    .source-container {
        max-width: 1000px;
        margin: 20px auto;
        padding: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .input-text[readonly] {
        background-color: #f1f1f1;
        cursor: not-allowed;
    }
</style>



<div class="p-4 border-b">
  <div class="flex flex-col space-y-2">
    <label for="processing" class="text-lg font-medium">Processing:</label>
    <select id="processing" name="processing" required class="w-full max-w-xl p-2 border rounded-md">
      <option value="" disabled selected>Select your Processing</option>
      <option value="Oxford Group">Oxford Group</option>
        <option value="Study Group">Study Group</option>
        <option value="UWE">UWE</option>
    </select>
  </div>
</div>



<div class="p-4 border-b">
  <div class="flex flex-col space-y-2">
    <label for="university" class="text-lg font-medium">University:</label>
    <input type="text" name="university" id="university" class="w-full max-w-xl p-2 border rounded-md" placeholder="Enter your university name" required />
  </div>
</div>


<div class="p-4 border-b">
  <div class="flex flex-col space-y-2">
    <label for="intake" class="text-lg font-medium">Intake:</label>
    <select id="intake" name="intake" required class="w-full max-w-xl p-2 border rounded-md">
      <option value="" disabled selected>Select your intake Status</option>
      <option value="Jan">Jan</option>
                <option value="Feb">Feb</option>
                <option value="Mar">Mar</option>
                <option value="Apr">Apr</option>
                <option value="May">May</option>
                <option value="Jun">Jun</option>
                <option value="Jul">Jul</option>
                <option value="Aug">Aug</option>
                <option value="Sep">Sep</option>
                <option value="Oct">Oct</option>
                <option value="Nov">Nov</option>
                <option value="Dec">Dec</option>
    </select>
  </div>
</div>


  <div class="p-4 border-b">
  <div class="flex flex-col space-y-2">
    <label for="offer" class="text-lg font-medium">Offer Status:</label>
    <select id="offer" name="offer" required class="w-full max-w-xl p-2 border rounded-md">
      <option value="" disabled selected>Select your Offer Status</option>
      <option value="Conditional">Conditional</option>
      <option value="Unconditional">Unconditional</option>
      <option value="Not Received">Not Received</option>
      <option value="Document Submitted">Document Submitted</option>
      <option value="Conditional Offer Letter Received">Conditional Offer Letter Received</option>
      <option value="UnConditional Document Send">UnConditional Document Send</option>
      <option value="UnConditional Offer Received">UnConditional Offer Received</option>
    </select>
  </div>
</div>


<div class="p-4 border-b">
  <div class="flex flex-col space-y-2 items-center">
    <!-- Updated Button Style -->
    <button id="update-button" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-200">
      Update
    </button>
  </div>
</div>

</form>



          @endif

          

  <!--ajay end here-->




         <!--Bikalp start here-->
    @if ($showBikalp)
     
 <form class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg" method="POST" action="{{ route('store.bikalp') }}">
     @csrf
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Display validation errors -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
       <h2>Registration Form</h2>
         <style>
           h2 {
       font-size: 30px;
       margin-bottom: 20px;
       color: Green;
       text-align:center;
   }
         </style>
       @csrf
       @if(session('success'))
           <div class="alert alert-success bg-green-200 text-green-800 p-4 rounded-md mb-6">
               {{ session('success') }}
           </div>
       @endif
   
       <!-- Display validation errors -->
       @if ($errors->any())
           <div class="alert alert-danger bg-red-200 text-red-800 p-4 rounded-md mb-6">
               <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
           </div>
       @endif
   
       <div class="space-y-6">
        <!-- Student Handled -->
        <div>
    <label for="handled" class="block text-gray-700 font-semibold mb-2">Student Handled:</label>
    <select id="handled" name="handled" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
    <option value="" disabled selected>Select  Student Handled</option>
        <option value="Gaurav">Gaurav</option>
        <option value="Roshan">Roshan</option>
        <option value="Ram">Ram</option>
        <option value="Samiksha">Samiksha</option>
        <option value="Bikalp">Bikalp</option>
    </select>
</div>

   
  


   
   
           <!-- Source -->
           <div class="max-w-4xl mx-auto p-8">
    <!-- Header Section -->
    <div class="mb-6">
        <label for="source" class="block text-gray-800 text-lg font-semibold mb-2">Source of Student:</label>
        <select id="source" name="source" class="w-full p-4 border border-gray-300 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out" required>
            <option value="" disabled selected>Select Source of Student</option>
            <option value="B to B">B to B</option>
            <option value="B to C">B to C</option>
        </select>
    </div>

    <!-- Flexbox for B to B and B to C dropdowns -->
    <div class="flex justify-between space-x-6 mt-6">
        
        <!-- B to B Dropdown -->
        <div id="b-to-b-container" class="flex-1 hidden">
            <label for="b-to-b" class="block text-gray-800 text-lg font-semibold mb-2">B to B:</label>
            <select id="b-to-b" name="b-to-b" class="w-full p-4 border border-gray-300 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out" required>
                <option value="" disabled selected>Select your B to B</option>
                <option value="Edulink, Ananta Sir">Edulink, Ananta Sir</option>
                <option value="Crystal Education">Crystal Education</option>
                <option value="Crystal Education Butwal">Crystal Education Butwal</option>
                <option value="Boston">Boston</option>
                <option value="Brighton">Brighton</option>
                <option value="Dream Unique">Dream Unique</option>
                <option value="Evani Education">Evani Education</option>
                <option value="Fortune Education">Fortune Education</option>
                <option value="Lead Ahead">Lead Ahead</option>
                <option value="Manohar Sir">Manohar Sir</option>
                <option value="Merit Itahari">Merit Itahari</option>
                <option value="Merit Putalisadak">Merit Putalisadak</option>
                <option value="Merit Britamod">Merit Britamod</option>
                <option value="Merit Butwal">Merit Butwal</option>
                <option value="Mirai Global">Mirai Global</option>
                <option value="Prashant Sir">Prashant Sir</option>
                <option value="Achivers Sujan">Achivers Sujan</option>
                <option value="Swift/Skyway Education Banepa">Swift/Skyway Education Banepa</option>
                <option value="Tesla">Tesla</option>
                <option value="VXL">VXL</option>
                <option value="Pro Visa(Professional Visa & Education Services)">Pro Visa(Professional Visa & Education Services)</option>
                <option value="Achievers Putalisadak">Achievers Putalisadak</option>
                <option value="Jay Prakash SEC Nepal">Jay Prakash SEC Nepal</option>
                <option value="Rohini">Rohini</option>
                <option value="Rajesh Rightpath">Rajesh Rightpath</option>
                <option value="Rounak Janakpur">Rounak Janakpur</option>
                <option value="Carl Duisburg">Carl Duisburg</option>
                <option value="Study Connect">Study Connect</option>
                <option value="Ved International">Ved International</option>
                <option value="Big Education">Big Education</option>
                <option value="Read and Fly">Read and Fly</option>
                <option value="Eduport">Eduport</option>
                <option value="Goodlife Career(No Contact)">Goodlife Career(No Contact)</option>
                <option value="WRI">WRI</option>
                <option value="Frequency Eduhub">Frequency Eduhub</option>
                <option value="Metro">Metro</option>
                <option value="Highlight">Highlight</option>
                <option value="Career Guidance(CG)">Career Guidance(CG)</option>
                <option value="Vira Education">Vira Education</option>
                <option value="Goals Education(My Journey Franchise)">Goals Education(My Journey Franchise)</option>
                <option value="Mile Stone Services, Madhu Dai">Mile Stone Services, Madhu Dai</option>
                <option value="Lernovate, Pokhara">Lernovate, Pokhara</option>
                <option value="Titan Education Service, Bagbazar">Titan Education Service, Bagbazar</option>
                <option value="Scholarchoice">Scholarchoice</option>
                <option value="Peak Education">Peak Education</option>
                <option value="ANZ Education Services">ANZ Education Services</option>
                <option value="Migration Mithila">Migration Mithila</option>
                <option value="Elite Apprentice Education Consultancy">Elite Apprentice Education Consultancy</option>
                <option value="Apply Abroad">Apply Abroad</option>
                <option value="White House & WRI Partnership">White House & WRI Partnership</option>
                <option value="Tesla">Tesla</option>
                <option value="Study Hub">Study Hub</option>
                <option value="Elite Movers Education consultancy Pvt. Ltd">Elite Movers Education consultancy Pvt. Ltd</option>
                <option value="ICAN Eduction Services">ICAN Eduction Services</option>
                <option value="Real World">Real World</option>
                <option value="Paragraph">Paragraph</option>
                <option value="Edurise">Edurise</option>

            </select>
            
           

            
        </div>

        <!-- B to C Dropdown -->
        <div id="b-to-c-container" class="flex-1 hidden">
            <label for="b-to-c" class="block text-gray-800 text-lg font-semibold mb-2">B to C:</label>
            <select id="b-to-c" name="b-to-c" class="w-full p-4 border border-gray-300 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out" required>
                <option value="" disabled selected>Select your B to C</option>
                <option value="FaceBook">FaceBook</option>
                <option value="Google">Google</option>
                <option value="Student Reference">Student Reference</option>
                <option value="Walking Students">Walking Students</option>
                <option value="Instagram">Instagram</option>
                <option value="Events">Events</option>
    
            </select>

           
            <!-- Add/Remove buttons for B to C -->
           
        </div>
    </div>

</div>

<script>
    // JavaScript to toggle visibility based on selected source
    document.getElementById('source').addEventListener('change', function() {
        var sourceValue = this.value;

        // Hide both containers initially
        document.getElementById('b-to-b-container').classList.add('hidden');
        document.getElementById('b-to-c-container').classList.add('hidden');

        // Show the relevant container based on selection
        if (sourceValue === 'B to B') {
            document.getElementById('b-to-b-container').classList.remove('hidden');
        } else if (sourceValue === 'B to C') {
            document.getElementById('b-to-c-container').classList.remove('hidden');
        }
    });

    // Function to load B to B options from localStorage
    function loadBToBOptions() {
        var select = document.getElementById("b-to-b");
        var bToBList = JSON.parse(localStorage.getItem("bToBList")) || [];

        // Add options to the dropdown from localStorage or default list
        bToBList.forEach(function(name) {
            var newOption = document.createElement("option");
            newOption.value = name;
            newOption.textContent = name;
            select.appendChild(newOption);
        });
    }

    // Function to load B to C options from localStorage
    function loadBToCOptions() {
        var select = document.getElementById("b-to-c");
        var bToCList = JSON.parse(localStorage.getItem("bToCList")) || [];

        // Add options to the dropdown from localStorage or default list
        bToCList.forEach(function(name) {
            var newOption = document.createElement("option");
            newOption.value = name;
            newOption.textContent = name;
            select.appendChild(newOption);
        });
    }

    // Function to add a new B to B name to the dropdown and store it in localStorage
    function addBToB() {
        var newBToBName = document.getElementById("newbtob").value.trim();
        
        if (newBToBName) {
            var select = document.getElementById("b-to-b");
            var bToBList = JSON.parse(localStorage.getItem("bToBList")) || [];

            if (bToBList.indexOf(newBToBName) === -1) {
                var newOption = document.createElement("option");
                newOption.value = newBToBName;
                newOption.textContent = newBToBName;
                select.appendChild(newOption);

                bToBList.push(newBToBName);
                localStorage.setItem("bToBList", JSON.stringify(bToBList));

                document.getElementById("newbtob").value = "";
            } else {
                alert("This B to B entry has already been added.");
            }
        } else {
            alert("Please enter a valid B to B name.");
        }
    }

    // Function to remove the selected B to B name from the dropdown and localStorage
    function removeBToB() {
        var select = document.getElementById("b-to-b");
        var selectedOption = select.options[select.selectedIndex];

        if (selectedOption && selectedOption.value !== "") {
            select.removeChild(selectedOption);

            var bToBList = JSON.parse(localStorage.getItem("bToBList")) || [];
            var index = bToBList.indexOf(selectedOption.value);
            if (index > -1) {
                bToBList.splice(index, 1);
                localStorage.setItem("bToBList", JSON.stringify(bToBList));
            }
        } else {
            alert("Please select a B to B option to remove.");
        }
    }

    // Function to add a new B to C name to the dropdown and store it in localStorage
    function addBToC() {
        var select = document.getElementById("b-to-c");
        var newBToCName = document.getElementById("newbtoc").value.trim();

        if (newBToCName) {
            var bToCList = JSON.parse(localStorage.getItem("bToCList")) || [];

            if (bToCList.indexOf(newBToCName) === -1) {
                var newOption = document.createElement("option");
                newOption.value = newBToCName;
                newOption.textContent = newBToCName;
                select.appendChild(newOption);

                bToCList.push(newBToCName);
                localStorage.setItem("bToCList", JSON.stringify(bToCList));

                document.getElementById("newbtoc").value = "";
            } else {
                alert("This B to C has already been added.");
            }
        } else {
            alert("Please enter a B to C.");
        }
    }

    // Function to remove the selected B to C name from the dropdown and localStorage
    function removeBToC() {
        var select = document.getElementById("b-to-c");
        var selectedOption = select.options[select.selectedIndex];

        if (selectedOption && selectedOption.value !== "") {
            select.removeChild(selectedOption);

            var bToCList = JSON.parse(localStorage.getItem("bToCList")) || [];
            var index = bToCList.indexOf(selectedOption.value);
            if (index > -1) {
                bToCList.splice(index, 1);
                localStorage.setItem("bToCList", JSON.stringify(bToCList));
            }
        } else {
            alert("Please select a B to C to remove.");
        }
    }

    // Load options on page load
    window.onload = function() {
        loadBToBOptions();
        loadBToCOptions();
    };
</script>


<!--personal details start here-->
   
           <!-- Email and Phone -->
           <h1 class="toggle-btn">Personal Details</h1>
    <div class="form-container">
        <div class="flex space-x-4">


                 <!-- Name of Students -->
                  <div class="flex-1">
                   <label for="name" class="block text-gray-700 font-semibold mb-2">Name of Students:</label>
                   <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
               </div>


            <!-- Email Field -->
            <div class="flex-1">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email ID:</label>
                <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Phone Field -->
            <div class="flex-1">
                <label for="phone" class="block text-gray-700 font-semibold mb-2">Phone:</label>
                <input type="tel" id="phone" name="phone" placeholder="+977" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

           
        </div>
    </div>

    <script>
        // JavaScript to toggle the form container visibility
        const toggleButton = document.querySelector('.toggle-btn');
        const formContainer = document.querySelector('.form-container');

        toggleButton.addEventListener('click', () => {
            // Toggle visibility
            if (formContainer.style.display === "none" || formContainer.style.display === "") {
                formContainer.style.display = "block"; // Show the form
            } else {
                formContainer.style.display = "none"; // Hide the form
            }
        });
    </script>
     <style>
        /* Basic styling for form */
        .form-container {
            display: none; /* Hide initially */
            margin-top: 10px;
        }

        .form-container input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        .form-container label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        .toggle-btn {
            font-size: 20px;
            color: green;
            font-family: 'Poppins';
        }
    </style>

    <!--personal details end -->





    <!--academic start here-->

<!-- Container for all four fields -->
<h1 onclick="toggleAcademicDetails()" style="font-size:20px; color:green; font-family: 'Poppins';">Academic Details</h1>

<!-- Form Section -->
<div id="academic-details-form" style="display: none;">
    <!-- First Row -->
    <div class="flex space-x-6">
        <!-- Last Qualification Field -->
        <div class="flex-1 p-6 bg-white shadow-lg rounded-lg">
            <label for="lastqualification" class="block text-gray-700 font-semibold mb-2">Last Qualification:</label>
            <select id="lastqualification" name="lastqualification" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="" disabled selected>Select Last Qualification</option>
                <option value="SLC">SLC</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Bachelor">Bachelor</option>
                <option value="Masters">Masters</option>
            </select>

            <div class="mt-4">
                <label for="newLastQualification" class="block text-gray-700 font-semibold mb-2">Add New Last Qualification:</label>
                <input type="text" id="newLastQualification" name="newLastQualification" placeholder="Enter last qualification" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mt-4 flex space-x-4">
                <button type="button" class="btn btn-add bg-blue-500 text-white px-6 py-3 rounded-md shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500" onclick="addLastQualification()">Add</button>
                <button type="button" class="btn btn-remove bg-red-500 text-white px-6 py-3 rounded-md shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500" onclick="removeLastQualification()">Remove</button>
            </div>
        </div>
        
<script>
    // Initialize the dropdown with data from localStorage
    window.onload = function() {
        loadLastQualificationOptions();
    }

    // Function to load options from localStorage
    function loadLastQualificationOptions() {
        var select = document.getElementById("lastqualification");
        var lastQualificationList = JSON.parse(localStorage.getItem("lastqualificationList")) || [];

        // Add options to the dropdown from localStorage or default list
        lastQualificationList.forEach(function(name) {
            var newOption = document.createElement("option");
            newOption.value = name;
            newOption.textContent = name;
            select.appendChild(newOption);
        });
    }

    // Function to add a new name to the dropdown and store it in localStorage (no duplicates)
    function addLastQualification() {
        var select = document.getElementById("lastqualification");
        var newLastQualificationName = document.getElementById("newLastQualification").value.trim();

        if (newLastQualificationName) {
            // Get the current list from localStorage
            var lastQualificationList = JSON.parse(localStorage.getItem("lastqualificationList")) || [];

            // Check if the name already exists in the list
            if (lastQualificationList.indexOf(newLastQualificationName) === -1) {
                // If it's not already in the list, add it to the dropdown
                var newOption = document.createElement("option");
                newOption.value = newLastQualificationName;
                newOption.textContent = newLastQualificationName;
                select.appendChild(newOption);

                // Save the new name to localStorage
                lastQualificationList.push(newLastQualificationName);
                localStorage.setItem("lastqualificationList", JSON.stringify(lastQualificationList));

                // Clear the input field after adding
                document.getElementById("newLastQualification").value = "";
            } else {
                alert("This qualification has already been added.");
            }
        } else {
            alert("Please enter a name.");
        }
    }

    // Function to remove the selected name from the dropdown and localStorage
    function removeLastQualification() {
        var select = document.getElementById("lastqualification");
        var selectedOption = select.options[select.selectedIndex];

        // Check if an option is selected and it's not the placeholder
        if (selectedOption && selectedOption.value !== "") {
            // Remove from dropdown
            select.removeChild(selectedOption);

            // Remove from localStorage
            var lastQualificationList = JSON.parse(localStorage.getItem("lastqualificationList")) || [];
            var index = lastQualificationList.indexOf(selectedOption.value);
            if (index > -1) {
                lastQualificationList.splice(index, 1);  // Remove the selected name
                localStorage.setItem("lastqualificationList", JSON.stringify(lastQualificationList));
            }
        } else {
            alert("Please select a qualification to remove.");
        }
    }
</script>

        <!-- University and Board Field -->
        <div class="flex-1 p-6 bg-white shadow-lg rounded-lg">
    <label for="universityandboard" class="block text-gray-700 font-semibold mb-2">University And Board:</label>
    <select id="universityandboard" name="universityandboard" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        <option value="" disabled selected>Select University And Board</option>
        <option value="Tribhuvan University">Tribhuvan University</option>
        <option value="Purbanchal University">Purbanchal University</option>
        <option value="A Level">A Level</option>
        <option value="NEB">NEB</option>
        <option value="CBSE">CBSE</option>
        <option value="Kathmandu University">Kathmandu University</option>
        <option value="Dulingo">Dulingo</option>
        <option value="TOFEC">TOFEC</option>
        <option value="UKVI">UKVI</option>
    </select>
    <div class="mt-4">
        <label for="newUniversityandBoard" class="block text-gray-700 font-semibold mb-2">Add New Last Qualification:</label>
        <input type="text" id="newUniversityandBoard" name="newUniversityandBoard" placeholder="Enter University And Board" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="mt-4 flex space-x-4">
        <button type="button" class="btn btn-add bg-blue-500 text-white px-6 py-3 rounded-md shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500" onclick="addUniversityandBoard()">Add</button>
        <button type="button" class="btn btn-remove bg-red-500 text-white px-6 py-3 rounded-md shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500" onclick="removeUniversityandBoard()">Remove</button>
    </div>
</div>

<script>
// Initialize the dropdown with data from localStorage
window.onload = function() {
    loadUniversityandBoardOptions();
}

// Function to load options from localStorage
function loadUniversityandBoardOptions() {
    var select = document.getElementById("universityandboard");
    var universityandBoardList = JSON.parse(localStorage.getItem("universityandboardList")) || [];

    // Add options to the dropdown from localStorage or default list
    universityandBoardList.forEach(function(name) {
        var newOption = document.createElement("option");
        newOption.value = name;
        newOption.textContent = name;
        select.appendChild(newOption);
    });
}

// Function to add a new name to the dropdown and store it in localStorage (no duplicates)
function addUniversityandBoard() {
    var select = document.getElementById("universityandboard");
    var newUniversityandBoardName = document.getElementById("newUniversityandBoard").value.trim();

    if (newUniversityandBoardName) {
        // Get the current list from localStorage
        var universityandBoardList = JSON.parse(localStorage.getItem("universityandboardList")) || [];

        // Check if the name already exists in the list
        if (universityandBoardList.indexOf(newUniversityandBoardName) === -1) {
            // If it's not already in the list, add it to the dropdown
            var newOption = document.createElement("option");
            newOption.value = newUniversityandBoardName;
            newOption.textContent = newUniversityandBoardName;
            select.appendChild(newOption);

            // Save the new name to localStorage
            universityandBoardList.push(newUniversityandBoardName);
            localStorage.setItem("universityandboardList", JSON.stringify(universityandBoardList));

            // Clear the input field after adding
            document.getElementById("newUniversityandBoard").value = "";
        } else {
            alert("This university or board has already been added.");
        }
    } else {
        alert("Please enter a name.");
    }
}

// Function to remove the selected name from the dropdown and localStorage
function removeUniversityandBoard() {
    var select = document.getElementById("universityandboard");
    var selectedOption = select.options[select.selectedIndex];

    // Check if an option is selected and it's not the placeholder
    if (selectedOption && selectedOption.value !== "") {
        // Remove from dropdown
        select.removeChild(selectedOption);

        // Remove from localStorage
        var universityandBoardList = JSON.parse(localStorage.getItem("universityandboardList")) || [];
        var index = universityandBoardList.indexOf(selectedOption.value);
        if (index > -1) {
            universityandBoardList.splice(index, 1);  // Remove the selected name
            localStorage.setItem("universityandboardList", JSON.stringify(universityandBoardList));
        }
    } else {
        alert("Please select a qualification to remove.");
    }
}
</script>


<div class="flex-1 p-6 bg-white shadow-lg rounded-lg">
            
            <label for="passed" class="block text-gray-700 font-semibold mb-2">Passed Year:</label>
            <select id="passed" name="passed" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="" disabled selected>Select Passed Year</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
            </select>
            <label for="gpa" class="block text-gray-700 font-semibold mb-2">GPA:</label>
            <input type="number" id="gpa" name="gpa" step="0.01" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            <label for="percentage" class="block text-gray-700 font-semibold mb-2">Percentage (%):</label>
            <input type="number" id="percentage" name="percentage" step="0.01" min="0" max="100" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>

        </div>
    </div>

    <!-- Second Row -->
    <div class="flex space-x-6 mt-6">
    <!-- English Language Test Field -->
<div class="flex-1 p-6 bg-white shadow-lg rounded-lg">
    <label for="english" class="block text-gray-700 font-semibold mb-2">English Language Test:</label>
    <select id="english" name="english" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required onchange="toggleFields()">
        <option value="" disabled selected>Select English Test</option>
        <option value="IELTS">IELTS</option>
        <option value="PTE">PTE</option>
        <option value="ELLT">ELLT</option>
        <option value="No Test">No Test</option>
        <option value="MOI">MOI</option>
    </select>
</div>

<!-- Score input field (hidden by default) -->
<div id="score-field" class="hidden mt-4 p-6 bg-white shadow-lg rounded-lg">
    <label for="score" class="block text-gray-700 font-semibold mb-2">Enter your Score:</label>
    <input type="number" id="score" name="score" class="w-full p-3 border border-gray-300 rounded-md shadow-sm" placeholder="Enter your score">
</div>

<!-- MOI and No Test Dropdown -->
<div id="dropdown-field" class="hidden mt-4 p-6 bg-white shadow-lg rounded-lg">
    <label for="test" class="block text-gray-700 font-semibold mb-2">Overall English:</label>
    <select id="test" name="test" class="w-full p-3 border border-gray-300 rounded-md shadow-sm">
        <option value="" disabled selected>Select Test</option>
        <option value="C">C</option>
        <option value="C+">C+</option>
        <option value="B">B</option>
        <option value="B+">B+</option>
        <option value="A">A</option>
        <option value="A+">A+</option>
        <option value="No Test">No Test</option> <!-- Added "No Test" option -->
    </select>
</div>

<!-- English Theory Fields -->
<div id="english-theory-fields" class="hidden mt-4 p-6 bg-white shadow-lg rounded-lg">
    <label for="english-theory" class="block text-gray-700 font-semibold mb-2">English Theory:</label>
    <input type="text" id="english-theory" name="english-theory" class="w-full p-3 border border-gray-300 rounded-md shadow-sm" placeholder="Enter details about English theory...">
</div>

<script>
    // This function handles showing and hiding fields based on the selected English test.
    function toggleFields() {
        const selectedTest = document.getElementById('english').value;

        // Get references to the fields we need to show or hide
        const scoreField = document.getElementById('score-field');
        const dropdownField = document.getElementById('dropdown-field');
        const englishTheoryFields = document.getElementById('english-theory-fields');
        
        // Hide all fields by default
        scoreField.classList.add('hidden');
        dropdownField.classList.add('hidden');
        englishTheoryFields.classList.add('hidden');

        // Show the relevant fields based on the selected test
        if (selectedTest === 'IELTS' || selectedTest === 'PTE' || selectedTest === 'ELLT') {
            scoreField.classList.remove('hidden'); // Show the score input field
        } else if (selectedTest === 'No Test') {
            dropdownField.classList.remove('hidden'); // Show the dropdown
            englishTheoryFields.classList.remove('hidden'); // Show the English theory fields
        }
    }
</script>

        



    </div>

  
</div>

<script>
    // JavaScript to toggle visibility of the form
    function toggleAcademicDetails() {
            const form = document.getElementById('academic-details-form');
            if (form.style.display === "none" || form.style.display === "") {
                form.style.display = "block";  // Show the form
            } else {
                form.style.display = "none";  // Hide the form
            }
        }

        // Optional: Handle page refresh or exit behavior
        window.onbeforeunload = function() {
            // Here you can handle any behavior when the user tries to exit the page.
            // For example, warning the user before they leave.
            return "Are you sure you want to leave? Your changes may not be saved.";
        };

</script>


    <!--academic end here-->



    <!--Interested condition start here-->
    <script>
    // Function to toggle visibility of the form and reset it
    function toggleForm() {
        var form = document.getElementById('condition-form');
        var heading = document.getElementById('condition-heading');
        
        // Check if the form is currently visible
        if (form.style.display === 'none' || form.style.display === '') {
            // Show the form and reset it
            form.style.display = 'flex'; // Use flex to display inline
            // Optionally, reset the form inputs when it becomes visible
            form.reset();
        } else {
            // Hide the form
            form.style.display = 'none';
        }
    }
</script>

<style>
    /* Optional: Style to hide the form initially */
    #condition-form {
        display: none;
        gap: 20px; /* Space between the form fields */
    }

    /* Flexbox container for form items */
    #condition-form > div {
        flex: 1; /* Distribute fields equally */
    }

    /* Adjust widths for smaller screens */
    @media (max-width: 768px) {
        #condition-form {
            flex-direction: column; /* Stack form fields vertically on small screens */
        }

        #condition-form > div {
            width: 100%; /* Ensure the fields take full width on small screens */
        }
    }
</style>

<!-- Heading that toggles the form -->
<h1 id="condition-heading" class="cursor-pointer text-xl text-green-700" style="font-size:20px; font-family: 'Poppins';" onclick="toggleForm()">Choose Condition</h1>

<!-- Form that gets toggled -->
<div id="condition-form" class="flex space-x-4">
    <div class="flex-1">
        <label for="country" class="block text-gray-700 font-semibold mb-2">Interested Country:</label>
        <select id="country" name="country" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            <option value="" disabled selected>Select your Country</option>
            <option value="UK">UK</option>
            <option value="Australia">Australia</option>
            <option value="USA">USA</option>
            <option value="Canada">Canada</option>
        </select>
    </div>

    <div class="flex-1">
        <label for="location" class="block text-gray-700 font-semibold mb-2">Location:</label>
        <input type="text" id="location" name="location" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
    </div>

    <div class="flex-1">
        <label for="level" class="block text-gray-700 font-semibold mb-2">Level:</label>
        <select id="level" name="level" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            <option value="" disabled selected>Select your Level</option>
            <option value="Bachelor">Bachelor</option>
            <option value="Masters">Masters</option>
            <option value="PHD">PHD</option>
        </select>
    </div>
</div>

    <!--Interested condition end here-->


<!--university start here-->
           <h1 id="university-heading" class="cursor-pointer text-green-700 text-left" style="font-size:20px; font-family: 'Poppins';">University Details</h1>
<!-- University, Course, and Intake in One Row -->
<div id="form-containers" class="hidden">
<div class="flex space-x-4" >
  <!-- University Field -->
  <div class="flex-1 relative">
    <label for="university13" class="block text-gray-700 font-semibold mb-2">University1:</label>
    <input type="text" id="university13" name="university13" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required placeholder="Search or add university" oninput="filterUniversities('university13')" autocomplete="off">
    
    <!-- Dropdown that shows the filtered universities -->
    <div id="suggestions-container13" class="hidden absolute left-0 right-0 mt-1 bg-white border border-gray-300 rounded-md shadow-lg max-h-60 overflow-auto z-10">
      <!-- Suggestions will be added here dynamically -->
    </div>
  </div>

  <!-- Course Field -->
  <div class="flex-1">
    <label for="course13" class="block text-gray-700 font-semibold mb-2">Course1:</label>
    <select id="course13" name="course13" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
      <option value="" disabled selected>Select your Course</option>
      <!-- Options will be added dynamically here -->
    </select>
  </div>
  
  <!-- Intake Field -->
  <div class="flex-1">
    <label for="intake13" class="block text-gray-700 font-semibold mb-2">Intake1:</label>
    <select id="intake13" name="intake13" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
      <option value="" disabled selected>Select your Intake</option>
      <option value="Jan">Jan</option>
      <option value="Feb">Feb</option>
      <option value="Mar">Mar</option>
      <option value="Apr">Apr</option>
      <option value="May">May</option>
      <option value="Jun">Jun</option>
      <option value="Jul">Jul</option>
      <option value="Aug">Aug</option>
      <option value="Sep">Sep</option>
      <option value="Oct">Oct</option>
      <option value="Nov">Nov</option>
      <option value="Dec">Dec</option>
    </select>
  </div>
</div>

<div class="flex space-x-4">
  <!-- University Field -->
  <div class="flex-1 relative">
    <label for="university14" class="block text-gray-700 font-semibold mb-2">University2:</label>
    <input type="text" id="university14" name="university14" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required placeholder="Search or add university" oninput="filterUniversities('university14')" autocomplete="off">

    <!-- Dropdown that shows the filtered universities -->
    <div id="suggestions-container14" class="hidden absolute left-0 right-0 mt-1 bg-white border border-gray-300 rounded-md shadow-lg max-h-60 overflow-auto z-10">
      <!-- Suggestions will be added here dynamically -->
    </div>
  </div>

  <!-- Course Field -->
  <div class="flex-1">
    <label for="course14" class="block text-gray-700 font-semibold mb-2">Course2:</label>
    <select id="course14" name="course14" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
      <option value="" disabled selected>Select your Course</option>
      <!-- Options will be added dynamically here -->
    </select>
  </div>

  <!-- Intake Field -->
  <div class="flex-1">
    <label for="intake14" class="block text-gray-700 font-semibold mb-2">Intake2:</label>
    <select id="intake14" name="intake14" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
      <option value="" disabled selected>Select your Intake</option>
      <option value="Jan">Jan</option>
      <option value="Feb">Feb</option>
      <option value="Mar">Mar</option>
      <option value="Apr">Apr</option>
      <option value="May">May</option>
      <option value="Jun">Jun</option>
      <option value="Jul">Jul</option>
      <option value="Aug">Aug</option>
      <option value="Sep">Sep</option>
      <option value="Oct">Oct</option>
      <option value="Nov">Nov</option>
      <option value="Dec">Dec</option>
    </select>
  </div>
</div>

<div class="flex space-x-4">
  <!-- University Field -->
  <div class="flex-1 relative">
    <label for="university15" class="block text-gray-700 font-semibold mb-2">University3:</label>
    <input type="text" id="university15" name="university15" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required placeholder="Search or add university" oninput="filterUniversities('university15')" autocomplete="off">

    <!-- Dropdown that shows the filtered universities -->
    <div id="suggestions-container15" class="hidden absolute left-0 right-0 mt-1 bg-white border border-gray-300 rounded-md shadow-lg max-h-60 overflow-auto z-10">
      <!-- Suggestions will be added here dynamically -->
    </div>
  </div>

  <!-- Course Field -->
  <div class="flex-1">
    <label for="course15" class="block text-gray-700 font-semibold mb-2">Course3:</label>
    <select id="course15" name="course15" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
      <option value="" disabled selected>Select your Course</option>
      <!-- Options will be added dynamically here -->
    </select>
  </div>

  <!-- Intake Field -->
  <div class="flex-1">
    <label for="intake15" class="block text-gray-700 font-semibold mb-2">Intake3:</label>
    <select id="intake15" name="intake15" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
      <option value="" disabled selected>Select your Intake</option>
      <option value="Jan">Jan</option>
      <option value="Feb">Feb</option>
      <option value="Mar">Mar</option>
      <option value="Apr">Apr</option>
      <option value="May">May</option>
      <option value="Jun">Jun</option>
      <option value="Jul">Jul</option>
      <option value="Aug">Aug</option>
      <option value="Sep">Sep</option>
      <option value="Oct">Oct</option>
      <option value="Nov">Nov</option>
      <option value="Dec">Dec</option>
    </select>
  </div>
</div>
</div>

<script>
    // Get the heading and the form container
    const heading = document.getElementById('university-heading');
    const formContainers = document.getElementById('form-containers');
    
    // Toggle the visibility of the form when the heading is clicked
    heading.addEventListener('click', function() {
        formContainers.classList.toggle('hidden');
    });

    // Function to populate each course dropdown with unique data
    function populateCourseDropdown(courseSelectId) {
        const storedValues = JSON.parse(localStorage.getItem('courseValues')) || [];
        const courseSelect = document.getElementById(courseSelectId);
        
        // Clear current options
        courseSelect.innerHTML = '<option value="" disabled selected>Select your Course</option>';
        
        // Add stored course values as options
        storedValues.forEach(course => {
            const newOption = document.createElement("option");
            newOption.value = course;
            newOption.textContent = course;
            courseSelect.appendChild(newOption);
        });
    }

    // Populate all course fields on page load
    document.addEventListener('DOMContentLoaded', () => {
        populateCourseDropdown('course13');
        populateCourseDropdown('course14');
        populateCourseDropdown('course15');
    });

    // Update university input and filter courses accordingly
    function updateUniversityInput(inputId, selectedUniversity) {
        document.getElementById(inputId).value = selectedUniversity;
        hideSuggestions(inputId); // Hide suggestions after selection
        populateCourseDropdown('course' + inputId.replace('university', '')); // Populate corresponding course dropdown
    }

    function filterUniversities(inputId) {
        const input = document.getElementById(inputId).value.toLowerCase();
        const suggestionsContainer = document.getElementById('suggestions-container' + inputId.replace('university', ''));
        const storedUniversities = JSON.parse(localStorage.getItem('universityValues')) || [];

        // Clear previous suggestions
        suggestionsContainer.innerHTML = '';

        if (input.trim() === '') {
            hideSuggestions(inputId);
            return;
        }

        // Filter universities
        const filteredUniversities = storedUniversities.filter(university => university.toLowerCase().includes(input));

        if (filteredUniversities.length === 0) {
            hideSuggestions(inputId);
            return;
        }

        // Show filtered suggestions
        filteredUniversities.forEach(university => {
            const suggestionItem = document.createElement('div');
            suggestionItem.className = 'p-3 cursor-pointer hover:bg-gray-100';
            suggestionItem.textContent = university;

            // When a suggestion is clicked, update the input field
            suggestionItem.onclick = () => updateUniversityInput(inputId, university);
            suggestionsContainer.appendChild(suggestionItem);
        });

        // Show the suggestions container
        suggestionsContainer.classList.remove('hidden');
    }

    function hideSuggestions(inputId) {
        const suggestionsContainer = document.getElementById('suggestions-container' + inputId.replace('university', ''));
        suggestionsContainer.classList.add('hidden');
    }
</script>


<!--university end here-->





<!--processing start here-->
   
<h1 onclick="toggleFormVisibility()" style="font-size:20px; color:green; font-family: 'Poppins';">Processing Details</h1>
<div class="flex space-x-4 items-center" id="form-container" style="display: none;">
    
    <div class="flex-1">
        <label for="document" class="block text-gray-700 font-semibold mb-2">Document Status:</label>
        <select id="document" name="document" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required onchange="toggleInitiatedVisibility()">
            <option value="" disabled selected>Select your Document Status</option>
            <option value="Partially Received">Partially Received</option>
            <option value="Fully Received">Fully Received</option>
            <option value="Initiated For Offer">Initiated For Offer</option>
        </select>
    </div>

    <!-- Second dropdown that will be shown when "Fully Received" is selected -->
    <div class="flex-1 mt-4" id="second-dropdown-container" style="display: none;">
        <label for="additional-info" class="block text-gray-700 font-semibold mb-2">Initiated Offer Information:</label>
        <select id="additional-info" name="additional-info" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="toggleInitiatedByVisibility()">
            <option value="" disabled selected>Select Initiated</option>
            <option value="Not Initiated Offer">Not Initiated Offer</option>
            <option value="Initiated Offer">Initiated Offer</option>
        </select>
    </div>

    <!-- Third dropdown (Initiated by) that will be shown when "Initiated Offer" is selected -->
    <div class="flex-1 mt-4" id="initiated-by-container" style="display: none;">
        <label for="initiated" class="block text-gray-700 font-semibold mb-2">Initiated by:</label>
        <select id="initiated" name="initiated" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="" disabled selected>Select Initiated</option>
            <option value="Gaurav">Gaurav</option>
            <option value="Bikalp">Bikalp</option>
            <option value="Samiksha">Samiksha</option>
            <option value="Ram">Ram</option>
            <option value="Roshan">Roshan</option>
        </select>
    </div>

    <div class="flex-1 mt-4" id="processing-by-container" style="display: none;">
    <label for="processing" class="block text-gray-700 font-semibold mb-2">Processing By:</label>
    <select id="processing" name="processing" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        <option value="" disabled selected>Select your Processing</option>
        <option value="Oxford Group">Oxford Group</option>
        <option value="Study Group">Study Group</option>
        <option value="UWE">UWE</option>
    </select>
</div>
</div>

<script>
    // Function to toggle the visibility of the form
    function toggleFormVisibility() {
        var formContainer = document.getElementById("form-container");
        // Toggle form visibility
        if (formContainer.style.display === "none") {
            formContainer.style.display = "flex"; // Ensure flex layout for multiple columns
        } else {
            formContainer.style.display = "none";
        }
    }

    // Toggle visibility of the second dropdown based on document status
    function toggleInitiatedVisibility() {
        var documentStatus = document.getElementById("document").value;
        var secondDropdownContainer = document.getElementById("second-dropdown-container");

        // Show the second dropdown if "Fully Received" is selected, otherwise hide it
        if (documentStatus === "Fully Received") {
            secondDropdownContainer.style.display = "block";
        } else {
            secondDropdownContainer.style.display = "none";
            document.getElementById("initiated-by-container").style.display = "none";  // Hide "Initiated by" when switching away
        }
    }

    // Toggle visibility of the "Initiated by" dropdown based on the selection in the "Initiated Offer Information" dropdown
    function toggleInitiatedByVisibility() {
        var initiatedOfferInfo = document.getElementById("additional-info").value;
        var initiatedByContainer = document.getElementById("initiated-by-container");

        // Show the "Initiated by" dropdown if "Initiated Offer" is selected, otherwise hide it
        if (initiatedOfferInfo === "Initiated Offer") {
            initiatedByContainer.style.display = "block";
        } else {
            initiatedByContainer.style.display = "none";
        }
    }

     // Get references to the dropdowns
     const initiatedDropdown = document.getElementById("initiated");
    const processingContainer = document.getElementById("processing-by-container");

    // Add an event listener to the "Initiated by" dropdown
    initiatedDropdown.addEventListener("change", function() {
        // Check if a value is selected in the "Initiated by" dropdown
        if (initiatedDropdown.value) {
            // Show the "Processing by" dropdown
            processingContainer.style.display = "block";
        } else {
            // Hide the "Processing by" dropdown if no value is selected
            processingContainer.style.display = "none";
        }
    });
</script>

<!--processing end here-->
           <!-- Submit Button -->
           <div class="flex justify-center mt-6">
               <button type="submit" class="bg-green-500 text-white p-4 rounded-md w-full shadow-md hover:bg-green-600 transition" style="width:100px">Submit</button>
           </div>
       </div>
   </form>
   
             @endif
   
     <!--Bikalp end here-->








          <!-- Interview Dropdown -->
          @if ($showInterview)
            <div class="p-4 border-b">
              <div class="flex flex-col centered-dropdown">
                <label for="interview" class="text-gray-700 font-semibold">INTERVIEW:</label>
                <select id="interview" name="interview" class="mt-2 p-2 border border-gray-300 rounded-md" required>
                  <option value="" disabled selected>Select your INTERVIEW</option>
                  <option value="pass">Pass</option>
                  <option value="failed">Failed</option>
                  <option value="waiting">Waiting</option>
                </select>
              </div>
            </div>
          @endif
         <!--Interview dropdown-->

          <!-- NOC Dropdown -->
          @if ($showNoc)
            <div class="p-4 border-b">
              <div class="flex flex-col centered-dropdown">
                <label for="noc" class="text-gray-700 font-semibold">NOC:</label>
                <select id="noc" name="noc" class="mt-2 p-2 border border-gray-300 rounded-md" required>
                  <option value="" disabled selected>Select your NOC</option>
                  <option value="Applied">Applied</option>
                  <option value="Not Applied">Not Applied</option>
                  <option value="Received">Received</option>
                </select>
              </div>
            </div>
          @endif
        </div>
      </main>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4">
      <p>&copy; 2024 WRI Education Consultancy. All rights reserved.</p>
      <a href="#" class="footer-link">Privacy Policy</a> | 
      <a href="#" class="footer-link">Terms of Service</a>
    </footer>
  </div>

  <!-- Font Awesome JS -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
