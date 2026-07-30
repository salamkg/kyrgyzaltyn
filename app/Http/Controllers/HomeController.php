<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Report;
use App\Models\AboutPage;
use App\Models\ExchangeRate;
use App\Models\BoardMember;
use App\Models\Tender;
use App\Models\Branch;
use App\Models\Feedback;
use App\Models\Director;
use App\Models\AuditCommission;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::orderBy('published_at', 'desc')->take(3)->get();
        
        $rates = ExchangeRate::orderBy('date', 'desc')
                    ->get()
                    ->unique('currency')
                    ->keyBy('currency');

        return view('welcome', compact('news', 'rates'));
    }

    // Новый метод для страницы всех новостей
    public function news()
    {
        $news = News::orderBy('published_at', 'desc')->paginate(6);
        return view('news', compact('news'));
    }

    public function showNews($id)
    {
        $newsItem = News::findOrFail($id);
        return view('news-detail', compact('newsItem'));
    }

    public function reports()
    {
        $reports = Report::orderBy('published_at', 'desc')->paginate(10);
        return view('reports', compact('reports'));
    }

    public function about()
    {
        // Берем первую запись или создаем дефолтную, если в админке еще ничего не заполнили
        $about = AboutPage::first();
        return view('about', compact('about'));
    }

    public function contacts()
    {
        return view('contacts');
    }

    public function board()
    {
        $members = BoardMember::orderBy('sort_order', 'asc')->get();
        return view('board', compact('members'));
    }

    public function tenders()
    {
        $tenders = Tender::orderBy('published_at', 'desc')->paginate(9);
        return view('tenders', compact('tenders'));
    }

    // Список дочерних компаний
    public function branches()
    {
        $branches = Branch::orderBy('sort_order', 'asc')->get();
        return view('branches.index', compact('branches'));
    }

    // Страница конкретной компании + блок "Другие филиалы"
    public function showBranch($id)
    {
        $branch = Branch::findOrFail($id);
        // Получаем остальные филиалы для блока "Другие филиалы"
        $otherBranches = Branch::where('id', '!=', $id)->take(4)->get();
        
        return view('branches.show', compact('branch', 'otherBranches'));
    }

    // Страница электронной приемной
    public function feedback()
    {
        return view('feedback');
    }

    // Обработка отправки формы
    public function feedbackStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'type' => 'required|string',
            'message' => 'required|string',
        ]);

        Feedback::create($validated);

        return redirect()->route('feedback.index')->with('success', 'Ваше обращение успешно отправлено!');
    }

    public function directors()
    {
        $directors = Director::orderBy('sort_order', 'asc')->get();
        return view('directors', compact('directors'));
    }

    public function auditCommission()
    {
        $members = AuditCommission::orderBy('sort_order', 'asc')->get();
        return view('audit-commission', compact('members'));
    }
}
