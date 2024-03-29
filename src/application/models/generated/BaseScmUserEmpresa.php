<?php

/**
 * BaseScmUserEmpresa
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property integer $id_empresa
 * @property ScmUser $ScmUser
 * @property ScmEmpresa $ScmEmpresa
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6401 2009-09-24 16:12:04Z guilhermeblanco $
 */
abstract class BaseScmUserEmpresa extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('scm_user_empresa');
        $this->hasColumn('user_id', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => '1',
             'primary' => true,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('id_empresa', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => 0,
             'primary' => true,
             'autoincrement' => false,
             'length' => '4',
             ));
    }

    public function setUp()
    {
        parent::setUp();
    $this->hasOne('ScmUser', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $this->hasOne('ScmEmpresa', array(
             'local' => 'id_empresa',
             'foreign' => 'id'));
    }
}