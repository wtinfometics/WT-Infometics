<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\PostServices;

class HomeController extends Controller
{
    protected $postService;

    // Inject Project Service using constructor
    public function __construct(PostServices $postService){
        $this->postService = $postService;
    }

    // Index Home Page
    public function index(){
        try {
            //code...
            $posts=$this->postService->getAllPosts();
            $data = $posts['data'] ?? [];
            $localSchema=$this->localSchema();
            return view('User.index', compact('data','localSchema'));
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // generate Sitemap
    public function generateSiteMap(){
      
            //code...
            $posts=$this->postService->getAllPosts();
            $postData=$posts['data']??  [];
             return response()
            ->view('User.sitemap', compact('postData'))
            ->header('Content-Type', 'application/xml');
    
    }

    // Local Business Schema
    public function localSchema(){
        $schema = [
    '@context' => 'https://schema.org',
    '@type' => 'ProfessionalService',
    '@id' => url('/') . '/#professionalservice',
    'name' => 'WT Infometics',
    'url' => url('/'),
    'image' => asset('assets/img/logo.png'),
    'description' => 'WT Infometics offers Web Development, SEO, Local SEO, Social Media Marketing, E-Commerce Management, Google Ads, Meta Ads, and Digital Marketing services.',
    'telephone' => '+919019049147',
    'email' => 'info@wtinfometics.com',
    'address' => [
        '@type' => 'PostalAddress',
        'addressLocality' => 'Kumta',
        'postalCode' => '581343',
        'addressCountry' => 'IN'
    ],
    'openingHoursSpecification' => [
        [
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => [
                'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'
            ],
            'opens' => '09:30',
            'closes' => '18:00'
        ]
    ],
    'sameAs' => [
        'https://www.facebook.com/profile.php?id=61552061820126',
        'https://www.instagram.com/wt_infometics/',
        'https://www.youtube.com/@WTInfometics',
        'https://www.linkedin.com/company/wtinfometics/'
    ]
];
return $schema;
    }
}
