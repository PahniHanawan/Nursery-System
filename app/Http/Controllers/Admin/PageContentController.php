<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PageContentController extends Controller
{
    /**
     * Display the CMS page content management editor.
     */
    public function index(): View
    {
        $contents = PageContent::all()->groupBy('page_slug');

        return view('admin.cms.index', compact('contents'));
    }

    /**
     * Update CMS contents.
     */
    public function update(Request $request): RedirectResponse
    {
        $items = $request->input('contents', []);

        if (is_array($items)) {
            foreach ($items as $id => $val) {
                $content = PageContent::find($id);
                if ($content) {
                    $content->update(['content_value' => $val]);
                }
            }
        }

        return back()->with('success', 'Website content and notices successfully updated.');
    }
}
