<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Album;
use App\Models\Photo;
use App\Models\Todo;
use Illuminate\Support\Facades\Hash;

// #[Signature('app:fetch-json-data')]
#[Description('Command description')]
class FetchJsonData extends Command
{
    /**
     * Execute the console command.
     */
    protected $signature = 'fetch:json-data';
    protected $description = 'Fetch data from JSONPlaceholder API';

    public function handle()
    {
        //
        $users = Http::get('https://jsonplaceholder.typicode.com/users')->json();

        foreach ($users as $user) {
            User::updateOrCreate(
                ['id' => $user['id']],
                [
                    'name' => $user['name'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'phone' => $user['phone'],
                    'website' => $user['website'],
                    'password' => Hash::make('password'),
                ]
            );
        }

        // POSTS
        $posts = Http::get('https://jsonplaceholder.typicode.com/posts')->json();

        foreach ($posts as $post) {
            Post::updateOrCreate(
                ['id' => $post['id']],
                [
                    'user_id' => $post['userId'],
                    'title' => $post['title'],
                    'body' => $post['body'],
                ]
            );
        }

        // COMMENTS
        $comments = Http::get('https://jsonplaceholder.typicode.com/comments')->json();

        foreach ($comments as $comment) {
            Comment::updateOrCreate(
                ['id' => $comment['id']],
                [
                    'post_id' => $comment['postId'],
                    'name' => $comment['name'],
                    'email' => $comment['email'],
                    'body' => $comment['body'],
                ]
            );
        }

        // ALBUMS
        $albums = Http::get('https://jsonplaceholder.typicode.com/albums')->json();

        foreach ($albums as $album) {
            Album::updateOrCreate(
                ['id' => $album['id']],
                [
                    'user_id' => $album['userId'],
                    'title' => $album['title'],
                ]
            );
        }

        // PHOTOS
        $photos = Http::get('https://jsonplaceholder.typicode.com/photos')->json();

        foreach ($photos as $photo) {
            Photo::updateOrCreate(
                ['id' => $photo['id']],
                [
                    'album_id' => $photo['albumId'],
                    'title' => $photo['title'],
                    'url' => $photo['url'],
                    'thumbnail_url' => $photo['thumbnailUrl'],
                ]
            );
        }

        // TODOS
        $todos = Http::get('https://jsonplaceholder.typicode.com/todos')->json();

        foreach ($todos as $todo) {
            Todo::updateOrCreate(
                ['id' => $todo['id']],
                [
                    'user_id' => $todo['userId'],
                    'title' => $todo['title'],
                    'completed' => $todo['completed'],
                ]
            );
        }

        $this->info('All data fetched successfully!');

    }
}
