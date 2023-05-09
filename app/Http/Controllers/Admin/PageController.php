<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function pageList()
    {
        $pages = Page::all();

        return view('admin.pages.manage_page.pages.PageList', ['pages' => $pages]);
    }

    public function editPageContent($id)
    {
        $page = Page::find($id);

        return  view('admin.pages.manage_page.pages.EditPageContent', ['page' => $page]);
    }

    public function updatePageContent(Request $request, $id)
    {
        $page = Page::find($id);
        $page->content = $request->description;
        $page->update();

        return redirect()->back()->with('success', 'page content updated successfully');
    }


}
