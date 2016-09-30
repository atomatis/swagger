<?php

namespace UCS\Swagger\Loader;

use UCS\Swagger\Loader\Exception\LoaderException;

/**
 * @author Quentin Schuler <q.schuler@wakeonweb.com>
 */
interface LoaderInterface
{
    /**
     * @param string $filename
     *
     * @return array
     *
     * @throws LoaderException
     */
    public function load($filename);

    /**
     * @param string $filename
     *
     * @return bool
     */
    public function supports($filename);
}