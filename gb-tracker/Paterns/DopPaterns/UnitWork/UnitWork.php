<?
class UnitOfWork
{
    private $new = [];
    private $dirty = [];
    private $delete = [];

    public function registerNew(IDomainObject $object)
    {
        echo 'Объект на вставку в БД';
    }

    public function registerDirty(IDomainObject $object)
    {
        echo 'Объект на обновление';
    }

    public function registerClean(IDomainObject $object)
    {
        echo 'Очищаем список';
    }

    public function registerDeleted(IDomainObject $object)
    {
        echo 'Удаляем объект из БД';
    }

    public function commit()
    {
        insertNew();
        updateDirty();
        deleteRemoved();
    }
}
