<?php
$URL = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

$response = file_get_contents($URL);
$data = json_decode($response, true);

if (!$data || !isset($data["results"])) {
    die('ERROR in fetching the data of the student from the API');
}

$result = $data["results"];

?>

<html>
<head>
    <title>UOB Students Enrollment by Nationality</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    //link pico
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    
    <style>
        table{
            border: 2px;
            border-collapse: collapse;
            text-align: center;
            color: black;
        }
        
        table tr:hover{
            background-color: lightblue;                
        }

        table th {
            background-color: gray;
            color: black;
        }

    </style>
</head>
<body>
    // Create a container with horizontal scroll for the table (overglow-auto)
    <div class="overflow-auto">
    <table>
        <thead>
            <tr>
                <th>YEAR</th>
                <th>SEMESTER</th>
                <th>THE PROGRAM</th>
                <th>NATIONALITY</th>
                <th>COLLEGES</th>
                <th>NUMBER OF STUDENTS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($result as $student) {
                ?>
                <tr>
                    <td><?php echo $student["year"]; ?></td>
                    <td><?php echo $student["semester"]; ?></td>
                    <td><?php echo $student["the_programs"]; ?></td>
                    <td><?php echo $student["nationality"]; ?></td>
                    <td><?php echo $student["colleges"]; ?></td>
                    <td><?php echo $student["number_of_students"]; ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
        </div>
</body>
</html>