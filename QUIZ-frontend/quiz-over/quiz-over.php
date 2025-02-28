<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz over</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body>

    <h1 style="font-family:poppins" id="score_text"></h1>

    <script>
        let count = 0;
        const getResults = JSON.parse(localStorage.getItem('quizResults')) || [];
        getResults.forEach(item => {
            if (item.isCorrect) {
                count++;
            }
        })
        document.getElementById("score_text").innerHTML += `Score ${count}/15`;
        fetch("updatemark.php",{
            method:"POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(count)
        }).then(response => response.json())
            .then(responseData => {
            // Handle the response from the PHP page if needed
                console.log('Response from PHP:', responseData);

            // Clear local storage after processing
                localStorage.removeItem('quizResults');
        })
        .catch(error => {
                console.error('Error:', error);
        });
    </script>


</body>

</html>