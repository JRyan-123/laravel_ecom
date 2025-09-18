<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class MasterReviewsController extends Controller
{
    public function review_delete($id)
    {  
        Review::findOrFail($id)->delete();
        return back()->with('success','review deleted!');
    }
}
