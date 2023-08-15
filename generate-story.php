<?php

    include "./tools/tools.php";

    // TASK 1: Start a session to use session storage
        session_start();
        
        
    // DEV ONLY
    // prettyPrint($_SESSION); 

    // TASK 2: Save the answers in an associative array

    // Add the answers from the submission form here. 
    $answers = [
        'proper_noun' => $_SESSION['proper_noun'],
        'verb_1' => $_SESSION['verb_1'],
        'noun_1' => $_SESSION['noun_1'],
        'adjective_1' => $_SESSION['adjective_1'],
        'noun_2' => $_SESSION['noun_2'],
        'exclamation' => $_SESSION['exclamation'],
        'noun_3' => $_SESSION['noun_3'],
        'adjective_phrase_1' => $_SESSION['adjective_phrase_1'],
        'noun_4' => $_SESSION['noun_4'],
        'adjective_phrase_2' => $_SESSION['adjective_phrase_2'],
        
        ]; 
    
    //DEV ONLY 
    // prettyPrint($answers);


    // TASK 3: Store the answers in session storage

    $_SESSION = $answers; 



    // TASK 4: Redirect to the story generation page or other logic

    header("Location: ./index.php"); 

?>