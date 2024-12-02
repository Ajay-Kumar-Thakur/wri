<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&family=Poppins:wght@100;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #f7f7f7;
            padding: 20px;
            margin: 0;
        }

        .header-container {
            text-align: center;
            margin-bottom: 30px;
        }

        h2 {
            color: #333;
            font-weight: 600;
            font-size: 32px;
            color: #0066cc;
        }

        form {
            background: white;
            padding: 40px;
            margin: 0 auto;
            width: 100%;
            max-width: 1000px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: 600;
            color: #333;
            font-size: 18px;
        }

        input, select {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: blue;
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 18px;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 15%;
            margin-top: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        input[type="submit"]:hover {
            background-color: #305cde;
        }

        .row {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .row div {
            flex: 1;
            min-width: 300px;
        }

        .button-container {
            text-align: center;
        }

        .success-message {
            color: green;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .remarks-container {
    margin-bottom: 20px;  
}

.remarks-container label {
    display: block;  
    font-weight: bold;
    margin-bottom: 8px;  
    color: #333;  
}

.remarks-container textarea {
    width: 100%;  
    padding: 10px;  
    font-size: 14px;  
    border: 1px solid #ccc;  
    border-radius: 5px;  
    resize: vertical;  
    min-height: 100px;  
    box-sizing: border-box;  
}

.remarks-container textarea:focus {
    border-color: #007bff;  
    outline: none;  
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);  
}

.remarks-container textarea::placeholder {
    color: #888;  
    font-style: Arial, Helvetica, sans-serif;  
}


.remarks-container textarea:invalid {
    border-color: #ccc; 
}
/* Styling for form elements */
/* label, input, button, select {
            margin-bottom: 10px;
            padding: 5px;
        } */

        /* Styling the university list section */
        #university-list {
            margin-top: 20px;
        }

        .university-item {
            margin: 5px 0;
            font-size: 16px;
        }

        /* Flex container for form elements */
        #university-container {
            display: flex;
            flex-direction: column;
            max-width: 300px;
        }

        /* Margin styling for individual form elements */
        #university-container div {
            margin-bottom: 15px;
        }

        /* Style for the search input */
        #university-input {
            position: relative;
            width: 100%;
        }

        /* Style for the dropdown list */
        #suggestions {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            max-height: 200px;
            overflow-y: auto;
            border: 1px solid #ccc;
            background-color: #fff;
            z-index: 100;
            display: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        #suggestions li {
            padding: 8px;
            cursor: pointer;
        }

        #suggestions li:hover {
            background-color: #f0f0f0;
        }

        /* Hide the university list by default */
        #university-list-items {
            display: none;
        }
        .btn-add{
            margin-bottom:20px;
        }
      
        #university-dropdown{
            margin-bottom:10px;
        }
        
    </style>
</head>
<body>

    <!-- Success Message (if any) -->
    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <form action="{{ route('backend.form.store') }}" method="POST">
    @csrf

    <div class="header-container">
        <h2>Registration Form</h2>
    </div>

    <div class="row">
        
        <div>
    <label for="source">Source:</label>
    <select id="source" name="source" required>
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

<div>
    <label for="newSource">Add New Source:</label>
    <input type="text" id="newSource" name="newSource" placeholder="Enter name to add">
    <button type="button" class="btn btn-add" onclick="addsource()">Add</button>
    <button type="button" class="btn btn-remove" onclick="removesource()">Remove</button>
</div>

<script>
   
    // Load existing sources from local storage when the page loads
    window.onload = function() {
        loadSources();
    };

    // Function to load sources from local storage into the dropdown
    function loadSources() {
        var select = document.getElementById("source");
        var sources = JSON.parse(localStorage.getItem("sources")) || [];

        // Clear current options except the default placeholder
        select.innerHTML = '<option value="" disabled selected>Select your Source</option>';

        // Add options from localStorage
        sources.forEach(function(source) {
            var option = document.createElement("option");
            option.value = source;
            option.textContent = source;
            select.appendChild(option);
        });
    }

    // Function to add a new source to the dropdown and local storage
    function addsource() {
        var select = document.getElementById("source");
        var newSourceName = document.getElementById("newSource").value.trim();

        if (newSourceName) {
            // Check if the source already exists in localStorage
            var sources = JSON.parse(localStorage.getItem("sources")) || [];

            // Check if the source already exists in localStorage or the dropdown
            if (sources.includes(newSourceName) || isSourceInDropdown(newSourceName)) {
                alert("This source already exists.");
                return; // Prevent adding the source again
            }

            // Add the new source to the dropdown
            var newOption = document.createElement("option");
            newOption.value = newSourceName;
            newOption.textContent = newSourceName;
            select.appendChild(newOption);

            // Save the new source in local storage
            sources.push(newSourceName);
            localStorage.setItem("sources", JSON.stringify(sources));

            // Clear the input field after adding
            document.getElementById("newSource").value = "";
        } else {
            alert("Please enter a name.");
        }
    }

    // Helper function to check if the source already exists in the dropdown options
    function isSourceInDropdown(source) {
        var select = document.getElementById("source");
        for (var i = 0; i < select.options.length; i++) {
            if (select.options[i].value === source) {
                return true;
            }
        }
        return false;
    }

    // Function to remove the selected source from the dropdown and local storage
    function removesource() {
        var select = document.getElementById("source");
        var selectedOption = select.options[select.selectedIndex];

        // Check if an option is selected and it's not the placeholder
        if (selectedOption && selectedOption.value !== "") {
            // Remove from dropdown
            select.removeChild(selectedOption);

            // Remove from local storage
            var sources = JSON.parse(localStorage.getItem("sources")) || [];
            var index = sources.indexOf(selectedOption.value);
            if (index !== -1) {
                sources.splice(index, 1);
                localStorage.setItem("sources", JSON.stringify(sources));
            }
        } else {
            alert("Please select a name to remove.");
        }
    }

</script>

    </div>

    <div class="row">
    <div>
            <label for="handled">Students Handled By:</label>
            <select id="handled" name="handled" required>
                <option value="" disabled selected>Select your Students Handled By</option>
                <option value="Gaurav">Gaurav</option>
                <option value="Roshan">Roshan</option>
                <option value="Ram">Ram</option>
                <option value="Samiksha">Samiksha</option>
                <option value="Bikalp">Bikalp</option>
            </select>
        </div>
        <div>
        <label for="newStudent">Add New Students Handled By:</label>
        <input type="text" id="newStudent" name="handled" placeholder="Enter name to add">
        <button class="btn btn-add" onclick="addStudent()">Add</button>
        <button class="btn btn-remove" onclick="removeStudent()">Remove</button>
    </div>
    <script>
        // Function to add a new student to the dropdown
        function addStudent() {
            var select = document.getElementById("handled");
            var newStudentName = document.getElementById("newStudent").value.trim();

            if (newStudentName) {
                var newOption = document.createElement("option");
                newOption.value = newStudentName;
                newOption.textContent = newStudentName;
                select.appendChild(newOption);

                // Clear the input field after adding
                document.getElementById("newStudent").value = "";
            } else {
                alert("Please enter a student name.");
            }
        }

        // Function to remove the selected student from the dropdown
        function removeStudent() {
            var select = document.getElementById("handled");
            var selectedOption = select.options[select.selectedIndex];

            if (selectedOption && selectedOption.value !== "") {
                select.removeChild(selectedOption);
            } else {
                alert("Please select a student to remove.");
            }
        }
    </script>
        
    </div>

    <div class="row">
    <div>
            <label for="name">Name of Students:</label>
            <input type="text" id="name" name="name" required>
        </div>
        
        <div>
            <label for="email">Email ID:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required placeholder="+977">
        </div>
    </div>


    <div class="row">
    <div id="university-container">
    <!-- Add/Search University Section -->
    <div>
        <label for="university-input">University:</label>
        <input type="text" id="university-input" name="university" style="width:300px;" placeholder="Enter or search University" oninput="filterUniversities()">
        <label for="university-dropdown">Select University:</label>
        <select id="university-dropdown" name="university">
            <option value="">-- Select University --</option>
        </select>
    </div>

    <!-- Button to Add University -->
    <div>
        <button class="btn" onclick="addUniversity()">Add University</button>
        <button onclick="deleteUniversity()">Delete University</button>
    </div>

    <!-- List to Display Universities (Initially Hidden) -->
    <ul id="university-list-items"></ul>

    <!-- Suggestions Dropdown -->
    <ul id="suggestions"></ul>

</div>

<script>
    let universities = [];

    // Load universities from localStorage when the page loads
    function loadUniversities() {
        const storedUniversities = localStorage.getItem('universities');
        if (storedUniversities) {
            universities = JSON.parse(storedUniversities);
        }
        displayUniversities();
        updateDropdown();
        showDropdownIfNeeded();
    }

    // Save universities to localStorage
    function saveUniversities() {
        localStorage.setItem('universities', JSON.stringify(universities));
    }

    // Add a new university to the list
    function addUniversity() {
        const universityInput = document.getElementById('university-input');
        const universityName = universityInput.value.trim();

        // Validation: Ensure the input is not empty and not a duplicate
        if (universityName === "") {
            alert("Please enter a university name.");
            return;
        }
        if (universities.includes(universityName)) {
            alert("This university has already been added.");
            return;
        }

        // Add to universities array
        universities.push(universityName);

        // Clear input field after adding
        universityInput.value = "";

        // Save to localStorage
        saveUniversities();

        // Update the list, dropdown, and suggestions
        displayUniversities();
        updateDropdown();
        filterUniversities();

        // Show the dropdown and hide the university list
        document.getElementById('university-list-items').style.display = 'none';
        document.getElementById('university-dropdown').style.display = 'block';
    }

    // Display the full list of universities
    function displayUniversities() {
        const listContainer = document.getElementById('university-list-items');
        listContainer.innerHTML = ""; // Clear the existing list

        universities.forEach(function(university) {
            const listItem = document.createElement('li');
            listItem.classList.add('university-item');
            listItem.textContent = university;
            listContainer.appendChild(listItem);
        });

        // Show the university list when there are universities
        listContainer.style.display = universities.length > 0 ? 'block' : 'none';
    }

    // Update the dropdown with current universities
    function updateDropdown() {
        const dropdown = document.getElementById('university-dropdown');
        dropdown.innerHTML = '<option value="">-- Select University --</option>'; // Clear existing options
        universities.forEach(function(university) {
            const option = document.createElement('option');
            option.value = university;
            option.textContent = university;
            dropdown.appendChild(option);
        });
    }

    // Filter universities based on input value
    function filterUniversities() {
        const input = document.getElementById('university-input').value.trim().toLowerCase();
        const suggestionsContainer = document.getElementById('suggestions');

        // If input is empty, hide suggestions
        if (!input) {
            suggestionsContainer.style.display = 'none';
            return;
        }

        // Filter the universities array based on the input
        const filteredUniversities = universities.filter(function(university) {
            return university.toLowerCase().includes(input);
        });

        // Show filtered suggestions
        suggestionsContainer.innerHTML = ""; // Clear the existing suggestions

        if (filteredUniversities.length > 0) {
            filteredUniversities.forEach(function(university) {
                const suggestionItem = document.createElement('li');
                suggestionItem.textContent = university;
                suggestionItem.onclick = function() {
                    document.getElementById('university-input').value = university;
                    suggestionsContainer.style.display = 'none';
                };
                suggestionsContainer.appendChild(suggestionItem);
            });
            suggestionsContainer.style.display = 'block'; // Show suggestions
        } else {
            suggestionsContainer.style.display = 'none'; // Hide suggestions if no match
        }
    }

    // Delete a university from the list
    function deleteUniversity() {
        const universityDropdown = document.getElementById('university-dropdown');
        const selectedUniversity = universityDropdown.value;

        // Validation: Ensure a university is selected
        if (!selectedUniversity) {
            alert("Please select a university to delete.");
            return;
        }

        // Remove the selected university from the universities array
        universities = universities.filter(function(university) {
            return university !== selectedUniversity;
        });

        // Save the updated list to localStorage
        saveUniversities();

        // Update the dropdown and the list
        displayUniversities();
        updateDropdown();

        // Optionally, hide the dropdown if there are no universities left
        if (universities.length === 0) {
            document.getElementById('university-dropdown').style.display = 'none';
        }

        // Clear the input field after deletion
        document.getElementById('university-input').value = "";
    }

    // Show the dropdown if there are universities stored
    function showDropdownIfNeeded() {
        if (universities.length > 0) {
            document.getElementById('university-dropdown').style.display = 'block';
            document.getElementById('university-list-items').style.display = 'none';
        }
    }

    // Load universities when the page loads
    window.onload = function() {
        loadUniversities();
    };
</script>

        <div>
            <label for="intake">Intake:</label>
            <select id="intake" name="intake"  required>
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


    <div class="row">
        <div>
            <label for="country">Interested Country:</label>
            <select id="country" name="country" required>
                <option value="" disabled selected>Select your country</option>
                <option value="UK">UK</option>
                <option value="Australia">Australia</option>
                <option value="USA">USA</option>
                <option value="Canada">Canada</option>
            </select>
        </div>
        <div>
            <label for="level">Level:</label>
            <select id="level" name="level" required>
                <option value="" disabled selected>Select your Level</option>
                <option value="Bachelor">Bachelor</option>
                <option value="Masters">Masters</option>
                <option value="PHD">PHD</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div>
            <label for="course">Course:</label>
            <select id="course" name="course" required>
                <option value="" disabled selected>Select your Course</option>
                <option value="IELTS">IELTS</option>
                <option value="PTE">PTE</option>
                <option value="Dulingo">Dulingo</option>
                <option value="ELLT">ELLT</option>
                <option value="No Test">No Test</option>
            </select>
        </div>
        <div>
    <label for="newCourse">Add New Course By:</label>
    <input type="text" id="newCourse" name="newCourse" placeholder="Enter name to Course">
    <button type="button" class="btn btn-add" onclick="addCourse()">Add</button>
    <button type="button" class="btn btn-remove" onclick="removeCourse()">Remove</button>
</div>



<script>
    // Function to add a new name to the dropdown and store it in localStorage
    function addCourse() {
        var select = document.getElementById("course");
        var newCourseName = document.getElementById("newCourse").value.trim();

        if (newCourseName) {
            // Get the stored course names from localStorage (or an empty array if not present)
            var storedCourseNames = JSON.parse(localStorage.getItem("courseNames")) || [];

            // Check if the new course name already exists in the list
            if (storedCourseNames.includes(newCourseName)) {
                alert("This course has already been added.");
                return; // Exit the function if the name exists
            }

            // Create a new option element and add it to the select dropdown
            var newOption = document.createElement("option");
            newOption.value = newCourseName;
            newOption.textContent = newCourseName;
            select.appendChild(newOption);

            // Add the new name to the list and update localStorage
            storedCourseNames.push(newCourseName);
            localStorage.setItem("courseNames", JSON.stringify(storedCourseNames));

            // Clear the input field after adding
            document.getElementById("newCourse").value = "";
        } else {
            alert("Please enter a course name.");
        }
    }

    // Function to remove the selected name from the dropdown and update localStorage
    function removeCourse() {
        var select = document.getElementById("course");
        var selectedOption = select.options[select.selectedIndex];

        // Check if an option is selected and it's not the placeholder
        if (selectedOption && selectedOption.value !== "") {
            // Remove the selected option from the dropdown
            select.removeChild(selectedOption);

            // Get the stored course names from localStorage
            var storedCourseNames = JSON.parse(localStorage.getItem("courseNames")) || [];

            // Remove the name from the stored array
            var index = storedCourseNames.indexOf(selectedOption.value);
            if (index > -1) {
                storedCourseNames.splice(index, 1);
            }

            // Update localStorage with the modified list
            localStorage.setItem("courseNames", JSON.stringify(storedCourseNames));
        } else {
            alert("Please select a course to remove.");
        }
    }

    // Function to load the stored course names from localStorage
    function loadCourseNames() {
        var storedCourseNames = JSON.parse(localStorage.getItem("courseNames"));

        if (storedCourseNames) {
            var select = document.getElementById("course");

            // Add the stored options back to the dropdown
            for (var i = 0; i < storedCourseNames.length; i++) {
                var newOption = document.createElement("option");
                newOption.value = storedCourseNames[i];
                newOption.textContent = storedCourseNames[i];
                select.appendChild(newOption);
            }
        }
    }

    // Load the saved options when the page loads
    window.onload = function() {
        loadCourseNames();
    };
</script>


<div>
    <label for="processing">Processing By:</label>
    <select id="processing" name="processing" required>
        <option value="" disabled selected>Select your Processing By</option>
        <option value="Oxford Group">Oxford Group</option>
        <option value="Study Group">Study Group</option>
        <option value="UWE">UWE</option>
    </select>
</div>
<div>
    <label for="newProcessing">Add New Processing By:</label><br/>
    <input type="text" id="newProcessing" name="newProcessing" style="width:450px;" placeholder="Enter name to add"><br/>
    <button type="button" class="btn btn-add" onclick="addProcessing()">Add</button>
    <button type="button" class="btn btn-remove" onclick="removeProcessing()">Remove</button>
</div>

<script>
    // Function to add a new name to the dropdown and store it in localStorage
    function addProcessing() {
        var select = document.getElementById("processing");
        var newProcessingName = document.getElementById("newProcessing").value.trim();

        if (newProcessingName) {
            // Get the stored processing names from localStorage (or an empty array if not present)
            var storedProcessingNames = JSON.parse(localStorage.getItem("processingNames")) || [];

            // Check if the new processing name already exists in the list
            if (storedProcessingNames.includes(newProcessingName)) {
                alert("This name has already been added.");
                return; // Exit the function if the name exists
            }

            // Create a new option element and add it to the select dropdown
            var newOption = document.createElement("option");
            newOption.value = newProcessingName;
            newOption.textContent = newProcessingName;
            select.appendChild(newOption);

            // Add the new name to the list and update localStorage
            storedProcessingNames.push(newProcessingName);
            localStorage.setItem("processingNames", JSON.stringify(storedProcessingNames));

            // Clear the input field after adding
            document.getElementById("newProcessing").value = "";
        } else {
            alert("Please enter a name.");
        }
    }

    // Function to remove the selected name from the dropdown and update localStorage
    function removeProcessing() {
        var select = document.getElementById("processing");
        var selectedOption = select.options[select.selectedIndex];

        // Check if an option is selected and it's not the placeholder
        if (selectedOption && selectedOption.value !== "") {
            // Remove the selected option from the dropdown
            select.removeChild(selectedOption);

            // Get the stored processing names from localStorage
            var storedProcessingNames = JSON.parse(localStorage.getItem("processingNames")) || [];

            // Remove the name from the stored array
            var index = storedProcessingNames.indexOf(selectedOption.value);
            if (index > -1) {
                storedProcessingNames.splice(index, 1);
            }

            // Update localStorage with the modified list
            localStorage.setItem("processingNames", JSON.stringify(storedProcessingNames));
        } else {
            alert("Please select a name to remove.");
        }
    }

    // Function to load the stored processing names from localStorage
    function loadProcessingNames() {
        var storedProcessingNames = JSON.parse(localStorage.getItem("processingNames"));

        if (storedProcessingNames) {
            var select = document.getElementById("processing");

            // Clear any dynamically added options before loading new ones
            while (select.options.length > 3) {  // Keep the default options intact
                select.remove(3);  // Remove added options (index 3 and onwards)
            }

            // Add the stored options back to the dropdown
            for (var i = 0; i < storedProcessingNames.length; i++) {
                var newOption = document.createElement("option");
                newOption.value = storedProcessingNames[i];
                newOption.textContent = storedProcessingNames[i];
                select.appendChild(newOption);
            }
        }
    }

    // Load the saved options when the page loads
    window.onload = function() {
        loadProcessingNames();
    };
</script>



    </div>

    <div class="row">
    <div>
            <label for="english">English Language Test:</label>
            <select id="english" name="english" required>
                <option value="" disabled selected>Select your English Language Test</option>
                <option value="IELTS">IELTS</option>
                <option value="PTE">PTE</option>
                <option value="ELLT">ELLT</option>
                <option value="No Test">No Test</option>
                <option value="MOI">MOI</option>
            </select>
        </div>
        <div>
            <label for="gpa">GPA:</label>
            <input type="number" id="gpa" name="gpa" step="0.01" required>
        </div>
    </div>

    <div class="row">
        <div>
            <label for="passed">Passed Year:</label>
            <select id="passed" name="passed" required>
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
        <div>
            <label for="document">Document Status:</label>
            <select id="document" name="document" required>
                <option value="" disabled selected>Select your Document Status</option>
                <option value="Partially Received">Partially Received</option>
                <option value="Fully Received">Fully Received</option>
                <option value="Initiated For Offer">Initiated For Offer</option>
            </select>
        </div>
    </div>

    <div class="row">
    <div class="remarks-container">
    <label for="remarks">Remarks:</label>
    <textarea id="remarks" name="remarks" required placeholder="Enter your remarks here"></textarea>
</div>


<div>
    <label for="initiated">Offer Initiated by:</label>
    <select id="initiated" name="initiated" required>
        <option value="" disabled selected>Select your Offer Initiated by</option>
        <option value="Gaurav">Gaurav</option>
        <option value="Rabin">Bikalp</option>
        <option value="Samiksha">Samiksha</option>
        <option value="Ram">Ram</option>
        <option value="Roshan">Roshan</option>
    </select>
</div>

<div>
    <label for="newInitiated">Add New Offer Initiated by:</label>
    <input type="text" id="newInitiated" name="newInitiated" placeholder="Enter name to add">
    <button type="button" class="btn btn-add" onclick="addinitiated()">Add</button>
    <button type="button" class="btn btn-remove" onclick="removeinitiated()">Remove</button>
</div>

<script>
    // Initialize the dropdown with data from localStorage
    window.onload = function() {
        loadInitiatedOptions();
    }

    // Function to load options from localStorage
    function loadInitiatedOptions() {
        var select = document.getElementById("initiated");
        var initiatedList = JSON.parse(localStorage.getItem("initiatedList")) || [];

        // Add options to the dropdown from localStorage or default list
        initiatedList.forEach(function(name) {
            var newOption = document.createElement("option");
            newOption.value = name;
            newOption.textContent = name;
            select.appendChild(newOption);
        });
    }

    // Function to add a new name to the dropdown and store it in localStorage (no duplicates)
    function addinitiated() {
        var select = document.getElementById("initiated");
        var newInitiatedName = document.getElementById("newInitiated").value.trim();

        if (newInitiatedName) {
            // Get the current list from localStorage
            var initiatedList = JSON.parse(localStorage.getItem("initiatedList")) || [];

            // Check if the name already exists in the list
            if (initiatedList.indexOf(newInitiatedName) === -1) {
                // If it's not already in the list, add it to the dropdown
                var newOption = document.createElement("option");
                newOption.value = newInitiatedName;
                newOption.textContent = newInitiatedName;
                select.appendChild(newOption);

                // Save the new name to localStorage
                initiatedList.push(newInitiatedName);
                localStorage.setItem("initiatedList", JSON.stringify(initiatedList));

                // Clear the input field after adding
                document.getElementById("newInitiated").value = "";
            } else {
                alert("This name has already been added.");
            }
        } else {
            alert("Please enter a name.");
        }
    }

    // Function to remove the selected name from the dropdown and localStorage
    function removeinitiated() {
        var select = document.getElementById("initiated");
        var selectedOption = select.options[select.selectedIndex];

        // Check if an option is selected and it's not the placeholder
        if (selectedOption && selectedOption.value !== "") {
            // Remove from dropdown
            select.removeChild(selectedOption);

            // Remove from localStorage
            var initiatedList = JSON.parse(localStorage.getItem("initiatedList")) || [];
            var index = initiatedList.indexOf(selectedOption.value);
            if (index > -1) {
                initiatedList.splice(index, 1);  // Remove the selected name
                localStorage.setItem("initiatedList", JSON.stringify(initiatedList));
            }
        } else {
            alert("Please select a name to remove.");
        }
    }
</script>
  
        

    </div>



    <div class="row">
        <div>
            <label for="interview">Interview:</label>
            <select id="interview" name="interview" required>
                <option value="" disabled selected>Select your Interview:</option>
                <option value="No Need">No Need</option>
                <option value="pass">Pass</option>
                <option value="Failed">Failed</option>
                <option value="Waiting">Waiting</option>
            </select>
        </div>
        <div>
            <label for="visa">Visa:</label>
            <select id="visa" name="visa" required>
                <option value="" disabled selected>Select your Visa</option>
                <option value="Applied">Applied</option>
                <option value="Granted">Granted</option>
                <option value="Declined">Declined</option>
            </select>
        </div>
    </div>

    
    <div class="row">
        <div>
            <label for="noc">NOC:</label>
            <select id="noc" name="noc" required>
                <option value="" disabled selected>Select your NOC</option>
                <option value="Applied">Applied</option>
                <option value="Not Applied">Not Applied</option>
                <option value="Received">Received</option>
            </select>
        </div>
        <div>
            <label for="fess">Fees:</label>
            <select id="fees" name="fees" required>
                <option value="" disabled selected>Select your Fees</option>
                <option value="Paid">Paid</option>
                <option value="Pending">Pending</option>
            </select>
        </div>
    </div>



    <div class="row">
        <div>
            <label for="amount">Fees:</label>
            <input type="number" id="amount" name="amount" required>
        </div>
        <div>
            <label for="scholarship">Scholarship:</label>
            <input type="text" id="scholarship" name="scholarship" required>
        </div>
    </div>




    <div class="row">
        <div>
            <label for="offer" style="width:50px;">Offer Status:</label><br/>
            <select id="offer" name="offer" required style="width:490px;">
                <option value="" disabled selected>Select your Offer Status</option>
                <option value="Conditional">Conditional</option>
                <option value="UnConditional">UnConditional</option>
                <option value="Not Received">Not Received</option>
            </select>
        </div>
    </div>

    <div class="button-container">
        <input type="submit" value="Submit">
    </div>
</form>

</body>
</html>
