<?php

namespace WakeOnWeb\Component\Swagger\Specification;

/**
 * @author Quentin Schuler <q.schuler@wakeonweb.com>
 * @author Alexandre Tomatis <a.tomatis@wakeonweb.com>
 */
class Paths
{
    const PATTERN_URL_PARAM = '/{[\w\d-]*}/';
    const PATTERN_URL_SEPARATOR = '/\//';

    /**
     * @var PathItem[]
     */
    private $paths;

    /**
     * @param PathItem[] $paths
     */
    public function __construct(array $paths)
    {
        $this->paths = $paths;
    }

    /**
     * @return PathItem[]
     */
    public function getPaths()
    {
        return $this->paths;
    }

    /**
     * @param string $path
     *
     * @return PathItem|null
     */
    public function getPathItemFor($path)
    {
        $match = [];

        foreach (array_keys($this->paths) as $pathAvailable) {
            $pathRegex = preg_replace(self::PATTERN_URL_SEPARATOR, '\/', preg_replace(self::PATTERN_URL_PARAM, '[A-Za-z0-9_.\-~{}]*', $pathAvailable));

            if (preg_match(sprintf('/%s/', $pathRegex), $path)) {
                $match[] = $pathAvailable;
            }
        }

        return 1 === count($match) ? $this->paths[array_shift($match)] : null;
    }
}
