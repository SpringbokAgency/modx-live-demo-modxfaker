<?php


namespace SpringbokAgency\MODX\Faker;


class Faker
{
    public $config = [];
    /**
     * @var \modX
     */
    private $modx;
    /**
     * @var \modNamespace
     */
    private $namespace;

    public function __construct(\modX $modx, $params = [])
    {
        $this->modx = $modx;
        $this->namespace = $params['namespace'];

        $assetsUrl = MODX_ASSETS_URL . 'components/' . $this->namespace->get('name') . '/';
        $this->config = [
            'namespace' => $this->namespace->get('name'),
            'core_path' => $this->namespace->getCorePath(),
            'assets_path' => $this->namespace->getAssetsPath(),
            'processors_path' => $this->namespace->getCorePath() . 'processors/',
            'templates_path' => $this->namespace->getCorePath() . 'src/Templates/',

            'assets_url' => $assetsUrl,
            'connector_url' => $assetsUrl . 'connector.php'
        ];

        $modx->services[$this->namespace->get('name')] =& $this;
    }
}