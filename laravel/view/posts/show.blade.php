<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Show data
        </title>
    </head>
    <body>
        <h2>Single record of show method</h2>
        <ul>
            <?php // foreach($data as $row): ?>
                
            <li>
                <?php echo $data['title'];  ?><br>
                <?php echo $data['content'];  ?><br>
                <img src="{{ asset('/uploads/') }}" width="100px;" height="100px;" alt="image">
                </li>
                <?php // endforeach; ?>
            
        </ul>
    </body>
        
</html>