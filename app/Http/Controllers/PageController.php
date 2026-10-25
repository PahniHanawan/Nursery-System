<?php

namespace App\Http\Controllers;

use App\Models\FeeTier;
use App\Models\GalleryImage;
use App\Models\PageContent;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    /**
     * Display the nursery home page.
     */
    public function home(): View
    {
        $galleryPreview = GalleryImage::orderBy('sort_order')->take(4)->get();
        $feeTiers = FeeTier::all();
        $announcement = PageContent::get('global', 'announcement');

        return view('pages.home', compact('galleryPreview', 'feeTiers', 'announcement'));
    }

    /**
     * Display the About Us page.
     */
    public function about(): View
    {
        return view('pages.about');
    }

    /**
     * Display the Rooms & Facilities page.
     */
    public function rooms(): View
    {
        return view('pages.rooms');
    }

    /**
     * Display the Fees & Interactive Calculator page.
     */
    public function fees(): View
    {
        $feeTiers = FeeTier::all();

        return view('pages.fees', compact('feeTiers'));
    }

    /**
     * Display the Photo Gallery page.
     */
    public function gallery(): View
    {
        $galleryImages = GalleryImage::orderBy('sort_order')->get();

        return view('pages.gallery', compact('galleryImages'));
    }

    /**
     * Display the Contact Us page.
     */
    public function contact(): View
    {
        return view('pages.contact');
    }

    /**
     * Display the GDPR Privacy Policy page.
     */
    public function privacy(): View
    {
        return view('pages.privacy');
    }
}
