<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;

use Illuminate\Http\Request;
use App\Models\ApiToken;
use App\Models\Topic;
use App\Models\Quiz;

class MobileApiController extends BaseController
{
    /**
     * Get list of a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apiTokenList()
    {
        $tokens = ApiToken::whereIn('id',getApiTokenIds())->get();
        return $this->sendResponse($tokens, 'Token data get successfully.');
    }

    /**
     * Get list of a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apiTokenUpdate(Request $request)
    {
        $token = ApiToken::find($request->id);
        $token->increment('app_utilize');
        return $this->sendResponse($token, 'Token update successfully.');
    }

    /**
     * Get list of a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function topicList()
    {
        $topics = Topic::with('quizez')->get();
        return $this->sendResponse($topics, 'Topic list data get successfully.');
    }

    /**
     * Get list of a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function quizList()
    {
        $topics = Quiz::with('questions')->get();
        return $this->sendResponse($topics, 'Quiz list data get successfully.');
    }
}
