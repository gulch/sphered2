<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;
use Input;

class MessageController extends Controller
{
    public function subscribe()
    {
        $data = [];
        $email = Input::get('email');

        if (!Subscribers::where('email', $email)->first()) {
            if (Subscribers::create([
                'email' => $email,
                'ip' => Request::getClientIp()
            ])) {

                Mail::send('emails.subscribethanks', [], function ($message) use ($email) {
                    $message
                        ->to($email)
                        ->subject('[Sphered] Подписка на новости');
                });

                $data['msg']  = 'Спасибо! Вы успешно подписаны на новости.';
                $data['status'] = 1;
            } else {
                $data['msg'] = 'Произошла ошибка. Попробуйте еще раз';
                $data['status'] = 0;
            }
        } else {
            $data['msg'] = 'Такой email уже существует';
            $data['status'] = 0;
        }

        return $this->jsonResponse($data);
    }

    public function contact()
    {
        $data = [];
        $contact_data = Input::only('name', 'email', 'phone', 'client_message');
        $contact_data['ip'] = Request::getClientIp();

        if (Messages::create($contact_data)) {
            if ($this->isTokenLegal()) {

                Mail::send('emails.contact', $contact_data, function ($message) {
                    $message
                        ->to('hello@sphered.com.ua','Sphered')
                        ->subject('[Sphered] Нове повідомлення з сайту');
                });

                $data['msg'] = 'Сообщение отправлено.';
                $data['status'] = 1;
            }
        } else {
            $data['msg'] = 'Произошла ошибка. Попробуйте еще раз.';
            $data['status'] = 0;
        }

        return $this->jsonResponse($data);
    }

    public function start()
    {
        $data = [];
        $contact_data = Input::only('name', 'email', 'phone', 'website', 'project_type', 'business', 'description');

        if ($this->isTokenLegal()) {

            Mail::send('emails.start', $contact_data, function ($message) {
                $message
                    ->to('contact@sphered.com.ua', 'Sphered')
                    ->subject('[Sphered] Заявка на новый проект');
            });

            $data['msg'] = 'Сообщение отправлено.';
            $data['status'] = 1;
        }

        return $this->jsonResponse($data);
    }

    // Запрос кода вставки на сайте
    public function requestcode()
    {
        $data = [];
        $contact_data = Input::only('name', 'email', 'site', 'goal', 'workname');
        $contact_data['ip'] = Request::getClientIp();

        if (Requestcode::create($contact_data)) {

            Mail::send('emails.requestcode', $contact_data, function ($message) {
                $message
                    ->to('hello@sphered.com.ua', 'Sphered')
                    ->subject('[Sphered] Запрос кода вставкии');
            });

            $data['msg'] = 'Заявка отправлена.';
            $data['status'] = 1;
        } else {
            $data['msg'] = 'Ошибка. Попробуйте еще раз.';
            $data['status'] = 2;
        }

        return $this->jsonResponse($data);
    }

    private function jsonResponse($data)
    {
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    // CSRF токен валидный?
    private function isTokenLegal()
    {
        return Input::get('_token') == csrf_token() ? true : false;
    }
}
