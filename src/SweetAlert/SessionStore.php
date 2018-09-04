<?php

namespace SynergiTech\SweetAlert;

interface SessionStore
{
    /**
     * Flash some data into the session.
     *
     * @param $name
     * @param $data
     */
    public function flash($name, $data);

    /**
     * Put some data into the session.
     *
     * @param $name
     * @param $data
     */
    public function put($name, $data);
}
