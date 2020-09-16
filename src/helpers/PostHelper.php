<?php
namespace src\helpers;

use \src\models\Post;
use \src\models\UserRelation;

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
    public static function getHomeFeed($idUser) {
        $userList = UserRelation::select()->where('user_from', $idUser)->get();

        $users = [];

        foreach( $userList as $userItem ) {
            $users[] = $userItem['user_to'];
        }
        $users[] = $idUser;
    }
}
?>