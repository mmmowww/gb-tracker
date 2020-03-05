<?
interface IIdentityMap
{
    public function add(IDomainObject $obj)
    public function get(string $classname, int $id)
    private function getGlobalKey(string $classname, int $id)
    
}
