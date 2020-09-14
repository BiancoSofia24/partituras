<?php

    const HOST = 'localhost';
    const USER = 'root';
    const PASS = '';
    const BD = 'musica';

    /*
     * @return mysqli $Link;
     */
    function conectar()
    {
        $link = mysqli_connect(HOST, USER, PASS, BD);
        return $link;
    }

