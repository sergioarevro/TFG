<!DOCTYPE html>
<html>
<head>
    <title>Test Operas</title>
    <link rel="stylesheet" type="text/css" href="assets/css/test_style.css">
    <?php include 'header.php'; ?>

</head>
<body>
    <div>
        <h1>Test Operas<br></h1>
        
   <form id="test_operas" method="POST" action="index.php?section=operas&action=insert_answer">   
       <p><?php echo "$question->id $question->quest_esp"; ?><br></p>
            
            <div>
                <input type="hidden" name="quest_id" value="<?php echo $question->id; ?>">
                <input type="radio" name="answer" value="1"><label>1</label>
                <input type="radio" name="answer" value="2"><label>2</label>
                <input type="radio" name="answer" value="3"><label>3</label>
                <input type="radio" name="answer" value="4"><label>4</label>
                <input type="radio" name="answer" value="5"><label>5</label><br>
                <button type="submit" name="submit_answer" value="Submit"> Enviar </button>
            </div>
    
    </form>   
    

</body>
</html>