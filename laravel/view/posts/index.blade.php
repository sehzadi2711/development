<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Document
        </title>
    </head>
    <body>
        <ul>
            <?php foreach($data as $row): ?>
                
            <li>
                <?php echo $row['name'];  ?><br>
                <?php echo $row['company'];  ?><br>
                <img src="{{ echo asset('storage/OvwtLWuFHfmhYLdkpKiCnnCjHdI3SFhWiWWwF7c5.jpeg') }}" width="100px;" height="100px;" alt="image">
            </li>
                <?php endforeach; ?>
            
        </ul>
    </body>
        
</html>