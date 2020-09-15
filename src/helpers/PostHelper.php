<?php
namespace src\helpers;

use \src\models\Post;

class PostHelper {
    public static function addPost($idUser, $type, $body) {
        $body = trim($body);

        if( !empty($idUser) && !empty( $body )) {
            Post::insert([
                'id_user' => $idUser,
                'type' => $type,
                'created_at' => date('Y-m-d H:i:s'),
                'body' => $body
            ])->execute();
        }
    }
}
?>