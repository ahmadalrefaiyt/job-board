<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function create()
    {
        $names = [
            "Ahmad Alrefai",
            "Ahmed Al-Masri",
            "Mohammed Al-Harbi",
            "Ali Al-Farsi",
            "Hassan Al-Amri",
            "Hussein Al-Khalil",
            "Yousef Al-Ahmad",
            "Ibrahim Al-Zahrani",
            "Omar Al-Saleh",
            "Khaled Al-Din",
            "Abdullah Al-Omari",
            "Saif Al-Jabari",
            "Tariq Al-Najjar",
            "Amir Al-Banna",
            "Mustafa Al-Rashid",
            "Salim Al-Shami",
            "Zaid Al-Qadi",
            "Fahad Al-Haddad",
            "Nasser Al-Khatib",
            "Adnan Al-Ali",
            "Basel Al-Tamimi",
            "Rami Al-Sabbagh",
            "Sami Al-Kurdi",
            "Kareem Al-Lubnani",
            "Nabil Al-Mutairi",
            "Jamal Al-Qassim",
            "Sulaiman Al-Turki",
            "Hadi Al-Nabulsi",
            "Waleed Al-Hakim",
            "Anas Al-Jundi",
            "Fares Al-Saleem",
            "Nour Al-Yamani",
            "Lina Al-Bitar",
            "Mariam Al-Saleh",
            "Huda Al-Sabbagh",
            "Aisha Al-Najdi",
            "Fatima Al-Mutlaq",
            "Layla Al-Karim",
            "Rana Al-Rifai",
            "Dina Al-Ahmadi",
            "Yasmin Al-Khalifa",
            "Rania Al-Saadi",
            "Sara Al-Najjar",
            "Noor Al-Sharif",
            "Malak Al-Jarrah",
            "Joud Al-Samman",
            "Lamis Al-Dabbas",
            "Reem Al-Fahmi",
            "Samira Al-Tahan",
            "Hanan Al-Kassab",
            "Amani Al-Sabbagh"
        ];
        $commentNumber = Comment::count() + 1;
        $randomAuthor = array_rand($names); // Generate a random author name
        Comment::create([
            'comment' => 'This is a comment.' . $commentNumber,
            'author' => $names[$randomAuthor], // Use the random author name
            'post_id' => Post::inRandomOrder()->first()->id, // Assuming you want to associate this comment with a specific post

        ]);
        return redirect('/blog');
    }
}
