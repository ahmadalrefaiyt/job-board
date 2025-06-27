<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function show($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->latest()->get();

        return view('post.showByTag', [
            'pageTitle' => $tag->name,
            'posts' => $posts,
            'tag' => $tag
        ]);
    }
    function create()
    {
        $tags = [
            "Technology",
            "Programming",
            "Quran",
            "Islam",
            "Design",
            "Art",
            "Education",
            "Startup",
            "Health",
            "Fitness",
            "Productivity",
            "Mindset",
            "Motivation",
            "Spirituality",
            "Family",
            "Culture",
            "History",
            "Politics",
            "Business",
            "Marketing",
            "Ecommerce",
            "Laravel",
            "React",
            "WordPress",
            "UX",
            "UI",
            "Leadership",
            "Time Management",
            "Finance",
            "Arabic Language",
            "Poetry",
            "Books",
            "Learning",
            "Self-Development",
            "Freelancing",
            "Remote Work",
            "AI",
            "Machine Learning",
            "Cybersecurity",
            "Data Science",
            "Photography",
            "Travel",
            "Writing",
            "Creativity",
            "Philosophy",
            "Parenting",
            "Mental Health",
            "Relationships",
            "Community",
            "Volunteering"
        ];
        $randomTag = array_rand($tags); // Generate a random tag

        function generateSlugs($array)
        {
            $slugs = [];
            foreach ($array as $item) {
                $slug = strtolower($item);
                $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);  // إزالة الرموز
                $slug = preg_replace('/\s+/', '-', $slug);          // الفراغ => -
                $slug = preg_replace('/-+/', '-', $slug);           // إزالة التكرار
                $slugs[] = trim($slug, '-');                        // إزالة الواصلة من البداية والنهاية
            }
            return $slugs;
        }
        Tag::create([
            'name' => $tags[$randomTag],
            'slug' => generateSlugs([$tags[$randomTag]])[0],
        ]);
        return redirect('/blog');
    }

    function manyToMany()
    {
        $post = Post::find(Post::inRandomOrder()->first()->id); // Assuming you want to attach tags to the post with ID 1
        $tag = Tag::find(Tag::inRandomOrder()->first()->id); // Fetch random tags

        $post->tags()->attach($tag->id);

        return redirect('/blog');
    }

}
