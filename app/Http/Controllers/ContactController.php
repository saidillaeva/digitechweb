<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Показ страницы Contact
     */
    public function index()
    {
        return view('pages.contact');
    }

    /**
     * Отправка сообщения с формы Contact
     */
    public function send(Request $request)
    {
        // 1. Валидация данных
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // 2. Отправка письма
        Mail::raw(
            "New message from DigiTech website\n\n"
            . "Name: {$validated['name']}\n"
            . "Email: {$validated['email']}\n\n"
            . "Message:\n{$validated['message']}",
            function ($mail) {
                $mail->to('zinaidasataralieva@gmail.com') // ← твоя почта
                ->subject('New Contact Message - DigiTech');
            }
        );

        // 3. Возврат назад с сообщением об успехе
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
