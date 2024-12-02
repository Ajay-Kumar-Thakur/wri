<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Registration Form</title>

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

        input,
        select {
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

    </style>
</head>

<body>

    <!-- Success Message (if any) -->
    @if(session('success'))
    <div class="success-message">{{ session('success') }}</div>
    @endif

    <!-- Form Action: Update -->
    <form action="{{ route('backend.form.update', $form->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="header-container">
            <h2>Update Registration Form</h2>
        </div>

        <div class="row">
            
            <div>
                <label for="source">Source:</label>
                <select id="source" name="source" required>
                    <option value="" disabled>Select your Source</option>
                    <option value="Edulink,Ananta Sir" {{ old('source', $form->source) == 'Edulink,Ananta Sir' ? 'selected' : '' }}>Edulink,Ananta Sir</option>
                    <option value="Crystal Education" {{ old('source', $form->source) == 'Crystal Education' ? 'selected' : '' }}>Crystal Education</option>
                    <option value="Crystal Education Butwal" {{ old('source', $form->source) == 'Crystal Education Butwal' ? 'selected' : '' }}>Crystal Education Butwal</option>
                    <option value="Boston" {{ old('source', $form->source) == 'Boston' ? 'selected' : '' }}>Boston</option>
                    <option value="Brighton" {{ old('source', $form->source) == 'Brighton' ? 'selected' : '' }}>Brighton</option>
                    <option value="Dream Unique" {{ old('source', $form->source) == 'Dream Unique' ? 'selected' : '' }}>Dream Unique</option>
                    <option value="Evani Education" {{ old('source', $form->source) == 'Evani Education' ? 'selected' : '' }}>Evani Education</option>
                    <option value="Fortune Education" {{ old('source', $form->source) == 'Fortune Education' ? 'selected' : '' }}>Fortune Education</option>
                    <option value="Lead Ahead" {{ old('source', $form->source) == 'Lead Ahead' ? 'selected' : '' }}>Lead Ahead</option>
                    <option value="Manohar Sir" {{ old('source', $form->source) == 'Manohar Sir' ? 'selected' : '' }}>Manohar Sir</option>
                    <option value="Merit Itahari" {{ old('source', $form->source) == 'Merit Itahari' ? 'selected' : '' }}>Merit Itahari</option>
                    <option value="Merit Putalisadak" {{ old('source', $form->source) == 'Merit Putalisadak' ? 'selected' : '' }}>Merit Putalisadak</option>
                    <option value="Merit Britamod" {{ old('source', $form->source) == 'Merit Britamod' ? 'selected' : '' }}>Merit Britamod</option>
                    <option value="Merit Butwal" {{ old('source', $form->source) == 'Merit Butwal' ? 'selected' : '' }}>Merit Butwal</option>
                    <option value="Mirai Global" {{ old('source', $form->source) == 'Mirai Global' ? 'selected' : '' }}>Mirai Global</option>
                    <option value="Prashant Sir" {{ old('source', $form->source) == 'Prashant Sir' ? 'selected' : '' }}>Prashant Sir</option>
                    <option value="Achivers Sujan" {{ old('source', $form->source) == 'Achivers Sujan' ? 'selected' : '' }}>Achivers Sujan</option>
                    <option value="Swift/Skyway Education Banepa" {{ old('source', $form->source) == 'Swift/Skyway Education Banepa' ? 'selected' : '' }}>Swift/Skyway Education Banepa</option>
                    <option value="Tesla" {{ old('source', $form->source) == 'Tesla' ? 'selected' : '' }}>Tesla</option>
                    <option value="VXL" {{ old('source', $form->source) == 'VXL' ? 'selected' : '' }}>VXL</option>
                    <option value="Pro Visa(Professional Visa & Education Services)" {{ old('source', $form->source) == 'Pro Visa(Professional Visa & Education Services)' ? 'selected' : '' }}>Pro Visa(Professional Visa & Education Services)</option>
                    <option value="Achievers Putalisadak" {{ old('source', $form->source) == 'Achievers Putalisadak' ? 'selected' : '' }}>Achievers Putalisadak</option>
                    <option value="Jay Prakash SEC Nepal" {{ old('source', $form->source) == 'Jay Prakash SEC Nepal' ? 'selected' : '' }}>Jay Prakash SEC Nepal</option>
                    <option value="Rajesh Rightpath" {{ old('source', $form->source) == 'Rajesh Rightpath' ? 'selected' : '' }}>Rajesh Rightpath</option>
                    <option value="Rounak Janakpur" {{ old('source', $form->source) == 'Rounak Janakpur' ? 'selected' : '' }}>Rounak Janakpur</option>
                    <option value="Carl Duisburg" {{ old('source', $form->source) == 'Carl Duisburg' ? 'selected' : '' }}>Carl Duisburg</option>
                    <option value="Study Connect" {{ old('source', $form->source) == 'Study Connect' ? 'selected' : '' }}>Study Connect</option>
                    <option value="Ved International" {{ old('source', $form->source) == 'Ved International' ? 'selected' : '' }}>Ved International</option>
                    <option value="Big Education" {{ old('source', $form->source) == 'Big Education' ? 'selected' : '' }}>Big Education</option>
                    <option value="Read and Fly" {{ old('source', $form->source) == 'Read and Fly' ? 'selected' : '' }}>Read and Fly</option>
                    <option value="Eduport" {{ old('source', $form->source) == 'Eduport' ? 'selected' : '' }}>Eduport</option>
                    <option value="Goodlife Career(No Contact)" {{ old('source', $form->source) == 'Goodlife Career(No Contact)' ? 'selected' : '' }}>Goodlife Career(No Contact)</option>
                    <option value="WRI" {{ old('source', $form->source) == 'WRI' ? 'selected' : '' }}>WRI</option>
                    <option value="Frequency Eduhub" {{ old('source', $form->source) == 'Frequency Eduhub' ? 'selected' : '' }}>Frequency Eduhub</option>
                    <option value="Metro" {{ old('source', $form->source) == 'Metro' ? 'selected' : '' }}>Metro</option>
                    <option value="Highlight" {{ old('source', $form->source) == 'Highlight' ? 'selected' : '' }}>Highlight</option>
                    <option value="Career Guidance(CG)" {{ old('source', $form->source) == 'Career Guidance(CG)' ? 'selected' : '' }}>Career Guidance(CG)</option>
                    <option value="Vira Education" {{ old('source', $form->source) == 'Vira Education' ? 'selected' : '' }}>Vira Education</option>
                    <option value="Goals Education(My Journey Franchise)" {{ old('source', $form->source) == 'Goals Education(My Journey Franchise)' ? 'selected' : '' }}>Goals Education(My Journey Franchise)</option>
                    <option value="Mile Stone Services, Madhu Dai" {{ old('source', $form->source) == 'Mile Stone Services, Madhu Dai' ? 'selected' : '' }}>Mile Stone Services, Madhu Dai</option>
                    <option value="Lernovate, Pokhara" {{ old('source', $form->source) == 'Lernovate, Pokhara' ? 'selected' : '' }}>Lernovate, Pokhara</option>
                    <option value="Titan Education Service, Bagbazar" {{ old('source', $form->source) == 'Titan Education Service, Bagbazar' ? 'selected' : '' }}>Titan Education Service, Bagbazar</option>
                    <option value="Scholarchoice" {{ old('source', $form->source) == 'Scholarchoice' ? 'selected' : '' }}>Scholarchoice</option>
                    <option value="Peak Education" {{ old('source', $form->source) == 'Peak Education' ? 'selected' : '' }}>Peak Education</option>
                    <option value="ANZ Education Services" {{ old('source', $form->source) == 'ANZ Education Services' ? 'selected' : '' }}>ANZ Education Services</option>
                    <option value="Migration Mithila" {{ old('source', $form->source) == 'Migration Mithila' ? 'selected' : '' }}>Migration Mithila</option>
                    <option value="Elite Apprentice Education Consultancy" {{ old('source', $form->source) == 'Elite Apprentice Education Consultancy' ? 'selected' : '' }}>Elite Apprentice Education Consultancy</option>
                    <option value="Apply Abroad" {{ old('source', $form->source) == 'Apply Abroad' ? 'selected' : '' }}>Apply Abroad</option>
                    <option value="White House & WRI Partnership" {{ old('source', $form->source) == 'White House & WRI Partnership' ? 'selected' : '' }}>White House & WRI Partnership</option>
                    <option value="Tesla" {{ old('source', $form->source) == 'Tesla' ? 'selected' : '' }}>Tesla</option>
                    <option value="Study Hub" {{ old('source', $form->source) == 'Study Hub' ? 'selected' : '' }}>Study Hub</option>
                    <option value="Elite Movers Education consultancy Pvt. Ltd" {{ old('source', $form->source) == 'Elite Movers Education consultancy Pvt. Ltd' ? 'selected' : '' }}>Elite Movers Education consultancy Pvt. Ltd</option>
                    <option value="ICAN Eduction Services" {{ old('source', $form->source) == 'ICAN Eduction Services' ? 'selected' : '' }}>ICAN Eduction Services</option>
                    <option value="Real World" {{ old('source', $form->source) == 'Real World' ? 'selected' : '' }}>Real World</option>
                    <option value="Paragraph" {{ old('source', $form->source) == 'Paragraph' ? 'selected' : '' }}>Paragraph</option>
                    <option value="Edurise" {{ old('source', $form->source) == 'Edurise' ? 'selected' : '' }}>Edurise</option>
                </select>
            </div>
        </div>

        <div class="row">
        <div>
                <label for="handled">Students Handled By:</label>
                <select id="handled" name="handled" required>
                    <option value="" disabled>Select your Students Handled By</option>
                    <option value="Gaurav" {{ old('handled', $form->handled) == 'Gaurav' ? 'selected' : '' }}>Gaurav</option>
                    <option value="Roshan" {{ old('handled', $form->handled) == 'Roshan' ? 'selected' : '' }}>Roshan</option>
                    <option value="Ram" {{ old('handled', $form->handled) == 'Ram' ? 'selected' : '' }}>Ram</option>
                    <option value="Samiksha" {{ old('handled', $form->handled) == 'Samiksha' ? 'selected' : '' }}>Samiksha</option>
                    <option value="Bikalp" {{ old('handled', $form->handled) == 'Bikalp' ? 'selected' : '' }}>Bikalp</option>
                </select>
            </div>
            <div>
                <label for="name">Name of Students:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $form->name) }}" required>
            </div>
        </div>

        <div class="row">
            <div>
                <label for="email">Email ID:</label>
                <input type="email" id="email" name="email" value="{{ old('email', $form->email) }}" required>
            </div>
            <div>
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone', $form->phone) }}" required placeholder="+977">
            </div>
        </div>


        <div class="row">
        <div>
            <label for="university">University:</label>
            <input type="text" id="university" name="university" value="{{ old('university', $form->university) }}" required>
        </div>
            <div>
                <label for="intake">Intake:</label>
                <select id="intake" name="intake" required>
                    <option value="" disabled>Select your Intake</option>
                    <option value="Jan" {{ old('intake', $form->intake) == 'Jan' ? 'selected' : '' }}>Jan</option>
                    <option value="Feb" {{ old('intake', $form->intake) == 'Feb' ? 'selected' : '' }}>Feb</option>
                    <option value="Mar" {{ old('intake', $form->intake) == 'Mar' ? 'selected' : '' }}>Mar</option>
                    <option value="Apr" {{ old('intake', $form->intake) == 'Apr' ? 'selected' : '' }}>Apr</option>
                    <option value="May" {{ old('intake', $form->intake) == 'May' ? 'selected' : '' }}>May</option>
                    <option value="Jun" {{ old('intake', $form->intake) == 'Jun' ? 'selected' : '' }}>Jun</option>
                    <option value="Jul" {{ old('intake', $form->intake) == 'Jul' ? 'selected' : '' }}>Jul</option>
                    <option value="Aug" {{ old('intake', $form->intake) == 'Aug' ? 'selected' : '' }}>Aug</option>
                    <option value="Sep" {{ old('intake', $form->intake) == 'Sep' ? 'selected' : '' }}>Sep</option>
                    <option value="Oct" {{ old('intake', $form->intake) == 'Oct' ? 'selected' : '' }}>Oct</option>
                    <option value="Nov" {{ old('intake', $form->intake) == 'Nov' ? 'selected' : '' }}>Nov</option>
                    <option value="Dec" {{ old('intake', $form->intake) == 'Dec' ? 'selected' : '' }}>Dec</option>
                </select>
            </div>
        </div>





        <div class="row">
            <div>
                <label for="country">Interested Country:</label>
                <select id="country" name="country" required>
                    <option value="" disabled>Select your country</option>
                    <option value="UK" {{ old('country', $form->country) == 'UK' ? 'selected' : '' }}>UK</option>
                    <option value="Australia" {{ old('country', $form->country) == 'Australia' ? 'selected' : '' }}>Australia</option>
                    <option value="USA" {{ old('country', $form->country) == 'USA' ? 'selected' : '' }}>USA</option>
                    <option value="Canada" {{ old('country', $form->country) == 'Canada' ? 'selected' : '' }}>Canada</option>
                </select>
            </div>
            <div>
                <label for="level">Level:</label>
                <select id="level" name="level" required>
                    <option value="" disabled>Select your Level</option>
                    <option value="Bachelor" {{ old('level', $form->level) == 'Bachelor' ? 'selected' : '' }}>Bachelor</option>
                    <option value="Masters" {{ old('level', $form->level) == 'Masters' ? 'selected' : '' }}>Masters</option>
                    <option value="PHD" {{ old('level', $form->level) == 'PHD' ? 'selected' : '' }}>PHD</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div>
                <label for="course">Course:</label>
                <select id="course" name="course" required>
                    <option value="" disabled>Select your Course</option>
                    <option value="IELTS" {{ old('course', $form->course) == 'IELTS' ? 'selected' : '' }}>IELTS</option>
                    <option value="PTE" {{ old('course', $form->course) == 'PTE' ? 'selected' : '' }}>PTE</option>
                    <option value="Dulingo" {{ old('course', $form->course) == 'Dulingo' ? 'selected' : '' }}>Dulingo</option>
                    <option value="ELLT" {{ old('course', $form->course) == 'ELLT' ? 'selected' : '' }}>ELLT</option>
                    <option value="No Test" {{ old('course', $form->course) == 'No Test' ? 'selected' : '' }}>No Test</option>
                </select>
            </div>
            <div>
                <label for="processing">Processing By:</label>
                <select id="processing" name="processing" required>
                    <option value="" disabled>Select your Processing By</option>
                    <option value="Edulink" {{ old('processing', $form->processing) == 'Edulink' ? 'selected' : '' }}>Edulink</option>
                    <option value="Studyhub" {{ old('processing', $form->processing) == 'Studyhub' ? 'selected' : '' }}>Studyhub</option>
                    <option value="leadhead" {{ old('processing', $form->processing) == 'leadhead' ? 'selected' : '' }}>leadhead</option>
                    <option value="Acheivers" {{ old('processing', $form->processing) == 'Acheivers' ? 'selected' : '' }}>Acheivers</option>
                    <option value="Friendz" {{ old('processing', $form->processing) == 'Friendz' ? 'selected' : '' }}>Friendz</option>
                    <option value="BMW Badaghat" {{ old('processing', $form->processing) == 'BMW Badaghat' ? 'selected' : '' }}>BMW Badaghat</option>
                    <option value="Pro Visa" {{ old('processing', $form->processing) == 'Pro Visa' ? 'selected' : '' }}>Pro Visa</option>
                    <option value="Other" {{ old('processing', $form->processing) == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
        </div>

        <div class="row">
        <div>
                <label for="english">English Language Test:</label>
                <select id="english" name="english" required>
                    <option value="" disabled>Select your English Language Test</option>
                    <option value="IELTS" {{ old('english', $form->english) == 'IELTS' ? 'selected' : '' }}>IELTS</option>
                    <option value="PTE" {{ old('english', $form->english) == 'PTE' ? 'selected' : '' }}>PTE</option>
                    <option value="ELLT" {{ old('english', $form->english) == 'ELLT' ? 'selected' : '' }}>ELLT</option>
                    <option value="No Test" {{ old('english', $form->english) == 'No Test' ? 'selected' : '' }}>No Test</option>
                    <option value="MOI" {{ old('english', $form->english) == 'MOI' ? 'selected' : '' }}>MOI</option>
                </select>
            </div>
            <div>
                <label for="gpa">GPA:</label>
                <input type="number" id="gpa" name="gpa" value="{{ old('gpa', $form->gpa) }}" required>
            </div>
        </div>

        <div class="row">
        <div>
         <label for="passed">Passed Year:</label>
        <select id="passed" name="passed" required>
        <option value="" disabled {{ old('passed', $form->passed) ? '' : 'selected' }}>Select your Passed year</option>
        <option value="2015" {{ old('passed', $form->passed) == '2015' ? 'selected' : '' }}>2015</option>
        <option value="2016" {{ old('passed', $form->passed) == '2016' ? 'selected' : '' }}>2016</option>
        <option value="2017" {{ old('passed', $form->passed) == '2017' ? 'selected' : '' }}>2017</option>
        <option value="2018" {{ old('passed', $form->passed) == '2018' ? 'selected' : '' }}>2018</option>
        <option value="2019" {{ old('passed', $form->passed) == '2019' ? 'selected' : '' }}>2019</option>
        <option value="2020" {{ old('passed', $form->passed) == '2020' ? 'selected' : '' }}>2020</option>
        <option value="2021" {{ old('passed', $form->passed) == '2021' ? 'selected' : '' }}>2021</option>
        <option value="2022" {{ old('passed', $form->passed) == '2022' ? 'selected' : '' }}>2022</option>
        <option value="2023" {{ old('passed', $form->passed) == '2023' ? 'selected' : '' }}>2023</option>
        <option value="2024" {{ old('passed', $form->passed) == '2024' ? 'selected' : '' }}>2024</option>
        <option value="2025" {{ old('passed', $form->passed) == '2025' ? 'selected' : '' }}>2025</option>
       </select>
        </div>

            <div>
                <label for="document">Document Status:</label>
                <select id="document" name="document" required>
                    <option value="" disabled {{ old('passed', $form->passed) ? '' : 'selected' }}>Select your Document Status</option>
                    <option value="Partially Received" {{ old('passed', $form->passed) == 'Partially Received' ? 'selected' : '' }}>Partially Received</option>
                    <option value="Fully Received" {{ old('passed', $form->passed) == 'Fully Received' ? 'selected' : '' }}>Fully Received</option>
                    <option value="Initiated For Offer" {{ old('passed', $form->passed) == 'Initiated For Offer' ? 'selected' : '' }}>Initiated For Offer</option>
                </select>
            </div>
        </div>

        <div class="row">
        <div class="remarks-container">
    <label for="remarks">Remarks:</label>
    <textarea id="remarks" name="remarks" required placeholder="Enter your remarks here">{{ old('remarks', $form->remarks) }}</textarea>
</div>

            <div>
                <label for="initiated">Offer Initiated by:</label>
                <select id="initiated" name="initiated" required>
                    <option value="" disabled {{ old('passed', $form->passed) ? '' : 'selected' }}>Select your Offer Initiated by</option>
                    <option value="Gaurav" {{ old('passed', $form->passed) == 'Gaurav' ? 'selected' : '' }}>Gaurav</option>
                    <option value="Rabin" {{ old('passed', $form->passed) == 'Rabin' ? 'selected' : '' }}>Rabin</option>
                    <option value="Samiksha" {{ old('passed', $form->passed) == 'Samiksha' ? 'selected' : '' }}>Samiksha</option>
                    <option value="Ram" {{ old('passed', $form->passed) == 'Ram' ? 'selected' : '' }}>Ram</option>
                    <option value="Roshan" {{ old('passed', $form->passed) == 'Roshan' ? 'selected' : '' }}>Roshan</option>
                    
                </select>
            </div>
        </div>



        <div class="row">
        <div>
         <label for="interview">Interview:</label>
        <select id="interview" name="interview" required>
        <option value="" disabled {{ old('interview', $form->interview) ? '' : 'selected' }}>Select your Interview</option>
        <option value="2015" {{ old('interview', $form->interview) == 'No Need' ? 'selected' : '' }}>No Need</option>
        <option value="2016" {{ old('interview', $form->interview) == 'pass' ? 'selected' : '' }}>pass</option>
        <option value="2017" {{ old('interview', $form->interview) == 'Failed' ? 'selected' : '' }}>Failed</option>
        <option value="2018" {{ old('interview', $form->interview) == 'Waiting' ? 'selected' : '' }}>Waiting</option>
       </select>
        </div>

            <div>
                <label for="visa">Visa:</label>
                <select id="visa" name="visa" required>
                    <option value="" disabled {{ old('visa', $form->visa) ? '' : 'selected' }}>Select your Visa</option>
                    <option value="Applied" {{ old('visa', $form->visa) == 'Applied' ? 'selected' : '' }}>Applied</option>
                    <option value="Granted" {{ old('visa', $form->visa) == 'Granted' ? 'selected' : '' }}>Granted</option>
                    <option value="Declined" {{ old('visa', $form->visa) == 'Declined' ? 'selected' : '' }}>Declined</option>
                </select>
            </div>
        </div>

        <div class="row">
        <div>
         <label for="noc">Noc:</label>
        <select id="noc" name="noc" required>
        <option value="" disabled {{ old('noc', $form->noc) ? '' : 'selected' }}>Select your Noc</option>
        <option value="Applied" {{ old('noc', $form->noc) == 'Applied' ? 'selected' : '' }}>Applied</option>
        <option value="Not Applied" {{ old('noc', $form->noc) == 'Not Applied' ? 'selected' : '' }}>Not Applied</option>
        <option value="Received" {{ old('noc', $form->noc) == 'Received' ? 'selected' : '' }}>Received</option>
       </select>
        </div>

            <div>
                <label for="fees">Fess:</label>
                <select id="fees" name="fees" required>
                    <option value="" disabled {{ old('fees', $form->fees) ? '' : 'selected' }}>Select your Fess</option>
                    <option value="Paid" {{ old('fees', $form->fees) == 'Paid' ? 'selected' : '' }}>Paid</option>
                    <option value="Pending" {{ old('fees', $form->fees) == 'Pending' ? 'selected' : '' }}>Pending</option>
                </select>
            </div>
        </div>




        <div class="row">
            <div>
                <label for="amount">Fees:</label>
                <input type="number" id="amount" name="amount" value="{{ old('amount', $form->amount) }}" required>
            </div>
            <div>
                <label for="scholarship">Scholarship:</label>
                <input type="text" id="scholarship" name="scholarship" value="{{ old('scholarship', $form->scholarship) }}">
            </div>
        </div>







        <div class="row">
            <div>
                <label for="offer" style="width: 50px;">Offer Status:</label><br />
                <select id="offer" name="offer" required style="width: 500px;">
                    <option value="" disabled {{ old('passed', $form->passed) ? '' : 'selected' }}>Select your Offer Status</option>
                    <option value="Conditional" {{ old('passed', $form->passed) == 'Conditional' ? 'selected' : '' }}>Conditional</option>
                    <option value="UnConditional" {{ old('passed', $form->passed) == 'UnConditional' ? 'selected' : '' }}>UnConditional</option>
                    <option value="Not Received" {{ old('passed', $form->passed) == 'Not Received' ? 'selected' : '' }}>Not Received</option>
                    
                </select>
            </div>
        </div>

        <div class="button-container">
            <input type="submit" value="Update">
        </div>
    </form>

</body>

</html>











































