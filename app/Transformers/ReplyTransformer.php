<?php

namespace App\Transformers;

use App\Models\Reply;
use League\Fractal\TransformerAbstract;

class ReplyTransformer extends TransformerAbstract
{

    protected $availableIncludes = ['topic.user', 'user'];

    public function transform(Reply $reply)
    {
        return [
            'topic_id' => $reply->topic_id,
            'user_id' => $reply->user_id,
            'content' => $reply->content,
            'created_at' => $reply->created_at->toDateTimeString(),
            'updated_at' => $reply->update_at->toDateTimeString()
        ];
    }

    public function includeTopicUser(Reply $reply)
    {
        return $this->item($reply->topic, new TopicTransformer());
    }

    public function includeUser(Reply $reply)
    {
        return $this->item($reply->user, new UserTransformer());
    }
}