<?php

namespace App\Transformers;

use App\Models\Reply;
use League\Fractal\TransformerAbstract;

class ReplyTransformer extends TransformerAbstract
{

    protected $availableIncludes = ['user', 'topic'];

    public function transform(Reply $reply)
    {
        return [
            'id' => $reply->id,
            'topic_id' => $reply->topic_id,
            'user_id' => $reply->user_id,
            'content' => $reply->content,
            'created_at' => $reply->created_at->toDateTimeString(),
            'updated_at' => $reply->updated_at->toDateTimeString()
        ];
    }

    public function includeTopic(Reply $reply)
    {
        return $this->item($reply->topic, new TopicTransformer());
    }

    public function includeUser(Reply $reply)
    {
        return $this->item($reply->user, new UserTransformer());
    }
}