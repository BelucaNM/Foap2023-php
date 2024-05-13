
<?php 
$amics = array(
    array(
        "nom"=> "Pepito",
        "cognom"=> "Grillo",
        "imatge"=> "https://unsplash.com/es/fotos/fotografia-de-enfoque-superficial-de-mujer-al-aire-libre-durante-el-dia-rDEOVtE7vOs"
         ),
    array    (
        "nom"=> "Pinocho",
        "cognom"=> "nas llarg",
        "imatge"=> "https://unsplash.com/es/fotos/mujer-sonriente-con-blusa-blanca-y-negra-con-cuello-a-rayas-QXevDflbl8A"
        ),
    array    (
        "nom"=> "Geppeto",
        "cognom"=> "constructor de ninots",
        "imatge"=> "https://unsplash.com/es/fotos/foto-en-escala-de-grises-de-un-hombre-c_GmwfHBDzk"
        ),
    array    (
        "nom"=> "Pepito",
        "cognom"=> "Pérez",
        "imatge"=> "https://images.unsplash.com/photo-1547425260-76bcadfb4f2c?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8cGVyc29uYXxlbnwwfHwwfHx8MA%3D%3D",
        ),
    array    (
        "nom"=> "Pepet",
        "cognom"=> "i Marierta",
        "imatge"=> "https://plus.unsplash.com/premium_photo-1664536392896-cd1743f9c02c?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzN8fHBlcnNvbmF8ZW58MHx8MHx8fDA%3D",
        )
        
    );

$amicsPwd = array(
        array(
            "username"=> "juan",
            "password"=> "12345",
            "amics"=> array ( 
                        "nom"=> "Ikram",
                        "cognom"=> "Bghiel",
                        "imatge"=> "https://unsplash.com/es/fotos/fotografia-de-enfoque-superficial-de-mujer-al-aire-libre-durante-el-dia-rDEOVtE7vOs"
                        ),
                        array (
                        "nom" =>  "Toni",
                        "cognom"=> "Oller",
                        "imatge"=> "https://unsplash.com/es/fotos/foto-en-escala-de-grises-de-un-hombre-c_GmwfHBDzk"
                        ),
                        array (
                        "nom"=> "Neus",
                        "cognom" => "Vidal",
                        "imatge" => "http=>https://unsplash.com/es/fotos/fotografia-de-enfoque-superficial-de-mujer-al-aire-libre-durante-el-dia-rDEOVtE7vOs"
                        )

        ),
        array (
                "username" => "ikram",
                "password" => "12345",
                "amics"=> array (
                        "nom"=> "Pepito",
                        "cognom"=> "Grillo",
                        "imatge"=> "https://unsplash.com/es/fotos/foto-en-escala-de-grises-de-un-hombre-c_GmwfHBDzk"
                        ),
                        array (
                        "nom" => "Pinoxo",
                        "cognom" => "nas llarg",
                        "imatge"=> "https://images.unsplash.com/photo-1547425260-76bcadfb4f2c?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8cGVyc29uYXxlbnwwfHwwfHx8MA%3D%3D"
                        ),
                        array(
                        "nom"=> "Geppeto",
                        "cognom"=> "constructor de ninots",
                        "imatge"=> "https://plus.unsplash.com/premium_photo-1664536392896-cd1743f9c02c?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzN8fHBlcnNvbmF8ZW58MHx8MHx8fDA%3D"
                        )
        )
);

header('Content-Type: application/json');
echo json_encode($posts);
?>