<?php

    // Task 1: Start the session to access session storage

    session_start();


    // Task 2: Retrieve the answers from the session

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // Grab the answers and store them in an array
        $answers = [
            'proper_noun' => $_POST['proper_noun'],
            'verb_1' => $_POST['verb_1'],
            'noun_1' => $_POST['noun_1'],
            'adjective_1' => $_POST['adjective'],
            'noun_2' => $_POST['noun_2'],
            'exclamation' => $_POST['exclamation'],
            'noun_3' => $_POST['noun_3'],
            'adjective_phrase_1' => $_POST['adjective_phrase_1'],
            'noun_4' => $_POST['noun_4'],
            'adjective_phrase_2' => $_POST['adjective_phrase_2'],
        ];
    
        // Display the answers (for demonstration purposes)
        echo '<div class="container mt-5">';
        echo '<h1>Submitted Answers</h1>';
        echo '<pre>';
        print_r($answers);
        echo '</pre>';
        echo '</div>';
    }



////////////








//////////////



    // Task 3: Retrieve a story template from the database that has not been used.

    // Connect to the database using PDO
    $name = getenv('DB_NAME');

    $host = getenv('DB_HOST');
    $username = getenv('DB_USER'); // Replace with your username
    $password = getenv('DB_PASSWORD'); // Replace with your password
    // $dsn = new PDO("mysql:host=$host;dbname=$name;charset=utf8", $username, $password); // Replace with your database name

    try 
        {
            $conn = new PDO("mysql:host=$host;dbname=$name;charset=utf8", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "SELECT story_template FROM stories ORDER BY RAND() LIMIT 1";  

            $stmt = $conn->prepare($query);

            $stmt->execute();

            $rows = $stmt->fetchALL(PDO::FETCH_ASSOC);

            echo "<table>";
            foreach ($rows as $row)
                {
                    echo "<tr>";
                    echo "<td>" . $row['story_template'] . "</td>";
                    echo "</tr>";
                }

            echo "</table>";
        } 


        catch (PDOException $e) 
            {
                echo "Error: " . $e->getMessage();
            }

        $conn = null;




    // Task 4: Write a function to replace story template placeholders with answers 
    function generateStory($storyTemplate, $answers) {
        // Code to replace placeholders in the template with corresponding answers
        // ...

        return $final_story;
    }

    // Generate the final story
    $final_story = generateStory($story_template, $answers);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funny Story Generator</title>
</head>
<body>
    <h1>Your Funny Story</h1>
    <!-- Task 5: Display the final story -->
   
    <a href="index.php">Generate Another Story</a>
</body>
</html>