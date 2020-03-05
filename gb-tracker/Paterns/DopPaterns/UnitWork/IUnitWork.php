<?
interface IUnitWork{
	public function registerNew(IDomainObject $object);
    public function registerDirty(IDomainObject $object);
    public function registerClean(IDomainObject $object);
    public function registerDeleted(IDomainObject $object);
    public function commit();
    
}
