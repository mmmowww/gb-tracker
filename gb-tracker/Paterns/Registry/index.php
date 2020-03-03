<?

class Registry
{
    private static $instance;
    private $object;

    private function __construct() {}

    public static function instance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new self();
        }
        return static::$instance;
    }

    public function getObject()
    {
        return $this->object;
    }

    public function setObject(Object $object)
    {
        $this->object = $object;
    }

 
}
