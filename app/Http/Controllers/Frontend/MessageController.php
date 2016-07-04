<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MessageController extends Controller
{
    private function isTokenLegal()
    {
        return Input::get('_token') == csrf_token() ? true:false;
    }

    public function subscribe()
    {
        $lang = Input::get('lang');
        $email = Input::get('email');

        if(!sizeof(Subscribers::where('email','=',$email)->first()))
        {
            if(Subscribers::create(array('email'=>$email, 'ip'=>Request::getClientIp())))
            {
                Mail::send(array('html'=>'emails.rus.subscribethanks'), array(), function ($message) use ($email) {
                    $message->to($email,'Sphered Subscriber')->subject('[Sphered] Подписка на новости');
                });
                $msg = $lang=='rus'?'Спасибо! Вы успешно подписаны на новости.':'Дякуємо! Ви успішно підписались на новини.';
                $status = 1;
            }
            else
            {
                $msg = $lang=='rus'?'Произошла ошибка. Попробуйте еще раз':'Помилка. Не вдалось підписатись.';
                $status = 0;
            }
        }
        else
        {
            $msg = $lang=='rus'?'Такой email уже существует':'Такий email вже існує';
            $status = 0;
        }

        return Response::make(json_encode(array('msg'=>$msg, 'status'=>1)));
    }

    public function contact()
    {
        $lang = Input::get('lang');
        $contact_data = Input::only('name', 'email', 'phone', 'client_message');
        $contact_data['ip'] = Request::getClientIp();

        if(Messages::create($contact_data))
        {
            if($this->isTokenLegal())
            {
                $m = Mail::send(array('html'=>'emails.contact'), $contact_data, function ($message) {
                    $message->to('contact@sphered.com.ua','Sphered')->cc('gulchuk@yandex.ua')->subject('[Sphered] Нове повідомлення з сайту');
                });
            }
            else
            {
                $m = Mail::send(array('html'=>'emails.contact'), $contact_data, function ($message) {
                    $message->to('gulchuk@yandex.ua')->subject('[--Spam,maybe--][Sphered] Нове повідомлення з сайту');
                });
            }

            if($m)
            {
                $msg = $lang=='rus'?'Сообщение отправлено.':'Повідомлення надіслано.';
                $status = 1;
            }
            else
            {
                $msg = $lang=='rus'?'Не удалось отправить. Попробуйте еще раз или напишите нам на email':'Не вдалось надіслати. Спробуйте ще раз трохи пізніше або напишіть нам на email.';
                $status = 2;
            }
            /*
            Mail::send(array('html'=>'emails.contact'), $contact_data, function ($message) {
                $message->to('contact@sphered.com.ua','Sphered');
            });
            */
        }
        else
        {
            $msg = $lang=='rus'?'Произошла ошибка. Попробуйте еще раз':'Помилка. Спробуйте ще раз.';
            $status = 0;
        }
        return Response::make(json_encode(array('msg'=>$msg, 'status'=>$status)));
    }

    public function start()
    {
        $lang = Input::get('lang');
        $contact_data = Input::only('name', 'email', 'phone', 'website', 'project_type', 'business', 'description');

        if($this->isTokenLegal())
        {
            $m = Mail::send(array('html'=>'emails.start'), $contact_data, function ($message) {
                $message->to('contact@sphered.com.ua','Sphered')->cc('gulchuk@yandex.ua')->subject('[Sphered] Заявка на новий проект');
            });
        }
        else
        {
            $m = Mail::send(array('html'=>'emails.start'), $contact_data, function ($message) {
                $message->to('gulchuk@yandex.ua')->subject('[--Spam,maybe--][Sphered] Заявка на новий проект');
            });
        }

        if($m)
        {
            $msg = $lang=='rus'?'Сообщение отправлено.':'Повідомлення надіслано.';
            $status = 1;
        }
        else
        {
            $msg = $lang=='rus'?'Не удалось отправить. Попробуйте еще раз или напишите нам на email':'Не вдалось надіслати. Спробуйте ще раз трохи пізніше або напишіть нам на email.';
            $status = 2;
        }

        return Response::make(json_encode(array('msg'=>$msg, 'status'=>$status)));
    }

    public function requestcode()
    {
        $lang = Input::get('lang');
        $contact_data = Input::only('name', 'email', 'site', 'goal', 'workname');
        $contact_data['ip'] = Request::getClientIp();

        if(Requestcode::create($contact_data))
        {
            if($this->isTokenLegal())
            {
                $m = Mail::send(array('html'=>'emails.requestcode'), $contact_data, function ($message) {
                    $message->to('contact@sphered.com.ua','Sphered')->cc('gulchuk@yandex.ua')->subject('[Sphered] Запит коду вставки');
                });
            }
            else
            {
                $m = Mail::send(array('html'=>'emails.requestcode'), $contact_data, function ($message) {
                    $message->to('gulchuk@yandex.ua')->subject('[--Spam,maybe--][Sphered] Запит коду вставки');
                });
            }

            if($m)
            {
                $msg = $lang=='rus'?'Заявка отправлена.':'Заявку надіслано.';
                $status = 1;
            }
            else
            {
                $msg = $lang=='rus'?'Не удалось отправить. Попробуйте еще раз или напишите нам на email':'Не вдалось надіслати. Спробуйте ще раз трохи пізніше або напишіть нам на email.';
                $status = 2;
            }
        }
        else
        {
            $msg = $lang=='rus'?'Произошла ошибка. Попробуйте еще раз':'Помилка. Спробуйте ще раз.';
            $status = 0;
        }
        return Response::make(json_encode(array('msg'=>$msg, 'status'=>$status)));
    }
}
