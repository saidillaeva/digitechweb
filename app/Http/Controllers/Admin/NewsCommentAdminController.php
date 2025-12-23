<?php

// app/Http/Controllers/Admin/NewsCommentAdminController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsComment;

class NewsCommentAdminController extends Controller
{
public function index()
{
$comments = NewsComment::with('news')->latest()->get();
return view('admin.comments.index', compact('comments'));
}

public function approve(int $id)
{
NewsComment::findOrFail($id)->update([
'is_approved' => true
]);

return back()->with('success', 'Комментарий опубликован');
}

public function destroy(int $id)
{
NewsComment::findOrFail($id)->delete();
return back()->with('success', 'Комментарий удалён');
}
}
