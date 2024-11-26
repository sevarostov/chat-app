<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Response;
use Illuminate\Contracts\Routing\ResponseFactory;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Контроллер сообщений
 */
class MessageController
{
    /**
     * Получение списка сообщений
     *  
     * Отдается порционно по 20 сообщений.
     * 
     * Для получения следующих страниц необходимо передать `page` с номером страницы.
     * 
     * @param int $chatId
     * @param Request $request
     * @return Response|ResponseFactory
     *
     * @queryParam page Номер страницы. Example: 1
     * @responseFile status=200 scenario="success" storage/responses/messages/index.200.json
     * @responseFile status=404 scenario="chat not found" storage/responses/messages/index.404.json
     * @authenticated
     */
    public function index(int $chatId, Request $request): Response|ResponseFactory
    {
        $page = $request->input('page') ?? 1;
        $limit = 20;
        $skip = ($page - 1) * $limit;

        $user = Auth::user();
        $chat = $user->chats()->where('chats.id', $chatId)->first();

        if ($chat === null) {
            return response(['message' => 'Chat not found'], 404);
        }

        $messages = $chat->messages()->skip($skip)->limit($limit)->latest('created_at')->get();

        $messages->makeHidden('chat_id');

        return response($messages);
    }

    /**
     * Создание сообщения
     *  
     * Создается сообщение в чате. 
     * 
     * Необходимо указать в URI `chatId` и передать `text`в теле запроса. 
     * 
     * @param int $chatId
     * @param Request $request
     * @return Response|ResponseFactory
     *
     * @responseFile status=200 scenario="success" storage/responses/messages/store.200.json
     * @responseFile status=404 scenario="chat not found" storage/responses/messages/store.404.json
     * @responseFile status=422 scenario="validation fail" storage/responses/messages/validate_fail.json
     * @authenticated
     */
    public function store(int $chatId, Request $request): Response|ResponseFactory
    {
        $message = $request->validate([
            //Text Example: Тестовое сообщение
            'text' => ['required', 'string', 'max:255']
        ]);

        $user = Auth::user();
        $chat = $user->chats()->where('chats.id', $chatId)->first();

        if ($chat === null) {
            return response(['message' => 'Chat not found'], 404);
        }

        $message['chat_id'] = $chat->id;
        $message['text'] = strip_tags($message['text']);

        $message = Message::create($message);

        return response(['message' => 'Message created']);
    }
}
