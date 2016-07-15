<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use App\Feedback;
use App\Subscriber;
use App\CodeRequest;

class MessageController extends Controller
{
    /**
     * Подписка на новости
     * @return string
     */
    public function subscribe() : string
    {
        $data = [];
        $email = Input::get('email');

        if (!Subscriber::where('email', $email)->first()) {
            $subscriber = Subscriber::create([
                'email' => $email,
                'ip' => $this->request->getClientIp()
            ]);

            if ($subscriber) {

                Mail::send('emails.subscribethanks', [], function ($message) use ($email) {
                    $message->to($email)->subject('[Sphered] Подписка на новости');
                });

                $data['msg'] = 'Спасибо! Вы успешно подписаны на новости.';
                $data['status'] = 1;
            } else {
                $data['msg'] = 'Произошла ошибка. Попробуйте еще раз';
                $data['status'] = 0;
            }
        } else {
            $data['msg'] = 'Вы уже подписаны';
            $data['status'] = 0;
        }

        return $this->jsonResponse($data);
    }

    /**
     * Сообщение со страницы контакты
     * @return string
     */
    public function contact() : string
    {
        $data = [];
        $contact_data = Input::only('name', 'email', 'client_message');
        $contact_data['ip'] = $this->request->getClientIp();

        if (Feedback::create($contact_data)) {

            Mail::send('emails.contact', $contact_data, function ($message) {
                $message
                    ->to(config('mail.from.address'))
                    ->subject('[Sphered] Новое сообщение с сайта');
            });

            $data['msg'] = 'Сообщение отправлено.';
            $data['status'] = 1;
        } else {
            $data['msg'] = 'Произошла ошибка. Попробуйте еще раз.';
            $data['status'] = 0;
        }

        return $this->jsonResponse($data);
    }

    /**
     * Форма "ДОБАВИТЬ СВОЮ РАБОТУ"
     * @return string
     */
    public function start() : string
    {
        $data = [];
        $contact_data = Input::only('name', 'email', 'phone', 'website', 'project_type', 'business', 'description');

        Mail::send('emails.start', $contact_data, function ($message) {
            $message->to(config('mail.from.address'))->subject('[Sphered] Заявка на новый проект');
        });

        $data['msg'] = 'Сообщение отправлено.';
        $data['status'] = 1;

        return $this->jsonResponse($data);
    }

    /**
     * Запрос кода вставки на сайте
     * @return string
     */
    public function requestcode() : string
    {
        $data = [];
        $contact_data = Input::only('name', 'email', 'site', 'goal', 'workname');
        $contact_data['ip'] = $this->request->getClientIp();

        if (CodeRequest::create($contact_data)) {

            Mail::send('emails.requestcode', $contact_data, function ($message) {
                $message->to(config('mail.from.address'))->subject('[Sphered] Запрос кода вставкии');
            });

            $data['msg'] = 'Заявка отправлена.';
            $data['status'] = 1;
        } else {
            $data['msg'] = 'Ошибка. Попробуйте еще раз.';
            $data['status'] = 2;
        }

        return $this->jsonResponse($data);
    }

    /**
     * Генерация JSON ответа
     * @param array $data
     * @return string
     */
    private function jsonResponse(array $data) : string
    {
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Проверка CSRF токена на валидность
     * @return bool
     */
    private function isTokenLegal() : bool
    {
        return Input::get('_token') == csrf_token() ? true : false;
    }
}
