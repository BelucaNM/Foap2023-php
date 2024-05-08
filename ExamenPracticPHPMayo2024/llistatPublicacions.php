
<?php 
$posts = array(
    array(
        "titulo"=> "id labore ex et quam laborum",
        "descripcion"=> "laudantium enim quasi est quidem magnam voluptate ipsam eos\ntempora quo m",
        "imagen" => "https://www.cuina.cat/uploads/s1/65/74/83/red-delicious_22_645x400.jpeg"
    ),
    array(
        "titulo" => "quo vero reiciendis velit similique earum",
        "descripcion" => "est natus enim nihil est doloreostrum voluptatem reiciendis et",
        "imagen"  => "https://botiga.mercatfontetes.cat/598-large_default/taronges-1kg-aprox-.jpg"
    ),
    array(
        "titulo"=> "odio adipisci rerum aut animi",
        "descripcion"=> "quia molestiae reprehenderit quasi aspernatur\naut expedita occ ratione",
        "imagen" => "https://etselquemenges.cat/wp-content/media/2012/05/cireres-600.gif",
    )
        
);
header('Content-Type: application/json');
echo json_encode($posts);
?>