<?php
namespace src\helpers;

use \src\models\Post;
use \src\models\UserRelation;
use \src\models\User;

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

        $postList = Post::select()->where('id_user', 'in', $users)->orderBy('created_at', 'desc')->get();

        $posts = [];
        foreach( $postList as $postItem ) {
            $newPost = new Post();
            $newPost->id = $postItem['id'];
            $newPost->type = $postItem['type'];
            $newPost->created_at = $postItem['created_at'];
            $newPost->body = $postItem['body'];
            $newPost->mine = false;

            if( $postItem['id_user'] == $idUser ) {
                $newPost->mine = true;
            }

            $newUser = User::select()->where('id', $postItem['id_user'])->one();
            $newPost->user = new User();
            $newPost->user->id = $newUser['id'];
            $newPost->user->name = $newUser['name'];
            $newPost->user->avatar = $newUser['avatar'];

            $newPost->likeCount = 0;

            $newPost->comments = [];
            $newPost->liked = false;

            $posts[] = $newPost;
        }
        return $posts;
    }
}
?>