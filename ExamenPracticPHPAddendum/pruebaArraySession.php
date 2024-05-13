<html>
    <head>
    </head>
    <body>
        <?php
        session_start([
                        'use_only_cookies'=> 1,
                        'cookie_lifetime'=> 0,
                        'cookie_secure'=> 1,
                        'cookie_httponly'=> 1
                    ]);

        $_SESSION["usuario"] = "beluca";
        $_SESSION["arrayPosts"] = array(
                        array(
                            "titulo"=> "id labore ex et quam laborum",
                            "descripcion"=> "laudantium enim quasi est quidem magnam voluptate ipsam eos\ntempora quo m",
                            "imagen" => "./laXarxaImagenes/red-delicious_22_645x400.jpeg"
                        ),
                        array(
                            "titulo" => "quo vero reiciendis velit simil",
                            "descripcion" => "est natus enim nihil est doloreostrum voluptatem reiciendis et",
                            "imagen"  => "./laXarxaImagenes/taronges-1kg-aprox-.jpg"
                        ),
                        array(
                            "titulo"=> "odio adipisci rerum aut animi",
                            "descripcion"=> "quia molestiae reprehenderit quasi aspernatur\naut expedita occ ratione",
                            "imagen" => "./laXarxaImagenes/cireres-600.gif",
                        )
                            
                    );
            $nuevoPost = array( "titulo"=> "un titulo", 
                    "descripcion"=> "una descripcion", 
                    "imagen" => ".\laXarxaImagenes\Foto3.jpg" );

            print_r  ($_SESSION["arrayPosts"] );                 
                       
            array_push ( $_SESSION["arrayPosts"], $nuevoPost); // añade el post
            print_r  ($_SESSION["arrayPosts"] );  
            






        ?>
    </body>

</html>