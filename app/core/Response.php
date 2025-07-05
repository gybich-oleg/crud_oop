<?php

namespace app\core;
/*
 *
 */
class Response
{
    /*
     * Generate status
     */
    public function notFound()
    {
        http_response_code(404);
        exit();
    }
    public function view(string $page, array $data = [], string $template = 'default'){
        extract($data);
        include_once __DIR__ . '/../views/templates/' . $template . '.php';
    }
    public function redirect(string $url)
    {
        header('Location:' . $url);
    }

}
