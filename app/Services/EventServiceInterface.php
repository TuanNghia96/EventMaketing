<?php

namespace App\Services;

interface EventServiceInterface
{
    public function getSearch($input);
    public function join($id);
    public function resend($id);
    public function getMore($params);
    public function getEventWaiting();
    public function getEventValidate();
    public function setEventSuccess($id);
    public function cancelEvent($id);
    public function post($params);
}