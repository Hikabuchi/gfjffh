<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{

    public function index()
    {
        $services = Service::all();
        return view('applications.application', compact('services'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|min:5',
            'phone' => 'required|string|min:11',
            'date' => 'required|date',
            'time' => 'required|string',
            'type_services' => 'required',
            'type_pay'=>'required',
            'comment' => 'required|string',
        ]);

        $application = new Application();
        if ($request->file('photo')!== NULL) {
            $application->photo = $request->file('photo')->store('public/before');
        }
        $application -> user_id = Auth::id();
        $application -> service_id = $request->input('type_services');
        $application -> address = $request->input('address');
        $application -> date = $request->input('date');
        $application -> time = $request->input('time');
        $application -> phone = $request->input('phone');
        $application -> comment = $request->input('comment');
        $application -> payment_id = $request->input('type_pay');

        $application->save();
        return redirect()->route('profile');
    }


    public function update(Request $request, Application $application)
{
    // Валидация входящих данных
    $request->validate([
        'status' => 'required',
        'comment' => 'nullable|string',
    ]);

    // Если загружен файл, сохраняем его
    if ($request->file('photo_after') !== null) {
        $application->photo_after = $request->file('photo_after')->store('public/after');
    }

    // Обновляем статус и комментарий
    $application->status_id = $request->input('status');
    $application->cancel_comment = $request->input('comment');

    // Сохраняем изменения в базе данных
    $application->update();

    // Перенаправляем обратно
    return redirect()->back()->with('success', 'Статус успешно обновлен на ');
}

}
