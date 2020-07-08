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
    public function getEventDelete();
    public function setEventSuccess($id);
    public function delete($params);
    public function cancelEvent($params);
    public function post($params);
    public function getEpSearch($input);
    public function storeComment($params);
    public function connect($id);
}
