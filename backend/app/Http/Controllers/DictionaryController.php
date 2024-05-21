<?php

namespace App\Http\Controllers;

use App\Models\Word;
use App\Models\Subject;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    public function words()
    {
        return Word::all();
    }

    public function subjects()
    {
        return Subject::all();
    }

    public function wordsBySubject($id) {
        return Word::where('subject_id', $id)->get();
    }

}
